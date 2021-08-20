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

Route::group(['middleware' => 'guest'], static function () {
    Route::get('register', fn () => view('guest.register'));
    Route::get('login', [
        'as' => 'login',
        'uses' => fn () => view('guest.login')
    ]);

    Route::post('register', 'App\Http\Controllers\GuestController@register');
    Route::post('login', ['as' => 'login', 'uses' => 'App\Http\Controllers\GuestController@login']);
});

Route::group(['middleware' => 'auth'], static function () {
//    Route::get('', fn () => view('index'));
//    Route::post('import.excel', 'App\Http\Controllers\ExcelController@import')->name('import.excel');
});
