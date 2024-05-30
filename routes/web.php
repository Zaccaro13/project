<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;

Route::get('/', 'App\Http\Controllers\Controller@mainPage')->name('main.index');
Route::get('/info', 'App\Http\Controllers\Controller@infoAboutMe')->name('info.about');

Route::get('/cinema/listOfCinemas', 'App\Http\Controllers\CinemaController@listOfCinemas')->name('cinema.listOfCinemas');
Route::get('/cinema/listOfCinemas/genre/{id}', 'App\Http\Controllers\CinemaController@listOfCinemas')->name('cinema.listOfCinemasByGenre');
Route::get('/cinema/{id}', 'App\Http\Controllers\CinemaController@cinemaInfo');

Route::get('/admin/createCinema', 'App\Http\Controllers\CinemaController@createCinema')->name('cinema.createCinema');
Route::post('/admin/createCinema', 'App\Http\Controllers\CinemaController@storeCinema')->name('cinema.store');
Route::get('/admin/{id}/edit', 'App\Http\Controllers\CinemaController@editCinema')->name('edit.cinema');
Route::put('/admin/edit/{id}', 'App\Http\Controllers\CinemaController@storeEditedCinema')->name('cinema.storeEdited');
Route::get('/admin/deleteCinema/{id}', 'App\Http\Controllers\CinemaController@deleteCinema')->name('delete.cinema');
Route::get('/admin/restoreCinema/{id}', 'App\Http\Controllers\CinemaController@restoreCinema'); // ONLY BACK

Auth::routes();
//Route::get('/', 'App\Http\Controllers\Controller@mainPage')->name('main.index');
//Route::get('/', 'App\Http\Controllers\Controller@mainPage')->name('main.index');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
