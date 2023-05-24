<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Services\UploadImageService;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Image;
use App\Models\Publisher;


class BookController extends Controller
{
    public function __construct(
        protected Book $book,
        protected Author $author,
        protected Category $category,
        protected Publisher $publisher,
        protected Image $image,
        protected UploadImageService $uploadImageService
    )
    {
    }

    public function index()
    {
        $books = $this->book::all();
        return view('book.index',compact('books'));
    }

    public function show(Book $book)
    {
        return view('book.show',compact('book'));
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
        $authors = $data['authors'];

        $images = $this->uploadImageService->storeImages($data['preview_image'], $data['title'], $data['images'] ?? []);
        $data['image_id'] = $this->image::firstOrCreate($images)->id;

        unset($data['authors']);
        unset($data['preview_image']);
        unset($data['images']);

        $book = $this->book::firstOrCreate($data);
        $book->authors()->attach($authors);

        return redirect()->route('book.index');
    }

    public function create()
    {
        $authors = $this->author::all();
        $categories = $this->category::all();
        $publishers = $this->publisher::all();
        return view('book.create',compact('authors','categories','publishers'));
    }

    public function update(BookRequest $request,Book $book)
    {
        $data = $request->validated();
        $authors = $data['authors'];

        $imagData = $this->uploadImageService->storeImages($data['preview_image'], $data['title'], $data['images'] ?? []);
        $images = $this->image::find($book->image_id);

        unset($data['authors']);
        unset($data['preview_image']);
        unset($data['images']);

        $images->update($imagData);
        $book->update($data);

        $book->authors()->sync($authors);
        return view('book.show',compact('book'));
    }

    public function delete(Book $book)
    {
        Book::find($book->id)->authors()->detach();
        $book->delete();
        return redirect()->route('book.index');
    }

}
