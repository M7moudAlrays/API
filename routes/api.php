<?php

use App\Http\Controllers\Api_Controllers\api_postcontroller;
use App\Http\Controllers\Api_Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['jwt'])->group(function()
{
    Route::get('getposts',[api_postcontroller::class,'index']);
    Route::get('show/{id}',[api_postcontroller::class,'show']);
    Route::post('store',[api_postcontroller::class,'store']);
    Route::post('update/{id}',[api_postcontroller::class,'update']);
    Route::delete('delete/{id}' ,[api_postcontroller::class,'destroy']);
}) ;





Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

