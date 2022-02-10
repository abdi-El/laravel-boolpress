<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// porta alla api posts
//namespace serve per portarlo alla cartella del controller e grpup serve a raggruppare tutte le rotte con namespace uguale
Route::namespace('Api')->group(function (){ 
    Route::get('/post', 'PostController@index');
    Route::get('/post/{id}', 'PostController@show');
});