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
})->name('welcome');

//Routes for Items
Route::resource('items', 'ItemController');

//Route for search
Route::get('search', 'ItemController@search')->name('search');

//Routes for Expiry Dates
Route::post('/expiry/{item}', 'ExpiryController@store')->name('expiry.store');
Route::delete('/expiry/{item}','ExpiryController@destroy')->name('expiry.destory');

//Routes for Reports
Route::get('reports/expired', 'ReportController@expired')->name('reports.expired');
Route::get('reports/current', 'ReportController@current')->name('reports.current');
Route::get('reports/week', 'ReportController@week')->name('reports.week');