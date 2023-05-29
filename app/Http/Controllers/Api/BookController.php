<?php

namespace App\Http\Controllers\Api;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BookRequest;
use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PublisherResource;
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
        $books = $this->book::filter($filters)
            ->orderBy($data['sorting'] ?? 'title',$data['order'] ?? 'asc')
            ->paginate($data['pages'] ?? 8,['*'],'page',$data['page']??1);
        return BookResource::collection($books);
    }

    public function getFilters(Book $book): JsonResponse
    {
        $result = [
            'categories' => CategoryResource::collection($this->category::all()),
            'authors' => AuthorResource::collection( $authors = $this->author::all()),
            'publishers' => PublisherResource::collection( $this->publisher::all()),
            'price' => [
                'max' =>  $this->book::orderBy('price','DESC')->first()->price,
                'min' => $this->book::orderBy('price','ASC')->first()->price,
            ],
            'year' => [
                'old' =>  $this->book::orderBy('year','DESC')->first()->year,
                'new' => $this->book::orderBy('year','ASC')->first()->year,
            ]
        ];

        return response()->json($result);
    }

}
