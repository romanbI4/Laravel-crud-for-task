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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/registration', function () {
        return view('registration');
    })->name('registration');

    Route::post('/registration', 'AuthController@registration');

    Route::post('/login', 'AuthController@login')->name('login');

});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', 'AuthController@logout')->name('logout');

    Route::resource('/tasks', 'TasksController');

});

