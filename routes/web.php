<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

Route::get('/dashboard', [BookController::class, 'dashboard'])->name('dashboard');
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/prices', [BookController::class, 'prices'])->name('books.prices');
Route::get('/average-price', [BookController::class, 'averagePrice'])->name('books.averagePrice');
