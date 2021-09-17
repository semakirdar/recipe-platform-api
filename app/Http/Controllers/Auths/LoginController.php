<?php

namespace App\Http\Controllers\Auths;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'success' => true,
                'token' => auth()->user()->createToken('API_TOKEN')->plainTextToken
            ]);
        }

        return response()->json([
           'success' => false,
           'error' => 'Your credentials not match.'
        ]);
    }
}
