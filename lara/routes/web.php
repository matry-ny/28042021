<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(static function () {
    Route::get('register', fn () => view('guest.register'));
    Route::get('login', [
        'as' => 'login',
        'uses' => fn () => view('guest.login')
    ]);

    Route::post('register', 'App\Http\Controllers\GuestController@register');
    Route::post('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\GuestController@login']);
});

Route::middleware('auth')->group(static function () {
    Route::get('', [IndexController::class, 'index']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::post('/cart/add-product', [CartController::class, 'addProduct']);
    Route::get('/products/{productId}/add-images', [ProductsController::class, 'addImages']);
    Route::post('/products/{productId}/add-images', [ProductsController::class, 'uploadImages'])
        ->name('products.upload-images');
});
