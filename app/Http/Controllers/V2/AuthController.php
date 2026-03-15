<?php

namespace App\Http\Controllers\V2;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            

            return response()->json([
                'success' => true,
                'message' => 'Successful login',
                'access_token' => $token,
                'token_type' => 'Bearer',
                'data' => $user,
            ]);
        }
 
        return response()->json([
                'success' => false,
                'message' => 'Invalid login credentials',
                'data' => $credentials,
            ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Session terminated',
        ]);
    }
}
