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


Route::get('/', [
	'as' => 'index', 
	'uses' => 'DashboardController@index',
	'middleware' => 'auth'
]);

Route::get('/file/open', [
	'as' => 'file.open', 
	'uses' => 'FileController@open',
	'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/agenda/send/weekly', [
	'as' => 'agend.send.weekly', 
	'uses' => 'AgendaController@sendWeeklyEmails'
]);

Route::get('/agenda/send/monthly', [
	'as' => 'agend.send.monthly', 
	'uses' => 'AgendaController@sendMonthlyEmails'
]);

// ------------------------------------------------------------------------

Route::get('/report/logistic', [
	'as' => 'report.logistic', 
	'uses' => 'ReportController@showLogisticReport',
	'middleware' => 'auth'
]);

Route::get('/report/sellout', [
	'as' => 'report.sellout', 
	'uses' => 'ReportController@showSelloutReport',
	'middleware' => 'auth'
]);

Route::get('/report/goals', [
	'as' => 'report.goals', 
	'uses' => 'ReportController@showGoalsReport',
	'middleware' => 'auth'
]);

Route::get('/report/goals/representant/{rep_id}/sales_2016', [
	'as' => 'report.goals.representant.sales_2016', 
	'uses' => 'ReportController@getRepresentantSalesGoalsReport',
	'middleware' => 'auth'
]);


Route::get('/report/sellout/channel/ytd', [
	'as' => 'report.sellout.channel.ytd', 
	'uses' => 'ReportController@showSelloutYTDSalesByChannel',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/segment/ytd', [
	'as' => 'report.sellout.segment.ytd', 
	'uses' => 'ReportController@showSelloutYTDSalesBySegment',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/all', [
	'as' => 'report.sellout.all', 
	'uses' => 'ReportController@allSelloutSales',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/customer/sales', [
	'as' => 'report.sellout.all', 
	'uses' => 'ReportController@selloutCustomerSales',
	'middleware' => 'auth'
]);


Route::get('/report/sellout/product/showroom/sales/ytd', [
	'as' => 'report.sellout.product.showroom.sales.ytd', 
	'uses' => 'ReportController@topYTDDeltaSelloutProductShowroomSales',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/delta/function/{fun}/serie', [
	'as' => 'report.sellout.product.function.serie', 
	'uses' => 'ReportController@getDeltaTopSeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/delta/showroom/function/{fun}/serie', [
	'as' => 'report.sellout.product.showroom.function.serie', 
	'uses' => 'ReportController@getShowroomDeltaTopSeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/delta/showroom/function/{fun}/serie/{serie}/product', [
	'as' => 'report.sellout.product.showroom.function.serie.product', 
	'uses' => 'ReportController@getShowroomDeltaTopProductBySeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/delta/function/{fun}/serie/{serie}/product', [
	'as' => 'report.sellout.product.function.serie.product', 
	'uses' => 'ReportController@getDeltaTopProductBySeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/brizo/function/{fun}/serie', [
	'as' => 'report.sellout.product.function.serie', 
	'uses' => 'ReportController@getBrizoTopSeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/brizo/function/{fun}/serie/{serie}/product', [
	'as' => 'report.sellout.product.function.serie.product', 
	'uses' => 'ReportController@getBrizoTopProductBySeriesByFunction',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/product/serie', [
	'as' => 'report.sellout.product.serie', 
	'uses' => 'ReportController@bySelloutProductSerie',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/distribuitor/avg_ticket', [
	'as' => 'report.sellout.distribuitor.avg_ticket', 
	'uses' => 'ReportController@averageTicketByDistribuitor',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/distribuitor/participation', [
	'as' => 'report.sellout.distribuitor.participation', 
	'uses' => 'ReportController@getDistribuitorSalesParticipation',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/distribuitor/participation/ytd', [
	'as' => 'report.sellout.distribuitor.participation.ytd', 
	'uses' => 'ReportController@getDistribuitorYTDSalesParticipation',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/distribuitor/participation/all', [
	'as' => 'report.sellout.distribuitor.participation.all', 
	'uses' => 'ReportController@getDistribuitorAllSalesParticipation',
	'middleware' => 'auth'
]);

Route::get('/report/sellout/states/sales', [
	'as' => 'report.sellout.distribuitor.states.sales', 
	'uses' => 'ReportController@getStatesSales',
	'middleware' => 'auth'
]);

Route::get('/report/sales', [
	'as' => 'report.sales', 
	'uses' => 'ReportController@showSalesReport',
	'middleware' => 'auth'
]);

Route::get('/report/sales/distribuitor/sales', [
    'as' => 'report.sales.distribuitor.sales',
	'uses' => 'ReportController@salesByDistribuitor',
	'middleware' => 'auth'
]);

Route::get('/report/sales/distribuitor/ratio/{year}', [
    'as' => 'report.sales.distribuitor.ratio',
	'uses' => 'ReportController@salesRatioByDistribuitor',
	'middleware' => 'auth'
]);

Route::get('/report/sales/per_user_type/ratio/{year}', [
    'as' => 'report.sales.rep_profile.ratio',
	'uses' => 'ReportController@salesPerUserTypeRatio',
	'middleware' => 'auth'
]);

Route::get('/report/sales/rep_profile/ratio/{year}', [
    'as' => 'report.sales.rep_profile.ratio',
	'uses' => 'ReportController@salesRationByRepresentantProfile',
	'middleware' => 'auth'
]);

Route::get('/report/sales/rep_company/ratio/{year}', [
    'as' => 'report.sales.rep_company.ratio',
	'uses' => 'ReportController@salesRatioByRepCompany',
	'middleware' => 'auth'
]);

Route::get('/report/sales/raw_monthly', [
    'as' => 'report.sales.raw_monthly',
	'uses' => 'ReportController@rawSalesByMonth',
	'middleware' => 'auth'
]);

Route::get('/report/sales/rep_company/sales', [
    'as' => 'report.sales.rep_company.sales',
	'uses' => 'ReportController@salesByRepCompany',
	'middleware' => 'auth'
]);

Route::get('/report/sales/monthly', [
    'as' => 'report.sales.monthly',
	'uses' => 'ReportController@salesByMonth',
	'middleware' => 'auth'
]);

Route::get('/report/sales/top-customers/{year}', [
    'as' => 'report.sales.top-customers',
	'uses' => 'ReportController@getYearTopCustomers',
	'middleware' => 'auth'
]);

Route::get('/report/sales/customer_type/{year}', [
    'as' => 'report.sales.customer_type',
	'uses' => 'ReportController@salesByCustomerType',
	'middleware' => 'auth'
]);

Route::get('/report/sales/customer_type/{year}', [
    'as' => 'report.sales.customer_type',
	'uses' => 'ReportController@salesByCustomerType',
	'middleware' => 'auth'
]);

Route::get('/report/budgets/per_user_type/{year}', [
	'as' => 'report.budgets.per_user_type',
	'uses' => 'ReportController@budgetsPerUserType',
	'middleware' => 'auth'
]);

Route::get('/report/budgets/monthly/avg-ticket', [
	'as' => 'report.budgets.monthly.avg-ticket',
	'uses' => 'ReportController@budgetsAvgTicketByMonth',
	'middleware' => 'auth'
]);

Route::get('/report/budgets/monthly', [
	'as' => 'report.budgets.monthly',
	'uses' => 'ReportController@budgetsByMonth',
	'middleware' => 'auth'
]);

Route::get('/report/sales/state/{uf}', [
    'as' => 'report.sales.state',
    'uses' => 'ReportController@salesByState',
    'middleware' => 'auth'
]);

Route::get('/report/crm/influencer', [
    'as' => 'report.crm.influencer',
    'uses' => 'ReportController@getInfluencerReport',
    'middleware' => 'auth'
]);

Route::get('/report/crm/organization', [
    'as' => 'report.crm.organization',
    'uses' => 'ReportController@getOrganizationReport',
    'middleware' => 'auth'
]);

Route::get('/report/crm/influencer/detail/{id}', [
    'as' => 'report.crm.influencer.detail',
    'uses' => 'ReportController@getInfluencerReportDetail',
    'middleware' => 'auth'
]);


// ------------------------------------------------------------------------

Route::get('/data/customers', [
    'as' => 'data.customers',
	'uses' => 'DataController@customers',
	'middleware' => 'auth'
]);

Route::get('/data/products', [
    'as' => 'data.products',
	'uses' => 'DataController@products'
]);

Route::get('/data/cache/clear', [
    'as' => 'data.cache.clear',
	'uses' => 'DataController@clearCache',
	'middleware' => 'auth'
]);

Route::post('/data/console/run_batch', [
    'as' => 'data.console.run_batch',
    'uses' => 'DataController@runBatch',
    'middleware' => 'auth'
]);

Route::get('/data/console', [
    'as' => 'data.console',
	'uses' => 'DataController@getConsole',
	'middleware' => 'auth'
]);

Route::post('/data/console', [
    'as' => 'data.console',
	'uses' => 'DataController@postConsole',
	'middleware' => 'auth'
]);


// ------------------------------------------------------------------------

Route::get('/tracker/index', [
    'as' => 'tracker.index',
	'uses' => 'TrackerController@index',
	'middleware' => 'auth'
]);

Route::get('/tracker/agenda', [
	'as' => 'tracker.agenda',
	'uses' => 'TrackerController@getAgenda',
	'middleware' => 'auth'
]);

Route::get('/tracker/influencer/list', [
	'as' => 'tracker.influencer.list',
	'uses' => 'TrackerController@getInfluencerList',
	'middleware' => 'auth'
]);	

Route::get('/tracker/influencer/new', [
	'as' => 'tracker.influencer.new',
	'uses' => 'TrackerController@getNewInfluencer',
	'middleware' => 'auth'
]);	

Route::post('/tracker/influencer/new', [
	'as' => 'tracker.influencer.new',
	'uses' => 'TrackerController@postNewInfluencer',
	'middleware' => 'auth'
]);	

Route::post('/tracker/influencer/change-to-org/{org_id}', [
	'as' => 'tracker.influencer.change_to_org',
	'uses' => 'TrackerController@changeInfluencersToOrg',
	'middleware' => 'auth'
]);	

Route::get('/tracker/influencer/unify/{first_id}/{second_id}', [
	'as' => 'tracker.influencer.unify',
	'uses' => 'TrackerController@getUnifyInfluencer',
	'middleware' => 'auth'
]);	

Route::get('/tracker/dp', [
	'as' => 'tracker.dp',
	'uses' => 'TrackerController@getDemandingPlan',
	'middleware' => 'auth'
]);

Route::get('/tracker/add_influencer', [
	'as' => 'tracker.add_influencer',
	'uses' => 'TrackerController@addInfluencer',
	'middleware' => 'auth'
]);

Route::get('/tracker/disable-influencer/{influencer_id}', [
	'as' => 'tracker.disable_influencer',
	'uses' => 'TrackerController@disableInfluencer',
	'middleware' => 'auth'
]);

Route::get('/tracker/influencer/{influencer_id}/detail', [
	'as' => 'tracker.influencer.detail',
	'uses' => 'TrackerController@detailInfluencer',
	'middleware' => 'auth'
]);

Route::post('/tracker/project/{project_id}/notify-resp', [
	'as' => 'tracker.influencer.notify-resp',
	'uses' => 'TrackerController@notifyResp',
	'middleware' => 'auth'
]);

Route::get('/tracker/influencer/{influencer_id}/edit/{field}/to/{value}', [
	'as' => 'tracker.influencer.edit.to',
	'uses' => 'TrackerController@editInfluencer',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/influencer/{influencer_id}/remove', [
	'as' => 'tracker.project.influencer.remove',
	'uses' => 'TrackerController@removeInfluencer',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/influencer/{influencer_id}/set_level/{level}', [
	'as' => 'tracker.project.influencer.set_level',
	'uses' => 'TrackerController@setInfluencerLevel',
	'middleware' => 'auth'
]);

Route::post('/tracker/project/{project_id}/add_influencer', [
	'as' => 'tracker.add_influencer',
	'uses' => 'TrackerController@addInfluencerToProject',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/{project}/edit/{field}/to/{value}', [
	'as' => 'tracker.project.edit.to',
	'uses' => 'TrackerController@editFieldTo',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/new', [
    'as' => 'tracker.project.new',
	'uses' => 'TrackerController@newProject',
	'middleware' => 'auth'
]);

Route::post('/tracker/project/new', [
    'as' => 'tracker.project.new',
	'uses' => 'TrackerController@postProject',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/print/{project_id}', [
	'as' => 'tracker.project.print',
	'uses' => 'TrackerController@printProject',
	'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/assign-resp/{resp_id}', [
    'as' => 'tracker.project.assign_resp',
    'uses' => 'TrackerController@assignResp',
    'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/new-budget', [
    'as' => 'tracker.project.new_budget',
    'uses' => 'TrackerController@newBudget',
    'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/close/{closed_status_id}', [
    'as' => 'tracker.project.close',
    'uses' => 'TrackerController@closeProject',
    'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/stage/{stage_id}/complete', [
    'as' => 'tracker.project.stage.complete',
    'uses' => 'TrackerController@completeStage',
    'middleware' => 'auth'
]);

Route::post('/tracker/project/{project_id}/send_file', [
    'as' => 'tracker.project.send_file',
    'uses' => 'TrackerController@sendFile',
    'middleware' => 'auth'
]);

Route::get('/tracker/project/{project_id}/budget/{budget_id}/toggle-dp', [
    'as' => 'tracker.project.budget.toggle_dp',
    'uses' => 'TrackerController@toggleBudgetForDP',
    'middleware' => 'auth'
]);


Route::post('/tracker/project/{project_id}/send-note', [
    'as' => 'tracker.project.send_note',
    'uses' => 'TrackerController@sendNote',
    'middleware' => 'auth'
]);

Route::get('/tracker/influencer/add', [
    'as' => 'tracker.influencer.add',
    'uses' => 'TrackerController@getAddInfluencer',
    'middleware' => 'auth'
]);

Route::get('/tracker/organization/add', [
    'as' => 'tracker.organization.add',
    'uses' => 'TrackerController@getAddOrganization',
    'middleware' => 'auth'
]);

Route::get('/tracker/project/{id}/detail', [
    'as' => 'tracker.project.detail',
	'uses' => 'TrackerController@detailProject',
	'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/inbox/index', [
    'as' => 'inbox.index',
	'uses' => 'InboxController@index',
	'middleware' => 'auth'
]);

Route::get('/inbox/new', [
    'as' => 'inbox.new',
	'uses' => 'InboxController@newPost',
	'middleware' => 'auth'
]);

Route::get('/inbox/detail/{post_id}', [
    'as' => 'inbox.detail',
	'uses' => 'InboxController@detail',
	'middleware' => 'auth'
]);

Route::post('/inbox/reply/{post_id}', [
    'as' => 'inbox.reply',
	'uses' => 'InboxController@reply',
	'middleware' => 'auth'
]);

Route::get('/inbox/post/{post_id}/star-it', [
    'as' => 'inbox.post.star-it',
    'uses' => 'InboxController@starIt',
    'middleware' => 'auth'
]);

Route::get('/inbox/post/{post_id}/remove-star', [
    'as' => 'inbox.post.remove-star',
    'uses' => 'InboxController@removeStar',
    'middleware' => 'auth'
]);

Route::post('/inbox/new/faq', [
    'as' => 'inbox.new.faq',
	'uses' => 'InboxController@newFaq',
	'middleware' => 'auth'
]);


Route::post('/inbox/create', [
    'as' => 'inbox.create',
	'uses' => 'InboxController@createPost',
	'middleware' => 'auth'
]);

Route::get('/inbox/delete/{post_id}/from/{user_id}', [
    'as' => 'inbox.delete.from',
    'uses' => 'InboxController@deletePostFrom',
    'middleware' => 'auth'
]);



// ------------------------------------------------------------------------

Route::get('/budget/list', [
	'as' => 'budget.index', 
	'uses' => 'BudgetController@index',
	'middleware' => 'auth'
]);

Route::get('/budget/edit/{budget_id}', [
	'as' => 'budget.edit', 
	'uses' => 'BudgetController@edit',
	'middleware' => 'auth'
]);

Route::post('/budget/edit/{budget_id}', [
	'as' => 'budget.edit', 
	'uses' => 'BudgetController@edit',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/budget/{budget_id}/edit/title', [
	'as' => 'budget.edit', 
	'uses' => 'BudgetController@editBudgetTitle',
	'middleware' => 'auth'
]);

Route::get('/budget/new/{customer?}', [
	'as' => 'budget.create', 
	'uses' => 'BudgetController@create',
	'middleware' => 'auth'
]);

Route::post('/budget/new/{customer?}', [
	'as' => 'budget.create', 
	'uses' => 'BudgetController@create',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/budget/delete/{budget_id}', [
	'as' => 'budget.delete', 
	'uses' => 'BudgetController@delete',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/budget/products/{budget_id}', [
	'as' => 'budget.products', 
	'uses' => 'BudgetController@products',
	'middleware' => 'auth'
]);

Route::post('/budget/copy/{budget_id}', [
	'as' => 'budget.copy', 
	'uses' => 'BudgetController@copy',
	'middleware' => 'auth'
]);

Route::get('/budget/copy/{budget_id}', [
	'as' => 'budget.copy', 
	'uses' => 'BudgetController@copy',
	'middleware' => 'auth'
]);

Route::get('/budget/change/{budget_id}/price/to/{price_table}', [
    'as' => 'budget.change.price.to',
    'uses' => 'BudgetController@changePriceTo',
    'middleware' => 'auth'
]);

Route::post('/budget/edit-title/{budget_id}', [
	'as' => 'budget.edit_title', 
	'uses' => 'BudgetController@editTitle',
	'middleware' => 'auth'
]);

Route::get('/budget/finished/list', [
    'as' => 'budget.finished.list',
	'uses' => 'BudgetController@listFinish',
	'middleware' => 'auth'
]);

Route::get('/budget/send/{budget_id}/to/{email}', [
    'as' => 'budget.send_to',
    'uses' => 'BudgetController@sendTo',
    'middleware' => 'auth'
]);

Route::post('/budget/send_custom/{budget_id}/to/{email}', [
    'as' => 'budget.send_custom_email_to',
    'uses' => 'BudgetController@sendCustomEmailTo',
    'middleware' => 'auth'
]);

Route::get('/budget/send_preview/{budget_id}', [
    'as' => 'budget.send_preview',
    'uses' => 'BudgetController@sendPreview',
    'middleware' => 'auth'
]);

Route::get('/budget/print/{budget_id}', [
    'as' => 'budget.print',
    'uses' => 'BudgetController@printBudget'
]);

Route::post('/budget/{budget_id}/email_filepath', [
    'as' => 'budget.email_filepath',
    'uses' => 'BudgetController@setEmailFilepath',
    'middleware' => 'auth'
]);

Route::get('/budget/{budget_id}/reset_email_filepath', [
    'as' => 'budget.reset_email_filepath',
    'uses' => 'BudgetController@resetEmailFilepath',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get("/order/save/{budget_id}", [
    'as' => 'order.save',
    'uses' => 'OrderController@save',
    'middleware' => 'auth'
]);

Route::get('/order/in_progress/list', [
    'as' => 'budget.finished.list',
	'uses' => 'OrderController@listInProgress',
	'middleware' => 'auth'
]);

Route::get('/order/detail/{order_id}', [
    'as' => 'order.detail',
    'uses' => 'OrderController@detail',
    'middleware' => 'auth'
]);

Route::get('/order/{order_product_id}/split', [
    'as' => 'order.product.notes',
    'uses' => 'OrderController@splitProduct',
    'middleware' => 'auth'
]);

Route::get('/order/{order_id}/product/{product_id}/notes', [
    'as' => 'order.product.notes',
    'uses' => 'OrderController@showProductNotes',
    'middleware' => 'auth'
]);

Route::get('/order/product/{order_product_id}/distribuitor', [
    'as' => 'order.product.notes',
    'uses' => 'OrderController@selectDistribuitor',
    'middleware' => 'auth'
]);

Route::get('/order/set_product/{order_product}/dist/{dist}', [
    'as' => 'order.set_product.dist',
    'uses' => 'OrderController@setProductDistribuitor',
    'middleware' => 'auth'
]);

Route::post('/order/{order_id}/product/{product_id}/notes', [
    'as' => 'order.product.notes',
    'uses' => 'OrderController@newProductNote',
    'middleware' => ['auth', 'CORS']
]);

Route::get('/order/end_analysis/{order_id}', [
    'as' => 'order.accept',
    'uses' => 'OrderController@endAnalysis',
    'middleware' => ['auth', 'CORS']
]);

Route::post('/order/accept/{order_id}', [
    'as' => 'order.accept',
    'uses' => 'OrderController@accept',
    'middleware' => ['auth', 'CORS']
]);

Route::post('/order/approve/{order_id}', [
    'as' => 'order.approve',
    'uses' => 'OrderController@approve',
    'middleware' => ['auth', 'CORS']
]);

Route::post('/order/reprove/{order_id}', [
    'as' => 'order.reprove',
    'uses' => 'OrderController@reprove',
    'middleware' => ['auth', 'CORS']
]);

Route::post('/order/refuse/{order_id}', [
    'as' => 'order.refuse',
    'uses' => 'OrderController@refuse',
    'middleware' => ['auth', 'CORS']
]);

Route::get('/order/ended/list', [
    'as' => 'order.ended.list',
    'uses' => 'OrderController@listEnded',
    'middleware' => 'auth'
]);

Route::get('/order/{order_id}/edit/product/{product_id}/{field}/to/{new_value}', [
    'as' => 'order.product.edit',
    'uses' => 'OrderController@editOrderProduct'
]);

Route::get('/order/{order_id}/end', [
    'as' => 'order.end',
    'uses' => 'OrderController@getEnd'
]);

Route::get('/order/{order_id}/send_to_dist', [
    'as' => 'order.send_to_dist',
    'uses' => 'OrderController@sendOrders'    
]);

Route::get('/order/print/{order_id}', [
    'as' => 'order.print',
    'uses' => 'OrderController@printOrder'
]);

Route::get('/order/send/{order_id}/to/{email}', [
    'as' => 'order.send_to',
    'uses' => 'OrderController@sendTo',
    'middleware' => 'auth'
]);


// ------------------------------------------------------------------------

Route::get('/sub_order/detail/{order_id}', [
    'as' => 'sub_order.detail',
    'uses' => 'SubOrderController@detail',
    'middleware' => 'auth'
]);

Route::get('/sub_order/{order_id}/notes', [
    'as' => 'sub_order.notes',
    'uses' => 'SubOrderController@showNotes',
    'middleware' => 'auth'
]);

Route::post('/sub_order/{order_id}/notes', [
    'as' => 'sub_order.notes',
    'uses' => 'SubOrderController@newNote',
    'middleware' => 'auth'
]);

Route::get('/sub_order/approve/{order_id}', [
    'as' => 'sub_order.approve',
    'uses' => 'SubOrderController@approve',
    'middleware' => ['auth', 'CORS']
]);

Route::get('/sub_order/reprove/{order_id}', [
    'as' => 'sub_order.reprove',
    'uses' => 'SubOrderController@reprove',
    'middleware' => ['auth', 'CORS']
]);

Route::get('/sub_order/print/{order_id}', [
    'as' => 'sub_order.print',
    'uses' => 'SubOrderController@printOrder'
]);

Route::get('/sub_order/send/{sub_order_id}/to/{email}', [
    'as' => 'sub_order.send_to',
    'uses' => 'SubOrderController@sendTo',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/billing/list', [
	'as' => 'billing.index',
	'uses' => 'BillingController@index',
	'middleware' => 'auth'
]);

Route::get('/billing/fees', [
	'as' => 'billing.fees',
	'uses' => 'BillingController@showFees',
	'middleware' => 'auth'
]);

Route::get('/billing/not_invoiced_products', [
	'as' => 'billing.not_invoiced_products',
	'uses' => 'BillingController@notInvoicedProducts',
	'middleware' => 'auth'
]);

Route::get('/billing/detail/{order_id}', [
	'as' => 'billing.detail',
	'uses' => 'BillingController@detail',
	'middleware' => 'auth'
]);

Route::get('/billing/fee_report/{report_id}/change_status/{to}', [
	'as' => 'billing.fee_report.change_status',
	'uses' => 'BillingController@changeFeeReportStatus',
	'middleware' => 'auth'
]);

Route::post('/billing/fee_report/{report_id}/send_nfe', [
	'as' => 'billing.fee_report.send_nfe',
	'uses' => 'BillingController@feeReporSendNfe',
	'middleware' => 'auth'
]);

Route::get('/billing/add_invoice/{order_id}', [
	'as' => 'billing.add_invoice',
	'uses' => 'BillingController@showAddInvoice',
	'middleware' => 'auth'
]);

Route::post('/billing/add_invoice/{order_id}', [
	'as' => 'billing.add_invoice',
	'uses' => 'BillingController@addInvoice',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/billing/add_installment/{invoice_id}', [
	'as' => 'billing.add_invoice',
	'uses' => 'BillingController@showAddInstallment',
	'middleware' => 'auth'
]);

Route::post('/billing/add_installment/{invoice_id}', [
	'as' => 'billing.add_installment',
	'uses' => 'BillingController@addInstallment',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/billing/invoice/{invoice_id}/cancel', [
    'as' => 'billing.invoice.cancel',
    'uses' => 'BillingController@cancelInvoice',
    'middleware' => 'auth'
]);

Route::get('/billing/installment/{installment_id}/status/{status}', [
    'as' => 'billing.installment.status',
    'uses' => 'BillingController@changeInstallmentStatus',
    'middleware' => 'auth'
]);

Route::get('/billing/installments/list', [
	'as' => 'billing.installments.list',
	'uses' => 'BillingController@listInstallments',
	'middleware' => 'auth'
]);

Route::get('/billing/fee_report/list', [
	'as' => 'billing.report.list',
	'uses' => 'BillingController@listReports',
	'middleware' => 'auth'
]);

Route::get('/billing/fee_report/{fee_report_id}/detail', [
	'as' => 'billing.report.detail',
	'uses' => 'BillingController@detailReport',
	'middleware' => 'auth'
]);

Route::get('/billing/report/fee', [
	'as' => 'billing.report.fee',
	'uses' => 'BillingController@getReportFee',
	'middleware' => 'auth'
]);

Route::post('/billing/report/fee', [
	'as' => 'billing.report.fee',
	'uses' => 'BillingController@postReportFee',
	'middleware' => 'auth'
]);



// ------------------------------------------------------------------------

Route::get('/portfolio/new', [
	'as' => 'portfolio.new',
	'uses' => 'PortfolioController@create',
	'middleware' => 'auth'
]);

Route::post('/portfolio/new', [
	'as' => 'portfolio.new',
	'uses' => 'PortfolioController@create',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/portfolio/list', [
	'as' => 'portfolio.index',
	'uses' => 'PortfolioController@index',
	'middleware' => 'auth'
]);

Route::get('/portfolio/detail/{customer}', [
	'as' => 'portfolio.detail',
	'uses' => 'PortfolioController@detail',
	'middleware' => 'auth'
]);

Route::post('/portfolio/{customer_id}/send_file', [
    'as' => 'portfolio.send_file',
    'uses' => 'PortfolioController@sendFile',
    'middleware' => 'auth'
]);

Route::post('/portfolio/{customer_id}/attrs', [
    'as' => 'portfolio.attrs',
    'uses' => 'PortfolioController@attrs',
    'middleware' => 'auth'
]);

Route::post('/portfolio/{customer_id}/credit_analysis', [
    'as' => 'portfolio.credit_analysis',
    'uses' => 'PortfolioController@credit_analysis',
    'middleware' => ['auth', 'CORS']
]);

// ------------------------------------------------------------------------

Route::get('/product/detail/{id}', [
    'as' => 'product.detail',
    'uses' => 'ProductController@detail'
]);

Route::get('/product/find/{id}', [
    'as' => 'product.find',
    'uses' => 'ProductController@find',
    'middleware' => 'auth'
]);

Route::get('/product/portfolio/brazil', [
    'as' => 'product.portfolio.brazil',
    'uses' => 'ProductController@brazilPortfolio',
    'middleware' => 'auth'
]);

Route::get('/product/portfolio/brazil/count', [
    'as' => 'product.portfolio.brazil.count',
    'uses' => 'ProductController@brazilPortfolioCount',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/catalog/index', [
    'as' => 'catalog.index',
    'uses' => 'CatalogController@getIndex'
]);

// ------------------------------------------------------------------------

Route::get('/inventory/positions', [
    'as' => 'inventory.positions',
    'uses' => 'InventoryController@positions',
    'middleware' => 'auth'
]);

Route::get('/inventory/local', [
    'as' => 'inventory.local',
    'uses' => 'InventoryController@local',
    'middleware' => 'auth'
]);

Route::get('/inventory/advanced_search', [
    'as' => 'inventory.advanced_search',
    'uses' => 'InventoryController@getAdvancedSearch',
    'middleware' => 'auth'
]);

Route::post('/inventory/advanced_search', [
    'as' => 'inventory.advanced_search',
    'uses' => 'InventoryController@postAdvancedSearch',
    'middleware' => 'auth'
]);

Route::get('/inventory/distribuitors', [
    'as' => 'inventory.positions',
    'uses' => 'InventoryController@distribuitors',
    'middleware' => 'auth'
]);

Route::get('/inventory/distribuitor/get/{dist_id}', [
    'as' => 'inventory.distribuitor.get',
    'uses' => 'InventoryController@getByDistribuitor',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/distributor/inventory/view', [
    'as' => 'distribuitor.inventory.view',
    'uses' => 'DistribuitorInventoryController@view',
    'middleware' => 'auth'
]);

Route::get('/distributor/inventory/view', [
    'as' => 'distribuitor.inventory.view',
    'uses' => 'DistribuitorInventoryController@view',
    'middleware' => 'auth'
]);

Route::get('/distributor/find/{dist_id}', [
    'as' => 'distribuitor.find',
    'uses' => 'DistribuitorController@find',
    'middleware' => 'auth'
]);

Route::get('/distribuitor/credit_analysis/{ca_id}', [
    'as' => 'distribuitor.credit_analysis',
    'uses' => 'CustomerController@distribuitorCreditAnalysis',
    'middleware' => 'auth'
]);

Route::get('/distribuitor/police/{dist_id}/show', [
    'as' => 'distribuitor.police',
    'uses' => 'DistribuitorController@showPolice',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/storage/index', [
    'as' => 'storage.index',
    'uses' => 'StorageController@index',
    'middleware' => 'auth'
]);

Route::post('/storage/upload', [
    'as' => 'storage.upload',
    'uses' => 'StorageController@upload',
    'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/admin/new_user', [
	'as' => 'admin.new_user',
	'uses' => 'AdminController@newUser',
	'middleware' => 'auth'
]);

Route::post('/admin/new_user', [
	'as' => 'admin.new_user',
	'uses' => 'AdminController@postNewUser',
	'middleware' => 'auth'
]);

Route::get('/admin/new_rep_company', [
	'as' => 'admin.new_rep_company',
	'uses' => 'AdminController@getNewRepCompany',
	'middleware' => 'auth'
]);

Route::post('/admin/new_rep_company', [
	'as' => 'admin.new_rep_company',
	'uses' => 'AdminController@postNewRepCompany',
	'middleware' => 'auth'
]);


Route::get('/admin/list_users', [
   'as' => 'admin.list_users',
   'uses' => 'AdminController@listUsers',
    'middleware' => 'auth'
]);


// ------------------------------------------------------------------------

Route::get('/customer/find/{id}', [
	'as' => 'customer.find',
	'uses' => 'CustomerController@find',
	'middleware' => 'auth'
]);

Route::get('/customer/list', [
	'as' => 'customer.list',
	'uses' => 'CustomerController@all',
	'middleware' => 'auth'
]);

Route::get('/customer/credit_analysis/{id}', [
	'as' => 'customer.credit_analysis',
	'uses' => 'CustomerController@creditAnalysis',
	'middleware' => 'auth'
]);

Route::post('/customer/credit_analysis/{id}/end', [
	'as' => 'customer.credit_analysis',
	'uses' => 'CustomerController@endCreditAnalysis',
	'middleware' => 'auth'
]);

Route::get('/customer/credit_analysis/send/{ca}/to/{dist}', [
	'as' => 'customer.send_analysis_request',
	'uses' => 'CustomerController@sendAnalysisRequest',
	'middleware' => 'auth'
]);

Route::get('/customer/credit_analysis/notes/{ca}/from/{dist}', [
	'as' => 'customer.analysis_request.notes',
	'uses' => 'CustomerController@creditAnalysisNotes',
	'middleware' => 'auth'
]);

Route::get('/customer/credit_analysis/{ca}/notes', [
	'as' => 'customer.credit_analysis.notes',
	'uses' => 'CustomerController@creditRepAnalysisNotes',
	'middleware' => 'auth'
]);

Route::post('/customer/credit_analysis/{ca}/notes', [
	'as' => 'customer.credit_analysis.notes',
	'uses' => 'CustomerController@creditRepAnalysisNotes',
	'middleware' => ['auth', 'CORS']
]);

Route::post('/customer/credit_analysis/notes/{ca}/from/{dist}', [
	'as' => 'customer.analysis_request.notes',
	'uses' => 'CustomerController@creditAnalysisNotes',
	'middleware' => ['auth', 'CORS']
]);

Route::get('/customer/credit_analysis/{ca}/from/{dist}/approved/{range}', [
	'as' => 'customer.credit_analysis.distribuitor.approve',
	'uses' => 'CustomerController@creditDistAnalysisResponse',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/note', [
	'as' => 'customer.note',
	'uses' => 'CustomerController@newNote',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/new/business_contact', [
	'as' => 'customer.new.business_contact',
	'uses' => 'CustomerController@newBusinessContact',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/new/partner', [
	'as' => 'customer.new.partner',
	'uses' => 'CustomerController@newPartner',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/new/people', [
	'as' => 'customer.new.people',
	'uses' => 'CustomerController@newPeople',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/new/main_provider', [
	'as' => 'customer.new.main_provider',
	'uses' => 'CustomerController@newMainProvider',
	'middleware' => 'auth'
]);

Route::post('/customer/{id}/new/bank_account', [
	'as' => 'customer.new.bank_account',
	'uses' => 'CustomerController@newBankAccount',
	'middleware' => 'auth'
]);

Route::get('/customer/{id}/edit/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@edit',
	'middleware' => 'auth'
]);

Route::get('/customer/{id}/edit/address/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editAddress',
	'middleware' => 'auth'
]);

Route::get('/customer/{id}/edit/delivery_address/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editDeliveryAddress',
	'middleware' => 'auth'
]);

Route::get('/customer/{id}/edit/billing_address/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editBillingAddress',
	'middleware' => 'auth'
]);

Route::get('/customer/business_contact/{id}/edit/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editBusinessContact',
	'middleware' => 'auth'
]);

Route::get('/customer/partner/{id}/edit/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editPartner',
	'middleware' => 'auth'
]);

Route::get('/customer/main_provider/{id}/edit/{field}/to/{value}', [
	'as' => 'customer.edit',
	'uses' => 'CustomerController@editMainProvider',
	'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/representants/list', [
	'as' => 'representants.list',
	'uses' => 'RepresentantController@portfolio',
	'middleware' => 'auth'
]);

// ------------------------------------------------------------------------

Route::get('/product/all', [
	'as' => 'product.all',
	'uses' => 'ProductController@all',
	'middleware' => 'auth'
]);

// -------------------------------------------------------------------------

Route::get('/tutorials/portfolio', [
	'as' => 'tutorial.portfolio',
	'uses' => 'TutorialController@portfolio',
	'middleware' => 'auth'
]);

Route::get('/tutorials/budgets', [
	'as' => 'tutorial.budgets',
	'uses' => 'TutorialController@budgets',
	'middleware' => 'auth'
]);

Route::get('/tutorials/orders', [
	'as' => 'tutorial.orders',
	'uses' => 'TutorialController@orders',
	'middleware' => 'auth'
]);

Route::get('/tutorials/fees', [
	'as' => 'tutorial.fees',
	'uses' => 'TutorialController@fees',
	'middleware' => 'auth'
]);


// -------------------------------------------------------------------------

Route::get('/profile/{user_id}/detail', [
    'as' => 'profile.detail',
	'uses' => 'ProfileController@detail',
	'middleware' => 'auth'
]);

Route::get('/profile/{user_id}/edit/{prop}/to/{value}', [
    'as' => 'profile.edit.to',
	'uses' => 'ProfileController@editUser',
	'middleware' => 'auth'
]);

Route::get('/profile/representant/company/{company_id}/edit/{prop}/to/{value}', [
    'as' => 'profile.representant.company.edit.to',
	'uses' => 'ProfileController@editRepresentantCompany',
	'middleware' => 'auth'
]);

Route::post('/profile/{user_id}/leave_message', [
    'as' => 'profile.leave_message',
	'uses' => 'ProfileController@leave_message',
	'middleware' => 'auth'
]);

Route::post('/profile/{user_id}/change_avatar', [
    'as' => 'profile.change_avatar',
	'uses' => 'ProfileController@change_avatar',
	'middleware' => 'auth'
]);

Route::post('/profile/{user_id}/change/password', [
    'as' => 'profile.change.password',
	'uses' => 'ProfileController@changePassword',
	'middleware' => 'auth'
]);

Route::get('/profile/set_language/{locale}', [
    'as' => 'profile.set_language',
    'uses' => 'ProfileController@setLocaleLanguage',
    'middleware' => 'auth'
]);

/*
| Shows the not authenticated user the login form in
| order to login on the system.
*/
Route::get('/auth/login', [
	'as' => 'auth.login',
	'uses' => 'UserController@index'
]);

Route::get('/auth/logout', [
	'as' => 'auth.logout',
	'uses' => 'UserController@logout'
]);

Route::post('/auth/reset_password', [
	'as' => 'auth.reset.password',
	'uses' => 'UserController@resetPassword'
]);

/*
| Shows the not authenticated user the login form in
| order to login on the system.
*/
Route::get('/auth/register/{ticket}', [
	'as' => 'auth.show_form',
	'uses' => 'UserController@register'
]);

/*
| Receives the data from teh user and validates in order to
| save at the database. 
*/
Route::post('/auth/register/{ticket}', [
	'as' => 'auth.register',
	'uses' => 'UserController@register'
]);

/*
| Checks if the user is authenticated. Case not, it shows an error 
| message.
*/
Route::post('/auth/login', [
	'as' => 'auth.check',
	'uses' => 'UserController@check'
]);

// ------------------------------------------------------------------------

Route::get('/bootstrap/all', [
    'as' => 'bootstrap.all',
    'uses' => 'BootstrapController@all'    
]);

Route::get('/bootstrap/create/adms', [
    'as' => 'bootstrap.create_adms',
    'uses' => 'BootstrapController@createAdministrators'
]);

Route::get('/bootstrap/register/reps', [
    'as' => 'bootstrap.register_reps',
    'uses' => 'BootstrapController@registerRepresentants'
]);

Route::get('/bootstrap/register/managers', [
    'as' => 'bootstrap.register_managers',
    'uses' => 'BootstrapController@registerManagers'
]);

Route::get('/bootstrap/register/distribuitors', [
    'as' => 'bootstrap.register_distribuitors',
    'uses' => 'BootstrapController@registerDistribuitors'
]);

Route::get('/bootstrap/normalize/customers', [
    'as' => 'bootstrap.normalize_customers',
    'uses' => 'BootstrapController@normalizeCustomers'
]);

Route::get('/bootstrap/util', [
    'as' => 'bootstrap.util',
    'uses' => 'BootstrapController@util'
]);

// ------------------------------------------------------------------------

Route::get('/utils/cities/{state_id}', [
    'as' => 'utils.cities_by_state',
    'uses' => 'UtilsController@citiesByState',
    'middleware' => 'auth'
]);

