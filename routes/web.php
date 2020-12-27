<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NieuwsItemsController;
use App\Http\Controllers\GebruikersBeheerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfielController;

//use Illuminate\Foundation\Auth\EmailVerificationRequest;
//use Illuminate\Http\Request;

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
    return redirect(route('nieuws'));
});

Auth::routes();

//nieuws
Route::group(['prefix' => 'nieuws'], function () {
    Route::get('/', [NieuwsItemsController::class, 'nieuws'])->name('nieuws');

    //alleen admin recht
    Route::group(['middleware' => ['admin']], function () {
        Route::post('/', [NieuwsItemsController::class, 'nieuwstoevoegen'])->name('nieuws');
        Route::post('bewerkverwijder', [NieuwsItemsController::class, 'bewerkverwijder'] )->name('bewerkverwijder');
        Route::get('verwijder/{id}', [NieuwsItemsController::class, 'verwijder'])->name('verwijder');
        Route::post('verwijderen', [NieuwsItemsController::class, 'verwijderen'])->name('verwijderen');
        Route::get('bewerk/{id}', [NieuwsItemsController::class, 'bewerk'])->name('bewerk');
        Route::post('bewerken', [NieuwsItemsController::class, 'bewerken'])->name('bewerken');
    });
});

Route::group(['prefix' => 'gebruikersbeheer'], function () {
    Route::group(['middleware' => ['admin']], function () {
        Route::get('/', [GebruikersBeheerController::class, 'index'])->name('gebruikersbeheer');
        Route::post('gebruikernaarbeheerder', [GebruikersBeheerController::class, 'gebruikerNaarBeheerder'])->name('gebruikerNaarBeheerder');
        Route::post('beheerdernaargebruiker', [GebruikersBeheerController::class, 'beheerderNaarGebruiker'])->name('beheerderNaarGebruiker');
        Route::post('beheerregistreer', [GebruikersBeheerController::class, 'beheerRegistreer'])->name('beheerRegistreer');
    });

});

Route::group(['prefix' => 'profiel'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/{username}', [ProfielController::class, 'profiel'])->name('profiel');
        Route::post('/{username}', [ProfielController::class, 'opslaan'])->name('profielopslaan');

        Route::group(['middleware' => ['admin']], function () {
        });
    });
});

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/sendEmail', [ContactController::class, 'sendEmail'])->name('sendEmail');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('about', function () {
    return view('other/about');
})->name('about');

Route::get('geenToegang', function () {
    return view('other/geenToegang');
})->name('geenToegang');

