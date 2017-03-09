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

Route::get('/', 'HomeController@index');
Route::get('/turnout', 'HomeController@turnout');
Route::get('/anonresult', 'HomeController@anon');

Route::post('/vote', 'VoteController@vote')->name('vote');
Route::post('/result', 'VoteController@index');
Route::post('/result/chart', 'VoteController@chart');
Route::post('/result/anonchart', 'VoteController@anonchart');
