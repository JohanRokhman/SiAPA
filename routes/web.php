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

Route::get('/settingprofil', function () {
    return view('settingprofil');
});
Route::put('/Settingprofil/{id}', 'PelakuUsahaController@edit');
Route::get('/dashboard/{id}', 'PelakuUsahaController@chart');

Route::get('/pelakuusaha/{data_id}', 'PelakuUsahaController@editdata');
Route::get('/pelakuusaha', function () {
    return view('pelakuusaha ');
});
Route::get('/editpelakuusaha', function () {
    return view('editpelakuusaha ');
});
Route::get('/penghasilan', function () {
    return view('penghasilan');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/pelakuusaha/tambahdata', 'PelakuUsahaController@tambahData');
Route::post('/pelakuusaha/proses_tambahdata', 'PelakuUsahaController@proses_tambahData');
Route::post('/pelakuusaha/penghasilan', 'PelakuUsahaController@penghasilan');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
