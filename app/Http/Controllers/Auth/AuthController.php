<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller

{

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password'

        ]);

        $user_exist = User::where('email',$request->email)->first();
        if($user_exist){
            return ([

                'message' => 'Email already exist',
                'status' => false,
            ]);

        }

        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
           

        ]);

        return response([

            'message' => 'User created successfully',
            'status' => true,
            'user' => $user,
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([

            'email' => 'required',
            'password' => 'required',

        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response ([
                'message' => 'User Not found!',
                'success' => false
            ]);
        }

        if(Hash::check($request->password , $user->password)){
           
            // admin role = 1
            if($user->role == 1){
                $role = 'admin';
            }
            else {
                $role = 'user';
            }

            $access_token = $user->createToken('authToken')->plainTextToken ;


            return response([
                'message' => 'login success',
                'success' => true,
                'user' => $user,
                'access_token' => $access_token,
                'role' => $role,

            ]);
        }
        else{
            return response([
                'message' => 'login failed',
                'success' => false,
            ]);
        }
    }

    public function logout(Request $request){
//        $user = $request->user();
//        $user->currentAccessToken()->delete();
//        return response('', 204);
    }
}
