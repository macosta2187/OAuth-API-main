<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleadosController;


Route::get('/logout', [UserController::class,"Logout"]);
Route::post('/Login/Registertoken',[UserController::class,"Login"]);
Route::post('/',[UserController::class,"Register"]);
Route::get('/validate',[UserController::class,"ValidateToken"]);
Route::get('/logout', [UserController::class,"Logout"]);



Route::post('/loginAlmacen/token',[EmpleadosController::class,"loginAlmacen"]);
Route::post('/loginChofer/token',[EmpleadosController::class,"loginChofer"]);
