<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'name' => [
                'en' => $this->name_en,
                'ar' => $this->name_ar,
            ],
            'description' => [
                'en' => $this->description_en,
                'ar' => $this->description_ar,
            ],
            'icon' => $this->icon,
            'active' => $this->active,
            'order' => $this->order,
            'slug' => $this->slug,
        ];
    }
}
