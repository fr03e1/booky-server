<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Api\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;


class BookController extends Controller
{

    public function index(BookRequest $bookRequest)
    {
        $data = $bookRequest->validated();
        $filters = app()->make(BookFilter::class,['queryParams'=>array_filter($data)]);
        $books = Book::filter($filters)->paginate(5);
        return BookResource::collection($books);
    }
}
