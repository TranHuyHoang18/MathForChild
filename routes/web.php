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

use Illuminate\Support\Facades\Auth;


Route::get('/','Front\HomeController@index')->name('home');
Route::get('/account/register','Front\HomeController@register')->name('account.register');
Route::get('/account/login','Front\HomeController@login')->name('account.login');

Auth::routes();


Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.auth.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::get('register', 'AdminController@create')->name('admin.register');
    Route::post('register', 'AdminController@store')->name('admin.register.store');
    Route::post('logout', 'Auth\AdminLoginController@logout')->name('admin.auth.logout');

}) ;
Route::prefix('student')->group(function() {
    Route::get('/dashboard','Front\Student\Auth\StudentController@index')->name('student.dashboard');
    Route::get('/register','Front\Student\Auth\StudentController@create')->name('student.register');
    Route::post('/register','Front\Student\Auth\StudentController@store')->name('student.register.store');
    Route::get('/login','Front\Student\Auth\LoginController@login')->name('student.auth.login');
    Route::post('/login','Front\Student\Auth\LoginController@loginStudent')->name('student.auth.loginStudent');
    Route::post('/logout','Front\Student\Auth\LoginController@logout')->name('student.auth.logout');

    Route::post('/joinclass','Front\Student\Classroom\ClassController@xinjoinclass')->name('student.class.xinjoinclass');
    Route::get('/class/','Front\Student\Classroom\ClassController@joinClass')->name('student.class');
    Route::get('/class/detail/{id_class}','Front\Student\Classroom\ClassController@index')->name('student.class.detail');
    Route::get('/class/document','Front\Student\Classroom\ClassController@document')->name('student.class.document');
    Route::get('/class/btvn/{id_class}/{stt_tuan}/{stt}/{id_dang}','Front\Student\Classroom\ClassController@btvn')->name('student.class.btvn');
    Route::post('/class/check_btvn/{id_btvn}','Front\Student\Classroom\ClassController@checkBtvn')->name('student.class.checkBtvn');
    Route::get('/class/luyen_tap/{id_class}/{stt_tuan}/{stt}/{id_dang}','Front\Student\Classroom\ClassController@luyenTap')->name('student.class.luyen_tap');
    Route::post('/class/check_luyentap/{id_luyentap}','Front\Student\Classroom\ClassController@checkLuyenTap')->name('student.class.checkLuyenTap');
    Route::get('/class/chitiet/{id_class}/{stt_tuan}/{stt}/{id_dang}','Front\Student\Classroom\ClassController@chitiet')->name('student.class.chitiet');


}) ;
Route::prefix('teacher')->group(function() {
    // loginlogout./../
    Route::get('/','Front\Teacher\Auth\TeacherController@index')->name('teacher.dashboard');
    Route::get('/dashboard','Front\Teacher\Auth\TeacherController@index')->name('teacher.dashboard');
    Route::get('/register','Front\Teacher\Auth\TeacherController@create')->name('teacher.register');
    Route::post('/register','Front\Teacher\Auth\TeacherController@store')->name('teacher.register.store');
    Route::get('/login','Front\Teacher\Auth\LoginController@login')->name('teacher.auth.login');
    Route::post('/login','Front\Teacher\Auth\LoginController@loginTeacher')->name('teacher.auth.loginTeacher');
    Route::post('/logout','Front\Teacher\Auth\LoginController@logout')->name('teacher.auth.logout');

    //! - out
    Route::get('/class/home','Front\Teacher\TeacherController@home')->name('teacher.class.home');
    Route::get('/class/create','Front\Teacher\ClassController@create')->name('teacher.class.create');
    Route::post('/class/create','Front\Teacher\ClassController@store')->name('teacher.class.store');
    Route::get('/class/delete/{id}','Front\Teacher\ClassController@delete')->name('teacher.class.delete');
    Route::get('/class/detail/{id}','Front\Teacher\TeacherController@detail')->name('teacher.class.detail');

    Route::get('/class/notification/create','Front\Teacher\TeacherController@create_notification')->name('teacher.class.notification.form');
    Route::post('/class/notification/create/{id_class}','Front\Teacher\NotificationController@addNotification')->name('teacher.class.notification.add');
    Route::get('/class/notification/delete/{id_class}/{id_notifi}','Front\Teacher\NotificationController@delete')->name('teacher.class.notification.delete');
    Route::post('/class/notification/edit/{id_class}/{id_notifi}','Front\Teacher\NotificationController@edit')->name('teacher.class.notification.edit');
    Route::get('/class/list_notification','Front\Teacher\NotificationController@list_notification')->name('teacher.class.notification.home');

    Route::get('/class/document','Front\Teacher\TeacherController@list_document')->name('teacher.class.document');
    Route::get('/class/document/add','Front\Teacher\DocumentController@add')->name('teacher.class.document.add');
    Route::post('/class/document/add/{id_class}','Front\Teacher\DocumentController@store')->name('teacher.class.document.store');
    Route::post('/class/search/student/{id_class}','Front\Teacher\ClassController@search')->name('teacher.class.student.search');


    Route::post('/class/exercise/{id_class}/{id_week}','Front\Teacher\ExerciseController@create')->name('teacher.class.exercise.create');
    Route::get('/class/week/edit/{id_class}/{id_week}','Front\Teacher\TeacherController@editWeek')->name('teacher.class.week.editweek');
    Route::get('/class/week/add/{id_class}','Front\Teacher\TeacherController@addWeek')->name('teacher.class.week.add');
    Route::post('/class/week/add/{id_class}/{stt_week}','Front\Teacher\TeacherController@storeWeek')->name('teacher.class.week.store');

    Route::get('/student_detail/{id_student}','Front\Teacher\TeacherController@studentDetail')->name('teacher.studentdetail');

});
Route::prefix('parent')->group(function() {
    Route::get('/','Front\Parent\Auth\ParentController@index')->name('parent.dashboard');
    Route::get('/dashboard','Front\Parent\Auth\ParentController@index')->name('parent.dashboard');
    Route::get('/register','Front\Parent\Auth\ParentController@create')->name('parent.register');
    Route::post('/register','Front\Parent\Auth\ParentController@store')->name('parent.register.store');
    Route::get('/login','Front\Parent\Auth\LoginController@login')->name('parent.auth.login');
    Route::post('/login','Front\Parent\Auth\LoginController@loginParent')->name('parent.auth.loginParent');
    Route::post('/logout','Front\Parent\Auth\LoginController@logout')->name('parent.auth.logout');

}) ;
