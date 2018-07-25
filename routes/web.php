<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return view('layouts.app_template');
});

/*Route::get('/', function(){
	$redis = app()->make('redis');
	$redis->set("key1", "testValue");
	return $redis->get("key1");
});
*/
//Auth::routes();


route::get('/test_email', 'TestEmail@showTestMail')->name('test_email');
route::get('/test_email/testSendMail', 'TestEmail@testSendMail')->name('testSendMail');

Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

//Approval route
    Route::get('approve/cmo/{id}/{wfkeyid}/{webApprv}', 'ApproveController@CMOApprover')->name('cmo.approve');
    Route::get('reject/cmo/{id}/{wfkeyid}/{webApprv}', 'ApproveController@CMORejected')->name('cmo.reject');

Route::group(['prefix' => 'admin','namespace' => 'Auth'],function(){
    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.token');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('new.password.reset');
});



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/upload_excel', 'ImportExcelController@show_upload')->name('upload_excel');
Route::get('/fleet_back', 'ImportExcelController@fleet_back')->name('fleet_back');
Route::get('/orders/show_detail_order/{header_id}', 'OrdersController@show_detail_order')->name('show_detail_order');

Route::group(['prefix' => 'super_admin'], function () {
    Voyager::routes();
});

//**Group Activity
Route::resource('/group_activity', 'GrpActivityController');
//**Group Activity **//

//users
Route::resource('/user_setting', 'Users');
Route::get('/user_setting/index', 'Users@index')->name('list_users');
Route::POST('/user_setting/save', 'Users@store')->name('store.access');
Route::delete('/user_setting/delete', 'Users@destroy')->name('delete_akses');
Route::get('/user_setting/getEmail/{person_id}', 'Users@getEmail')->name('getEmail');
Route::get('/user_setting/getName/{person_id}', 'Users@getName')->name('getName');
//users

Route::get('importExport','ImportExcelController@show_upload');
Route::get('downloadExcel/{type}', 'ImportExcelController@dowloadExcel');
Route::post('importExcel','ImportExcelController@importExcel');
//upload Orders Route
Route::resource('order', 'OrdersController');
//Get
Route::get('/orders/upload_order', 'OrdersController@upload_orders');
Route::get('/orders/fleet_details/{dlvdate}', 'OrdersController@show_fleets')->name('fleet_details');
//posts
Route::post('/upload_excel', 'OrdersController@save_orders')->name('save_orders');
// ************ //
//Master//
//**** Fleet //
Route::resource('/master/masterfleet', 'FleetController');
Route::get('/master/masterfleet', 'FleetController@index')->name('list_fleets');
Route::post('/master/masterfleet', 'FleetController@store');
//**** customer Fleet//
Route::resource('/master/customer_fleet', 'CustomerFleet');
Route::get('/master/customer_fleet/list', 'CustomerFleet@index')->name('list_cust');
Route::get('/master/customer_fleet/getData','CustomerFleet@CustShipData' )->name('CustShipData');
Route::post('/master/customer_fleet/search', 'CustomerFleet@search')->name('customerF.search');
Route::post('/master/customer_fleet/save', 'CustomerFleet@store')->name('custFleet_store');
//Route::post('/master/customer_fleet/delete', 'CustomerFleet@destroy')->name('custFleet_destroy');
Route::delete('/master/customer_fleet/{files}', 'CustomerFleet@destroy')->name('delete_route');
//**** Region //
Route::resource('/master/region', 'MtlRegionController');
//Route::get('/master/region', 'MtlRegionController@index')->name('list_region');
//**** SubRegion //
Route::resource('/master/subregion', 'MtlSubRegionController');
//Route::get('/master/subregion', 'SubRegionController@index')->name('list_subregion');
//**** Area //
Route::resource('/master/area', 'MtlAreaController');
//Route::get('/master/area', 'MtlAreaController@index')->name('area.index');
//Master//
//**** customer attribute//
Route::resource('/master/customer_attr', 'CustomerAttr');
Route::post('/master/customer_attr', 'CustomerAttr@store')->name('custAttr_store');
Route::get('/master/customer_attr/list', 'CustomerAttr@index')->name('list_cust_attr');
Route::post('/master/customer_attr/search', 'CustomerAttr@search')->name('cust_attrF.search');
Route::get('/master/customer_attr/create/{id}', 'CustomerAttr@create')->name('create_attr');
Route::delete('/master/customer_attr/delPic/{id}/{cust_ship_id}', 'CustomerAttr@DeletePIC')->name('delete_pic');
Route::get('/master/customer_attr/GetPArea/{areaID}', 'CustomerAttr@getPersonArea');
Route::get('/master/customer_attr/getMOQ/{fleetID}', 'CustomerAttr@getFleetMOQ');
Route::post('/master/customer_attr/storePIC', 'CustomerAttr@storePIC')->name('custAttr.storePIC');
//**** Persons//
//Route::resource('/persons', 'PersonController');
Route::POST('/persons','PersonController@store')->name('persons.store');
Route::get('/persons','PersonController@index')->name('persons.index');
Route::get('/persons/create','PersonController@create')->name('persons.create');
Route::get('/persons/{person}/edit','PersonController@edit')->name('persons.edit');
Route::delete('/persons/{person}','PersonController@destroy')->name('persons.destroy');
Route::get('/persons/{person}','PersonController@show')->name('persons.show');
Route::PATCH('/persons/update/{person}','PersonController@update')->name('update_P');
Route::PUT('/persons/update/{person}','PersonController@update')->name('update_P');
Route::POST('/persons/update/{person}','PersonController@update')->name('update_P');
//***** Person
Route::get('/persons/list', 'PersonController@index')->name('list_person');
Route::post('/persons/search', 'PersonController@search')->name('person.search');
Route::post('persons/{person}', 'PersonController@update')->name('persons.update');
//dropdown dependent
Route::get('/persons/getSubregion/{region}', 'PersonController@getsubregion');
Route::get('/persons/getArea/{subregion}', 'PersonController@getarea');
//**** End Persons //
//**** Reports*****//
Route::get('/reports/order_summary', 'ReportsController@FindCMO')->name('search_CMO');
//**** End Reports
//**** Hirarki
Route::resource('wf_hirarki','HirarkiController');
Route::get('/master/wf_hirarki/getHolder/{posID}','HirarkiController@getHolder');
Route::post('/master/wf_hirarki/save', 'HirarkiController@simpan')->name('wf_hirarki.structure');
//****
//**** Master Positions
//Route::resource('/master/positions', 'PositionsController');

