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
Route::resource('news','NewsController');
Route::get('/template', function () {
    return view('template_nav');
});
// Route::get('/temp', function () {
//     return view('appoint.template');
// });
// Route::get('/news', function () {
//     return view('appoint.news');
// });
Route::resource('infos','InformationsController');
Route::get('/service', function () {
    return view('appoint.service');
});
Route::delete('/changestatus','UsersController@changestatus');
Route::get('edit/{id}/user', 'UsersController@edit');
Route::get('show/{id}/user', 'UsersController@show');
Route::get('/news', function () {
    return view('appoint.index_info');
});
Route::get('/add_news', function () {
    return view('appoint.create_info');
});
Route::get('/appoint', function () {
    return view('appoint.appoint');
});
Route::get('/contact', function () {
    return view('appoint.contact');
});
// Route::get('/index', function () {
//     return view('appoint.index_1');
// });
Route::get('/test', function () {
    return view('appoint.test');
});
Route::get('/111', function () {
    return view('appoint.date_header');
});
Route::get('delete/{id}/user', 'UsersController@deleteuser');
Route::resource('appoints','Appoints\\AppointsController');
Route::resource('services','Services\\ServicesController');
Route::get('/index_1','ShowsController@show');
Route::delete('/selectdelete','Appoints\\AppointsController@selectdelete');
Route::delete('/selectconfirm','Appoints\\AppointsController@selectconfirm');
Route::get('/appoints_1','ShowsController@show_1');
Route::get('/appoints_2','ShowsController@show_2');
Route::get('/showalluser','ShowsController@show_alluser');
Route::get('/infos_1','InformationsController@show_1');
Route::get('/infos_2','InformationsController@show_2');
});
/*Route::get('/home2', function () {
    return view('appoint.home2');
});
*/
Auth::routes();
Route::post('/change-password', 'Auth\UpdatePasswordController@update');
Route::get('/change-password', function () {
    return view('appoint.change-password');
});
Route::get('/header', function () {
    return view('appoint.header');
});
Route::post('/edit_profile', 'Auth\UpdatePasswordController@updateProfile');
Route::get('/profile','ShowsController@showProfile');
Route::post('/search','SearchController@search');
Route::get('/search','SearchController@search');
Route::post('/searchs','SearchController@searchs');
Route::get('/searchs','SearchController@searchs');
Route::get('/showstaff/{name}','Appoints\\AppointsController@showstaff');
//Route::get('/home', 'HomeController@index');
Route::get('change-password', function() {
    return view('appoint.change-password'); 
});