<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sauce;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class SauceController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sauces = Sauce::all();

            return $this->success($sauces, 'Sauces retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve sauces', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name_en' => 'required|string|max:255',
                'name_ar' => 'required|string|max:255',
                'icon' => 'nullable|string',
                'active' => 'nullable|boolean',
                'order' => 'nullable|integer',
            ]);

            $sauce = Sauce::create($request->all());

            return $this->success($sauce, 'Sauce created successfully', 201);
        } catch (\Exception $e) {
            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
