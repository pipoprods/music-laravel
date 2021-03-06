<?php

use Illuminate\Http\Request;

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

Route::get('/artist/count', 'ArtistController@count');
Route::get('/artist', 'ArtistController@index');
Route::get('/artist/{id}/albums', 'ArtistController@albums');
