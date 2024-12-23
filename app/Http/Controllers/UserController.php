<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        return view('front.auth.login');
    }

    public function showregisterform ()
    {
        return view('front.auth.register');
    }

    public function  store (Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255|min:5|regex:/^[a-zA-Z][a-zA-Z\s]*$/u',
                'email' => 'required|string|max:255|email|regex:/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/',
                'password' => 'required|min:8|confirmed|string|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])/u',
               //'password_confirmation' =>'required|string|min:8|regex:/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()\-_=+{};:,<.>])/u'
                ]
            );
       $dataEntered= User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password" => Hash::make($request->password)
        ]);

        if($dataEntered==null)
        {
           return redirect()->back();
        }
        else
        {
            return redirect()->route('login.page');
        }
    }

    public function login(Request $request)
    {

      $credentials = $request->validate(
            [
                'email' => 'required|string',
                'password' => 'required|string',
            ]
            );
            if(Auth::attempt($credentials))
            {
                if ( Auth::user()->role=='admin')
                {

                    return redirect()->route('admin.dashboard');
                }

              else
                {
                    return redirect()->back();
                }

            }
            else
            {
                return redirect()->back()->with('error', "Invalid Credentials");
            }

    }
    public function logout()
    {
        Auth::logout();
        return view('front.auth.login');
    }






}
