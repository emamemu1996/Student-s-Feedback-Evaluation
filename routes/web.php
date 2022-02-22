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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('/admin_login_submit', [App\Http\Controllers\Admin\AdminController::class, 'admin_login_submit'])->name('admin_login_submit');


Route::post('/admin_register_submit', [App\Http\Controllers\Admin\AdminController::class, 'admin_register_submit'])->name('admin_register_submit');

Route::get('/admin_logout', [App\Http\Controllers\Admin\AdminController::class, 'admin_logout'])->name('admin_logout');


Route::post('/student_login_submit', [App\Http\Controllers\Student\Student_LoginController::class, 'student_login_submit'])->name('student_login_submit');

Route::get('/student_logout', [App\Http\Controllers\Student\Student_LoginController::class, 'student_logout'])->name('student_logout');

Route::group(['middleware'=>['studentauth']], function(){
//student_Auth
Route::get('student_dash', [App\Http\Controllers\Student\Student_LoginController::class, 'student_dash'])->name('student_dash');
Route::get('student_login', [App\Http\Controllers\Student\Student_LoginController::class, 'student_login'])->name('student_login');
Route::resource('/feedback', App\Http\Controllers\Student\FeedbackController::class);



});



Route::group(['middleware'=>['adminauth']], function(){


    Route::get('admin_login', [App\Http\Controllers\Admin\AdminController::class, 'admin_login'])->name('admin_login');

    Route::get('admin_register', [App\Http\Controllers\Admin\AdminController::class, 'admin_register'])->name('admin_register');

     Route::get('admin_profile', [App\Http\Controllers\Admin\AdminController::class, 'admin_profile'])->name('admin_profile');

     Route::post('admin_profile_submit', [App\Http\Controllers\Admin\AdminController::class, 'admin_profile_submit'])->name('admin_profile_submit');
     
      Route::get('admin_dashboard', [App\Http\Controllers\Admin\AdminController::class, 'admin_dashboard'])->name('admin_dashboard');

      Route::get('view_admin', [App\Http\Controllers\Admin\AdminController::class, 'view_admin'])->name('view_admin');

      Route::post('view_admin_update', [App\Http\Controllers\Admin\AdminController::class, 'view_admin_update'])->name('view_admin_update'); 
        Route::post('view_admin_delete', [App\Http\Controllers\Admin\AdminController::class, 'view_admin_delete'])->name('view_admin_delete');

        //add Faculty

        Route::resource('/faculty_page', App\Http\Controllers\Admin\FacultyController::class);
        Route::resource('/course_page', App\Http\Controllers\Admin\CourseController::class);
        Route::resource('/shift_page', App\Http\Controllers\Admin\ShiftController::class);
        Route::resource('/batch_page', App\Http\Controllers\Admin\BatchController::class);
        Route::resource('/question_page', App\Http\Controllers\Admin\QuestionController::class);
        Route::resource('/teacher_page', App\Http\Controllers\Admin\Teacher_Name_Controller::class);
        Route::resource('/student_page', App\Http\Controllers\Admin\StudentController::class);
       Route::resource('/assign_teacher_page', App\Http\Controllers\Admin\Assign_Teacher_Controller::class);

       Route::get('admin_report', [App\Http\Controllers\Admin\AdminController::class, 'admin_report'])->name('admin_report');
});