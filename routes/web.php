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
    return view('auth/login');

});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('dashboard/{id}/{datefrom}/{dateto}', 'DashboardController@dashboardrecords');
Route::get('bargraph/{id}/{datefrom}/{dateto}', 'DashboardController@bargraph');

Route::resource('users','UsersController');
Route::resource('cards','CardsController');
Route::resource('businesses','BusinessesController');
Route::resource('cardsusers','CardsUsersController');
Route::get('/dashboard','DashboardController@index');