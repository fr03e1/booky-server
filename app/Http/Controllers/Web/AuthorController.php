<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthorController extends Controller
{

    public function __construct(protected Author $author)
    {
        $this->middleware('auth:web');
    }

    public function index(): View
    {
        $authors = $this->author::all();
        return view('author.index', compact('authors'));
    }

    public function show($id): View
    {
        $author = Author::find($id);
        return view('author.show', compact('author'));
    }

    public function edit(Author $author): View
    {
        return view('author.edit', compact('author'));
    }

    public function store(AuthorRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->author::firstOrCreate($data);

        return redirect()->route('author.index');
    }

    public function create(): View
    {
        return view('author.create');
    }

    public function update(AuthorRequest $request, Author $author): View
    {
        $data = $request->validated();
        $author->update($data);
        return view('author.show', compact('author'));
    }

    public function delete(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->route('author.index');
    }
}
