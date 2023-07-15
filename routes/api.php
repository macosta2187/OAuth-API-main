<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('/Login',[UserController::class,"Login"]);
Route::post('/Register',[UserController::class,"Register"]);
Route::get('/validate',[UserController::class,"ValidateToken"])->middleware('auth:api');
Route::get('/logout',[UserController::class,"Logout"])->middleware('auth:api');


