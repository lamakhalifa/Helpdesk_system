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
<<<<<<< HEAD
Route::get('/home', 'HomeController@AdminHome')->name('home');
Route::get('/UpdateProfile', 'HomeController@UpdateProfile')->name('UpdateProfile');
Route::resource('users', 'UserController');
=======
//Route::get('/home', 'HomeController@AdminHome')->name('home');


//Ticket Routes
//  Route::get('/ticket/create', 'TicketController@create')->name('tickets.create');
//  Route::post('/ticket/store', 'TicketController@store')->name('tickets.store');
//  Route::get('/ticket/show', 'TicketController@index')->name('tickets.index');
 //Route::get('/ticket/{id}', 'TicketController@destroy')->name('ticket.destroy');
 //Route::get('/ticket/edit/{id}', 'TicketController@edit')->name('ticket.edit');
 //Route::post('/ticket/update/{id}', 'TicketController@update')->name('ticket.update');
 //Route::get('/ticket/show/{id}','TicketController@details')->name('ticket.show');

//Route::get('/UpdateProfile', 'HomeController@UpdateProfile')->name('UpdateProfile');
//Route::resource('user', 'UserController');
>>>>>>> 10352d4521f7e77bb8a793ddeb7ade807033514d
Route::resource('tickets', 'TicketController');
// Route::get('/tickets/create', [UserController::class, 'index']);
//Route::resource('users', 'UsersController', [
//    'only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']
//]);
//Route::resource('/tickets/create', 'TicketController@create')->name('tickets.create');

