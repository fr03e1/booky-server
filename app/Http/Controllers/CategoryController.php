<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct(protected Category $category)
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $categories = $this->category::root()->get();
        return view('category.index',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }

    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    public function show(Category $category)
    {
        return view('category.show', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return view('category.show', compact('category'));
    }

    public function create()
    {
        return view('category.create');
    }

}
