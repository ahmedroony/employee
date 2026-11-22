<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type_id' => 1, // default user type id
        ]);
        $data['token'] = $user->createToken('auth_token')->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        $data['user_type_id'] = $user->user_type_id;
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully',
            'data' => $data
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = $request->user();
            $data['token'] = $user->createToken('auth_token')->plainTextToken;
            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data['user_type_id'] = $user->user_type_id;

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'data' => $data
            ], 200);
        }

        return response()->json([
            'status' => false,
            'message' => 'Invalid credentials',
            'data' => null
        ], 401);
    }
}
