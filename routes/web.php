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

Route::get('/', 'LinksController@index')->name('index');
Route::post('/shorten', 'LinksController@shorten')->name('shorten');
Route::get('/{link}', 'LinksController@fetchLink')->name('fetch');

Auth::routes();

Route::get('/link', 'HomeController@index')->name('home');

