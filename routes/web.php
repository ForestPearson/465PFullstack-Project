<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'show')->name('welcome');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile', 'show')->name('profile');
    Route::get('/signup', 'signUp')->name('signup');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'show')->name('admin');
    Route::get('/sync', 'syncDB')->name('sync');
});

Route::post('login', [LoginController::class,'authenticate'])->name('login');

Route::post('logout', [LoginController::class,'authenticate'])->name('logout');

Route::controller(UserController::class)->group(function() {
    Route::get('/authentication', function () {
        // Retrieve a piece of data from the session...
        $value = session('key');
     
        // Specifying a default value...
        $value = session('key', 'default');
     
        // Store a piece of data in the session...
        session(['key' => 'value']);
    });//->name('authenticate');
});