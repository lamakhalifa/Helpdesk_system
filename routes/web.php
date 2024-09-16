<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\UserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CategoryController;

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

Route::resource('users', 'UserController');

//Ticket Routes


Route::resource('tickets', 'TicketController');

//Category Routes
Route::resource('categories', 'CategoryController');
//Comment Routes
Route::post('tickets/{ticket}', 'TicketController@storeComment')->name('tickets.storeComment');
Route::delete('{comment}', 'CommentController@destroy')->name('comments.destroy');


