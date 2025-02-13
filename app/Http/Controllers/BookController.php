<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Student;

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
            $students= Student::all();
            return view('books.create' , compact('students'));
        }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'pages' => 'required|integer',
            'price' => 'required|numeric',
            'student_id' => 'required|integer',

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
        $students= Student::all();

        return view('books.edit', compact('book','students'));
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
    




