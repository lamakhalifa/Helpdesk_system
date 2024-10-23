<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password',
            'avatar' => 'array',
            'avatar.*' => 'file|mimes:jpg,jpeg,png,gif,txt,pdf,doc,docx|max:2048',
        ]);
        //upload files
        if ($request->hasFile('avatar')) {
            foreach ($request->file('avatar') as $avatar) {
                $storageType = env('FILES_STORAGE');
                $validatedData['avatar']->addMedia($avatar)->toMediaCollection('avatar',$storageType);
            }
        }
        $validatedData['password']=Hash::make($validatedData['password']);
        $user->update($validatedData);
        if($user->save())
            return response()->json(['message' => 'Profile updated successfully']);
        else
            return response()->json(['message' => 'Profile update failed'],status: 500);
    }
}
