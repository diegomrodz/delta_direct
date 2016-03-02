<?php

/**
 * Developed by Diego M. Rodrigues.
 *
 * @email: diego.mrodrigues@outlook.com
 * @github: diego95
 *
 * Code Repository: https://github.com/diego95/delta_direct
 *
 * -----------------------------------------------------------------------------------------------------------------
 *
 * Dear Fellow Programmer,
 *
 * This system was first design to merely make budgets and send it though email, however it came to be an effort to
 * control and facilitate the access to information among the reps and partners of Delta. But, despite its size and
 * complexity, and didn't get that many time to develop it using all programming best pratices.
 *
 * Before you start complaining about the quality and organization of my code, try to put yourself in my position.
 * I had to delivery a system that would normally take 6 months in 6 weeks, and my bosses thinked that it was some-
 * kind of spreadsheet, where PROCV is the answer to everything.
 * 
 * The PHP was choosen as programming language because of its rapid development cycle and its great techinical support.
 * One might say that JAVA with the Spring Framework would be the best choice, since it is already in use by the Delta
 * Faucet Website, however the development time is larger and the techinical support provided by the host much weaker.
 *
 * The Web Framework choosed was the Laravel 5.1 because of its great similarity with the ASP.NET MVC Framework, which
 * I was working in previous projects, and its awesome techinical documentation. 
 *
 * To implement this system I choose to use the most scalable and flexible architecture know to man, MVC. And I know
 * that was not suposed to access the database via the controllers but I didn't have time to explain the need of
 * repositories and implemented it. 
 *
 * Forgive me for not making Unit Test Suites, but I had to delivery a new functionality in the end of every day. So,
 * once more I trade off quality of code for development time.
 *
 * Best Regards, Diego.
 *
 * -----------------------------------------------------------------------------------------------------------------
 *
 * Mozilla Public License, version 2.0
 * 
 * 1. Definitions
 * 
 * 1.1. "Contributor"
 * 
 *      means each individual or legal entity that creates, contributes to the
 *      creation of, or owns Covered Software.
 * 
 * 1.2. "Contributor Version"
 *
 *     means the combination of the Contributions of others (if any) used by a
 *     Contributor and that particular Contributor's Contribution.
 *
 *1.3. "Contribution"
 *
 *     means Covered Software of a particular Contributor.
 *
 *1.4. "Covered Software"
 *
 *     means Source Code Form to which the initial Contributor has attached the
 *     notice in Exhibit A, the Executable Form of such Source Code Form, and
 *     Modifications of such Source Code Form, in each case including portions
 *     thereof.
 *
 *1.5. "Incompatible With Secondary Licenses"
 *     means
 *
 *     a. that the initial Contributor has attached the notice described in
 *        Exhibit B to the Covered Software; or
 *
 *     b. that the Covered Software was made available under the terms of
 *        version 1.1 or earlier of the License, but not also under the terms of
 *        a Secondary License.
 *
 *1.6. "Executable Form"
 *
 *     means any form of the work other than Source Code Form.
 *
 *1.7. "Larger Work"
 *
 *     means a work that combines Covered Software with other material, in a
 *     separate file or files, that is not Covered Software.
 *
 *1.8. "License"
 *
 *     means this document.
 *
 *1.9. "Licensable"
 *
 *     means having the right to grant, to the maximum extent possible, whether
 *     at the time of the initial grant or subsequently, any and all of the
 *     rights conveyed by this License.
 *
 *1.10. "Modifications"
 *
 *     means any of the following:
 *
 *     a. any file in Source Code Form that results from an addition to,
 *        deletion from, or modification of the contents of Covered Software; or
 *
 *     b. any new file in Source Code Form that contains any Covered Software.
 *
 *1.11. "Patent Claims" of a Contributor
 *
 *      means any patent claim(s), including without limitation, method,
 *      process, and apparatus claims, in any patent Licensable by such
 *      Contributor that would be infringed, but for the grant of the License,
 *      by the making, using, selling, offering for sale, having made, import,
 *      or transfer of either its Contributions or its Contributor Version.
 *
 *1.12. "Secondary License"
 *
 *      means either the GNU General Public License, Version 2.0, the GNU Lesser
 *      General Public License, Version 2.1, the GNU Affero General Public
 *      License, Version 3.0, or any later versions of those licenses.
 *
 *1.13. "Source Code Form"
 *
 *      means the form of the work preferred for making modifications.
 *
 *1.14. "You" (or "Your")
 *
 *      means an individual or a legal entity exercising rights under this
 *      License. For legal entities, "You" includes any entity that controls, is
 *      controlled by, or is under common control with You. For purposes of this
 *      definition, "control" means (a) the power, direct or indirect, to cause
 *      the direction or management of such entity, whether by contract or
 *      otherwise, or (b) ownership of more than fifty percent (50%) of the
 *      outstanding shares or beneficial ownership of such entity.
 *
 *
 *2. License Grants and Conditions
 *
 *2.1. Grants
 *
 *     Each Contributor hereby grants You a world-wide, royalty-free,
 *     non-exclusive license:
 *
 *     a. under intellectual property rights (other than patent or trademark)
 *        Licensable by such Contributor to use, reproduce, make available,
 *        modify, display, perform, distribute, and otherwise exploit its
 *        Contributions, either on an unmodified basis, with Modifications, or
 *        as part of a Larger Work; and
 *
 *     b. under Patent Claims of such Contributor to make, use, sell, offer for
 *        sale, have made, import, and otherwise transfer either its
 *        Contributions or its Contributor Version.
 *
 *2.2. Effective Date
 *
 *     The licenses granted in Section 2.1 with respect to any Contribution
 *     become effective for each Contribution on the date the Contributor first
 *     distributes such Contribution.
 *
 *2.3. Limitations on Grant Scope
 *
 *     The licenses granted in this Section 2 are the only rights granted under
 *     this License. No additional rights or licenses will be implied from the
 *     distribution or licensing of Covered Software under this License.
 *     Notwithstanding Section 2.1(b) above, no patent license is granted by a
 *     Contributor:
 *
 *     a. for any code that a Contributor has removed from Covered Software; or
 *
 *     b. for infringements caused by: (i) Your and any other third party's
 *        modifications of Covered Software, or (ii) the combination of its
 *        Contributions with other software (except as part of its Contributor
 *        Version); or
 *
 *     c. under Patent Claims infringed by Covered Software in the absence of
 *        its Contributions.
 *
 *     This License does not grant any rights in the trademarks, service marks,
 *     or logos of any Contributor (except as may be necessary to comply with
 *     the notice requirements in Section 3.4).
 *
 *2.4. Subsequent Licenses
 *
 *     No Contributor makes additional grants as a result of Your choice to
 *     distribute the Covered Software under a subsequent version of this
 *     License (see Section 10.2) or under the terms of a Secondary License (if
 *     permitted under the terms of Section 3.3).
 *
 *2.5. Representation
 *
 *     Each Contributor represents that the Contributor believes its
 *     Contributions are its original creation(s) or it has sufficient rights to
 *     grant the rights to its Contributions conveyed by this License.
 *
 *2.6. Fair Use
 *
 *     This License is not intended to limit any rights You have under
 *     applicable copyright doctrines of fair use, fair dealing, or other
 *     equivalents.
 *
 *2.7. Conditions
 *
 *     Sections 3.1, 3.2, 3.3, and 3.4 are conditions of the licenses granted in
 *     Section 2.1.
 *
 *
 *3. Responsibilities
 *
 *3.1. Distribution of Source Form
 *
 *     All distribution of Covered Software in Source Code Form, including any
 *     Modifications that You create or to which You contribute, must be under
 *     the terms of this License. You must inform recipients that the Source
 *     Code Form of the Covered Software is governed by the terms of this
 *     License, and how they can obtain a copy of this License. You may not
 *     attempt to alter or restrict the recipients' rights in the Source Code
 *     Form.
 *
 *3.2. Distribution of Executable Form
 *
 *     If You distribute Covered Software in Executable Form then:
 *
 *     a. such Covered Software must also be made available in Source Code Form,
 *        as described in Section 3.1, and You must inform recipients of the
 *        Executable Form how they can obtain a copy of such Source Code Form by
 *        reasonable means in a timely manner, at a charge no more than the cost
 *        of distribution to the recipient; and
 *
 *     b. You may distribute such Executable Form under the terms of this
 *        License, or sublicense it under different terms, provided that the
 *        license for the Executable Form does not attempt to limit or alter the
 *        recipients' rights in the Source Code Form under this License.
 *
 *3.3. Distribution of a Larger Work
 *
 *     You may create and distribute a Larger Work under terms of Your choice,
 *     provided that You also comply with the requirements of this License for
 *     the Covered Software. If the Larger Work is a combination of Covered
 *     Software with a work governed by one or more Secondary Licenses, and the
 *     Covered Software is not Incompatible With Secondary Licenses, this
 *     License permits You to additionally distribute such Covered Software
 *     under the terms of such Secondary License(s), so that the recipient of
 *     the Larger Work may, at their option, further distribute the Covered
 *     Software under the terms of either this License or such Secondary
 *     License(s).
 *
 *3.4. Notices
 *
 *     You may not remove or alter the substance of any license notices
 *     (including copyright notices, patent notices, disclaimers of warranty, or
 *     limitations of liability) contained within the Source Code Form of the
 *     Covered Software, except that You may alter any license notices to the
 *     extent required to remedy known factual inaccuracies.
 *
 *3.5. Application of Additional Terms
 *
 *     You may choose to offer, and to charge a fee for, warranty, support,
 *     indemnity or liability obligations to one or more recipients of Covered
 *     Software. However, You may do so only on Your own behalf, and not on
 *     behalf of any Contributor. You must make it absolutely clear that any
 *     such warranty, support, indemnity, or liability obligation is offered by
 *     You alone, and You hereby agree to indemnify every Contributor for any
 *     liability incurred by such Contributor as a result of warranty, support,
 *     indemnity or liability terms You offer. You may include additional
 *     disclaimers of warranty and limitations of liability specific to any
 *     jurisdiction.
 *
 *4. Inability to Comply Due to Statute or Regulation
 *
 *   If it is impossible for You to comply with any of the terms of this License
 *   with respect to some or all of the Covered Software due to statute,
 *   judicial order, or regulation then You must: (a) comply with the terms of
 *   this License to the maximum extent possible; and (b) describe the
 *   limitations and the code they affect. Such description must be placed in a
 *   text file included with all distributions of the Covered Software under
 *   this License. Except to the extent prohibited by statute or regulation,
 *   such description must be sufficiently detailed for a recipient of ordinary
 *   skill to be able to understand it.
 *
 *5. Termination
 *
 *5.1. The rights granted under this License will terminate automatically if You
 *     fail to comply with any of its terms. However, if You become compliant,
 *     then the rights granted under this License from a particular Contributor
 *     are reinstated (a) provisionally, unless and until such Contributor
 *     explicitly and finally terminates Your grants, and (b) on an ongoing
 *     basis, if such Contributor fails to notify You of the non-compliance by
 *     some reasonable means prior to 60 days after You have come back into
 *     compliance. Moreover, Your grants from a particular Contributor are
 *     reinstated on an ongoing basis if such Contributor notifies You of the
 *     non-compliance by some reasonable means, this is the first time You have
 *     received notice of non-compliance with this License from such
 *     Contributor, and You become compliant prior to 30 days after Your receipt
 *     of the notice.
 *
 *5.2. If You initiate litigation against any entity by asserting a patent
 *      infringement claim (excluding declaratory judgment actions,
 *      counter-claims, and cross-claims) alleging that a Contributor Version
 *      directly or indirectly infringes any patent, then the rights granted to
 *      You by any and all Contributors for the Covered Software under Section
 *      2.1 of this License shall terminate.
 *  * 
 * 5.3. In the event of termination under Sections 5.1 or 5.2 above, all end user
 *      license agreements (excluding distributors and resellers) which have been
 *      validly granted by You or Your distributors under this License prior to
 *      termination shall survive termination.
 * 
 * 6. Disclaimer of Warranty
 * 
 *    Covered Software is provided under this License on an "as is" basis,
 *    without warranty of any kind, either expressed, implied, or statutory,
 *    including, without limitation, warranties that the Covered Software is free
 *    of defects, merchantable, fit for a particular purpose or non-infringing.
 *   The entire risk as to the quality and performance of the Covered Software
 *   is with You. Should any Covered Software prove defective in any respect,
 *   You (not any Contributor) assume the cost of any necessary servicing,
 *   repair, or correction. This disclaimer of warranty constitutes an essential
 *   part of this License. No use of  any Covered Software is authorized under
 *   this License except under this disclaimer.
 *
 *7. Limitation of Liability
 *
 *   Under no circumstances and under no legal theory, whether tort (including
 *   negligence), contract, or otherwise, shall any Contributor, or anyone who
 *   distributes Covered Software as permitted above, be liable to You for any
 *   direct, indirect, special, incidental, or consequential damages of any
 *   character including, without limitation, damages for lost profits, loss of
 *   goodwill, work stoppage, computer failure or malfunction, or any and all
 *   other commercial damages or losses, even if such party shall have been
 *   informed of the possibility of such damages. This limitation of liability
 *   shall not apply to liability for death or personal injury resulting from
 *   such party's negligence to the extent applicable law prohibits such
 *   limitation. Some jurisdictions do not allow the exclusion or limitation of
 *   incidental or consequential damages, so this exclusion and limitation may
 *    not apply to You.
 * 
 * 8. Litigation
 * 
 *    Any litigation relating to this License may be brought only in the courts
 *    of a jurisdiction where the defendant maintains its principal place of
 *    business and such litigation shall be governed by laws of that
 *    jurisdiction, without reference to its conflict-of-law provisions. Nothing
 *    in this Section shall prevent a party's ability to bring cross-claims or
 *    counter-claims.
 * 
 * 9. Miscellaneous
 * 
 *    This License represents the complete agreement concerning the subject
 *    matter hereof. If any provision of this License is held to be
 *    unenforceable, such provision shall be reformed only to the extent
 *    necessary to make it enforceable. Any law or regulation which provides that
 *    the language of a contract shall be construed against the drafter shall not
 *    be used to construe this License against a Contributor.
 * 
 * 
 * 10. Versions of the License
 * 
 * 10.1. New Versions
 * 
 *       Mozilla Foundation is the license steward. Except as provided in Section
 *       10.3, no one other than the license steward has the right to modify or
 *       publish new versions of this License. Each version will be given a
 *       distinguishing version number.
 * 
 * 10.2. Effect of New Versions
 * 
 *       You may distribute the Covered Software under the terms of the version
 *       of the License under which You originally received the Covered Software,
 *       or under the terms of any subsequent version published by the license
 *       steward.
 * 
 * 10.3. Modified Versions
 * 
 *       If you create software not governed by this License, and you want to
 *       create a new license for such software, you may create and use a
 *       modified version of this License if you rename the license and remove
 *       any references to the name of the license steward (except to note that
 *       such modified license differs from this License).
 * 
 * 10.4. Distributing Source Code Form that is Incompatible With Secondary
 *       Licenses If You choose to distribute Source Code Form that is
 *       Incompatible With Secondary Licenses under the terms of this version of
 *       the License, the notice described in Exhibit B of this License must be
 *       attached.
 * 
 * Exhibit A - Source Code Form License Notice
 * 
 *       This Source Code Form is subject to the
 *       terms of the Mozilla Public License, v.
 *       2.0. If a copy of the MPL was not
 *       distributed with this file, You can
 *       obtain one at
 *       http://mozilla.org/MPL/2.0/.
 * 
 * If it is not possible or desirable to put the notice in a particular file,
 * then You may include the notice in a location (such as a LICENSE file in a
 * relevant directory) where a recipient would be likely to look for such a
 * notice.
 * 
 * You may add additional accurate notices of copyright ownership.
 * 
 * Exhibit B - "Incompatible With Secondary Licenses" Notice
 * 
 *       This Source Code Form is "Incompatible
 *       With Secondary Licenses", as defined by
 *       the Mozilla Public License, v. 2.0.
 *
 *
 */


