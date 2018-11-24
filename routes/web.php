<?php

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

Route::get('/welcome','Controller@welcome');
Route::get('/greeting','Controller@greeting');

Route::any('/{url?}','Controller@getContentFromUrl')->name('database.pages');