<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSizeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
public function toArray(Request $request): array
{
    return [
        'id' => $this->id,
        'product_id' => new ProductResource($this->whenLoaded('product')), // أو الـ ID حسب الحاجة
        'size_key' => $this->size_key,
        'label' => $this->label_ar, // أو دمج اللغتين حسب استخدام الواجهة
        'label_en' => $this->label_en,
        'label_ar' => $this->label_ar,
        'price' => $this->price,
        'sort_order' => $this->sort_order ?? 0,
        'active' => $this->active ?? 1,
    ];
}
}
