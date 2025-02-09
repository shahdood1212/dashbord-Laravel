<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::resource('books', BookController::class);

Route::get('/dashboard', [BookController::class, 'dashboard'])->name('dashboard');
