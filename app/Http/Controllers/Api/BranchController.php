<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BranchResource;
use App\Models\Branch;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $branches = Branch::all();

            return $this->success(BranchResource::collection($branches), 'Branches retrieved successfully');

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'active' => 'required|boolean',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255|starts_with:015,010,011,012',
            'governorate' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);
        try {
            $branch = Branch::create($request->all());

            return $this->success(new BranchResource($branch), 'Branch created successfully', 201);
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Branch $branch)
    {
        try {
            $branch = Branch::find($branch->id);
            return $this->success(new BranchResource($branch), 'Branch retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'active' => 'required|boolean',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255|starts_with:015,010,011,012',
            'governorate' => 'required|string|max:255',
            'area' => 'required|string|max:255',
            'latitude' => 'required|string|max:255',
            'longitude' => 'required|string|max:255',
        ]);
        try {
            $branch->update($request->all());
            return $this->success(new BranchResource($branch), 'Branch updated successfully');

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Branch $branch)
    {
        try {
            $branch->delete();
            return $this->success(null, 'Branch deleted successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
