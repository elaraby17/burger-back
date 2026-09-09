<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Traits\ApiResponseTrait;

class UserController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $users = User::all();

            return $this->success(UserResource::collection($users), 'Users retrieved successfully');
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve users', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $validatedData = $request->validated();

            // Handle avatar upload if provided
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validatedData['avatar'] = $avatarPath;
            }

            // Hash the password before storing
            $validatedData['password'] = bcrypt($validatedData['password']);

            $user = User::create($validatedData);

            return $this->success(new UserResource($user), 'User created successfully', 201);
        } catch (\Exception $e) {
            return $this->error('Failed to create user', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        try {
            return $this->success(new UserResource($user), 'User retrieved successfully');
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve user', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
            $validatedData = $request->validated();

            // Handle avatar upload if provided
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $validatedData['avatar'] = $avatarPath;
            }

            // Hash the password before storing if provided
            if (isset($validatedData['password'])) {
                $validatedData['password'] = bcrypt($validatedData['password']);
            }

            $user->update($validatedData);

            return $this->success(new UserResource($user), 'User updated successfully');
        } catch (\Exception $e) {
            return $this->error('Failed to update user', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return $this->success(null, 'User deleted successfully');
        } catch (\Exception $e) {
            return $this->error('Failed to delete user', 500);
        }
    }
}
