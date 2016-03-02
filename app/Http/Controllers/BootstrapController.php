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

use Auth;
use Mail;
use Hash;
use DB;
use App\Order;
use App\Address;
use App\Customer;
use App\Manager;
use App\DistribuitorPortfolio;
use App\RepresentantPortfolio;
use App\RepresentantProfile;
use App\RepresentantCompany;
use App\Distribuitor;
use App\ManagerPortfolio;
use App\User;
use App\UserType;
use App\Project;
use App\ProjectInfluencer;
use App\Representant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ReportController;

class BootstrapController extends Controller
{
    
    public function all() 
    {
        $this->createAdministrators();
        $this->registerManagers(); 
        $this->registerRepresentants();
        $this->registerDistribuitors();
    
        $this->normalizeCustomers();
        $this->normalizeRepresentants();
    }
    
    public function normalizeCustomers() 
    {
        $customers = Customer::where('active', 's')->get();
        
        foreach ($customers as $c) 
        {
            $cba = new Address;
            $cda = new Address;
            $a = new Address;
            
            $cba->save();
            $cda->save();
            $a->save();
            
            $c->customer_delivery_address_id = $cda->address_id;
            $c->customer_billing_address_id = $cba->address_id;
            $c->customer_address_id = $a->address_id;
            
            $c->save();
        }
    }
    
    public function util() 
    {

        
        return (new ReportController)->getInfluencersRanking();
    }
    
    public function normalizeRepresentants() 
    {
        // Normalize Mopesp.
        $mopesp_customers = Customer::where('active', 's')
                                    ->where('customer_salesman_id', 14)
                                    ->get();
        
        $mopesp_reps = Representant::where('representant_company_id', 1)
                                   ->get();
        
        
        foreach ($mopesp_customers as $c) 
        {
            foreach ($mopesp_reps as $r) 
            {
                $portfolio = new RepresentantPortfolio;
                
                $portfolio->representant_id = $r->representant_id;
                $portfolio->customer_id = $c->customer_id;
                
                $portfolio->save();
            }
        }
    }
    
    public function createAdministrators () 
    {
         $type = UserType::where('cod', 40)->first();


        $user = new User;

        $user->name = 'Diego';
        $user->surname = 'Rodrigues';
        $user->email = 'diego.rodrigues@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';

        $user->save();
        
        $user = new User;

        $user->name = 'Delta';
        $user->surname = 'Televendas';
        $user->email = 'sac@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';

        $user->save();
        
        $user = new User;

        $user->name = 'Thamara';
        $user->surname = 'Oliveira';
        $user->email = 'thamara.oliveira@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';

        $user->save();

        $user = new User;

        $user->name = 'Marcos';
        $user->surname = 'Rios';
        $user->email = 'marcos.rios@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';

        $user->save();

    }
    
