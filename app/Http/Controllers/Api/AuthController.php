<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponseTrait;

    public function register(StoreUserRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = bcrypt($data['password']);
            if ($request->hasFile('avatar')) {
                $data['avatar'] = $request->file('avatar')->store('users', 'public');
            }
            $user = User::create($data);
            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->success([
                'user' => new UserResource($user),
                'token' => $token,
            ], 'User registered successfully', 201);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to register user: '.$e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (! auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = auth()->user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'user' => new UserResource($user),
            'token' => $token,
        ], 'Login successful');
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, 'Logged out successfully');
    }

    public function profile(Request $request)
    {
        return $this->success(new UserResource($request->user()), 'User retrieved successfully');
    }
    public function profileEdit(Request $request)
    {
        $user = $request->user();
        $data = $request->only(['name', 'email', 'phone', 'avatar']);

        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('users', 'public');
        }

        $user->update($data);

        return $this->success(new UserResource($user), 'User profile updated successfully');
    }
}
