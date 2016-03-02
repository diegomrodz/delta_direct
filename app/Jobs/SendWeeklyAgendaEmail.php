<?php

namespace App\Jobs;

use DB;
use App\User;
use App\Project;
use App\Jobs\Job;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWeeklyAgendaEmail extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function handle(Mailer $mailer)
    {
        $user = $this->user;
        
        $start = date("d/m/Y");
        $end = date('d/m/Y', strtotime('+7 days'));
        
        $projects = array();
        
        if ($user->getUserType()->cod == 10)
        {
            $projects = Project::where('active', 's')
                               ->where('representant_id', $user->representant()->representant_id)
                               ->where('project_stage_id', '!=', 1)
                               ->where(function ($query) {
                                    $query->where(DB::raw('prospect_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))     
                                          ->orWhere(DB::raw('proposal_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))
                                          ->orWhere(DB::raw('mockup_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))
                                          ->orWhere(DB::raw('est_arrival BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'));
                               })
                               ->get();
        }
        else 
        {
            $projects = Project::where('active', 's')
                               ->where('representant_id', null)
                               ->where('manager_id', $user->manager()->manager_id)
                               ->where('project_stage_id', '!=', 1)
                               ->where(function ($query) {
                                    $query->where(DB::raw('prospect_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))     
                                          ->orWhere(DB::raw('proposal_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))
                                          ->orWhere(DB::raw('mockup_date BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'))
                                          ->orWhere(DB::raw('est_arrival BETWEEN DATE_ADD(NOW(), INTERVAL 7 DAY) AND NOW()'));
                               })
                               ->get();
        }
        
        $mailer->send('emails.weekly_agenda', ['user' => $this->user, 'start' => $start, 'end' => $end, 'projects' => $projects],
                      function ($m) use ($user, $start, $end, $projects) {
            $m->replyTo("marcos.rios@deltafaucet.com", "Delta Faucet");
            $m->to($user->email, $name = null);
            $m->subject("Delta Faucet :: Agenda da Semana :: " . $start . " - " . $end);
        });
    }
}