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

Route::get('/','Controller@index')->name('main_page');
Route::get('/kontakt','Application\MailController@contact')->name('contact_page');

//Route::any('/{url?}','Controller@getContentFromUrl')->name('database.pages');