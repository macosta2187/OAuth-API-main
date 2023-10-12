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
            'password' => 'required'
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
        
        return auth('api')->user();
       
    }


    

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;
            $authorizationHeader = 'Bearer ' . $token;

            return response()->json([
                 'message' => 'Logged in successfully!',
                'Authorization' => $authorizationHeader,
               
                
            ]);
          
            
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function Logout(Request $request){

    Auth::logout();
    return response()->json(['message' => 'Logout successful']);
        
    }





}