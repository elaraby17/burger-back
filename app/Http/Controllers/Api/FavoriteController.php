<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Favorite;
use App\Traits\ApiResponseTrait;
use Illuminate\Container\Attributes\Log;
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
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
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
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }

    public function destroy(Favorite $favorite)
    {
        try {
            $user = auth()->user();
            $favorite = $user->favorites()->findOrFail($favorite->id);
            $favorite->delete();

            return $this->success(null, 'Product removed from favorites successfully', 200);
        } catch (\Throwable $e) {
            Log::error('Failed to create sauce: '.$e->getMessage());

            return $this->error('Failed to create sauce', 500);
        }
    }
}
