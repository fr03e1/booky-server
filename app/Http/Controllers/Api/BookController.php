<?php

namespace App\Http\Controllers\Api;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;


class BookController extends Controller
{
        public function __construct(
            protected Book $book,
            protected Category $category,
            protected Author $author,
            protected Publisher $publisher,
        )
        {
        }

    public function index(BookRequest $bookRequest): AnonymousResourceCollection
    {
        $data = $bookRequest->validated();
        $filters = app()->make(BookFilter::class,['queryParams'=>array_filter($data)]);
        $books = $this->book::filter($filters)->paginate(4);
        return BookResource::collection($books);
    }

    public function getFilters(Book $book): JsonResponse
    {
        $categories = $this->category::all();
        $authors = $this->author::all();
        $publishers = $this->publisher::all();

        $maxPrice = $this->book::orderBy('price','DESC')->first()->price;
        $minPrice = $this->book::orderBy('price','ASC')->first()->price ;

        $result = [
            'categories' => $categories,
            'authors' => $authors,
            'publishers' => $publishers,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice,
            ]
        ];
        return response()->json($result);
    }

}
