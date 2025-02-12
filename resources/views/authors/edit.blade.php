@extends('layout')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Edit Author: {{ $author->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('authors.update', $author->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $author->name }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $author->email }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="jobdescription" class="form-control" value="{{ $author->jobdescription }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="3" required>{{ $author->bio }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="imageprofile" class="form-control">
                    @if($author->imageprofile)
                        <img src="{{ asset('storage/' . $author->imageprofile) }}" class="img-thumbnail mt-2" style="max-width: 150px">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Author
                </button>
            </form>
        </div>
    </div>
</div>
@endsection