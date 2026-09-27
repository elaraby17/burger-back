<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductSizeResource;
use App\Models\Product_Size;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $sizes = Product_Size::with('product')->get();

            return $this->success(ProductSizeResource::collection($sizes), 'Sizes retrieved successfully');
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
            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'size_key' => 'required|string',
                'label_en' => 'required|string',
                'label_ar' => 'required|string',
                'price' => 'required|numeric',
            ]);

            // إنشاء السجل الجديد في قاعدة البيانات
            $productSize = Product_Size::create($data);

            return $this->success(new ProductSizeResource($productSize), 'Size created successfully');

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product_Size $productSize)
    {
        try {
            return $this->success(new ProductSizeResource($productSize), 'Size retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->validate([
                'product_id' => 'required|exists:products,id',
                'size_key' => 'required|string',
                'label_en' => 'required|string',
                'label_ar' => 'required|string',
                'price' => 'required|numeric',
            ]);

            // 1. البحث عن الحجم المراد تحديثه أو إرجاع 404 إن لمש يكن موجوداً
            $productSize = Product_Size::findOrFail($id);

            // 2. تحديث البيانات
            $productSize->update($data);

            return $this->success(new ProductSizeResource($productSize), 'Size updated successfully');

        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product_Size $productSize)
    {
        try {
            $productSize->delete();

            return $this->success(null, 'Size deleted successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
