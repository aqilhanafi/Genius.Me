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

Route::get('/', 'App\Http\Controllers\GeniusmeController@home');
Route::get('/create', 'App\Http\Controllers\GeniusmeController@createQuiz');
Route::get('/add', 'App\Http\Controllers\GeniusmeController@addQuiz');
Route::get('/logout', 'App\Http\Controllers\GeniusmeController@logout');


Route::post('/login', 'App\Http\Controllers\GeniusmeController@login');
Route::post('/signUp', 'App\Http\Controllers\GeniusmeController@signUp');
Route::post('/save', 'App\Http\Controllers\GeniusmeController@saveQuiz');

