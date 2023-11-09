<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use App\Models\Empleados;
use App\Models\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\EmpleadosController;


class SessionController extends Controller
{
    public function guardarSesion($email)
    {
        $hora = now()->format('H:i:s');
        $fecha = now()->toDateString();
    
        $session = new Session;
        $session->email = $email;
        $session->hora = $hora;
        $session->fecha = $fecha;
        $session->save();
    
        return response()->json(['message' => 'Sesión guardada correctamente'], 200);
    }
    
}
