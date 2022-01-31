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
    return view('guests.home');
});

Auth::routes();

// poichè ho il backoffice mi serve un modo per accedere alla cartella Admin nei controlles:
Route::middleware('auth')
->namespace('Admin')  // mira alla cartella controllers/Admin
->name('admin.') //aggiunge alle rotte admin.
->prefix('admin') //nell'url avremo /admin/
->group(function() { // tutte le rotte qui dentro donvranno avere l'autenticazione
    Route::get('/', 'HomeController@index')->name('home');
});

Route::get('{any?}', function () {
    return view('guests.home');
})->where('any', '.*'); // premette di reindirezzare alla pagina home peri i guests ogni qual volta che la route non esiste 