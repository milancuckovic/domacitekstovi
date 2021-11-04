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


Auth::routes();
Route::get('/', 'PagesController@welcome');
Route::get('/onama','PagesController@about');
Route::get('/kontakt','PagesController@contact');
Route::post('/kontakt',['uses'=>'ContactsController@kontakt']);

Route::get('/home', 'HomeController@index');
Route::get('/admin-home', 'HomeController@index');

Route::get('/tekstpesme/{id}','SongsController@show');
Route::post('/obrisi/{id}','SongsController@destroy');
Route::post('tekstpesme/{id}/izmeni','SongsController@edit');
Route::get('/dodajtekst','SongsController@create');
Route::post('/store','SongsController@store');
Route::post('/update/{id}','SongsController@update');


Route::get('/autor/{id}','ArtistsController@show');
Route::post('/autor/obrisi/{id}','ArtistsController@destroy');
Route::post('/autor/{id}/izmeni','ArtistsController@edit');
Route::get('/autor-dodaj','ArtistsController@create');
Route::post('/autor/store','ArtistsController@store');
Route::post('/autor/update/{id}','ArtistsController@update');





