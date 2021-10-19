<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserProfileController;
use App\Http\Controllers\Frontend\FrontendController;
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

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function(){
    /**
    * Admin Dashboard
    */
    Route::get('/admin/home', [HomeController::class, 'adminIndex'])->name('admin.home');
    Route::group(['prefix'=> 'admin','as'=>'admin.'], function(){
        /**
         * Manage User
         */
        Route::resource('users',UserController::class);

        Route::group(['prefix'=> 'user','as'=>'user.'], function(){
        /**
        * Manage User Profile
        */
        Route::get('profile',[UserProfileController::class, 'show'])->name('profile.show');
        Route::get('profile/edit',[UserProfileController::class, 'edit'])->name('profile.edit');
        Route::post('profile/update/{id}',[UserProfileController::class, 'update'])->name('profile.update');

        Route::get('password/change',[UserProfileController::class, 'userPasswordChangeView'])->name('password.change');
        Route::post('password/change',[UserProfileController::class, 'userPasswordChangeUpdate'])->name('password.update');
        });
    });
});
