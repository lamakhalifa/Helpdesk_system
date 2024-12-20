<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\TicketController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
Route::post('forgetPassword', 'Api\UserController@resetPassword');
Route::patch('updateProfile', 'Api\UserController@updateProfile');
Route::get('resetByToken', 'Api\AuthController@checkToken');

Route::resource('comments','Api\CommentController');
Route::post('comments/{comment}/upload-files', 'Api\CommentController@uploadFiles');


Route::resource('tickets','Api\TicketController');
Route::post('tickets/{ticket}/upload-files', 'Api\TicketController@uploadFiles');

Route::patch('/tickets/{ticket}/close', [TicketController::class, 'closeTicket']);

