<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

Route::resource('books', BookController::class);

Route::get('/', [BookController::class, 'dashboard'])->name('dashboard');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/prices', [BookController::class, 'prices'])->name('books.prices');
Route::get('/average-price', [BookController::class, 'averagePrice'])->name('books.averagePrice');
Route::get('authors', [AuthorController::class, 'index'])->name('authors.index');
Route::resource('authors', AuthorController::class);