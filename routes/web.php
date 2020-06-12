<?php

use Illuminate\Support\Facades\Route;

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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//=============Super Admin==========================
Route::group(['as'=>'superadmin.','prefix'=>'superadmin','namespace'=>'SuperAdmin','middleware'=>['auth','superAdmin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
});
//=============***** Admin********==========================

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('leave/list/','DashboardController@list')->name('leave.list');
    Route::get('leave/list/{id}','DashboardController@delete')->name('leave.delete');

    Route::resource('leaveType','LeaveTypeController');
    Route::resource('leave','LeaveController');

    Route::get('leave/approve/','LeaveController@approve')->name('leave.approve');
    Route::get('leave/reject/','LeaveController@reject')->name('leave.reject');


    Route::get('present/','DashboardController@present')->name('present');

    Route::resource('department','DepartmentController');

    Route::resource('job','JobController');

////================*****Leave Type*****========================
//    Route::get('leave/type/list', 'LeaveTypeController@index')->name('leaveType.index');
//    Route::get('leave/type/', 'LeaveTypeController@create')->name('leaveType.create');
//    Route::post('leave/type/store', 'LeaveTypeController@store')->name('leaveType.store');
//    Route::get('leave/type/edit/{id}', 'LeaveTypeController@edit')->name('leaveType.edit');
//    Route::post('leave/type/update', 'LeaveTypeController@update')->name('leaveType.edit');


});

//=============*******User***********==========================

Route::group(['as'=>'user.','prefix'=>'user','namespace'=>'User','middleware'=>['auth','user']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::resource('leave','LeaveController');

    Route::get('present/','DashboardController@present')->name('present');




});

//=============*********Applicant*********==========================

Route::group(['as'=>'applicant.','prefix'=>'applicant','namespace'=>'Applicant','middleware'=>['auth','applicant']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');


});