//division
Route::resource('/master/division', 'mtldivisioncontroller');
//
//region
Route::resource('/master/region', 'MtlRegionController');
//
//fnd group value
Route::resource('/master/fndgroup', 'fndgroupcontroller');
//**Jobs
Route::resource('/master/jobs', 'MtlJobsController');
//**Position
Route::resource('/master/positions', 'MtlPositionsController');


//
//fnd group values
Route::resource('/master/brand_produk', 'BrandProdController');
//fnd item/produk
Route::resource('/master/produk', 'ProdukController');

//Route::resource('/master/company', 'mtlcompanycontroller');
//
Route::resource('/master/company', 'mtlcompanycontroller');


Route::resource('/master/group_activity', 'grpActivityController');
//****
//**** Master  kategory Activity
Route::resource('/master/kategory_activity', 'MtlKategoryActivityController');
//**Activity
Route::resource('/master/activity', 'MtlActivityController');

//**GTStore
Route::resource('/master/gt_store', 'GtStoreController');

//**MtChannel
Route::resource('/master/mt_channel', 'MtChannelController');

//**typeMarket
Route::resource('/master/type_market', 'TypeMarketController');

Route::resource('/master/group_hirarki_limit', 'MtlGroupHirarkiLimitController');
//**FndValue
Route::resource('/master/fndvalues', 'fndvaluescontroller');
//**Hirarki Pos Limit
Route::resource('/master/hirarki_pos', 'MtlHirarkiPosLimitController');

//**** End Master Positions
//**** Master PositionsMtlJobsController');
//**** End Master Positions
//**** Master groupActivity

//*** Budget
Route::get('/budget/upload_budget_str', 'BudgetController@upload_budget_str')->name('budget_str.upload');
Route::POST('/budget/ImportBudget', 'BudgetController@ImportBudget')->name('budget_str.ImportBudget');
Route::POST('/budget/save_budget', 'BudgetController@Save_Budget')->name('budget_str.save_budget');
Route::get('DownloadBudgetHI', 'BudgetController@DownloadBudgetHI')->name('budget_str.DownloadBudgetHI');
Route::get('DownloadBudgetSEI', 'BudgetController@DownloadBudgetSEI')->name('budget_str.DownloadBudgetSEI');
//****
//master budget-dsentralisasi
Route::resource('/master/budget_dstr', 'BudgetDstrController');
//Route::get('/persons/getSubregion/{region}', 'PersonController@getsubregion');
//Route::get('/persons/getArea/{subregion}', 'PersonController@getarea');
Route::get('/budget_dstr/getSubregion/{region}', 'BudgetDstrController@getsubregion');
Route::get('/budget_dstr/getArea/{subregion}', 'BudgetDstrController@getarea');
Route::get('/budget_dstr/getAsdh/{area}', 'BudgetDstrController@getasdh');
//Route::get('/persons/getArea/{subregion}', 'PersonController@getarea');

Route::resource('/master/group_akses', 'GrpAksesController');
Route::get('/group_akses/getbrand/{company_code}', 'GrpAksesController@getbrand');

Route::resource('/master/settlement', 'SettlementController');
Route::POST('/master/settlement/cari', 'SettlementController@index')->name('settlement.cari');



Route::resource('/master/batal_eprop', 'batal_epropController');

// Route::post('/save_history_sett', 'SettlementController@insert_histroy_sett')->name('save_history_sett');



