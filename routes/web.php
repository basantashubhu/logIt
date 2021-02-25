<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@home')->name('views.home');
Route::post('/identify', 'HomeController@identify')->name('home.identify');
Route::get('/admin', 'HomeController@admin')->name('views.admin');
Route::put('/time-logs/{recordNo}', 'TimeLogController@update')->name('timelogs.update');
Route::get('/time-logs/raw', 'TimeLogController@raw')->name('timelogs.raw');
