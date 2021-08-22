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
    return view('welcome');
});

Route::get('/', function () {
    return view('index');
});
Route::get('/lviv', 'MainController@processApiGuzzle')
    ->name('weather.lviv');
Route::get('/kharkiv', 'MainController@processApiCurl')
    ->name('weather.kharkiv');
