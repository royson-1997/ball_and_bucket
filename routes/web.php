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

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('buckets', 'App\Http\Controllers\BucketController');
Route::resource('balls', 'App\Http\Controllers\BallController');
Route::get('result', 'App\Http\Controllers\HomeController@resultSuggestion')->name('result.data');
Route::post('suggestion', 'App\Http\Controllers\HomeController@suggestBuckets')->name('buckets.suggest');
