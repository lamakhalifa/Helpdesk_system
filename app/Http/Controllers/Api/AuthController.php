<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use App\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required',
        ]);
        if (!auth()->attempt($validatedData)) {
            return response()->json(['message' => 'Invalid login details'], 401);
        }
        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response(['user' => auth()->user(), 'access_token' => $accessToken, 'message' => 'login successful']);

    }

    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'password_confirmation' => 'required|string|same:password',
            'role' => 'customer',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        $user = User::create($validatedData);
        $accessToken = $user->createToken('authToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken, 'message' => 'registered successfully']);


    }

    public function resetPassword(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        $randomNumber = rand(100000, 999999);
        $url_token = sha1(time());

        Token::create([
            'email' => $validatedData['email'],
            'token' => $randomNumber,
            'url_token' => $url_token,
            'created_at' => now(),
            'expires_at' => now()->addMinutes(20)->format('Y-m-d H:i:s'),

        ]);
        $urlResetPass = "resetByToken?url_token=" . $url_token;
        $body = "This is a reset password email\nplease <a href='$urlResetPass'>click Here</a> to reset your password the validate Token is {$randomNumber} \nIt will expire shortly\nThen you must update your password after login.\n*If you did not request to reset your password please ignore this message";
        Mail::raw($body, function ($message) use ($request, $randomNumber, $urlResetPass) {
            $message->to($request->email)
                ->subject('Reset Password');
        });
        return response(['message' => 'Password reset successfully']);

    }

    public function checkToken(Request $request)
    {

        $TokenInfo = Token::where('url_token', $request->url_token)->firstOrFail();

        if ($TokenInfo->expires_at < now()) {

            return response(['message' => 'Token Not Found Or Expired']);

        } else {
            $validatedData = $request->validate([
                'token' => 'required|string|exists:password_create_tokens,token',
                'password' => 'required|string',
                'password_confirmation' => 'required|string|same:password',
            ]);


            $update = User::where('email', $TokenInfo->email)->first()
                ->update(['password' => bcrypt($validatedData['password'])]);

            if ($update) {

                $TokenInfo->delete();

            } else {
                return response(['message' => 'Password Can not be updated']);
            }
        }

        return response(['message' => 'Password updated successfully']);

    }

}
