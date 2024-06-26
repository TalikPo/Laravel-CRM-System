<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SubjectController;
use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', [HomeController::class, 'index']);

	Route::get('user-management', [UserController::class, 'index'])->name('user-management');

	Route::get('add_new_user', [UserController::class, 'create'])->name('user.index');
	Route::post('add_new_user', [UserController::class, 'store'])->name('user.store');
	Route::get('all_students', [UserController::class, 'show'])->name('all_students');
	Route::get('edit_user/{user_id}', [UserController::class, 'edit'])->name('user.edit');
	Route::put('update_user/{user_id}', [UserController::class, 'update'])->name('user.update');		
	Route::delete('user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
	Route::get('all_students/{id}', [UserController::class, 'showStudentsByGroup']);

	Route::get('subject_management', [SubjectController::class, 'index']);
	Route::post('subject_management', [SubjectController::class, 'store']);
	Route::delete('subject_management/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

	Route::get('schedule_management', [ScheduleController::class, 'index']);
	Route::post('schedule_management', [ScheduleController::class, 'store']);
	Route::delete('schedule_management', [ScheduleController::class, 'destroy'])->name('schedule.destroy');

	Route::get('group_management', [GroupController::class, 'index']);
	Route::post('group_management', [GroupController::class, 'store']);
	Route::get('all_groups', [GroupController::class, 'show']);
	Route::delete('group_management}', [GroupController::class, 'destroy'])->name('group.destroy');

	Route::get('role_management', [RoleController::class, 'index']);
	Route::post('role_management', [RoleController::class, 'store']);
	Route::delete('role_management/{id}', [RoleController::class, 'destroy'])->name('role.destroy');	

	Route::get('profile', [InfoUserController::class, 'index']);
	Route::get('edit_profile', [InfoUserController::class, 'create']);
	Route::post('edit_profile', [InfoUserController::class, 'store']);

	Route::get('schedule', [ScheduleController::class, 'index']);

    //Route::get('static-sign-in', function () { return view('static-sign-in'); })->name('sign-in');
    //Route::get('static-sign-up', function () { return view('static-sign-up'); })->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);

	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
});



Route::group(['middleware' => 'guest'], function () {
	
	Route::get('/login', [SessionsController::class, 'create'])->name('login');
	Route::post('/session', [SessionsController::class, 'store']);

    Route::get('/register', [UserController::class, 'create']);
    Route::post('/register', [UserController::class, 'store']);

	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');

	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});