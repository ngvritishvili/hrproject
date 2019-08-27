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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('images', 'ImageController');

Route::resource('tasks', 'TaskController');

Route::resource('news', 'NewsController');

Route::resource('drives', 'DriveController');

Route::resource('notifications', 'NotificationController');

Route::get('profile','HomeController@profile')->name('profile');
Route::post('profile','HomeController@store')->name('profile');

Route::post('profile','HomeController@editdays')->name('editDays');

Route::get('settings','HomeController@settings')->name('settings');
Route::patch('settings','HomeController@settingsStore')->name('settings');

Route::get('layouts/header','HomeController@search')->name('search');

