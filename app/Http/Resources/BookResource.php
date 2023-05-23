<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'binding' => $this->binding,
            'year' => $this->year,
            'price' => $this->price,
            'publisher' => new PublisherResource($this->publisher),
            'category' => new CategoryResource($this->category),
            'authors' => $this->authors->pluck('full_name')->all(),
            'tags' => $this->tags->pluck('tag')->all(),
            'images' => new ImageCollection($this->images),
        ];
    }
}
