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
    return view('auth.login');
});
Route::group(['middleware' => ['auth']], function() {
Route::get('/home1', function () {
    return view('appoint.home1');
});
Route::get('/temp', function () {
    return view('appoint.template');
});
Route::get('/news', function () {
    return view('appoint.news');
});
Route::get('/service', function () {
    return view('appoint.service');
});

Route::get('/appoint', function () {
    return view('appoint.appoint');
});
Route::get('/contact', function () {
    return view('appoint.contact');
});
Route::resource('appoints','Appoints\\AppointsController');
Route::resource('services','Services\\ServicesController');

});

Route::get('/home2', function () {
    return view('appoint.home2');
});

Auth::routes();



Route::get('/home', 'HomeController@index');
Route::get('change-password', function() {
	return view('appoint.change-password'); 
});
Route::post('change-password', 'Auth\UpdatePasswordController@update');

Route::post('/search','SearchController@search');