    public function registerRepresentants() 
    {
        $type = UserType::where('cod', 10)->first();
        
        $carlos = User::where('name', 'Carlos')->first();
        $eduardo = User::where('name', 'Eduardo')->first();
        
        $mng = Manager::where('user_id', $eduardo->user_id)->first();
        
        $user = new User;
        
        $user->name = 'Adele';
        $user->surname = 'Lopes';
        $user->email = 'adele@mopesp.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep_company = RepresentantCompany::where('name', 'Mopesp Representações Ltda.')->first();
        $rep_profile = RepresentantProfile::where('description', 'Misto')->first();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '(11) 2539-5266';
        $rep->cellphone = '(11) 99372-8611';
        $rep->cpf = '00.114.930/0001-00';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Marcelo';
        $user->surname = 'Lopes';
        $user->email = 'marcelo@mopesp.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '(11) 2539-5266';
        $rep->cellphone = '(11) 99204-3636';
        $rep->cpf = '00.114.930/0001-00';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Victor Gebara';
        $user->surname = 'Fecuri';
        $user->email = 'victor@mopesp.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '(11) 2539-5266';
        $rep->cellphone = '(11) 99649-4639';
        $rep->cpf = '00.114.930/0001-00';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Flávia';
        $user->surname = 'Conrado';
        $user->email = 'flaviaconrado@mopesp.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '11-2539-5266';
        $rep->cellphone = '(11) 98323-4777';
        $rep->cpf = '00.114.930/0001-00';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $rep_company = RepresentantCompany::where('name', 'Stagemix Representações Comerciais Ltda.')->first();
        
        $user = new User;
        
        $user->name = 'Carmen';
        $user->surname = 'Lucia';
        $user->email = 'carmenlucastro@gmail.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '41 3434-2654';
        $rep->cellphone = '41 9119-2654';
        $rep->cpf = '05.520.894/0001-64';
        
        $rep->save();
        // ----------------------------------------------------------------
        
        $rep_company = RepresentantCompany::where('name', 'Stagemix Representações Comerciais Ltda.')->first();
        
        $user = new User;
        
        $user->name = 'Marlene';
        $user->surname = 'Leonildes';
        $user->email = 'marlene@leonildes.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->phone = '(11) 9999-9999';
        $rep->cellphone = '(11) 90000-0000';
        $rep->cpf = '05.520.894/0001-64';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Jane da Rosa';
        $user->surname = 'Souza';
        $user->email = 'janerosaventos@ymail.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '41 3434-2654';
        $rep->cellphone = '41 9848-8900';
        $rep->cpf = '05.520.894/0001-64';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $rep_company = RepresentantCompany::where('name', 'G.A. Colombo e Cia Ltda.')->first();
        $rep_profile = RepresentantProfile::where('description', 'Hoteis')->first();
        
        $user = new User;
        
        $user->name = 'Gersom';
        $user->surname = 'Colombo';
        $user->email = 'gersomcolombo@yahoo.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '48 9946-9916';
        $rep->cellphone = '48 9946-9916';
        $rep->cpf = '06.139.151/0001-01';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $rep_company = RepresentantCompany::where('name', 'Aspenzr Representações Comerciais Ltda.')->first();
        $rep_profile = RepresentantProfile::where('description', 'Misto')->first();
        
        
        $user = new User;
        
        $user->name = 'José Carlos';
        $user->surname = 'Faria';
        $user->email = 'aspenrepresenta@gmail.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '44 9135-1982';
        $rep->cellphone = '44 9135-1982';
        $rep->cpf = '16.886.237/0001-51';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        
        $mng = Manager::where('user_id', $carlos->user_id)->first();
        $rep_company = RepresentantCompany::where('name', 'Almeida & Franca Representações Ltda.')->first();
        
        $user = new User;
        
        $user->name = 'Junior';
        $user->surname = '';
        $user->email = 'junior@almeida.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '(11) 9999-9999';
        $rep->cellphone = '(11) 90000-0000';
        $rep->cpf = '111.222.333-44';
        
        $rep->save();
        
        // ----------------------------------------------------------------
        
        $mng = Manager::where('user_id', $eduardo->user_id)->first();
        $rep_company = RepresentantCompany::where('name', 'Riden Representações de Ferragens Ltda. ME')->first();
        $rep_profile = RepresentantProfile::where('description', 'Pequenos Showrooms')->first();
        
        $user = new User;
        
        $user->name = 'Ricardo';
        $user->surname = 'Reis';
        $user->email = 'ricardoreisrj@globo.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $rep = new Representant;
        
        $rep->user_id = $user->user_id;
        $rep->manager_id = $mng->manager_id;
        $rep->representant_company_id = $rep_company->representant_company_id;
        $rep->representant_profile_id = $rep_profile->representant_profile_id;
        $rep->phone = '21 98641-4333';
        $rep->cellphone = '21 3412-6229';
        $rep->cpf = '06.038593/0001-61';
        
        $rep->save();
    }
    
