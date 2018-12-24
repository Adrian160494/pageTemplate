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
Route::any('/kontakt','Application\MailController@contact')->name('contact_page');

Route::any('/register','Auth\RegisterController@register')->name('register');
Route::any('/login','Auth\LoginController@login')->name('login');
Route::any('/logout','Auth\LoginController@logout')->name('logout');
Route::any('/activateAccount/{email}/{token}','Auth\RegisterController@activateAccount')->name('activate_account');
Route::any('/register_complete','Auth\RegisterController@registerComplete')->name('register_complete');

//Route::any('/{url?}','Controller@getContentFromUrl')->name('database.pages');