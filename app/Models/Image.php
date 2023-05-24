<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'preview_image',
      'image_2',
      'image_3',
      'image_4',
    ];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class,'id','image_id');
    }


}
