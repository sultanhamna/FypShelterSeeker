<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function login(Request $request)
    {

      $credentials = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ]
            );
            if (!Auth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid Credentials'], 401);
            }

            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json(['access_token' => $token,
            'message' => 'You have been successfully logged in. Your access token has been generated.'


        ]);

    }


    public function store(Request $request)
{
    $request->validate(
        [
            "name"=> 'required|string|max:255|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|string|max:255|email|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:8|confirmed|string|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])/u',
        ]
        );
            $dataEntered= User::create([
             "name"=> $request->name,
             "email"=> $request->email,
             "password"=>Hash::make( $request->password)
            ]);

    if ($dataEntered == null)
     {
        return response()->json(['error' => 'Failed to create user'], 500);
    }
     else
      {
        $token = $dataEntered->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,

            'message' => 'User created successfully. Your access token has been generated.'
        ]);
    }
}
}








