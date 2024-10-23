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
Route::middleware('auth:api')->prefix('user')->group(function() {
   Route::patch('updateProfile', 'Api\UserController@updateProfile');
});

Route::resource('comments','Api\CommentController');
Route::post('comments/{comment}/upload-files', 'Api\CommentController@uploadFiles');
//Route:: api resources?

Route::resource('tickets','Api\TicketController');
Route::patch('/tickets/{id}/close', [TicketController::class, 'closeTicket']);

