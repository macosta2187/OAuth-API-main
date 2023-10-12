<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuariosController;


Route::post('/Login/token',[UserController::class,"Login"]);
Route::post('/Register',[UserController::class,"Register"]);
Route::get('/validate',[UserController::class,"ValidateToken"]);
//Route::get('/logout',[UserController::class,"Logout"]);

Route::get('/logout', [UserController::class,"Logout"]);


//Almacen


Route::post('/loginAlmacen/token',[UsuariosController::class,"loginAlmacen"]);
Route::post('/loginChofer/token',[UsuariosController::class,"loginChofer"]);
