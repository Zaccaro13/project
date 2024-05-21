<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CinemaController;

Route::get('/', 'App\Http\Controllers\Controller@mainPage');
Route::get('/info', 'App\Http\Controllers\Controller@infoAboutMe');

Route::get('/cinema/listOfCinemas', 'App\Http\Controllers\CinemaController@listOfCinemas');
Route::get('/cinema/{name}', 'App\Http\Controllers\CinemaController@cinemaInfo');

Route::get('/admin/createCinema', 'App\Http\Controllers\CinemaController@createCinema');
Route::get('/admin/editCinema/{id}', 'App\Http\Controllers\CinemaController@editCinema');
Route::get('/admin/deleteCinema/{id}', 'App\Http\Controllers\CinemaController@deleteCinema');
Route::get('/admin/restoreCinema/{id}', 'App\Http\Controllers\CinemaController@restoreCinema'); // ONLY BACK
