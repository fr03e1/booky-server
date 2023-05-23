<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function __construct(
        protected Book $book,
        protected Author $author,
        protected Category $category,
        protected Publisher $publisher
    )
    {
    }

    public function index()
    {
        $books = $this->book::all();
        return view('book.index',compact('books'));

    }

    public function show($id)
    {
        $book = $this->book::find($id);
        $categories = $book['category'];
        $publishers = $book['publisher'];
        $category = $categories->title;
        $publisher = $publishers->title;
        $authors = $book->authors;
        return view('book.show',compact('book','category','publisher','authors'));
    }

    public function edit(Book $book)
    {
        $authors = $this->author::all();
        $categories = $this->category::all();
        $publishers = $this->publisher::all();
        return view('book.edit',compact('book','authors','categories','publishers'));
    }

    public function store(BookRequest $request)
    {

        $data = $request->validated();
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $authorsId = $data['authors'];
        unset($data['authors']);
        $book = Book::create($data);
        $book->authors()->attach($authorsId);
        return redirect()->route('book.index');
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        $publishers = Publisher::all();
        return view('book.create',compact('authors','categories','publishers'));
    }

    public function update(BookRequest $request,Book $book)
    {
        $data = $request->validated();
        $authorsId = $data['authors'];
        unset($data['authors']);
        $book->update($data);
        $book->authors()->sync($authorsId);
        $categories = $book['category'];
        $category = $categories->title;
        $publishers = $book['publisher'];
        $publisher = $publishers->title;
        $authors = $book->authors;
        return view('book.show',compact('book','category','publisher','authors'));
    }

    public function delete(Book $book)
    {
        Book::find($book)->authors()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }

}
