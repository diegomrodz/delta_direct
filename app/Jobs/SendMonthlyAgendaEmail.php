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

class SendMonthlyAgendaEmail extends Job implements SelfHandling, ShouldQueue
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
        
        $month = date("F");
        
        $projects = array();
        
        if ($user->getUserType()->cod == 10)
        {
            $projects = Project::where('active', 's')
                               ->where('representant_id', $user->representant()->representant_id)
                               ->where('project_stage_id', '!=', 1)
                               ->where(DB::raw('YEAR(created_at)'), DB::raw('YEAR(NOW())'))
                               ->where(function ($query) {
                                    $query->where(DB::raw('MONTH(prospect_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(proposal_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(mockup_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(est_arrival) = MONTH(NOW())'));
                               })
                               ->get();
        }
        else 
        {
            $projects = Project::where('active', 's')
                               ->where('representant_id', null)
                               ->where('manager_id', $user->manager()->manager_id)
                               ->where('project_stage_id', '!=', 1)
                               ->where(DB::raw('YEAR(created_at)'), DB::raw('YEAR(NOW())'))
                               ->where(function ($query) {
                                    $query->where(DB::raw('MONTH(prospect_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(proposal_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(mockup_date) = MONTH(NOW())'))
                                          ->orWhere(DB::raw('MONTH(est_arrival) = MONTH(NOW())'));
                               })
                               ->get();
        }
        
        $mailer->send('emails.monthly_agenda', ['user' => $this->user, 'month' => $month, 'projects' => $projects],
                      function ($m) use ($user, $month, $projects) {
            $m->replyTo("marcos.rios@deltafaucet.com", "Delta Faucet");
            $m->to($user->email, $name = null);
            $m->subject("Delta Faucet :: Agenda da Semana :: " . $month);
        });
    }
}