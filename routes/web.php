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

//Routes for Expiry Dates
Route::post('/expiry/{item}', 'ExpiryController@store')->name('expiry.store');
Route::delete('/expiry/{expiry}','ExpiryController@destroy')->name('expiry.destory');
