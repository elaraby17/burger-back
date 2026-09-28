<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

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
        try {

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        try {

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        try {

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        try {

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
