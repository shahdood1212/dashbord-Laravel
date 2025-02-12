<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get(); // استرجاع الكتب مع مؤلفيها
        return view('books.index', compact('books'));
    }

    public function dashboard()
    {
        $totalBooks = Book::count();
        $totalPrice = Book::sum('price');
        $averagePrice = Book::avg('price');
        $books = Book::with('author')->get(); // استرجاع الكتب مع مؤلفيها

        return view('dashboard', compact('totalBooks', 'totalPrice', 'averagePrice', 'books'));
    }

    public function create()
    {
        $authors = Author::all(); // استرجاع جميع المؤلفين لربط الكتاب بأحدهم
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
            'author_id' => 'required|exists:authors,id', // التحقق من وجود author_id
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $book = Book::with('author')->findOrFail($id); // استرجاع الكتاب مع مؤلفه
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $authors = Author::all(); // استرجاع جميع المؤلفين لربط الكتاب بأحدهم
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
            'author_id' => 'required|exists:authors,id', // التحقق من وجود author_id
        ]);

        $book->update($request->all());
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