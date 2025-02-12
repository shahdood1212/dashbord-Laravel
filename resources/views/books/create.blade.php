@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h3>📚 Add New Book</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                            @error('title')
                                <div class="alert alert-danger mt-2 animate__animated animate__shakeX">
                                    <strong>⚠️ Error:</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"> Author</label>
                            <input type="text" name="author" class="form-control @error('author') is-invalid @enderror" value="{{ old('author') }}" required>
                            @error('author')
                                <div class="alert alert-danger mt-2 animate__animated animate__shakeX">
                                    <strong>⚠️ Error:</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Pages</label>
                            <input type="number" name="pages" class="form-control @error('pages') is-invalid @enderror" value="{{ old('pages') }}" required>
                            @error('pages')
                                <div class="alert alert-danger mt-2 animate__animated animate__shakeX">
                                    <strong>⚠️ Error:</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold"> Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required>
                            @error('price')
                                <div class="alert alert-danger mt-2 animate__animated animate__shakeX">
                                    <strong>⚠️ Error:</strong> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success btn-lg w-100"> Add Book</button>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary mt-2 w-100"> Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

@endsection
