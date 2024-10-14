<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if(!auth()->attempt($validatedData)){
            return response()->json(['message' => 'Invalid login details'], 401);
        }
        $accessToken =auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken,'message'=>'login successful']);

    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password',
            'role' => 'customer',
        ]);
       $validatedData['password']=bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken,'message'=>'registered successfully']);


    }
}
