<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Services\ApiResponseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(\App\Http\Requests\StoreRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('saraskills-token')->plainTextToken;
        Auth::login($user);

        return ApiResponseService::success('Registration successful', [
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function login(\App\Http\Requests\LoginRequest $request)
    {
        if (! Auth::attempt($request->only('email', 'password'))) {
            return ApiResponseService::error('Invalid login credentials', [], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('saraskills-token')->plainTextToken;

        return ApiResponseService::success('Login successful', [
            'user' => $user,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::guard('web')->logout();

        return ApiResponseService::success('Logged out successfully');
    }

    public function user(Request $request)
    {
        return ApiResponseService::success('User retrieved successfully', [
            'user' => $request->user(),
        ]);
    }
}
