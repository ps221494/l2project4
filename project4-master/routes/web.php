<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Models\User;
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


Route::group(['middleware'=>'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/resetpassword/{id}', [AdminController::class, 'resetpassword'])->name('admin.resetpassword');
    Route::put('/admin/updatepassword/{id}', [AdminController::class, 'updatepassword'])->name('admin.updatepassword');
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('customer', CustomerController::class);
    Route::resource('store', StoreController::class);
});

Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('cart', [ProductController::class, 'cartList'])->name('cart.list');
Route::post('cart', [ProductController::class, 'addToCart'])->name('cart.store');
Route::post('order', [ProductController::class, 'addToOrder'])->middleware('auth')->name('cart.order');
Route::get('order', [ProductController::class, 'Order'])->middleware('auth')->name('cart.order');
Route::post('status', [ProductController::class, 'bestellingFinsh'])->middleware('auth')->name('cart.status');
require __DIR__.'/auth.php';
