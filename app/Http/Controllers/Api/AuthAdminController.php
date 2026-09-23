<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    use ApiResponseTrait;

    public function me(Request $request)
    {
        return $this->success($request->user(), 'Admin retrieved successfully');
    }

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    if (!Auth::guard('admin')->attempt($request->only('email', 'password'))) {
        return $this->error(null, 'Invalid credentials', 401);
    }

    $admin = Auth::guard('admin')->user();

    $token = $admin->createToken('admin-token')->plainTextToken;

    return $this->success(
        ['token' => $token],
        'Admin logged in successfully'
    );
}

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->success(null, 'Admin logged out successfully');
    }
}
