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
})->name('home');

Route::get('/nn', function () {
    return redirect('/nn/new');
})->name('nn');

Route::get('/nn/new', 'NeuralNetworkController@newNetwork')->name('nn.new');
Route::post('/nn/create', 'NeuralNetworkController@create')->name('nn.create');