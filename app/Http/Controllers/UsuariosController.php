<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuarios;



class UsuariosController extends Controller

{
 
    
    public function loginAlmacen(Request $request)
    {
        $nombre = $request->input('nombre');
        $contraseña = $request->input('contraseña');
    
        
        $user = Usuarios::where('nombre', $nombre)->first();
    
        if ($user) {
           
            if ($user->es_almacen == 1) {
              
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
        $nombre = $request->input('nombre');
        $contraseña = $request->input('contraseña');
    
        
        $user = Usuarios::where('nombre', $nombre)->first();
    
        if ($user) {
           
            if ($user->es_chofer == 1) {
              
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
