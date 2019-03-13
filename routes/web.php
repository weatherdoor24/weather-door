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


Route::get("/", "Web\FrontController@index");
Route::any("/contact", "Web\FrontController@contact")->name('contact');
Route::get("/about", "Web\FrontController@about")->name('about');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
