<?php

namespace App\Http\Controllers;

use App\Models\Book;
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
    $averagePrice = Book::average('price');
    
    return view('dashboard', compact('totalBooks', 'totalPrice', 'averagePrice'));
}

        public function create()
        {
            return view('books.create');
        }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Book::create($request->all());
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

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
    }
}
