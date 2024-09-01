<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;

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
Route::get('/Dashboard', function () {
    return view('Dashboard');
});

Route::get('/customers', function () {
    return view('customers');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home/store', 'HomeController@store')->name('home.store');
//Route::get('/home', 'HomeController@AdminHome')->name('home');


//Ticket Routes
Route::resource('tickets', 'TicketController');

Route::resource('user', 'UserController');

//Route::resource('users', 'UsersController', [
//    'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
//]);
//Route::resource('/tickets/create', 'TicketController@create')->name('tickets.create');