    public function registerManagers() 
    {
        $type = UserType::where('cod', 20)->first();
        
        $user = new User;
        
        $user->name = 'Eduardo';
        $user->surname = 'Gervarsoni';
        $user->email = 'eduardo.gervasoni@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $mng = new Manager;
        
        $mng->user_id = $user->user_id;
        $mng->phone = '55 (11) 3285-9020';
        $mng->cellphone = '55 (11) 99698-7594';
        $mng->cpf = '999.888.777-66';
        
        $mng->save();
        
        $customers = Customer::where('customer_manager_id', 3)->where('active', 's')->get();
        
        foreach ($customers as $c) {
            $mp = new ManagerPortfolio;
            
            $mp->manager_id = $mng->manager_id;
            $mp->customer_id = $c->customer_id;
            
            $mp->save();
        }
        
        // ---------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Carlos';
        $user->surname = 'Arlindo';
        $user->email = 'carlos.arlindo@deltafaucet.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $mng = new Manager;
        
        $mng->user_id = $user->user_id;
        $mng->phone = '55 (11) 9999-9999';
        $mng->cellphone = '55 (11) 9999-9999';
        $mng->cpf = '555.444.333-22';
        
        $mng->save();
        
        $customers = Customer::where('customer_manager_id', 2)->where('active', 's')->get();
        
        foreach ($customers as $c) {
            $mp = new ManagerPortfolio;
            
            $mp->manager_id = $mng->manager_id;
            $mp->customer_id = $c->customer_id;
            
            $mp->save();
        }
        
    }
    
    public function registerDistribuitors() 
    {
        $type = UserType::where('cod', 5)->first();
        
        $user = new User;
        
        $user->name = 'Armazem Para';
        $user->surname = '';
        $user->email = 'marcantoni@armazempara.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = 'Armazen Para Ltda.';
        $dist->delta_code = 'ARM';
        $dist->company_name = 'Armazen Para';
        $dist->cnpj = '12.345.678/9135-47';
        
        $dist->save();
        
        // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Mercury';
        $user->surname = '';
        $user->email = 'felipe.nepomuceno@mercurytrade.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Mercury';
        $dist->delta_code = 'MRC';
        $dist->cnpj = '08.438.553/0001-32';
        
        $dist->save();
        
        // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Navas';
        $user->surname = '';
        $user->email = 'norberto@navas.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Navas';
        $dist->delta_code = 'NAV';
        $dist->cnpj = '44.530.855/0001-08';
        
        $dist->save();
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Apoio HBB';
        $user->surname = '';
        $user->email = 'administracao@apoiohbb.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Apoio HBB';
        $dist->delta_code = 'HBB';
        $dist->cnpj = '08.087.889/0001-06';
        
        $dist->save();
        
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'C&C';
        $user->surname = '';
        $user->email = 'Roberto.comprasvpj@cec.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'C&C';
        $dist->delta_code = 'CEC';
        $dist->cnpj = '07.295.822/0002-77';
        
        $dist->save();
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Casa SP';
        $user->surname = '';
        $user->email = 'JOAOLUIZ@CASASAOPAULO.COM';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Casa SP';
        $dist->delta_code = 'CSP';
        $dist->cnpj = '78.357.969/0001-01';
        
        $dist->save();
        
        // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Marcolar';
        $user->surname = '';
        $user->email = 'siomaralins@hotmail.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Marcolar';
        $dist->delta_code = 'MAR';
        $dist->cnpj = '14.639.872/0001-09';
        
        $dist->save();
        
        // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Qualitá';
        $user->surname = '';
        $user->email = 'email@qualita.com';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Qualitá';
        $dist->delta_code = 'QLT';
        $dist->cnpj = '';
        
        $dist->save();
        
        // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Nacional';
        $user->surname = '';
        $user->email = 'apoio@dinac.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Nacional';
        $dist->delta_code = 'NAC';
        $dist->cnpj = '07.295.822/0002-77';
        
        $dist->save();
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'GP';
        $user->surname = '';
        $user->email = 'email@gp.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'GP';
        $dist->delta_code = 'GP';
        $dist->cnpj = '';
        
        $dist->save();
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Elevato';
        $user->surname = '';
        $user->email = 'email@elevato.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Elevato';
        $dist->delta_code = 'ELV';
        $dist->cnpj = '';
        
        $dist->save();
        
         // ------------------------------------------------------
        
        $user = new User;
        
        $user->name = 'Vibrás';
        $user->surname = '';
        $user->email = 'alexandre@vibrasimport.com.br';
        $user->password = Hash::make('Delta123');
        $user->user_type = $type->user_type_id;
        $user->active = 's';
        
        $user->save();
        
        $dist = new Distribuitor;
        
        $dist->user_id = $user->user_id;
        $dist->fantasy_name = '';
        $dist->company_name = 'Vibrás';
        $dist->delta_code = 'VBR';
        $dist->cnpj = '';
        
        $dist->save();
    }
    
    
}