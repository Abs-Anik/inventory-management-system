<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth'])->group(function(){
    /**
    * Admin Dashboard
    */
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){
        /**
         * Manage User
         */
        Route::resource('users',UserController::class);

        /**
         * Manage User Profile
         */
        Route::get('/user/profile',[UserProfileController::class, 'show'])->name('user.profile.show');
        Route::get('/user/profile/edit',[UserProfileController::class, 'edit'])->name('user.profile.edit');
        Route::post('/user/profile/update/{id}',[UserProfileController::class, 'update'])->name('user.profile.update');
    });
});
