<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'preview' => $this->preview_image,
            'image_2' => $this->image_2,
            'image_3' => $this->image_2,
            'image_4' => $this->image_2,
        ];
    }
}
