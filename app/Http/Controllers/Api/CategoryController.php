<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Traits\ApiResponseTrait;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categories = Category::all();

            return $this->success(CategoryResource::collection($categories), 'Categories retrieved successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to retrieve categories', 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $data = $request->validated();
        $data['slug'] = Str::slug($request->name_en);

        $category = Category::create($data);

        return $this->success(new CategoryResource($category), 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return $this->success(new CategoryResource($category), 'Category retrieved successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to retrieve category', 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        try {
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name_en);

            $category->update($data);

            return $this->success(new CategoryResource($category), 'Category updated successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to update category', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return $this->success(null, 'Category deleted successfully');
        } catch (\Exception $e) {
            return $this->error(null, 'Failed to delete category', 500);
        }
    }
}
