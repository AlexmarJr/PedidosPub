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

Route::post('store', 'LoginController@store')->name('store');
Route::get('Searching','LoginController@searchEnviados')->name('searchEnviados');
Route::get('a4678tyrtrty123hg1y4ugGFE32412f314678tyrtrty123hg1y4ugGFE32412f311fw41fw4d4678tyrtrty123hg1y4ugGFE32412f314678a4678tyrtrty123hg1y4ugGFE32412f314678tyrtrty123hg1y4ugGFE32412f311fw41fw4d4678tyrtrty123hg1y4ugGFE32412f314678', 'LoginController@search')->name('search');
Route::get('/', 'LoginController@login')->name('login');
Route::any('index', 'LoginController@index')->name('index');
Route::any('admin', 'LoginController@admin')->name('admin');
Route::any('hi4678tyrtrty123hg1y4ugGFE32412f311fw4st224678tyrtrty123hg1y4ugGF4678tyrtrty123hg1y4ugGFE32412f311fw4E32412f311f4678tyrtrty123hg1y4ugGFE32412f311fw4w4oric', 'LoginController@historic')->name('historic');
Route::any('logoff', 'LoginController@logoff')->name('logoff');
Route::get('read/{id?}','LoginController@read')->name('read');
Route::get('delete/{id?}','LoginController@delete')->name('delete');
Route::get('changeStatus/{id?}','LoginController@changeStatus')->name('change.admin');
Route::get('deleteAdmin/{id?}','LoginController@deleteAdmin')->name('delete.admin');
Route::any('filter', 'LoginController@filter')->name('filter');
Route::get('Excel/dowload', 'LoginController@export')->name('Excel');
Route::any('Config_user', 'LoginController@config_users')->name('user_configurations');

Route::get('delete/user/{id?}','LoginController@delete_user')->name('delete_user');
Route::get('read/user/{id?}','LoginController@read_user')->name('read_user');
Route::post('store_user', 'LoginController@store_user')->name('store_user');