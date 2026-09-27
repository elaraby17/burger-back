<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $products = Product::with('category')->get();

            return $this->success(ProductResource::collection($products), 'Products retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    public function productPopular()
    {
        try {
            $products = Product::with('category')->where('popular', true)->get();

            return $this->success(ProductResource::collection($products), 'Popular products retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        try {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name_en']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('products', 'public');
            }
            $product = Product::create($data);

            return $this->success(new ProductResource($product), 'Product created successfully', 201);
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        try {
            return $this->success(new ProductResource($product), 'Product retrieved successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $data = $request->validated();
            $data['slug'] = Str::slug($data['name_en']);
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('products', 'public');
            }

            $product->update($data);

            return $this->success(new ProductResource($product), 'Product updated successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();

            return $this->success(null, 'Product deleted successfully');
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
