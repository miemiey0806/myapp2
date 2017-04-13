<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //return'register';

        $this->validate($request,
            [
                'email' =>'required|email|unique:users',
                'phone'=>'required',
                'password'=>'required|min:6',
            ]);

        User::create([
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
        ]);

    }

}

/**
 */
