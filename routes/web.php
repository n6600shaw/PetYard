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

Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/home','StaticPagesController@home')->name('home');
Route::get('/about','StaticPagesController@about')->name('about');
Route::get('/signup','UsersController@create')->name('signup');
Route::get('/testing{ss}',function($yy){
$user1=['aa'=>1,'bb'=>2];
$user2=['sfsdfa'];
$vaiable=$yy;
return view('test.test1',compact('user1','user2','vaiable'));


});
//user route
Route::resource('users','UsersController');
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');

Route::resource('statuses','StatusesController',['only'=>['store','destroy']]);