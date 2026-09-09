<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return
        [
            'id' => $this->id,
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar,
            ],
            'description' => [
                'en' => $this->description_en,
                'ar' => $this->description_ar,
            ],
            'sizes' => ProductSizeResource::collection($this->whenLoaded('sizes')),
            'image' => $this->image ? asset('storage/'.$this->image) : null,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'price' => $this->price,
            'active' => $this->active,
            'popular' => $this->popular,
            'is_new' => $this->is_new,
            'order' => $this->order,
            'slug' => $this->slug,
        ];
    }
}
