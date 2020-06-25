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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@show');

Route::get('/home', 'HomeController@index')->name('home');


//=============Super Admin==========================
Route::group(['as'=>'superadmin.','prefix'=>'superadmin','namespace'=>'SuperAdmin','middleware'=>['auth','superAdmin']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('job/applications/','JobController@index')->name('jobCircular');
    Route::get('job/applications/show/{id}','JobController@show')->name('jobCircular.show');
    Route::put('job/applications/update/{id}','JobController@update')->name('jobCircular.update');
    Route::put('job/applications/{id}','JobController@destroy')->name('jobCircular.destroy');

    Route::resource('leaveApplication','LeaveApplicationController');
    Route::put('leave/application/reject/{id}','LeaveApplicationController@reject')->name('leaveApplication.reject');
    Route::get('own/leave/application/','LeaveApplicationController@ownApplication')->name('ownApplication');

    Route::resource('application','ApplicationController');
    Route::put('application/reject/{id}','ApplicationController@reject')->name('application.reject');

    Route::get('assessment/employees/','AssessmentController@employees')->name('assessment.employees');
    Route::get('assessment/interviwer/{id}','AssessmentController@interviwer')->name('assessment.interviwer');
    Route::post('assessment/invitation/','AssessmentController@invitation')->name('assessment.invitation');

    Route::get('assessment/applications/','AssessmentController@applications')->name('assessment.applications');
    Route::get('assessment/application/{id}','AssessmentController@applicant')->name('assessment.applicant');
    Route::post('assessment/applicant/invitation/','AssessmentController@applicantInvitation')->name('assessment.applicantInvitation');
    Route::get('assessment/result/','AssessmentController@result')->name('assessment.result');
//    Route::resource('assessment','AssessmentController');

    Route::get('present/','DashboardController@present')->name('present');
    Route::get('attendance/report/','LeaveController@attendanceReport')->name('attendance.report');
    Route::get('employees/attendance/report/','LeaveController@attendanceSheet')->name('attendance.sheet');

    Route::get('appointment/lettter/{id}','AssessmentController@appointmentLetter')->name('appointmentLetter');
    Route::post('send/appointment/lettter/','AssessmentController@sendAppointmentLetter')->name('sendAppointmentLetter');

    Route::get('create/user/','AssessmentController@createUser')->name('createUser');
    Route::post('create/user/','AssessmentController@registerUser')->name('registerUser');



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
    Route::resource('designation','DesignationController');

    Route::resource('job','JobController');

    Route::resource('application','LeaveApplicationController');
    Route::put('application/reject/{id}','LeaveApplicationController@reject')->name('application.reject');

    Route::resource('attendance','AttendanceController');
    Route::get('present/report/','LeaveController@attendanceReport')->name('attendance.report');


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
    Route::resource('assessment','AssessmentController');
    Route::get('attendance/report/','LeaveController@attendanceReport')->name('attendance.report');




});

//=============*********Applicant*********==========================

Route::group(['as'=>'applicant.','prefix'=>'applicant','namespace'=>'Applicant','middleware'=>['auth','applicant']], function (){
    Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::resource('application','ApplicationController');

});

Route::group(['middleware'=>['auth']], function (){

    Route::get('applicants/search/','SearchController@applicantSearch')->name('search.applicant');

});



