<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('main.index');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('category.index');
    Route::post('/categories', 'store')->name('category.store');
    Route::get('/categories/create', 'create')->name('category.create');
    Route::get('/categories/{category}', 'show')->name('category.show');
    Route::get('/categories/edit/{category}', 'edit')->name('category.edit');
    Route::patch('/categories/{category}', 'update')->name('category.update');
    Route::delete('/categories/{category}', 'delete')->name('category.delete');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'index')->name('author.index');
    Route::post('/authors','store')->name('author.store');
    Route::get('/authors/create', 'create')->name('author.create');
    Route::get('/authors/{author}', 'show')->name('author.show');
    Route::get('/authors/edit/{author}', 'edit')->name('author.edit');
    Route::patch('/authors/{author}', 'update')->name('author.update');
    Route::delete('/authors/{author}', 'delete')->name('author.delete');
});

Route::controller(PublisherController::class)->group(function () {
    Route::get('/publishers', 'index')->name('publisher.index');
    Route::post('/publishers', 'store')->name('publisher.store');
    Route::get('/publishers/create', 'create')->name('publisher.create');
    Route::get('/publishers/{publisher}', 'show')->name('publisher.show');
    Route::get('/publishers/edit/{publisher}', 'edit')->name('publisher.edit');
    Route::patch('/publishers/{publisher}', 'update')->name('publisher.update');
    Route::delete('/publishers/{publisher}', 'delete')->name('publisher.delete');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index')->name('book.index');
    Route::post('/books', 'store')->name('book.store');
    Route::get('/books/create', 'create')->name('book.create');
    Route::get('/books/{book}', 'show')->name('book.show');
    Route::get('/books/edit/{book}', 'edit')->name('book.edit');
    Route::patch('/books/{book}', 'update')->name('book.update');
    Route::delete('/books/{book}', 'delete')->name('book.delete');
});


Route::middleware('auth')->group(function () {

//
//    Route::post('logout', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
//        ->name('logout');


//
//
//    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
//    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
//    Route::get('/users/store', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
//    Route::get('/users/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
//    Route::get('/users/edit/{user}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
//    Route::patch('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
//    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
});
