<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Traits\ApiResponseTrait;
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
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to retrieve products', 500);
        }
    }

    public function productPopular()
    {
        try {
            $products = Product::with('category')->where('popular', true)->get();

            return $this->success(ProductResource::collection($products), 'Popular products retrieved successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to retrieve popular products', 500);
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
        } catch (\Exception $e) {
            // قم بإرجاع رسالة الخطأ الأصلية لتظهر في البوست مان وتعرف السبب بدقة
            return $this->error($e->getMessage(), 'Failed to create product', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->success(new ProductResource($product), 'Product retrieved successfully');
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
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to update product', 500);
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
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to delete product', 500);
        }
    }
}
