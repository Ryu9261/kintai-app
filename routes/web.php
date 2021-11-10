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
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');
Route::get('/user_login', 'HomeController@login')->name('user_login');
Route::get('/home', 'HomeController@home')->name('home');

Route::get('/attend', 'AttendanceController@index')->name('attend');
Route::get('/attend/attendance', 'AttendanceController@attend')->name('attendance');
Route::get('/attend/attendance/edit', 'AttendanceController@create')->name('attendance_result');
Route::post('/attend/attendance/update', 'AttendanceController@update')->name('attendance_result');
Route::get('/attend/attendance/delete', 'AttendanceController@delete')->name('attendance_result');



Route::get('/manager', 'ManagerController@index')->name('manager');
Route::get('/manager/staff', 'ManagerController@staff')->name('staff');
Route::get('/manager/staff/add', 'ManagerController@add')->name('staffAdd');
Route::post('/manager/staff/add', 'ManagerController@create')->name('staffAdd');
Route::get('/manager/staff/edit', 'ManagerController@edit')->name('staffUpdate');
Route::post('/manager/staff/edit', 'ManagerController@update')->name('staffUpdate');
Route::post('/manager/staff/delete', 'ManagerController@delete')->name('staffUpdate');
Route::get('/manager/wage', 'ManagerController@wage')->name('wage');
Route::get('/manager/timecardStaff', 'ManagerController@timecardStaff')->name('timecardStaff');
Route::get('/manager/timecard', 'ManagerController@timecard')->name('timecard');
Route::post('/manager/timecard2', 'ManagerController@timecard2')->name('timecard2');
Route::get('/manager/timecard/edit', 'ManagerController@time_edit')->name('timecard');
Route::post('/manager/timecard/edit', 'ManagerController@time_update')->name('timecard');
Route::post('/manager/timecard/delete', 'ManagerController@time_delete')->name('timecard');
