<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthAdminController extends Controller
{
    use ApiResponseTrait;

    public function me(Request $request)
    {
        try {

            return $this->success($request->user(), 'Admin retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

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

            $admin = Admin::where('email', $request->email)->first();

            if (! $admin || ! Hash::check($request->password, $admin->password)) {
                return $this->error(null, 'Invalid credentials', 401);
            }

            $admin->tokens()->delete(); // يمسح التوكنات القديمة (جلسة واحدة بس)

            $token = $admin->createToken('admin-token', ['admin'], now()->addHours(12))->plainTextToken;

            return $this->success(['token' => $token], 'Admin logged in successfully');
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
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