//*** Form Done ****
Route::resource('/home/done_form', 'Form_Done');
Route::resource('/home/result', 'Form_result');

Route::get('export_logbook',  'LogbookController@exportExcel')->name('export_logbook');

Route::resource('/home/report/logbook','LogbookController');

Route::POST('/home/report/logbook/cari','LogbookController@search')->name('logbook.cari');


Route::resource('/home/report/per_status','PerstatusController');
Route::POST('/home/report/per_status/cari','PerstatusController@search')->name('Perstatus.cari');

Route::resource('/home/report/canceled_executor','Canceled_executorController');
Route::POST('/home/report/canceled_executor/cari','Canceled_executorController@search')->name('canceled_executor.cari');

Route::resource('/home/report/result_implementation','Result_implementationController');
Route::POST('/home/report/result_implementation/cari','Result_implementationController@search')->name('result_implementation.cari');

Route::resource('/home/report/auto_closed','Report_AutoCloseController');
Route::POST('/home/report/auto_closed/cari','Report_AutoCloseController@search')->name('auto_closed.cari');


Route::resource('/home/report/budget_summary','Report_Budget_SummaryController');
Route::POST('/home/report/budget_summary/cari','Report_Budget_SummaryController@search')->name('budget_summary.cari');






//*** Proposal ****






//** Eprop ==INPUT SENTRA EPROP
Route::get('/eprop/sentralisasi','EpropSentralController@InputSentra');
Route::POST('/eprop/PostFirstPage','EpropSentralController@PostfirstPage')->name('PostFirstPage');
Route::POST('/eprop/PostSecondMTPage','EpropSentralController@PostSecondMTPage')->name('PostSecondMTPage');
Route::POST('/eprop/PostThridPage','EpropSentralController@PostThridPage')->name('PostThridPage');
Route::POST('/eprop/PostFourthPage','EpropSentralController@PostFourthPage')->name('PostFourthPage');
Route::get('/eprop/EpropCancel','EpropSentralController@CancelledInput')->name('sentra.Cancelled');
//** Previous Button
Route::get('/eprop/prev/SentraPage1','EpropSentralController@SentraPrevPage1')->name('SentraPrevPage1');
Route::get('/eprop/prev/SentraPrevPage2','EpropSentralController@SentraPrevPage2')->name('SentraPrevPage2');
Route::get('/eprop/prev/SentraPrevPage3','EpropSentralController@SentraPrevPage3')->name('SentraPrevPage3');
//Save ** Eproposal
Route::POST('/eprop/SaveEprop','SaveEpropController@SaveEprop')->name('SaveEprop');
//** Proposal dropdown dependent
Route::get('/eprop/getBrand/{company_id}', 'EpropSentralController@getBrand');
Route::get('/eprop/getVarian/{company_id}', 'EpropSentralController@getVarian');
Route::get('/eprop/getActivity/{division_id}', 'EpropSentralController@getActivity');
Route::get('/eprop/getExecutor/{branch_id}/{market_type}', 'EpropSentralController@getExecutor');
Route::get('/eprop/getVarian/{brand_id}', 'EpropSentralController@getVarian');
Route::get('/eprop/getBudgetBreak/{total_budget}','EpropSentralController@getBudgetBreak');
//**Search Eprop
Route::get('/eprop/search', 'EpropSentraSearch@index');
Route::POST('/eprop/submit_search', 'EpropSentraSearch@Search')->name('search.eprop');
//**eprop copy == copy eprop
Route::get('/eprop/copy_eprop/{header_id}', 'EpropSentraCopy@CopySentra')->name('copy.eprop');
Route::POST('/eprop/copy_eprop', 'EpropSentraCopy@CPFirstPage')->name('CPFirstPage');
Route::get('/eprop/print_eprop/{header_id}', 'EpropSentraPrint@PrintSentra')->name('print.eprop');

Route::get('otomatis', function () {
    $AWAL = 'JRD';
    // karna array dimulai dari 0 maka kita tambah di awal data kosong
    // bisa juga mulai dari "1"=>"I"
    $bulanRomawi = array("", "I","II","III", "IV", "V","VI","VII","VIII","IX","X", "XI","XII");
    $noUrutAkhir = \App\Barang::max('no_urut_surat');
    $no = 1;
    if($noUrutAkhir) {
        echo "No urut surat di database : " . $noUrutAkhir;
        echo "<br>";
        echo "Pake Format : " . sprintf("%03s", abs($noUrutAkhir + 1)). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
    }
    else {
        echo "No urut surat di database : 0" ;
        echo "<br>";
      //  echo "Pake Format : " . sprintf("%03s", $no). '/' . $AWAL .'/' . $bulanRomawi[date('n')] .'/' . date('Y');
        echo "Pake Format : " .date('Y'). '/' . $bulanRomawi[date('n')] .'/' .$AWAL.'/' . sprintf("%03s", $no);

    }
});
