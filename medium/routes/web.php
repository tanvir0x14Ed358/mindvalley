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

Route::get('/', 'WelcomeController@index')->name('front');
Route::get('/tag/{id}', 'WelcomeController@tag')->name('tag');
Route::get('/article/{id}', 'WelcomeController@article')->name('article');

Route::get('/admin', function(){
    return view('vueadmin');
})->name('admin')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
