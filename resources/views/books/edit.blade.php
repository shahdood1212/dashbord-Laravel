@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Book</h2>
    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pages</label>
            <input type="number" name="pages" class="form-control" value="{{ $book->pages }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" value="{{ $book->price }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="student_id" >
                @foreach ( $students as $student )
                <option value="{{ $student->id }}"> {{ $student -> name }}</option>
                
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-warning">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
