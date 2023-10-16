<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return response(['status' => 'success', 'message' => $data]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response($validator->messages());
        }

        $credentials = $request->only('email', 'password');

        $token = JWTAuth::attempt($credentials, true);
        if (!$token) {
            return response([
                'status' => 'error',
                'message' => 'Incorrect email or password',
            ], 401);
        }

        $user = JWTAuth::user();
        return response([
            'status' => 'success',
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer'
            ]
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data['data'], [
            'type' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string|unique:users|email',
            'password' => 'required|string',
            'permissions' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response(['status' => 'error', 'message' => $validator->messages()]);
        }

        $data['data']['password'] = Hash::make($data['data']['password']);

        $user = User::create($data['data']);

        return response([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user
        ], 201);
    }
    
    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
