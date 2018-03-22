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

Auth::routes();
/*************************** Dashboard ***************************/
Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
Route::get('/chart', 'AdminController@chart')->name('chart');
Route::get('/user', 'AdminController@users')->name('user');
Route::get('/store', 'AdminController@store')->name('store');
Route::get('/covenant', 'AdminController@covenant')->name('covenant');
Route::get('/register','AdminController@register')->name('register');
Route::post('/register','AdminController@registerUser');
Route::get('/edit','AdminController@editDatastore')->name('edit');
Route::post('/edit','AdminController@saveDataChange');
Route::get('/pdf','PDFController@index');

/*******************************Ajax controller**********************/
Route::post('/user', 'AjaxController@user');
Route::post('/store','AjaxController@datastorenotify');
Route::post('/storetype','AjaxController@storetype');
Route::get('/notification','AjaxController@notifyheader');

/******************************************************************/



Route::get('/', function () {

   return view('welcome');
});



Route::get('/home', 'HomeController@index')->name('home');
