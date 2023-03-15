<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cataAPI;
use App\Http\Controllers\CategoryController;
use App\http\Controllers\UserController;
use App\http\Controllers\MemberController;

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


Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::apiResource("member",MemberController::class);
    Route::get("index", [CategoryController::class, 'index']);
    Route::post("create", [CategoryController::class, 'create']);
    Route::post("validate", [CategoryController::class, 'testData']);
    Route::get("show/{id}", [CategoryController::class, 'show']);
    Route::put("update", [CategoryController::class, 'update']);
    Route::delete("destroy/{id}", [CategoryController::class, 'destroy']);
    });

Route::post("login",[UserController::class,'index']);
