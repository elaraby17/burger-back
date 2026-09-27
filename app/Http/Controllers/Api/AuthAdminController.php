<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    use ApiResponseTrait;

    public function me(Request $request)
    {
        try {


        return $this->success($request->user(), 'Admin retrieved successfully');
        }catch (\Throwable $e) {
        Log::error('Failed to create sauce: ' . $e->getMessage());

        return $this->error('Failed to create sauce', 500);
    }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string',
            ]);

            if (! Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return $this->error(null, 'Invalid credentials', 401);
            }

            $admin = Auth::guard('admin')->user();

            $token = $admin->createToken('admin-token')->plainTextToken;

            return $this->success(
                ['token' => $token],
                'Admin logged in successfully'
            );
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    public function logout(Request $request)
    {
        try {
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, 'Admin logged out successfully');
        }catch (\Throwable $e) {
        Log::error('Failed to create sauce: ' . $e->getMessage());

        return $this->error('Failed to create sauce', 500);
    }
    }
}
