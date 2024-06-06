<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginUser;
use App\Http\Requests\Auth\RegisterUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    /* Register a new user */
    public function register(RegisterUser $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:200'],
            'email' => ['required', 'email', 'unique:users,email', 'min:5', 'max:60'],
            'password' => ['required', 'min:8', 'max:60', 'confirmed'],
        ]);
        $user = User::create([
            'name' => $request->get('name'), 'email' => $request->get('email'),
            'password' => Hash::make($request->password)
        ]);
        uploadImage($request['image'], $user, 'userImages');
        return shoeMessage('auth/messages.auth_success', $user, 'UserResource', true);
    }


    /* Login a  user */
    public function login(LoginUser $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return shoeMessage('auth/messages.auth_error', null, null, false);
        }
        $user = User::where('email', $request->email)->first();
        return shoeMessage('auth/messages.auth_success', $user, 'UserResource', true);
    }


}
