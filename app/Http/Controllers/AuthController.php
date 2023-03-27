<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(LoginRequest $request)
    {

        $validator = $request->validated();

        $token     = Auth::attempt($validator);

        if (!$token)
        {
            return response()->json([
                'status'  => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json(
            [
                'status' => 'success',
                'user' => $user,
                'authorisation' =>
                [
                    'token' => $token,
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'type' => 'bearer',
                ]
            ]
        );
    }

    public function register(RegisterRequest $request)
    {

        $user  = User::create($request->validated());

        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
            'token' => $token,
            'expires_in' => auth()->factory()->getTTL()* 60 ,
            'type' => 'bearer',
            ]
        ]);

    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);

    }

    public function refresh()
    {
        return response()->json(
            [
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' =>
                [
                'token' => Auth::refresh(),
                'type' => 'bearer',
                ]
            ]
        );

    }

    public function userProfile()
    {

        return response()->json(Auth::user());

    }

    public function changePassword(ChangePasswordRequest $request)
    {

        $user = User::query()->findOrFail(auth()->user()->id);

        if(!Hash::check($request->current_password , $user->password)){
            return response("error Old Password Doesn't match!");
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'User successfully updated',
            'user' => $user
        ], 201);

    }
}
