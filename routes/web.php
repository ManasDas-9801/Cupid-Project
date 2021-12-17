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
Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('user.profile');
Route::post('/save/profile', [App\Http\Controllers\HomeController::class, 'update_profile'])->name('save.profile');
Route::get('/prefrence', [App\Http\Controllers\HomeController::class, 'prefrence'])->name('prefrence');

Route::get('google', [App\Http\Controllers\SocialiteAuthController::class, 'googleRedirect'])->name('auth/google');
Route::get('/auth/google-callback', [App\Http\Controllers\SocialiteAuthController::class, 'loginWithGoogle']);
Route::group(['middleware' => 'is_admin'], function () {
    Route::get('admin', [App\Http\Controllers\adminController::class, 'adminDashboard']);
});