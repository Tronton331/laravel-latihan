<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{RegisterController, UserController, QuetionController};
use App\Http\Controllers\Api\V1\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class,'store']);

Route::group(['prefix'=>'v1'], function()
{
    Route::resource('quetions', QuetionController::class);
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::group(['middleware'=> 'auth:sanctum'], function()
    {
        Route::resource('users', UserController::class);
        Route::post('/auth/logout', [AuthController::class,'logout']);
    });
});
