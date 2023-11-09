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




class EmpleadosController extends Controller

{


    public function loginAlmacen(Request $request)
    {
        $email = $request->input('email');
        $contraseña = $request->input('contraseña');
    
        //guardarSesion($email);
        $user = Empleados::where('email', $email)->first(); 
      
        if ($user) {           
            if ($user->op_almacen == 1) {              
                if (password_verify($contraseña, $user->contraseña)) {                             
                     
                    return response()->json(['message' => 'Ingreso correcto'], 200);
                } else {
                    
                    return response()->json(['message' => 'Contraseña incorrecta'], 401);
                }
            } else {
            
                return response()->json(['message' => 'No eres un chofer. Acceso denegado'], 403);
            }
        } else {
          
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

       
    }
    
    public function loginChofer(Request $request)
    {
        $email = $request->input('email');
        $contraseña = $request->input('contraseña');
    
        
        $user = Empleados::where('email', $email)->first();
    
        if ($user) {
           
            if ($user->op_chofer == 1) {
              
                if (password_verify($contraseña, $user->contraseña)) {                
                     
                    return response()->json(['message' => 'Ingreso correcto'], 200);
                } else {
                    
                    return response()->json(['message' => 'Contraseña incorrecta'], 401);
                }
            } else {
            
                return response()->json(['message' => 'No eres un chofer. Acceso denegado'], 403);
            }
        } else {
          
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }
    }
    


    public function Logout(Request $request){

    Auth::logout();
    return response()->json(['message' => 'Logout successful']);
        
    }
}

