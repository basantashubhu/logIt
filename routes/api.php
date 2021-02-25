<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/technicians', 'TechnicianController@index')->name('technicians.index');
Route::get('/job-types', 'JobTypeController@index')->name('jobtypes.index');
Route::get('/time-logs', 'TimeLogController@index')->name('time-logs.index');
Route::post('/time-logs','TimeLogController@store')->name('timelogs.store');
Route::get('/time-logs/{recordNo}','TimeLogController@show')->name('timelogs.show');