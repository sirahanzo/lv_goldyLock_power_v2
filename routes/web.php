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


//use Carbon\Carbon;
Route::get('/', 'HomeController@index');

//Auth::routes();

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function () {


    //push alarm notification
    Route::get('push-alarm','DashboardController@pushAlarm')->name('push alarm');
    Route::get('push-bell','DashboardController@pushBell')->name('push bell');


    //dashboard group
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('show-dashboard', 'DashboardController@show')->name('ajax dashboard');

    //Update currentpage
    Route::get('ajax-page/{page}','DashboardController@updatePageAjaxRequest')->name('ajax-page');


    //monitoring group
    Route::get('monitoring', 'MonitoringController@index')->name('monitoring');
    //Route::get('show-monitoring/{id}', 'MonitoringController@show')->name('ajax monitoring');
    Route::get('show-monitoring', 'MonitoringController@show')->name('ajax monitoring');


    //rectifier group
    Route::get('rectifier', 'RectifierController@index')->name('rectifier');
    Route::get('show-rectifier', 'RectifierController@show')->name('ajax rectifier');
    Route::post('shutdown-rectifier','RectifierController@shutdown')->name('shutdown rectifier');


    //Setting group
    Route::get('setting-date', 'SettingsController@dateTime')->name('setting date');
    Route::post('save-date', 'SettingsController@saveDateTime')->name('save date');

    Route::get('site-info','SettingsController@siteInfo')->name('site info');
    Route::post('save-site','SettingsController@saveSiteInfo')->name('save site');

    Route::get('setting-network', 'SettingsController@network')->name('setting network');
    Route::post('save-network', 'SettingsController@saveNetwork')->name('save network');
    Route::post('save-snmp', 'SettingsController@saveSNMP')->name('save snmp');

    Route::get('setting-controll', 'SettingsController@controll')->name('setting controll');
    Route::post('save-ac', 'SettingsController@saveAC')->name('save ac');
    Route::post('save-rectifier', 'SettingsController@saveAC')->name('save rectifier');
    Route::post('save-dc', 'SettingsController@saveDC')->name('save dc');
    //todo : tempary all controll save use one route because no verify data
    //Route::post('save-rectifier','SettingsController@saveRectfier')->name('save rectifier');
    Route::post('save-relay', 'SettingsController@saveRelay')->name('save relay');
    //todo: make validation request
    Route::post('save-log', 'SettingsController@saveLog')->name('save log');

    Route::get('read-setting','SettingsController@readSetting')->name('read setting');


    Route::get('setting-alarm', 'SettingsController@alarm')->name('setting alarm');
    Route::post('save-alarm', 'SettingsController@saveAlarm')->name('save alarm');

    Route::get('reboot-system','SettingsController@rebootSystem')->name('reboot system');
    Route::post('reboot','SettingsController@reboot')->name('reboot');

    //user administration
    Route::get('user-administration', 'AdministrationController@index')->name('user administration');
    Route::get('user-show', 'AdministrationController@show')->name('user show');
    Route::get('user-edit/{id}', 'AdministrationController@edit')->name('user edit');
    Route::post('user-save', 'AdministrationController@store')->name('user save');
    Route::post('user-update/{id}', 'AdministrationController@update')->name('user update');
    Route::delete('user-delete/{id}', 'AdministrationController@destroy')->name('user delete');

    //datalog group
    Route::get('datalog', 'DatalogController@index')->name('datalog');
    Route::get('show-datalog', 'DatalogController@show')->name('show datalog');
    Route::get('download-datalog','DatalogController@download' )->name('download datalog');

    //alarmlog group
    Route::get('eventlog', 'AlarmlogController@index')->name('eventlog');
    Route::get('show-eventlog', 'AlarmlogController@show')->name('show eventlog');
    Route::get('download-eventlog', 'AlarmlogController@download')->name('download eventlog');

    //Route::get('debug','SettingsController@debug');



});

//add super user controller

Route::group(['middleware' => 'superadmin'],function (){

    Route::get('super-admin','SuperAdminController@index')->name('super admin');


});

//
//Route::get('dummy',function(){
//   return view('debug.toast');
//})->name('dummy');

