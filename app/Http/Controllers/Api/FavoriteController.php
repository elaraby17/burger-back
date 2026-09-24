<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        try {
            $user = auth()->user();
            $favorites = $user->favorites()->with('product')->get();

            return $this->success($favorites, 'Favorites retrieved successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to retrieve favorites', 500);
        }
    }

    public function store(Request $request)
    {
        try {

            $user = auth()->user();
            $productId = $request->input('product_id');

            // Check if the product is already favorited
            if ($user->favorites()->where('product_id', $productId)->exists()) {
                return $this->error('Product is already in favorites', 400);
            }

            $favorite = $user->favorites()->create(['product_id' => $productId]);

            return $this->success($favorite, 'Product added to favorites successfully', 201);
        } catch (\Exception $e) {
            return $this->error('Failed to add product to favorites', 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = auth()->user();
            $favorite = $user->favorites()->findOrFail($id);
            $favorite->delete();

            return $this->success(null, 'Product removed from favorites successfully', 200);
        } catch (\Exception $e) {
            return $this->error('Failed to remove product from favorites', 500);
        }
    }
}
