<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\PurchaseController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SupplierController;
use App\Http\Controllers\Backend\UnitController;
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

        Route::group(['prefix'=> 'roles','as'=>'roles.'], function(){
            /**
             * Role & Permission
             */
            Route::resource('rolePermission',RoleController::class);
        });

        Route::group(['prefix'=> 'supplier','as'=>'supplier.'], function(){
            /**
            * Manage Supplier
            */
            Route::get('/',[SupplierController::class, 'index'])->name('list');
            Route::get('/create',[SupplierController::class, 'create'])->name('create');
            Route::post('/store',[SupplierController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[SupplierController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[SupplierController::class, 'update'])->name('update');
            Route::post('/delete/{id}',[SupplierController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=> 'customer','as'=>'customer.'], function(){
            /**
            * Manage Customer
            */
            Route::get('/',[CustomerController::class, 'index'])->name('list');
            Route::get('/create',[CustomerController::class, 'create'])->name('create');
            Route::post('/store',[CustomerController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[CustomerController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[CustomerController::class, 'update'])->name('update');
            Route::post('/delete/{id}',[CustomerController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=> 'unit','as'=>'unit.'], function(){
            /**
            * Manage Unit
            */
            Route::get('/',[UnitController::class, 'index'])->name('list');
            Route::get('/create',[UnitController::class, 'create'])->name('create');
            Route::post('/store',[UnitController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[UnitController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[UnitController::class, 'update'])->name('update');
            Route::post('/delete/{id}',[UnitController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=> 'categories','as'=>'categories.'], function(){
            /**
            * Manage Category
            */
            Route::get('/',[CategoryController::class, 'index'])->name('list');
            Route::get('/create',[CategoryController::class, 'create'])->name('create');
            Route::post('/store',[CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[CategoryController::class, 'update'])->name('update');
            Route::post('/delete/{id}',[CategoryController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=> 'products','as'=>'products.'], function(){
            /**
            * Manage Category
            */
            Route::get('/',[ProductController::class, 'index'])->name('list');
            Route::get('/create',[ProductController::class, 'create'])->name('create');
            Route::post('/store',[ProductController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[ProductController::class, 'update'])->name('update');
            Route::post('/delete/{id}',[ProductController::class, 'destroy'])->name('destroy');
        });

        Route::group(['prefix'=> 'purchase','as'=>'purchase.'], function(){
            /**
            * Manage Purchase
            */
            Route::get('/',[PurchaseController::class, 'index'])->name('list');
            Route::get('/create',[PurchaseController::class, 'create'])->name('create');
            Route::post('/store',[PurchaseController::class, 'store'])->name('store');
            Route::get('/pending',[PurchaseController::class, 'pendingList'])->name('pending');
            Route::post('/delete/{id}',[PurchaseController::class, 'destroy'])->name('destroy');
            Route::get('/approve/{id}',[PurchaseController::class, 'approve'])->name('approve');

        });

        Route::group(['prefix'=> 'default','as'=>'default.'], function(){
            /**
            * Default Route
            */
            Route::get('/get-category',[DefaultController::class, 'getCategory'])->name('get-category');
            Route::get('/get-product',[DefaultController::class, 'getProduct'])->name('get-product');
        });

    });
});
