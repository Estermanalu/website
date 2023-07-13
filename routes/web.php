<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use app\Controllers\Auts\LoginController;

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
    return view('layout.main');
});

Route::get('/home', function () {
    return view('layout.home');
});


Route::resource('employees', EmployeesController::class);

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

