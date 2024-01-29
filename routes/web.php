<?php

use App\Http\Controllers\Admin\adminpostcontroller;
use App\Http\Controllers\Admin\dashboardcontroller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postcontroller;
use App\Http\Controllers\welcomeconrtoller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [welcomeconrtoller::class, 'index'])->name('welcome');


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Post
Route::post('/post/store', [postcontroller::class, 'store'])->name('posts.store');
Route::get('/post/{postId}/show', [postcontroller::class, 'show'])->name('posts.show');
Route::get('/post/allpost', [HomeController::class, 'allpost'])->name('posts.allpost');
Route::get('/post/{postId}/edit', [postcontroller::class, 'edit'])->name('posts.edit');
Route::post('/post/{postId}/update', [postcontroller::class, 'update'])->name('posts.update');
Route::get('/post/{postId}/delete', [postcontroller::class, 'delete'])->name('posts.delete');


//Admin Route
Route::get('/admin/dashboard', [dashboardcontroller::class, 'index'])->middleware('auth', 'role:admin')->name('admin.dashboard');
Route::get('/admin/alluserposts', [adminpostcontroller::class, 'alluserpost'])->middleware('auth', 'role:admin')->name('admin.allpost');
Route::get('/admin/usermanagement', [adminpostcontroller::class, 'usermanage'])->middleware('auth', 'role:admin')->name('admin.usermanagement');
Route::get('/admin/{userId}/delete', [adminpostcontroller::class, 'deleteuser'])->middleware('auth', 'role:admin')->name('admin.userdelete');

//Profile Icon Part related
Route::get('/profile', 'HomeController@index')->name('profile');
