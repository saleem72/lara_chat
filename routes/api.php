<?php

use App\Http\Controllers\Api\V1\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group([
    'prefix' => 'auth',
    'namespace' => 'App\Http\Controllers\Auth'
], function() {
    Route::post('login', [AuthController::class, 'login']);
});

Route::group([
    'prefix' => 'user',
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('rooms', [UserController::class, 'userRooms']);
    Route::post('send_message', [UserController::class, 'sendMessage']);
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Api\V1',
    'middleware' => ['auth:sanctum']
], function() { //send_message
    Route::get('all_rooms', [AdminController::class, 'allRooms']);
    Route::post('message_to_chat', [AdminController::class, 'sendMessageToChat']);
});
