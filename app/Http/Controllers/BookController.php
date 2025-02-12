<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalPrice = Book::sum('price');
        $averagePrice = Book::avg('price');
        $books = Book::all();

        return view('dashboard', compact('totalBooks', 'totalPrice', 'averagePrice', 'books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest $request) // Using BookRequest for validation
    {
        Book::create($request->validated());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(BookRequest $request, Book $book) // Using BookRequest for validation
    {
        $book->update($request->validated());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }

    public function prices()
    {
        $totalPrice = Book::sum('price');
        return view('books.prices', compact('totalPrice'));
    }

    public function averagePrice()
    {
        $averagePrice = Book::avg('price');
        return view('books.averagePrice', compact('averagePrice'));
    }
}
