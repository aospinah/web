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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('oas', 'OaController');
Route::get('preview/{prev}', 'OaController@preview')->name('preview');

Route::get('/getTopics/{taxonomy}', 'TopicController@getByTax')->name('gettopics');
Route::get('/getobjective/{topic}', 'TopicController@getObjective')->name('getobjective');