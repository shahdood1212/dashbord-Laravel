@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3">📖 Book Details</h2>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $book->id }}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{ $book->title }}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{ $book->author }}</td>
            </tr>
            <tr>
                <th>Pages</th>
                <td>{{ $book->pages }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>${{ number_format($book->price, 2) }}</td>
            </tr>
            <tr>
                <th>Student ID</th>
                <td>{{ $book->student_id }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $book->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $book->updated_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        <a href="{{ route('books.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>
@endsection
