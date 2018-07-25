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
Route::delete('/master/customer_attr/delPic/{id}', 'CustomerAttr@DeletePIC')->name('delete_pic');
Route::get('/master/customer_attr/GetPArea/{areaID}', 'CustomerAttr@getPersonArea');
Route::get('/master/customer_attr/getMOQ/{fleetID}', 'CustomerAttr@getFleetMOQ');
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

//**FndValue
Route::resource('/activity', 'MtlActivityController');
//
//fnd group values
Route::resource('/master/brand_produk', 'BrandProdController');
//fnd item/produk
Route::resource('/master/produk', 'ProdukController');

Route::resource('/master/company', 'mtlcompanycontroller');



//**** End Master Positions 
//**** Master PositionsMtlJobsController');
//**** End Master Positions 
//**** Master Kategory Activity
Route::resource('/master/kategory', 'MtlKategoryActivityController');
//****
//**** Master  Activity
Route::resource('/master/activity', 'MtlActivityController');