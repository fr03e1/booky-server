<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ImageCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($image) {
                return [
                    'preview' => url('storage/' . $image->preview_image),
                    'image2' => url('storage/'.$image->image_2),
                    'image3' => url('storage/'.$image->image_3),
                    'image4' => url('storage/'.$image->image_4),
                ];
            }),


        ];
    }
}
