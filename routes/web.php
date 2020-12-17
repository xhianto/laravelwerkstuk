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
    return view('content.index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/user', function () {
        return view('other/user');
    })->name('user');

    Route::group(['middleware' => ['admin']], function () {

        Route::get('/admin', function () {
            return view('other/admin');
        })->name('admin');

    });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('other/about');
})->name('about');

Route::get('geenToegang', function () {
    return view('other/geenToegang');
})->name('geenToegang');
