@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Book</h2>
    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pages</label>
            <input type="number" name="pages" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Student</label>
            <select name="student_id" >
                @foreach ( $students as $student )
                <option value="{{ $student->id }}"> {{ $student -> name }}</option>
                
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
