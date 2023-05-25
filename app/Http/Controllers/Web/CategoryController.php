<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{

    public function __construct(protected Category $category)
    {
        $this->middleware('auth:web');
    }

    public function index(): View
    {
        $categories = $this->category::root()->get();
        return view('category.index',compact('categories'));
    }

    public function store(CategoryRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->category::firstOrCreate($data);
        return redirect()->route('category.index');
    }

    public function delete(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index');
    }

    public function edit(Category $category): View
    {
        return view('category.edit', compact('category'));
    }

    public function show(Category $category): View
    {
        $children = $this->category::with(['childrenRecursive'])
            ->where('parent_id',$category->id)
            ->get();
        return view('category.show', compact('children','category'));
    }

    public function update(CategoryRequest $request, Category $category): View
    {
        $data = $request->validated();
        $category->update($data);
        return view('category.show', compact('category'));
    }

    public function create(): View
    {
        $categories = $this->category::all();
        return view('category.create',compact('categories'));
    }

    public function createSubCategory(CategoryRequest $request)
    {
        $this->category::firstOrCreate(['name'=> 'Super','parent_id'=> 4]);
    }
}
