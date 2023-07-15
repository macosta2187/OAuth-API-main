<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Lcobucci\JWT\Parser;
use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    public function Register(Request $request){

        $validation = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        if($validation->fails())
            return $validation->errors();

        return $this -> createUser($request);
        
    }

    private function createUser($request){
        $user = new User();
        $user -> name = $request -> post("name");
        $user -> email = $request -> post("email");
        $user -> password = Hash::make($request -> post("password"));   
        $user -> save();
        return $user;
    }

    public function ValidateToken(Request $request){
        //return auth('api')->user();
        return redirect()->intended('/inicio');
    }

    public function Logout(Request $request){
        $request->user()->token()->revoke();
        return ['message' => 'Token Revoked'];
        
        
    }


 public function login(Request $request)
{
    
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required']
    ]);


    if (Auth::attempt($credentials)) {  

        $user = Auth::user();     
        $accessToken = $user->createToken('Authorization')->accessToken;
     
       
        return response()->json([
            //'user' => $user,
            'access_token' => $accessToken
        ], 200);
    } else {
       
        return response()->json(['error' => 'Credenciales inválidas'], 401);
    }

}
}