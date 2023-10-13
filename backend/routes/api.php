<?php

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

Route::middleware('jwt.verify')->group(function () {
    Route::post('/user/logout', [\App\Http\Controllers\UserController::class, 'logout']);
    Route::apiResource('/feedback', \App\Http\Controllers\FeedbackController::class);
    Route::apiResource('/comment', \App\Http\Controllers\CommentController::class);
});

Route::post('/user/register', [\App\Http\Controllers\UserController::class, 'register']);
Route::post('/user/login', [\App\Http\Controllers\UserController::class, 'login']);
