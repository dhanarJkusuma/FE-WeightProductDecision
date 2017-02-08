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

Route::get('/home', 'HomeController@index');

Route::resource('cpenerima','CPenerimaController');
Route::resource('kriteria','KriteriaController');
Route::get('/nilai/create/{penerima}', 'NilaiController@create')->name('nilai.create');
Route::post('/nilai/create/{penerima}', 'NilaiController@store')->name('nilai.create');