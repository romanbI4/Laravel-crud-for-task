<?php

use App\Http\Controllers\TasksController;
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

Route::get('/login', function () {
    return view('login');
});

Route::middleware('guest')->namespace('\App\Http\Controllers')->group(function() {
    Route::get('/login', function () {
        return view('login');
    });

    Route::post('/login', 'AuthController@login')->name('login');
});

Route::get('/registration', function () {
    return view('registration');
})->name('registration');

Route::post('/registration', 'AuthController@registration');
Route::get('/logout', 'AuthController@logout')->name('logout');

Route::get('tasks', [TasksController::class, 'index'])->name('tasks');
Route::get('tasks/{id}', [TasksController::class, 'show']);
Route::post('tasks/create', [TasksController::class, 'store']);
Route::put('tasks/{id}', [TasksController::class, 'update']);
Route::delete('tasks/{id}', [TasksController::class, 'delete']);
