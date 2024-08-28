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

//Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home/store', 'HomeController@store')->name('home.store');
Route::get('/home', 'HomeController@AdminHome')->name('home');
<<<<<<< HEAD

//Ticket Routes
Route::get('/ticket/create', 'TicketController@create')->name('ticket.create');
Route::post('/ticket/store', 'TicketController@store')->name('ticket.store');
Route::get('/ticket/show', 'TicketController@index')->name('ticket.index');
Route::get('/ticket/{id}', 'TicketController@delete')->name('ticket.delete');
Route::get('/ticket/edit/{id}', 'TicketController@edit')->name('ticket.edit');
Route::post('/ticket/update/{id}', 'TicketController@update')->name('ticket.update');
Route::get('/ticket/show/{id}','TicketController@details')->name('ticket.details');
=======
Route::get('/UpdateProfile', 'HomeController@UpdateProfile')->name('UpdateProfile');
Route::resource('user', 'UserController');
Route::resource('tickets', 'TicketController');
//Route::resource('users', 'UsersController', [
//    'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
//]);
//Route::resource('/tickets/create', 'TicketController@create')->name('tickets.create');
>>>>>>> 574fe5765e5012534cbda46bdf5dc4ebbbc3ef1d
