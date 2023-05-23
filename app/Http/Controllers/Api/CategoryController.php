<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function show()
    {
        $category = Category::with(['childrenRecursive'])
            ->where('parent_id',1)
            ->select(['id','parent_id','name'])
            ->get()
            ->toArray();

        $categories = Category::all();
        $c = $categories->reject(function ($category) {
           return $category->parent_id !== null;
        });

        return CategoryResource::collection(Category::all());
    }
}
