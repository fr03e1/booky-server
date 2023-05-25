<?php

use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\AuthorController;
use App\Http\Controllers\Web\BookController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\PublisherController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login','login')->name('login');
    Route::post('/login','store')->name('login.store');
    Route::post('logout', 'delete')->name('logout');
});

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

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index')->name('user.index');
    Route::post('/users', 'store')->name('user.store');
    Route::get('/users/create', 'create')->name('user.create');
    Route::get('/users/{user}', 'show')->name('user.show');
    Route::get('/users/edit/{user}', 'edit')->name('user.edit');
    Route::patch('/users/{user}', 'update')->name('user.update');
    Route::delete('/users/{user}', 'delete')->name('user.delete');
});


