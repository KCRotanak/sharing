<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BookController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\BrowseController;
use App\Http\Controllers\Frontend\ContactUsController;

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



Route::get('/contact', [ContactUsController::class, 'create'])->name('contactus.create');
Route::post('/contact', [ContactUsController::class, 'store'])->name('contactus.store');

Route::get('/browse', [BrowseController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);

// Route::get('/browse', function(){
//     return view('frontend.browse');
// })->name('browse');
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

    Route::resource('/admin/user', UserController::class);
    
    Route::resource('/admin/contacts', ContactController::class);

    Route::resource('/admin/teachers', App\Http\Controllers\Backend\TeacherController::class);
    Route::resource('/admin/departments', App\Http\Controllers\Backend\DepartmentController::class);
    

    Route::get('/admin/books',[BookController::class,'index'])->name('backend.books.index');
    Route::get('/admin/book/upload',[BookController::class,'upload'])->name('backend.books.upload');
    Route::post('/uploadbook',[BookController::class,'store']);
    Route::get('/show',[BookController::class,'show']);
    Route::get('/download/{file}',[BookController::class,'download'])->name('backend.book.download');
    Route::get('/view/{is}',[BookController::class,'view']);

    Route::delete('delete/book/{id}', [BookController::class, 'destroy'])->name('backend.books.destroy');
});
  


