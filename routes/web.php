<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ThesisController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;

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

Route::get('/contact', [ContactUsController::class, 'create'])->name('contactus.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contactus.store');

Route::get('/browse', function(){
    return view('frontend.browse');
})->name('browse');
Auth::routes();
Route::get('/bookdetail', function(){
    return view('frontend.bookdetail');
})->name('bookdetail');
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
  
    Route::get('/admin', [DashboardController::class, 'index'])->name('backend.dashboard.dashboard');
    // Route::get('/admin/dashboard', [App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('admin.home');
    Route::resource('/admin/dashboard', DashboardController::class);   
    // Route::resource('/admin/thesis', ThesisController::class);
    Route::resource('/admin/user', UserController::class);
    
    Route::resource('/admin/contact', ContactController::class);

    Route::resource('teachers', App\Http\Controllers\Backend\TeacherController::class);
    Route::resource('departments', App\Http\Controllers\Backend\DepartmentController::class);
    

    Route::get('/admin/thesis',[BookController::class,'index']);
    Route::get('/upload',[BookController::class,'upload']);
    Route::post('/uploadthesis',[BookController::class,'store']);
    Route::get('/show',[BookController::class,'show']);
    Route::get('/download/{file}',[BookController::class,'download']);
    Route::get('/view/{is}',[BookController::class,'view']);
});
  


