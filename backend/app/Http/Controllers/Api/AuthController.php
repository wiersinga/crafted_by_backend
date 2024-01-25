<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\LoginRequest;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        // return view Login Form
    }

    public function doLogin(loginRequest $request)
    {
        $credentials = $request->validated();

       if (!Auth::attempt($credentials)) {
           return response()->json(['message'=>'Ups no']);
       }
        return response()->json(['message'=>'connected']);

    }
}
