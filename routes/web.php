<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NieuwsItemsController;

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

Route::group(['prefix' => 'nieuws'], function () {
    Route::get('/', [NieuwsItemsController::class, 'nieuws'])->name('nieuws');

    //alleen admin recht
    Route::group(['middleware' => ['admin']], function () {
        Route::post('/', [NieuwsItemsController::class, 'nieuwstoevoegen'])->name('nieuws');
        Route::post('bewerkverwijder', [NieuwsItemsController::class, 'bewerkverwijder'] )->name('bewerkverwijder');
//        Route::get('verwijder', function () {
//            return view('nieuws.verwijder');
//        });
        Route::post('verwijder', [NieuwsItemsController::class, 'verwijder'])->name('verwijder');
        Route::post('bewerk', [NieuwsItemsController::class, 'bewerk'])->name('bewerk');
    });
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('other/about');
})->name('about');

Route::get('geenToegang', function () {
    return view('other/geenToegang');
})->name('geenToegang');