namespace App\Http\Controllers;

use DB;
use Auth;
use Hash;
use Mail;
use App\User;
use App\Project;
use App\UserType;
use App\Customer;
use App\CloudFile;
use App\Influencer;
use App\ProjectNote;
use App\Representant;
use App\Notification;
use App\NotificationStatus;
use App\InfluencerType;
use App\CustomerPartner;
use App\CloudDirectory;
use App\ProjectBudget;
use App\ProjectStage;
use App\ProjectClosedStatus;
use App\ProjectInfluencer;
use App\RepresentantBudget;
use App\Distribuitor;
use App\DistribuitorInventoryProduct;
use App\CustomerBusinessContact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TrackerController extends Controller
{
    
    public function index() 
    {
        $user = Auth::user();
        
        return view('tracker.index', ['user' => $user]);
    }
    
    public function newProject() 
    {
        $user = Auth::user();
        
        return view('tracker.project.new', ['user' => $user]);
    }
  
    public function getInfluencerList() 
    {
        $user = Auth::user();
        
        return view('tracker.influencer.list', ['user' => $user]);
    }
    
    public function getAgenda() 
    {
        $user = Auth::user();
        
        return view('tracker.agenda', ['user'=> $user]);
    }
    
    public function getNewInfluencer() 
    {
        $user = Auth::user();
        
        return view('tracker.new_influencer', ['user' => $user]);
    }
    
    public function addInfluencer() 
    {
        $user = Auth::user();
        
        return view('tracker.influencer.add_to_project', ['user' => $user]);
    }
    
    public function removeInfluencer($project_id, $influencer_id) 
    {
        $influencer = Influencer::where('influencer_id', $influencer_id)->first();
        
        ProjectInfluencer::where('project_id', $project_id)
                         ->where('influencer_id', $influencer_id)
                         ->where('customer_id', $influencer->customer_id)
                         ->update(['active' => 'n']);
    }
    
    public function detailInfluencer($influencer_id) 
    {
        $influencer = Influencer::where('influencer_id', $influencer_id)->first();
        $user = Auth::user();
        
        return view('tracker.influencer.detail', ['influencer' => $influencer, 'user' => $user]);
    }
    
    public function changeInfluencersToOrg($org_id, Request $request) 
    {
        foreach ($request->selected as $id) 
        {
            $inf = Influencer::where('influencer_id', $id)->first();
            
            $inf->customer_id = $org_id;
            
            $inf->save();
        }
    }
    
    public function getUnifyInfluencer(Request $request, $first_id, $second_id) 
    {
        $first = Influencer::where('influencer_id', $first_id)->first();
        $second = Influencer::where('influencer_id', $second_id)->first();

        if ($request->id == null) 
        {
            return view('tracker.influencer.unify', ['first' => $first, 'second' => $second]);    
        }
        
        $is_first = $request->id == $first_id;
        
        $new = new Influencer;
        
        $new->name = $is_first ? $first->name : $second->name;
        $new->surname = $is_first ? $first->surname : $second->surname;
        $new->influencer_type_id = $is_first ? $first->influencer_type_id : $second->influencer_type_id;
        $new->representant_id = $is_first ? $first->representant_id : $second->representant_id;
        $new->manager_id = $is_first ? $first->manager_id : $second->manager_id;
        $new->distribuitor_id = $is_first ? $first->distribuitor_id : $second->distribuitor_id;
        $new->customer_id = $is_first ? $first->customer_id : $second->customer_id;
        $new->entity_derived_type = $is_first ? $first->entity_derived_type : $second->entity_derived_type;
        $new->entity_derived_id = $is_first ? $first->entity_derived_id : $second->entity_derived_id;
        $new->email = $is_first ? $first->email : $second->email;
        $new->website = $is_first ? $first->website : $second->website;
        $new->phone = $is_first ? $first->phone : $second->phone;
        $new->phone2 = $is_first ? $first->phone2 : $second->phone2;
        $new->cellphone = $is_first ? $first->cellphone : $second->cellphone;
        $new->manager_id = $is_first ? $first->manager_id : $second->manager_id;
        $new->cpf_cnpj = $is_first ? $first->cpf_cnpj : $second->cpf_cnpj;
        
        $new->save();
        
        $first->active = 'n';
        $second->active = 'n';
        
        $first->save();
        $second->save();
        
        ProjectInfluencer::where('influencer_id', $first_id)->where('active', 's')->update(['influencer_id' => $new->influencer_id]);
        ProjectInfluencer::where('influencer_id', $second_id)->where('active', 's')->update(['influencer_id' => $new->influencer_id]);
        
    }
    
    public function notifyResp($project_id, Request $request) 
    {
        $project = Project::where('project_id', $project_id)->first();
        $user = Auth::user();
        $email = null;
        $msg = array();
        
        if ($project->distribuitor_id != null) 
        {
            $email = $project->distribuitor()->user()->email;
        }
        else if ($project->manager_id != null && $project->representant_id == null) 
        {
            $email = $project->manager()->user()->email;
        } 
        else 
        {
            $email = $project->representant()->user()->email;
        }
        
        $msg["text"] = $request->text;
        
        Mail::send('emails.project_notification', ['project' => $project, 'msg' => $msg], function ($m) use ($user, $email, $project) {
            $m->replyTo($user->email, $user->name . " " . $user->surname);
            $m->to($email, $name = null);
            $m->subject("Delta Faucet :: Projeto #" . $project->project_id);
        });
    }
    
    public function disableInfluencer($influencer_id) 
    {
        $inf = Influencer::where('influencer_id', $influencer_id)->first();
    
        $inf->active = 'n';
        
        $inf->save();
    }
    
    public function editInfluencer($influencer_id, $field, $value) 
    {
        Influencer::where('influencer_id', $influencer_id)
                  ->update([ $field => $value ]);
    }
    
    public function setInfluencerLevel($project_id, $influencer_id, $level) 
    {
        $influencer = Influencer::where('influencer_id', $influencer_id)->first();
        
        if ($level >= 5) 
        {
        
            $main = ProjectInfluencer::where('project_id', $project_id)
                                     ->where('active', 's')
                                     ->where('level', 5)
                                     ->first();

            if ($main->influencer_id != $influencer_id) 
            {
                ProjectInfluencer::where('project_id', $project_id)
                                 ->where('influencer_id', $main->influencer_id)
                                 ->where('customer_id', $main->customer_id)
                                 ->update(['level' => 4]);
            }
            
        }
        
        ProjectInfluencer::where('project_id', $project_id)
                 ->where('influencer_id', $influencer_id)
                 ->where('customer_id', $influencer->customer_id)
                 ->update(['level' => $level]);
    }
    
    public function postNewInfluencer(Request $request) 
    {
        $user = Auth::user();
        
        $influencer = new Influencer;
        
        $influencer->name = $request->name;
        $influencer->surname = $request->surname;
        $influencer->email = $request->email;
        $influencer->website = $request->website;
        $influencer->phone = $request->phone;
        $influencer->phone2 = $request->phone2;
        $influencer->cellphone = $request->cellphone;
        $influencer->cpf_cnpj = $request->cpf_cnpj;
        
        $influencer->influencer_type_id = 2;
        
        if ($user->getUserType()->cod == 10) 
        {
            $influencer->representant_id = $user->representant()->representant_id;
            $influencer->manager_id = $user->representant()->manager()->manager_id;
        }
        else if ($user->getUserType()->cod == 20) 
        {
            $influencer->manager_id = $user->manager()->manager_id;
        }
        else if ($user->getUserType()->cod == 5) 
        {
            $influencer->distribuitor_id = $user->distribuitor()->distribuitor_id;
        }
        
        $influencer->save();
        
        return redirect()->to('/');
    }
    
    public function addInfluencerToProject($project_id, Request $request) 
    {
        $user = Auth::user();
        $project = Project::where('project_id', $project_id)->first();
        $relation = new ProjectInfluencer;
        
        $relation->project_id = $project->project_id;
        $relation->level = 1;
        
        if ($request->input("type") == "Influenciador") 
        {
            $influencer = Influencer::where('influencer_id', $request->input("entity_id"))->first();
            
            $relation->influencer_id = $influencer->influencer_id;
            
            if ($influencer->customer_id == null) 
            {
                $relation->customer_id = $influencer->customer_id;
            }
        }
        else
        {
            $influencer = new Influencer;
            
            if ($user->getUserType()->cod == 10) 
            {
                $influencer->representant_id = $user->representant()->representant_id;
                $influencer->manager_id = $user->representant()->manager()->manager_id;
            }
            else if ($user->getUserType()->cod == 20) 
            {
                $influencer->manager_id = $user->manager()->manager_id;
            }
            else if ($user->getUserType()->cod == 5)
            {
                $influencer->distribuitor_id = $user->distribuitor()->distribuitor_id;
            }
            
            $influencer->influencer_type_id = 2;
            
            $influencer->customer_id = $request->input("customer_id");
            
            $influencer->entity_derived_id = $request->input("entity_id");
            
            $influencer->name = $request->input("name");
            $influencer->email = $request->input("email");
            $influencer->phone = $request->input("phone");
            $influencer->cpf_cnpj = $request->input("cpf");
            
            if ($request->input("type") == "Business Contact") 
            {
                $influencer->entity_derived_type = 'bc';
            }
            else
            {
                $influencer->entity_derived_type = 'bp';
            }
            
            $influencer->save();
            
            $relation->influencer_id = $influencer->influencer_id;
            
            if ($influencer->customer_id != null) 
            {
                $relation->customer_id = $influencer->customer_id;
            }
        }
        
        $relation->save();
    }
    
    public function getDemandingPlan(Request $request) 
    {
        $user = Auth::user();
        
        $date = $request->input("q");
        
        $products = ProjectBudget::where('project_budget.active', 's')
                                 ->where('project_budget.flag_for_dp', 's')
                                 ->where('representant_budget_product.active', 's')
                                 ->where('project.est_arrival', '>', DB::raw('DATE_SUB(curdate(), INTERVAL '. ($date == null ? 2 : $date) .' MONTH)'))
                                 ->join('project', function ($join) {
                                     $join->on('project_budget.project_id', '=', 'project.project_id');
                                 })
                                 ->join('representant_budget', function ($join) {
                                     $join->on('project_budget.representant_budget_id', '=', 'representant_budget.representant_budget_id');
                                 })
                                 ->join('representant_budget_product', function ($join) {
                                     $join->on('project_budget.representant_budget_id', '=', 'representant_budget_product.representant_budget_id');
                                 })
                                 ->join('product', function ($join) {
                                     $join->on('representant_budget_product.product_id', '=', 'product.product_id');
                                 })
                                 ->join('product_serie', function ($join) {
                                     $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                                 })
                                 ->select(
                                    "product.product_id as ID",
                                    "product.sku as SKU",
                                    "product_serie.description as SERIE",
                                    "product.description_en as DESC_EN",
                                    DB::raw("COUNT(project.project_id) as QTD_PRJ"),
                                    DB::raw("SUM(representant_budget_product.quantity) as QTD_PRODUCT")
                                 )
                                 ->groupBy("SKU")
                                 ->get();
                                    
        
        foreach ($products as $key => $value) {
            $dists = Distribuitor::where('active', 's')->get();
            $qtd = 0;
            
            foreach ($dists as $dist) {
                $pos = collect(DistribuitorInventoryProduct::where('distribuitor_id', $dist->distribuitor_id)
                                                    ->where('product_id', $value["ID"])
                                                    ->orderBy("updated_at", "desc")
                                                    ->get())->first();
                
                $qtd += $pos["quantity"];
            }
            
            $products[$key]["QTD_BR"] = $qtd;
        }
        
        return view('tracker.dp', ['user' => $user, 'products' => $products, 'interval' => $date]);
    }
    
    public function editFieldTo($project_id, $field, $value) 
    {
        Project::where('project_id', $project_id)->update([
            $field => $value
        ]);
    }
    
    public function assignResp($project_id, $resp_id) 
    {
        $project = Project::where('project_id', $project_id)->first();
        $resp = User::where('user_id', $resp_id)->first();
        $user = Auth::user();
        
        $project->representant_id = null;
        $project->manager_id = null;
        $project->distribuitor_id = null;
        
        if ($resp->getUserType()->cod == 5)
        {
            $project->distribuitor_id = $resp->distribuitor()->distribuitor_id;
        }
        else if ($resp->getUserType()->cod == 20) 
        {
            $project->manager_id = $resp->manager()->manager_id;
        }
        else if ($resp->getUserType()->cod == 10) 
        {
            $project->representant_id = $resp->representant()->representant_id;
            $project->manager_id = $resp->representant()->manager()->manager_id;
        }
        
        $project->save();
        
        $note = new Notification;

        $note->from_user_id = $user->user_id;
        $note->to_user_id = $resp->user_id;
        $note->subject_id = 9;
        $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
        $note->text = "O projeto #" . $project->project_id . " foi atribuido a você. Visualize-o para maiores detalhes.";

        $note->save();
        
        if ($resp->getUserType()->cod == 10) 
        {
            $note = new Notification;

            $note->from_user_id = $user->user_id;
            $note->to_user_id = $resp->representant()->manager()->user_id;
            $note->subject_id = 9;
            $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
            $note->text = "O projeto #" . $project->project_id . " foi atribuido ao representante " . $resp->name . " " . $resp->surname . ". Visualize-o para maiores detalhes.";

            $note->save();
        }
    }
    
    public function printProject($project_id) 
    {
        $project = Project::where('project_id', $project_id)->first();
        
        return view('print.project', ['project' => $project]);
    }
    
    public function completeStage($project_id, $stage_id) 
    {
        $project = Project::where('project_id', $project_id)->first();
        
        $project->project_stage_id = $stage_id;
        
        if ($stage_id == 1)
        {
            $project->project_closed_status_id = 4;    
        }
        
        $project->save();
        
        $stage = ProjectStage::where('project_stage_id', $stage_id)->first();
        $user = Auth::user();
        
        if ($project->manager_id != null) 
        {
            $note = new Notification;

            $note->from_user_id = $user->user_id;
            $note->to_user_id = $project->manager()->user_id;
            $note->subject_id = 10;
            $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
            $note->text = "O estágio do projeto " . $project->project_id . " foi alterado para  " . $stage->description . ". Visualize-o para maiores detalhes.";

            $note->save();
        }
        
        if ($project->representant_id != null) 
        {
            $note = new Notification;

            $note->from_user_id = $user->user_id;
            $note->to_user_id = $project->representant()->user_id;
            $note->subject_id = 10;
            $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
            $note->text = "O estágio do projeto " . $project->project_id . " foi alterado para  " . $stage->description . ". Visualize-o para maiores detalhes.";

            $note->save();
        }
    }
    
    public function closeProject($project_id, $closed_status_id) 
    {
        $project = Project::where('project_id', $project_id)->first();
        
        $project->project_stage_id = 1;
        $project->project_closed_status_id = $closed_status_id;    
        
        $project->save();
        
        $stage = ProjectClosedStatus::where('project_closed_status_id', $closed_status_id)->first();
        $user = Auth::user();
        
        if ($project->manager_id != null) 
        {
            $note = new Notification;

            $note->from_user_id = $user->user_id;
            $note->to_user_id = $project->manager()->user_id;
            $note->subject_id = 11;
            $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
            $note->text = "O projeto " . $project->project_id . " foi fechado como  " . $stage->description . ". Visualize-o para maiores detalhes.";

            $note->save();
        }
        
        if ($project->representant_id != null) 
        {
            $note = new Notification;

            $note->from_user_id = $user->user_id;
            $note->to_user_id = $project->representant()->user_id;
            $note->subject_id = 11;
            $note->status_id = NotificationStatus::where('description', 'Enviado')->first()->notification_status_id;
            $note->text = "O projeto " . $project->project_id . " foi fechado como  " . $stage->description . ". Visualize-o para maiores detalhes.";

            $note->save();
        }
    }
    
    public function sendFile($project_id, Request $request) 
    {
        $user = Auth::user();
        $project = Project::where('project_id', $project_id)->first();
        
        $file = $request->file("file");
        
        $dir = CloudDirectory::where("cloud_directory_id", 4)->first();
        
        $cfile = new CloudFile;
        
        $cfile->user_id = $user->user_id;
        $cfile->cloud_directory_id = $dir->cloud_directory_id;
        $cfile->entity_id = $project->project_id;
        $cfile->description = $request->input("desc");
        
        $cfile->util = $project->stage()->description;
        
        $cfile->save();
        
        $cfile->filename = "ProjectFile_" . $cfile->cloud_file_id . "." . $file->getClientOriginalExtension(); 
        
        $path = base_path("static_files/" . $dir->dir_path . "/" . $project->project_id . "/");
        
        $file->move($path, $cfile->filename);
        
        $cfile->filepath = $path . $cfile->filename;
        
        $cfile->save();        
        
    }
  
    public function newBudget($project_id) 
    {
        $user = Auth::user();

        $budget = new RepresentantBudget;
        $project = Project::where('project_id', $project_id)->first(); 

        $customer = Customer::where('customer_id', 152)->first();
        
        $budget->customer_id = $customer->customer_id;
        
        if ($user->getUserType()->cod == 10) 
        {
            $budget->representant_id = $user->representant()->representant_id;
            $budget->manager_id = null;
        }
        else if ($user->getUserType()->cod == 5) 
        {
            $budget->representant_id = null;
            $budget->manager_id = null;
            $budget->distributior_id = $user->distribuitor()->distribuitor_id;
        }
        else if ($user->getUserType()->cod == 20)
        {
            $budget->representant_id = null;
            $budget->manager_id = $user->manager()->manager_id;
        }
        else
        {
            $budget->representant_id = null;
            $budget->manager_id = null;
        }
        
        $budget->title = "Obra " . $project->title;
        
        // Fix edit budget view
        $budget->representant_budget_payment_condition_id = 1;
      
        $budget->active = 'n';
        $budget->is_draft = 's';
        $budget->save();
        
        $relation = new ProjectBudget;

        $relation->project_id = $project->project_id;
        $relation->representant_budget_id = $budget->representant_budget_id;
        
        $relation->save();
      
        $project->save();
    }
  
    public function toggleBudgetForDP($project_id, $budget_id) 
    {
        $relation = ProjectBudget::where('project_id', $project_id)
                                  ->where('representant_budget_id', $budget_id)
                                  ->first();
        
        ProjectBudget::where('project_id', $project_id)
                     ->where('representant_budget_id', $budget_id)
                     ->update(['flag_for_dp' => $relation->flag_for_dp == 's' ? 'n' : 's']);
    }
    
    public function postProject(Request $request) 
    {
        $user = Auth::user();
        $project = new Project;
        
        if ($user->getUserType()->cod == 10) 
        {
            $project->representant_id = $user->representant()->representant_id;
            $project->manager_id = $user->representant()->manager()->manager_id;
        } 
        else if ($user->getUserType()->cod == 20) 
        {
            $project->manager_id = $user->manager()->manager_id;
        } 
        
        $project->title = $request->input("project_name");
        $project->description = $request->input("project_obs");
        $project->project_type_id = $request->input("project_type");
        $project->state = $request->input("project_uf");
        $project->city_text = $request->input("project_city");
        $project->address = $request->input("project_address"); 
        $project->district = $request->input("project_district");
        $project->cep = $request->input("project_cep");
        
        if ($user->getUserType()->cod == 40) 
        {
            $project->project_stage_id = 6;
        }
        else 
        {
            $project->project_stage_id = 2;
        }
        
        $project->confidence_level = 0;
        $project->includes_brizo = 'n';
        $project->brag_book = 'n';
        $project->specified_in_us = 'n';
        $project->enter_in_forecast = 'n';
        $project->project_value = $request->input("project_est_value");
        
        if ($request->input("project_prospect_date") != "") 
        {
            $project->prospect_date = $request->input("project_prospect_date");
        }
        
        if ($request->input("project_proposal_date") != "")
        {
            $project->proposal_date = $request->input("project_proposal_date");
        }
        
        if ($request->input("project_mockup_date") != "")
        {
            $project->mockup_date = $request->input("project_mockup_date");
        }
        
        if ($request->input("project_delivery_date") != "")
        {
            $project->est_arrival = $request->input("project_delivery_date");
        }
        
        $project->save();
        
        foreach ($request->input("influencers") as $key => $value) 
        {

            $type = InfluencerType::where('description', $value["in_type"])->first();

            if ($value["type"] == "Influenciador") 
            {
                $influencer = Influencer::where('influencer_id', $value["entity_id"])->first();

                if ($influencer->customer_id == null) 
                {
                    $influencer->customer_id = $value["org_id"];
                }

                $influencer->save();

                $relation = new ProjectInfluencer;

                $relation->project_id = $project->project_id;
                $relation->influencer_id = $influencer->influencer_id;
                $relation->level = $value["level"];

                if ($influencer->customer_id != null) 
                {
                    $relation->customer_id = $influencer->customer_id;
                }

                $relation->save();
            }
            else 
            {
                $influencer = new Influencer;

                if ($user->getUserType()->cod == 10) 
                {
                    $influencer->representant_id = $user->representant()->representant_id;
                    $influencer->manager_id = $user->representant()->manager()->manager_id;
                }
                else if ($user->getUserType()->cod == 20)
                {
                    $influencer->manager_id = $user->manager()->manager_id;
                }
                else if ($user->getUserType()->cod == 5) 
                {
                    $influencer->distributior_id = $user->distribuitor()->distribuitor_id;
                }

                if ($type != null) 
                {
                    $influencer->influencer_type_id = $type->influencer_type_id;
                }

                if ($value["org_id"] != "-" && $value["org_id"] != "N.I" && $value["org_id"] != null) 
                {
                    $influencer->customer_id = $value["org_id"];
                }

                $influencer->name = $value["name"];
                $influencer->email = $value["email"];
                $influencer->cpf_cnpj = $value["cpf_cnpj"];
                $influencer->phone = $value["phone"];

                $influencer->save();

                $relation = new ProjectInfluencer;

                $relation->project_id = $project->project_id;
                $relation->influencer_id = $influencer->influencer_id;
                $relation->level = $value["level"];

                if ($influencer->customer_id != null) 
                {
                    $relation->customer_id = $influencer->customer_id;
                }

                $relation->save();
            }
        }
        
        
        return $project;
    }
    
    public function sendNote($project_id, Request $request) 
    {
        $user = Auth::user();
        $project = Project::where('project_id', $project_id)->first();
        
        $note = new ProjectNote;
        
        $note->project_id = $project->project_id;
        $note->user_id = $user->user_id;
        
        $note->text = $request->input("text");
        
        $note->save();
    }
    
    public function getAddInfluencer() 
    {
        $user = Auth::user();
        
        return view('tracker.influencer.add', ['user' => $user]);
    }
    
    public function getAddOrganization() 
    {
        $user = Auth::user();
        
        return view('tracker.organization.add', ['user' => $user]);
    }
    
    public function detailProject($id) 
    {
        $user = Auth::user();
        $project = Project::where('project_id', $id)->first();
        
        return view('tracker.project.detail', ['user' => $user, 'project' => $project]);
    }
}