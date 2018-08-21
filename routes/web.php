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

Route::group(['as'=>'admin.', 'prefix'=>'admin', 'namespace'=>'Admin', 'middleware'=>['auth', 'admin']], function () {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');

  Route::get('user', 'UserController@index')->name('user.index');
  Route::get('user/create', 'UserController@create')->name('user.create');
  Route::post('user/','UserController@store')->name('user.store');
});

Route::group(['as'=>'member.', 'prefix'=>'member', 'namespace'=>'Member', 'middleware'=>['auth', 'member']], function () {
  Route::get('dashboard', 'DashboardController@index')->name('dashboard');
});
