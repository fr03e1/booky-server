<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name','parent_id'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class,'parent_id')->select(['id','parent_id','name']);
    }

    public function parent(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function childrenRecursive(): HasMany
    {
        return $this->children()->with(['childrenRecursive']);
    }

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    public function scopeRoot($query): void
    {
        $query->whereNull('parent_id');
    }
}
