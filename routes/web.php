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

/**
 * Landing page //
 * 
 * 
 */ 
Route::get('/', function () {
    return view('welcome');
});


/**
 * Auth routes
 * 
 * 
 */ 
Auth::routes();


/**
 * Upload csv , membership information 
 * 
 * 
 */ 
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/import_parse', 'HomeController@parseImport')->name('import_parse');
Route::post('/import_process', 'HomeController@processImport')->name('import_process');

/**
 * Start encoding controller 
 * 
 * 
 */ 
Route::get('/start', 'StartEncodingController@index')->name('start');
Route::any('/searcharea','StartEncodingController@searchArea')->name('search');
Route::get('household/{eacode}','StartEncodingController@household')->name('household');
Route::get('/other50/{eacode}', 'StartEncodingController@other50')->name('other50');
Route::post('insertOther50','StartEncodingController@insertOther50')->name('insertOther50');


/**
 * Form 6.0
 * 
 * 
 */ 
Route::POST('insertF60','StartEncodingController@insertF60')->name('insertF60');
Route::any('updateF60/{id}','StartEncodingController@updateF60')->name('updateF60');


/**
 * Form 6.1
 * 
 * 
 */ 
Route::get('membership/{eacode}/{hcn}/{shsn}','StartEncodingController@membership')->name('membership');
Route::get('membership/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}/{mp}','StartEncodingController@membershipEncode')->name('membership_encode');
Route::POST('insertRecord','StartEncodingController@insertRecord')->name('insertRecord');
Route::get('membershipview/{eacode}/{hcn}/{shsn}','StartEncodingController@membershipView')->name('membership_view');
Route::get('membershipedit/{eacode}/{hcn}/{shsn}/{membercode}/{id}/edit','StartEncodingController@membershipEdit')->name('membership_edit');
Route::any('insertupdate/{id}','StartEncodingController@membershipUpdate')->name('insertUpdate');

/**
 * Form 6.3
 * 
 * 
 */ 
Route::get('foodrecord/{eacode}/{hcn}/{shsn}','StartEncodingController@foodrecordIndex')->name('foodrecord');
Route::POST('addRecord','StartEncodingController@addRecord')->name('addRecord');
Route::get('record/{eacode}/{hcn}/{shsn}','StartEncodingController@viewRecord')->name('foodrecord_view');
Route::get('record/{eacode}/{hcn}/{shsn}/{id}/edit','StartEncodingController@editRecord')->name('foodrecord_edit');
Route::any('updaterecord/{id}', 'StartEncodingController@updateRecord')->name('updateRecord');


/**
 * Form 7.0
 * 
 * 
 */ 
Route::POST('insertF70','StartEncodingController@insertF70')->name('insertF70');
Route::any('updateF70/{id}','StartEncodingController@updateF70')->name('updateF70');



/**
 * Form 7.2
 * 
 * 
 */ 
Route::get('foodrecall/{eacode}/{hcn}/{shsn}','StartEncodingController@foodrecall')->name('foodrecall');
Route::get('foodrecall/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}','StartEncodingController@foodrecallEncode')->name('foodrecall_encode');
Route::get('foodrecallday/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}/{day}','StartEncodingController@foodRecallDay')->name('foodrecall_day');
Route::POST('insertRecall','StartEncodingController@insertRecall')->name('insertRecall');
Route::get('foodrecalldayview/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}/{day}','StartEncodingController@foodRecallDayView')->name('foodrecall_view');
Route::get('recall/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}/{day}/{id}/edit','StartEncodingController@editRecall')->name('foodrecall_edit');
Route::any('updaterecall/{id}', 'StartEncodingController@updateRecall')->name('updateRecall');


/**
 * Form 7.4 
 * 
 * 
 */ 
Route::get('foodrecallf74/{eacode}/{hcn}/{shsn}/{member_code}/{givenname}/{surname}/{age}/{sex}/{psc}','StartEncodingController@foodRecallF74')->name('foodrecall_f74');
Route::POST('insert74','StartEncodingController@insertForm74')->name('insertF74');
Route::any('updatef74/{id}', 'StartEncodingController@updateF74')->name('updateF74');


/**
 * Add Visitor
 * 
 * 
 * 
 */
Route::get('/addVisitor/{eacode}/{hcn}/{shsn}', 'StartEncodingController@addVisitor')->name('addVisitor');


/**
 * Export Report
 * 
 * 
 * 
 */
Route::get('/exportReport', 'ExportReportController@exportReport')->name('exportReport');


/**
 * Count Total
 * 
 * 
 * 
 */
Route::get('/countReport', 'CountController@index')->name('countReport');



/**
 * Data Transmission
 * 
 * 
 * 
 */
Route::get('/transmit', 'DataTransmissionController@index')->name('transmit');


/**
 * Sending Data
 * 
 * 
 * 
 */
Route::get('/transmission/{eacode}','SendDataController@transmission')->name('transmission');


/**
 * Backup Data
 * 
 * 
 * 
 */
Route::get('/backup','BackupDataController@backup')->name('backup');