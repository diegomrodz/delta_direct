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
use App\User;
use App\UserType;
use App\Representant;
use App\Invoice;
use App\Installment;
use App\SelloutInvoice;
use App\Distribuitor;
use App\RepresentantKPI;
use App\RepresentantBudget;
use App\Order;
use App\Influencer;
use App\Project;
use App\ProjectInfluencer;
use App\RepresentantCompany;
use App\SubOrder;
use App\SubOrderProduct;
use App\ProductFunction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
    public function showSalesReport() 
    {
        $user = Auth::user();
        
        return view("report.sales", ["user" => $user, 'that' => $this]);
    }
    
    public function showSelloutReport() 
    {
        $user = Auth::user();
        
        return view("report.sellout", ["user" => $user, "that" => $this]);
    }
    
    public function showLogisticReport() 
    {
        $user = Auth::user();
        
        return view("report.logistic", ["user" => $user, "that" => $this]);
    }
    
    public function showGoalsReport() 
    {
        $user = Auth::user();
    
        return view('report.goals', ['user' => $user, 'that' => $this]);
    }
    
    public function getInfluencerReport() 
    {
        $user = Auth::user();
        
        return view('report.crm.influencer', ['user' => $user, 'that' => $this]);
    }
    
    public function getOrganizationReport() 
    {
        $user = Auth::user();
        
        return view('report.crm.organization', ['user' => $user, 'that' => $this]);
    }
    
    public function getInfluencerReportDetail($id) 
    {
        $influencer = Influencer::where('influencer_id', $id)->first();
        
        return view('report.crm.influencer_detail', ['inf' => $influencer]);
    }
    
    public function getRepresentantSalesGoalsReport($rep_id) 
    {
        $result = array();
        
        $kpi = RepresentantKPI::where('report_kpi_id', 1)
                              ->where('representant_id', $rep_id)
                              ->where('active', 's')
                              ->first();
        
        $result["total"] = is_null($kpi) ? 0 : $kpi->kpi_total;
        
        $result["estimated"] = array();
        $result["actuals"] = array();
        
        for ($i = 0; $i <= 11; $i += 1) 
        {
            array_push($result["estimated"], is_null($kpi) ? 0 : $kpi->{'kpi_goal_' . $i});
            
            array_push($result["actuals"], SubOrder::where('sub_order.active', 's')
                                                   ->where('order.active', 's')
                                                   ->where('sub_order_status_id', 3)
                                                   ->where(DB::raw('YEAR(sub_order.created_at)'), 2016)
                                                   ->where(DB::raw('MONTH(sub_order.created_at)'), $i)
                                                   ->where('order.representant_id', $rep_id)
                                                   ->join('order', function ($join) {
                                                       $join->on('sub_order.order_id', '=', 'order.order_id');
                                                   })
                                                   ->select(DB::raw('SUM(sub_order.grand_total) as total'))
                                                   ->get()[0]["total"]);
        }
        
        return $result;
    }
    
    public function salesPerUserTypeRatio($year) 
    {
        $result = array(); 
        
        $rep_sales = SubOrder::where('sub_order.active', 's')
                             ->whereNotNull('order.representant_id')
                             ->where('sub_order.sub_order_status_id', 3)
                             ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                             ->join('order', function ($join) {
                                 $join->on('sub_order.order_id', '=', 'order.order_id');
                             })
                             ->select(DB::raw('SUM(sub_order.grand_total) as total'))
                             ->get();
        
        $mng_sales = SubOrder::where('sub_order.active', 's')
                             ->whereNotNull('order.manager_id')
                             ->whereNull('order.representant_id')
                             ->where('sub_order.sub_order_status_id', 3)
                             ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                             ->join('order', function ($join) {
                                 $join->on('sub_order.order_id', '=', 'order.order_id');
                             })
                             ->select(DB::raw('SUM(sub_order.grand_total) as total'))
                             ->get();
        
        $dlt_sales = SubOrder::where('sub_order.active', 's')
                             ->whereNull('order.manager_id')
                             ->whereNull('order.representant_id')
                             ->whereNull('representant_budget.distribuitor_id')
                             ->whereNull('representant_budget.manager_id')
                             ->whereNull('representant_budget.representant_id')
                             ->where('sub_order.sub_order_status_id', 3)
                             ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                             ->join('order', function ($join) {
                                 $join->on('sub_order.order_id', '=', 'order.order_id');
                             })
                             ->join('representant_budget', function ($join) {
                                 $join->on('order.representant_budget_id', '=', 'representant_budget.representant_budget_id');
                             })
                             ->select(DB::raw('SUM(sub_order.grand_total) as total'))
                             ->get();
        
        $dst_sales = SubOrder::where('sub_order.active', 's')
                             ->where('sub_order.sub_order_status_id', 3)
                             ->whereNull('order.representant_id')
                             ->whereNull('order.manager_id')
                             ->whereNotNull('representant_budget.distribuitor_id')
                             ->where('sub_order.sub_order_status_id', 3)
                             ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                             ->join('order', function ($join) {
                                 $join->on('sub_order.order_id', '=', 'order.order_id');
                             })
                             ->join('representant_budget', function ($join) {
                                 $join->on('order.representant_budget_id', '=', 'representant_budget.representant_budget_id');
                             })
                             ->select(DB::raw('SUM(sub_order.grand_total) as total'))
                             ->get();

        $item = array();
        
        $item["user_type"] = "Representante";
        $item["total"] = $rep_sales[0]["total"];
        
        array_push($result, $item);
        
        $item = array();
        
        $item["user_type"] = "Gerentes de Venda";
        $item["total"] = $mng_sales[0]["total"];
        
        array_push($result, $item);
        
        $item = array();
        
        $item["user_type"] = "Distribuidor";
        $item["total"] = $dst_sales[0]["total"];
        
        array_push($result, $item);
        
        $item = array();
        
        $item["user_type"] = "Delta Televendas";
        $item["total"] = $dlt_sales[0]["total"];
        
        array_push($result, $item);
        
        $item = array();
        
        return $result;
    }
    
    public function getOrganizationRanking() 
    {
        $result = array();
        
        $orgs = ProjectInfluencer::where('project_influencer.active', 's')
                                 ->where('project.active', 's')
                                 ->where('customer.active', 's')
                                 ->join('customer', function ($join) {
                                     $join->on('project_influencer.customer_id', '=', 'customer.customer_id');
                                 })
                                 ->join('project', function ($join) {
                                     $join->on('project_influencer.project_id', '=', 'project.project_id');
                                 })
                                 ->select('customer.customer_id as id',
                                          'customer.fantasy_name as f_name',
                                          DB::raw('SUM(project_influencer.level) as sum_level'),
                                          DB::raw('COUNT(project.project_id) as num_projects'),
                                          DB::raw('SUM(project.project_value) as total_projects'))
                                 ->groupBy('id')
                                 ->get();
        
        foreach ($orgs as $org) 
        {
            $item = array();
            
            $item["id"] = $org["id"];
            $item["f_name"] = $org["f_name"];
            $item["sum_level"] = $org["sum_level"];
            $item["num_projects"] = $org["num_projects"];
            $item["total_projects"] = $org["total_projects"];
            
            array_push($result, $item);
        }
        
        return collect($result)->sortByDesc(function ($item, $key) {
            return $item["sum_level"];
        });
    }
    
    public function getInfluencersRanking() 
    {
        $result = array();
        
        $infs = ProjectInfluencer::where('project_influencer.active', 's')
                                 ->where('project.active', 's')
                                 ->where('influencer.active', 's')
                                 ->join('project', function ($join) {
                                     $join->on('project_influencer.project_id', '=', 'project.project_id');
                                 })
                                 ->join('influencer', function ($join) {
                                     $join->on('project_influencer.influencer_id', '=', 'influencer.influencer_id');
                                 })
                                 ->select('influencer.influencer_id as id', 
                                          'influencer.name as name',
                                          'influencer.surname as surname',
                                          DB::raw('SUM(project_influencer.level) as sum_level'),
                                          DB::raw('COUNT(project.project_id) as num_projects'),
                                          DB::raw('SUM(project.project_value) as total_projects'))
                                 ->groupBy('id')
                                 ->get();
        
        $infwon = ProjectInfluencer::where('project_influencer.active', 's')
                                     ->where('project.active', 's')
                                     ->where('influencer.active', 's')
                                     ->where('project.project_stage_id', 1)
                                     ->where('project.project_closed_status_id', 4)
                                     ->join('project', function ($join) {
                                         $join->on('project_influencer.project_id', '=', 'project.project_id');
                                     })
                                     ->join('influencer', function ($join) {
                                         $join->on('project_influencer.influencer_id', '=', 'influencer.influencer_id');
                                     })
                                     ->select('influencer.influencer_id as id', 
                                              DB::raw('SUM(project_influencer.level) as sum_level'),
                                              DB::raw('COUNT(project.project_id) as num_projects'),
                                              DB::raw('SUM(project.project_value) as total_projects'))
                                     ->groupBy('id')
                                     ->get();
        
    
        foreach ($infs as $inf) 
        {
            $item = array();
            
            $item["id"] = $inf["id"];
            $item["name"] = $inf["name"];
            $item["surname"] = $inf["surname"];
            $item["sum_level"] = $inf["sum_level"];
            $item["num_projects"] = $inf["num_projects"];
            $item["total_projects"] = $inf["total_projects"];
            
            $item["won_sum_level"] = collect($infwon)->where('id', $inf["id"])->first()["sum_level"];
            $item["won_num_projects"] = collect($infwon)->where('id', $inf["id"])->first()["num_projects"];
            $item["won_total_projects"] = collect($infwon)->where('id', $inf["id"])->first()["total_projects"];
            
            array_push($result, $item);
        }
        
        $deltaNumProjects = collect($result)->sum("num_projects");
        
        foreach ($result as $key => $item) 
        {
            $result[$key]["competence_factor"] = (($item["won_sum_level"] * 0.25) / $item["sum_level"]);
            
            if ($item["won_num_projects"] == 0 || $item["won_total_projects"] == 0) 
            {
                $result[$key]["influence_factor"] = 0;
                
                $result[$key]["finance_factor"] = 0;
            }
            else 
            {
                $result[$key]["influence_factor"] = ((($item["sum_level"] / $item["num_projects"]) * 0.5) / $item["sum_level"])  
                                                  + (($item["num_projects"] * 0.5) / $deltaNumProjects);

                $result[$key]["finance_factor"] = ((($item["won_total_projects"] / $item["won_num_projects"]) * 0.5) / ($item["total_projects"] / $item["num_projects"])) 
                                                + ((($item["won_total_projects"] / $item["won_sum_level"]) * 0.5) / ($item["total_projects"] / $item["sum_level"]));
            }
            
            $result[$key]["mkt_factor"] = 0;
        }
        
        $maxInfluenceFactor = collect($result)->sum("influence_factor");
        $maxFinanceFactor = collect($result)->sum("finance_factor");
        
        foreach ($result as $key => $item) 
        {
            $result[$key]["pontuation"] = $item["competence_factor"]
                                + (($item["influence_factor"] * 0.25) / $maxInfluenceFactor)
                                + (($item["finance_factor"] * 0.25) / $maxFinanceFactor);
        }
        
        return collect($result)->sortByDesc(function ($item, $key) {
            return $item["pontuation"];
        });
    }
    
    public function salesRationByRepresentantProfile($year) 
    {
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                         ->join('order', function ($join) {
                             $join->on('order.order_id', '=', 'sub_order.order_id');
                         })
                         ->join('representant', function ($join) {
                             $join->on('order.representant_id', '=', 'representant.representant_id');
                         })
                         ->join('representant_profile', function ($join) {
                             $join->on('representant.representant_profile_id', '=', 'representant_profile.representant_profile_id');
                         })
                         ->select('representant_profile.description as profile', DB::raw('SUM(sub_order.grand_total) as total'))
                         ->groupBy('profile')
                         ->get();
        
        return $sales;
    }
    
    public function salesRatioByDistribuitor($year) 
    {
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                         ->join('distribuitor', function ($join) {
                             $join->on('sub_order.distribuitor_id', '=', 'distribuitor.distribuitor_id');
                         })
                         ->select('distribuitor.fantasy_name as dist', DB::raw('SUM(sub_order.grand_total) as total'))
                         ->groupBy('dist')
                         ->get();
        
        return $sales;
    }
    
    public function salesRatioByRepCompany($year) 
    {
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                         ->join('representant_company', function ($join) {
                             $join->on('sub_order.representant_company_id', '=', 'representant_company.representant_company_id');
                         })
                         ->select('representant_company.nickname as rep_company', DB::raw('SUM(sub_order.grand_total) as total'))
                         ->groupBy('rep_company')
                         ->get();
        
        return $sales;
    }
    
    public function getTopProductFunctionSales($year) 
    {
        $result = array();
        
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                         ->join('sub_order_product', function ($join) {
                             $join->on('sub_order.sub_order_id', '=', 'sub_order_product.sub_order_id');
                         })
                         ->join('product', function ($join) {
                             $join->on('product.product_id', '=', 'sub_order_product.product_id');
                         })
                         ->join('product_function', function ($join) {
                             $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                         })
                         ->select('product_function.product_function_id', DB::raw('SUM(sub_order_product.total_price) as total'), DB::raw('SUM(sub_order_product.quantity) as qtd'))
                         ->groupBy('product_function_id')
                         ->get();
        
        $budgets = Order::where('order.active', 's')
                        ->where(DB::raw('YEAR(order.created_at)'), $year)
                        ->join('order_product', function ($join) {
                             $join->on('order.order_id', '=', 'order_product.order_id');
                         })
                         ->join('product', function ($join) {
                             $join->on('product.product_id', '=', 'order_product.product_id');
                         })
                         ->join('product_function', function ($join) {
                             $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                         })
                        ->select('product_function.product_function_id', DB::raw('SUM(order.grand_total) as total'))
                         ->groupBy('product_function_id')
                        ->get();
    
        foreach(ProductFunction::where('active', 's')->get() as $function) 
        {
            $item = array();
            
            $item["function_id"] = $function->product_function_id;
            $item["description"] = $function->description;
            $item["sales_total"] = collect($sales)->where('product_function_id', $function->product_function_id)->first()["total"];
            $item["budgets_total"] = collect($budgets)->where('product_function_id', $function->product_function_id)->first()["total"];
            $item["qtd"] = collect($sales)->where('product_function_id', $function->product_function_id)->first()["qtd"];
        
            array_push($result, $item);
        }
        
        return collect($result)->sortByDesc(function ($item, $key) {
            if ($item["sales_total"] != 0) 
            {
                return $item["sales_total"] * 100;
            }
            else 
            {
                return $item["budgets_total"] / 10000;
            }
        });
    }
    
    public function getYearTopRepresentants($year) 
    {
        $result = array();
        
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                         ->join('order', function ($join) {
                             $join->on('sub_order.order_id', '=', 'order.order_id');
                         })
                         ->join('representant', function ($join) {
                             $join->on('order.representant_id', '=', 'representant.representant_id');
                         })
                         ->select('representant.representant_id', 'representant.user_id', DB::raw("SUM(sub_order.grand_total) as total"), DB::raw('COUNT(sub_order.order_id) as qtd'))
                         ->groupBy('representant_id') 
                         ->get();
        
        $budgets = Order::where('order.active', 's')
                        ->where(DB::raw('YEAR(order.created_at)'), $year)
                        ->join('representant', function ($join) {
                            $join->on('representant.representant_id', '=', 'order.representant_id');
                        })
                        ->select('representant.representant_id', 'representant.user_id', DB::raw("SUM(order.grand_total) as total"), DB::raw('COUNT(order.order_id) as qtd'))
                        ->groupBy('representant_id') 
                        ->get();
        
        
        foreach (Representant::where('active', 's')->get() as $rep) 
        {
            $item = array();
            
            $item["representant_id"] = $rep->representant_id;
            $item["user_id"] = $rep->user_id;
            $item["name"] = $rep->user()->name . " " . $rep->user()->surname;
            $item["budgets_total"] = collect($budgets)->where('representant_id', $rep->representant_id)->first()["total"];
            $item["sales_total"] = collect($sales)->where('representant_id', $rep->representant_id)->first()["total"];
            $item["sales_qtd"] = collect($sales)->where('representant_id', $rep->representant_id)->first()["qtd"];
            
            array_push($result, $item);
        }
        
        return collect($result)->sortByDesc(function ($item, $key) {
            if ($item["sales_total"] != 0) 
            {
                return $item["sales_total"] * 100;
            }
            else 
            {
                return $item["budgets_total"] / 10000;
            }
        });
    }
    
    public function salesByRepCompany() 
    {
        $result = array();
        
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->join('representant_company', function ($join) {
                             $join->on('representant_company.representant_company_id', '=', 'sub_order.representant_company_id');
                         })
                         ->select('representant_company.nickname as rep_company', DB::raw('SUM(sub_order.grand_total) as total'), DB::raw("DATE_FORMAT(sub_order.created_at, '%Y-%m') as date"))
                         ->groupBy(['date', 'rep_company'])
                         ->get();
        
        $result["data"] = array();
        
        foreach(collect($sales)->groupBy("date")->all() as $date => $value) 
        {
            $item = array();
            
            $item["date"] = $date;
            
            foreach ($value as $rep_company) 
            {
                $item[$rep_company->rep_company] = $rep_company->total;
            }
            
            array_push($result["data"], $item);
        }
        
        $result["graphs"] = array();
        
        foreach (RepresentantCompany::where('active', 's')->get() as $rep_company) 
        {
            $item = array();
            
            $item["balloonText"] = "$rep_company->nickname <span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>";
            $item["bullet"] = "round";
            $item["bulletAlpha"] = 0.13;
            $item["bulletBorderAlpha"] = 1;
            $item["bulletBorderThickness"] = 1;
            $item["bulletSize"] = 13;
            $item["labelOffset"] = 4;
            $item["lineThickness"] = 3;
            $item["title"] = $rep_company->nickname;
            $item["valueField"] = $rep_company->nickname;
            
            array_push($result["graphs"], $item);
        }
        
        return $result;
    }
    
    public function salesByDistribuitor() 
    {
        $result = array();
        
        $sales = SubOrder::where('sub_order.active', 's')
                         ->where('sub_order.sub_order_status_id', 3)
                         ->join('distribuitor', function ($join) {
                             $join->on('sub_order.distribuitor_id', '=', 'distribuitor.distribuitor_id');
                         })
                         ->select(DB::raw('SUM(sub_order.grand_total) as total'), DB::raw("DATE_FORMAT(sub_order.created_at, '%Y-%m') as date"), 'distribuitor.delta_code', 'distribuitor.fantasy_name')
                         ->groupBy(['date', 'delta_code'])
                         ->get();
        

        $result["data"] = array();
        
        foreach(collect($sales)->groupBy("date")->all() as $date => $value) 
        {
            $item = array();
            
            $item["date"] = $date;
            
            foreach($value as $dist) 
            {
                if ($dist->delta_code != "DDS") 
                {
                    $item[$dist->delta_code] = $dist->total;
                }
            }
            
            array_push($result["data"], $item);
        }
        
        $result["graphs"] = array();
        
        foreach (Distribuitor::where('active', 's')
                    ->where('delta_code', '!=', 'DDS')
                    ->get() as $dist) 
        {
            $item = array();
            
            $item["balloonText"] = "$dist->fantasy_name <span style='font-size:14px; color:#000000;'><b>[[value]]</b></span>";
            $item["bullet"] = "round";
            $item["bulletAlpha"] = 0.13;
            $item["bulletBorderAlpha"] = 1;
            $item["bulletBorderThickness"] = 1;
            $item["bulletSize"] = 13;
            $item["labelOffset"] = 4;
            $item["lineThickness"] = 3;
            $item["title"] = $dist->fantasy_name;
            $item["valueField"] = $dist->delta_code;
            
            array_push($result["graphs"], $item);
        }
        
        
        return $result;
    }
    
    public function rawSalesByMonth() 
    {
        $sales = SubOrder::where('active', 's')
                         ->where('sub_order_status_id', 3)
                         ->select(DB::raw('SUM(grand_total) as total'), DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date"))
                         ->groupBy(['date'])
                         ->get();
    
        return $sales;
    }
    
    public function getYearTopCustomers($year) 
    {
        $customers = SubOrder::where('sub_order.active', 's')
                             ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                             ->where('sub_order.sub_order_status_id', 3)
                             ->join('customer', function ($join) {
                                 $join->on('sub_order.customer_id', '=', 'customer.customer_id');
                             })
                             ->select('customer.customer_id', 'customer.fantasy_name', DB::raw('SUM(sub_order.grand_total) as total'), DB::raw('COUNT(customer.customer_id) as orders'))
                             ->groupBy('customer.customer_id')
                             ->orderBy('total', 'desc')
                             ->get();
        return $customers;
    }
    
    public function budgetsPerUserType($year) 
    {
        $budgets = RepresentantBudget::where('representant_budget.is_draft', 'n')
                                     ->where(DB::raw('YEAR(representant_budget.created_at)'), $year)
                                     ->get();
        
        $result = array();
        
        $result[0] = ["type" => "Representantes",       "value" => 0];
        $result[1] = ["type" => "Gerentes de Vendas",   "value" => 0];
        $result[2] = ["type" => "Televendas",           "value" => 0];
        $result[3] = ["type" => "Distribuidor",         "value" => 0];
        
        foreach ($budgets as $value) 
        {
            if ($value->manager_id != null && $value->distribuitor_id == null && $value->representant_id != null) 
            {
                $result[0]["value"] += 1;
            }
            else if ($value->manager_id == null && $value->distribuitor_id != null && $value->representant_id == null) 
            {
                $result[3]["value"] += 1;
            }
            else if ($value->manager_id != null && $value->distribuitor_id == null && $value->representant_id == null) 
            {
                $result[1]["value"] += 1;
            }
            else 
            {
                $result[2]["value"] += 1;
            }
        }
        
        return $result;
    }
    
    public function budgetsAvgTicketByMonth() 
    {
        $budgets = RepresentantBudget::where('is_draft', 'n')
                                     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('SUM(grand_total) / COUNT(representant_budget_id) as avg_ticket'))
                                     ->groupBy(['year', 'month'])
                                     ->get();
        
        $result = array();
        
        
        foreach ($budgets as $value) 
        {
            $item = array();
            
            $item["date"] = $value->year . "-" . ($value->month > 9 ? $value->month : ("0" . $value->month));
            $item["value"] = number_format($value->avg_ticket, 2, ".", "");
        
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function budgetsByMonth() 
    {
        $created = RepresentantBudget::whereNotNull('product_values')
                                     ->whereNotNull('customer_id')
                                     ->whereNotNull('grand_total')
                                     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(representant_budget_id) as value'))
                                     ->groupBy(['year', 'month'])
                                     ->get();
        
        $processed = RepresentantBudget::where('is_draft', 'n')
                                     ->select(DB::raw('MONTH(created_at) as month'), DB::raw('YEAR(created_at) as year'), DB::raw('COUNT(representant_budget_id) as value'))
                                     ->groupBy(['year', 'month'])
                                     ->get();

        $result = array();
        
        foreach ($created as $key => $value) 
        {
            $item = array();
            
            $item["date"] = $value["year"] . "-" . $value["month"];
            
            $aux = collect($created)->where("year", $value["year"])->where("month", $value["month"])->first();
            $aux2 = collect($processed)->where("year", $value["year"])->where("month", $value["month"])->first();
          
            $item["Criados"] = $aux == null ? 0 : $aux->value;
            $item["Processados"] = $aux2 == null ? 0 : $aux2->value;
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function salesByCustomerType($year) 
    {
        $sales = SubOrder::where('sub_order.active', 's')
                        ->where('sub_order.sub_order_status_id', 3)
                        ->where(DB::raw('YEAR(sub_order.created_at)'), $year)
                        ->join('customer', function ($join) {
                            $join->on('customer.customer_id', '=', 'sub_order.customer_id');
                        })
                        ->join('customer_type', function ($join) {
                            $join->on('customer.customer_type_id', '=', 'customer_type.customer_type_id');
                        })
                        ->select("customer_type.name as type", "sub_order.sub_order_id", DB::raw("SUM(sub_order.grand_total) as total"))
                        ->groupBy("type")
                        ->get();
            
        return $sales;
    }
    
    public function getShowroomDeltaTopProductBySeriesByFunction($fun, $serie, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)
                               ->where('product_serie.product_serie_id', $serie)
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('customer.customer_segment_id', [6,7])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->select('product.sku', 'product.product_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->groupBy('sku')
                               ->orderBy('value', 'desc')
                               ->take(10)
                               ->get();
        
        return $sales;
    }
    
    public function getShowroomDeltaTopSeriesByFunction($fun, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)    
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('customer.customer_segment_id', [6,7])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->select('product_serie.product_serie_id', 'product_function.product_function_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->orderBy("value", "desc")
                               ->groupBy('serie')
                               ->take(10)
                               ->get();
        
        return $sales;    
    }
    
    public function top2014YTDSelloutShowroomsSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                                ->where('sellout_invoice_product.active', 's')
                                ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2014)
                                ->whereIn('customer.customer_segment_id', [6,7])
                                ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                                ->join('sellout_invoice_product', function ($join) {
                                    $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                                })
                                ->join('product', function ($join) {
                                    $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                                })
                                ->join('customer', function ($join) {
                                    $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                                })
                                ->select('customer.customer_id', 'customer.fantasy_name as name', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                                ->groupBy('customer.customer_id')
                                ->orderBy('value', 'desc')
                                ->get();
        
        return $sales;        
    }
    
    public function topYTDSelloutShowroomsSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                                ->where('sellout_invoice_product.active', 's')
                                ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2015)
                                ->whereIn('customer.customer_segment_id', [6,7])
                                ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                                ->join('sellout_invoice_product', function ($join) {
                                    $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                                })
                                ->join('product', function ($join) {
                                    $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                                })
                                ->join('customer', function ($join) {
                                    $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                                })
                                ->select('customer.customer_id', 'customer.fantasy_name as name', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                                ->groupBy('customer.customer_id')
                                ->orderBy('value', 'desc')
                                ->get();
        
        return $sales;
    }
    
    public function top2014YTDDeltaSelloutProductShowroomSales()
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2014)
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('customer.customer_segment_id', [6,7])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        
        return $sales;
    }
    
    public function topYTDDeltaSelloutProductShowroomSales()
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2015)
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('customer.customer_segment_id', [6,7])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        
        return $sales;
    }
    
    public function selloutCustomerSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('customer_classification', function ($join) {
                                   $join->on('customer.customer_classification_potential_id', '=', 'customer_classification.customer_classification_id');
                               })
                               ->select('customer.fantasy_name as customer', 'customer.customer_id', 'customer_classification.color',  DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->groupBy('customer')
                               ->orderBy('value', 'desc')
                               ->get();
        
        return $sales;
    }
    
    public function getBrizoTopProductBySeriesByFunction($fun, $serie, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)
                               ->where('product_serie.product_serie_id', $serie)
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [1])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->select('product.sku', 'product.product_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->groupBy('sku')
                               ->orderBy('value', 'desc')
                               ->take(10)
                               ->get();
        
        return $sales;
    }
    
    public function getDeltaTopProductBySeriesByFunction($fun, $serie, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)
                               ->where('product_serie.product_serie_id', $serie)
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->select('product.sku', 'product.product_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->groupBy('sku')
                               ->orderBy('value', 'desc')
                               ->take(10)
                               ->get();
        
        return $sales;
    }
    
    public function getBrizoTopSeriesByFunction($fun, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)    
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [1])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->select('product_serie.product_serie_id', 'product_function.product_function_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->orderBy("value", "desc")
                               ->groupBy('serie')
                               ->take(10)
                               ->get();
        
        return $sales;
    }
    
    public function getDeltaTopSeriesByFunction($fun, Request $request) 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where('product_function.product_function_id', $fun)    
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), $request->input("year"))
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->select('product_serie.product_serie_id', 'product_function.product_function_id', 'product_serie.description as serie', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('FORMAT(SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity),2) as ticket'))
                               ->orderBy("value", "desc")
                               ->groupBy('serie')
                               ->take(10)
                               ->get();
        
        return $sales;
    }
    
    public function averageTicketByDistribuitor() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('distribuitor', function ($join) {
                                   $join->on('distribuitor.distribuitor_id', '=', 'sellout_invoice.distribuitor_id');
                               })
                               ->select(DB::raw("distribuitor.fantasy_name as dist"), DB::raw("DATE_FORMAT(sellout_invoice.invoice_date, '%Y') as date"), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('date', 'dist')
                               ->get();
        
        foreach (collect($sales)->groupBy('date') as $key => $value) 
        {
            $item = array();
            
            $item["date"] = $key;
            
            foreach ($value as $dist) 
            {
                $item[$dist["dist"]] = number_format($dist["ticket"], 2);
            }
            
            array_push($result, $item);
        }
        
        return $result;
    }

    public function top2014YTDBrizoSelloutProductFunctionSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2014)
                               ->whereIn('product.product_brand_id', [1])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        return $sales;    
    }
    
    public function top2014YTDDeltaSelloutProductFunctionSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2014)
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        return $sales;    
    }
    
    public function topYTDBrizoSelloutProductFunctionSales()
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2015)
                               ->whereIn('product.product_brand_id', [1])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        
        return $sales;
    }
    
    public function topYTDDeltaSelloutProductFunctionSales()
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw("YEAR(sellout_invoice.invoice_date)"), 2015)
                               ->whereIn('product.product_brand_id', [2,3,4,5])
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_function', function ($join) {
                                   $join->on('product.product_function_id', '=', 'product_function.product_function_id');
                               })
                               ->select('product_function.product_function_id', 'product_function.description as function', DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'), DB::raw('SUM(sellout_invoice_product.total_price) / SUM(sellout_invoice_product.quantity) as ticket'))
                               ->groupBy('function')
                               ->orderBy('value', 'desc')
                               ->get();
        
        
        return $sales;
    }
    
    public function bySelloutProductSerie() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('product', function ($join) {
                                   $join->on('sellout_invoice_product.product_id', '=', 'product.product_id');
                               })
                               ->join('product_serie', function ($join) {
                                   $join->on('product.product_serie_id', '=', 'product_serie.product_serie_id');
                               })
                               ->select('product_serie.description as serie', DB::raw("DATE_FORMAT(sellout_invoice.invoice_date, '%Y-%m') as date"), DB::raw('SUM(sellout_invoice_product.total_price) as value'), DB::raw('SUM(sellout_invoice_product.quantity) as volume'))
                               ->groupBy('serie', 'date')
                               ->orderBy('date')
                               ->get();
        
        $fieldMapping = array(
            array(
                "fromField" => "value",
                "toField" => "value"
            ),
            array(
                "fromField" => "volume",
                "toField" => "volume"
            )
        );
        
        foreach(collect($sales)->groupBy("serie") as $key => $value) 
        {
            $item = array();
            
            $item["title"] = $key;
            $item["categoryField"] = "date";
            $item["fieldMappings"] = $fieldMapping;
            
            $data = array();
            
            foreach ($value as $serie) 
            {
                $e = array();
                
                $e["date"] = $serie["date"];
                $e["value"] = $serie["value"];
                $e["volume"] = $serie["volume"];    
                
                array_push($data, $e);
            }
            
            $item["dataProvider"] = $data;
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function showSelloutYTDSalesBySegment(Request $request) 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->where(DB::raw('MONTH(sellout_invoice.invoice_date)'), '<=', DB::raw('MONTH(NOW())'))
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('customer_segment', function ($join) {
                                   $join->on('customer.customer_segment_id', '=', 'customer_segment.customer_segment_id');
                               })
                               ->select('customer_segment.name as segment', DB::raw("YEAR(sellout_invoice.invoice_date) as year"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('segment', 'year')
                               ->get();
        
        foreach(collect($sales)->groupBy('year')[$request->input("year")] as $value) 
        {
            $item = array();
            
            $item["segment"] = $value["segment"];
            $item["value"] = $value["value"];
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function showSelloutYTDSalesByChannel() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('customer_channel', function ($join) {
                                   $join->on('customer.customer_channel_id', '=', 'customer_channel.customer_channel_id');
                               })
                               ->select('customer_channel.description as channel', DB::raw("YEAR(sellout_invoice.invoice_date) as year"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('channel', 'year')
                               ->get();
        
        foreach(collect($sales)->groupBy('year')["2015"] as $value) 
        {
            $item = array();
            
            $item["channel"] = $value["channel"];
            $item["value"] = $value["value"];
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function getStatesSales() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('customer', function ($join) {
                                   $join->on('customer.customer_id', '=', 'sellout_invoice.customer_id');
                               })
                               ->join('state', function ($join) {
                                   $join->on('state.id', '=', 'customer.state_id');
                               })
                               ->select(DB::raw("CONCAT('BR-', state.uf) as state"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('state')
                               ->get();
        
        
        foreach ($sales as $value) 
        {
            $item = array();
            
            $item["id"] = $value["state"];
            $item["value"] = $value["value"];
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function allSelloutSales() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->select(DB::raw("DATE_FORMAT(sellout_invoice.invoice_date, '%Y-%m-%d') as date"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('date')
                               ->orderBy('date')
                               ->get();
        return $sales;
    }
    
    public function getDistribuitorYTDSalesParticipation() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('distribuitor', function ($join) {
                                   $join->on('distribuitor.distribuitor_id', '=', 'sellout_invoice.distribuitor_id');
                               })
                               ->select(DB::raw('YEAR(sellout_invoice.invoice_date) as year'), DB::raw("distribuitor.fantasy_name as dist"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('dist', 'year')
                               ->orderBy('year')
                               ->get();
        
        
        foreach(collect($sales)->groupBy('year')["2015"] as $value) 
        {
            $item = array();
            
            $item["dist"] = $value["dist"];
            $item["value"] = $value["value"];
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function getDistribuitorAllSalesParticipation() 
    {
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('distribuitor', function ($join) {
                                   $join->on('distribuitor.distribuitor_id', '=', 'sellout_invoice.distribuitor_id');
                               })
                               ->select(DB::raw("distribuitor.fantasy_name as dist"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('dist')
                               ->get();
        
        return $sales;
    }
    
    public function getDistribuitorSalesParticipation() 
    {
        $result = array();
        
        $sales = SelloutInvoice::where('sellout_invoice.active', 's')
                               ->where('sellout_invoice_product.active', 's')
                               ->whereIn('sellout_invoice.sellout_invoice_nature_id', [5, 1, 7, 14, 15, 16, 17])
                               ->join('sellout_invoice_product', function ($join) {
                                   $join->on('sellout_invoice.sellout_invoice_id', '=', 'sellout_invoice_product.sellout_invoice_id');
                               })
                               ->join('distribuitor', function ($join) {
                                   $join->on('distribuitor.distribuitor_id', '=', 'sellout_invoice.distribuitor_id');
                               })
                               ->select(DB::raw("distribuitor.fantasy_name as dist"), DB::raw("DATE_FORMAT(sellout_invoice.invoice_date, '%Y-%m') as date"), DB::raw('SUM(sellout_invoice_product.total_price) as value'))
                               ->groupBy('dist', 'date')
                               ->orderBy('date')
                               ->get();
        
        
        
        foreach (collect($sales)->groupBy('date') as $key => $value) 
        {
            $item = array();
            
            $item["date"] = $key;
            
            foreach ($value as $dist) 
            {
                $item[$dist["dist"]] = $dist["value"];
            }
            
            array_push($result, $item);
        }
        
        return $result;
    }
    
    public function salesByState($uf) 
    {
        $data = array();
        
        $sales = Invoice::where('invoice.invoice_status_id', 1)
                        ->where('invoice.active', 's')
                        ->whereIn('state.uf', explode(",", $uf))
                        ->join('sub_order', function ($join) {
                            $join->on('invoice.sub_order_id', '=', 'sub_order.sub_order_id');
                        })
                        ->join('distribuitor', function ($join) {
                            $join->on('sub_order.distribuitor_id', '=', 'distribuitor.distribuitor_id');    
                        })
                        ->join('customer', function ($join) {
                            $join->on('sub_order.customer_id', '=', 'customer.customer_id');
                        })
                        ->join('state', function ($join) {
                            $join->on('customer.state_id', '=', 'state.id');    
                        })
                        ->select(DB::raw('MONTH(invoice.emission_date) as month'), DB::raw('YEAR(invoice.emission_date) as year') , DB::raw("SUM(invoice.grand_total) as total"))
                        ->groupBy('month')
                        ->orderBy('total', 'desc')
                        ->get();
        
        foreach ($sales as $sale) 
        {
            $item = array();
            
            $item["month"] = date('F', mktime(0, 0, 0, $sale->month, 10));
            $item["total"] = $sale->total;
            
            array_push($data, $item);
        }
        
        return $data;
    }
    
    public function salesByMonth() 
    {
        $data = array();
        
        $paid = Installment::where('installment.installment_status_id', 2)
                                     ->where('installment.active', 's')
                                     ->where('invoice.invoice_status_id', 1)
                                     ->where('invoice.active', 's')
                                     ->join('invoice', function ($join) {
                                       $join->on('installment.invoice_id', '=', 'invoice.invoice_id');
                                     })
                                     ->select(DB::raw('MONTH(installment.emission_date) as month'), DB::raw('YEAR(installment.emission_date) as year') , DB::raw("SUM(installment.grand_total) as total"))
                                     ->groupBy(['year','month'])
                                     ->get();
        
        $invoiced = Invoice::where('invoice.invoice_status_id', 1)
                                ->where('invoice.active', 's')
                                ->select(DB::raw('MONTH(invoice.emission_date) as month'), DB::raw('YEAR(invoice.emission_date) as year') , DB::raw("SUM(invoice.grand_total) as total"))
                                ->groupBy(['year', 'month'])
                                ->get();
        
        
        foreach ($invoiced as $i) 
        {
            $month = array();
            
            $month["date"] = date("Y-m", mktime(0, 0, 0, $i->month, 1, $i->year) );
            $month["Faturados"] = round($i->total,2);
            
            $aux = collect($paid)->where('month', $i->month)->where('year', $i->year)->first();
            
            $month["Pagos"] = $aux == null ? 0 : round($aux->total, 2);
            $month["Comissionado"] = 0;
            
            $installments = Installment::where('installment.installment_status_id', 2)
                                        ->where('installment.active', 's')
                                        ->where('installment.fee_is_paid', 's')
                                        ->where('invoice.invoice_status_id', 1)
                                        ->where(DB::raw('MONTH(installment.emission_date)'), $i->month)
                                        ->where(DB::raw('YEAR(installment.emission_date)'), $i->year)
                                        ->where('invoice.active', 's')
                                        ->join('invoice', function ($join) {
                                            $join->on('installment.invoice_id', '=', 'invoice.invoice_id');
                                        })
                                        ->get();
            
            foreach ($installments as $installment) 
            {
                $month["Comissionado"] += ($installment->invoice()->product_value / count($installment->invoice()->getInstallments())) * 0.05;
            }
            
            $month["Comissionado"] = round($month["Comissionado"],2);
            
            array_push($data, $month);   
        }
        
        return $data;
    }
}