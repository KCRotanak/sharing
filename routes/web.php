<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ThesisController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\SubjectController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DepartmentController;

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


// Route::resource('/admin', App\Http\Controllers\DashboardController::class);
// Route::resource('/admin/dashboard', App\Http\Controllers\DashboardController::class);

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/contact', function(){
    return view('frontend.contact');
})->name('contact');
  
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('backend.dashboard.dashboard');
    // Route::get('/admin/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.home');

    Route::resource('/admin/dashboard', DashboardController::class);
    Route::resource('/admin/department', DepartmentController::class);
    Route::resource('/admin/subject', SubjectController::class);
    Route::resource('/admin/thesis', ThesisController::class);
    Route::resource('/admin/user', UserController::class);
    Route::resource('/admin/contact', ContactController::class);
});
  


