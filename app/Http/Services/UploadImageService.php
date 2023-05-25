<?php

namespace App\Http\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadImageService
{
    public function __construct(protected $images = [])
    {
    }

    public function storeImages(UploadedFile $preview, string $bookTitle,array $secondImages = []): array
    {
        $images['preview_image'] = Storage::disk('public')->put('/images/'.$bookTitle, $preview);
        if($secondImages) {
            $count = 2;
            foreach ($secondImages as $image) {
                $images['image_' . $count++] = Storage::disk('public')->put('/images/'.$bookTitle, $image);
            }
        }
        return $images;
    }
}
