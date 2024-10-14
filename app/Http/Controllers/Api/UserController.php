<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password',
            'avatar' => 'path',
        ]);
        $validatedData['password']=Hash::make($validatedData['password']);
        $user->update($validatedData);
        if($user->save())
            return response()->json(['message' => 'Profile updated successfully']);
        else
            return response()->json(['message' => 'Profile update failed'],status: 500);
    }

    public function resetPassword(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $userEmail='f@g.com';
        Mail::send([],[],function($message) use($userEmail){
            $message->subject('Reset Password');
            $message->to($userEmail);
            $message->setBody('your new password is jjj');
        });

    }
}
