@extends('layout')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Create New Author</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Job Title</label>
                    <input type="text" name="jobdescription" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Bio</label>
                    <textarea name="bio" class="form-control" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Profile Image</label>
                    <input type="file" name="imageprofile" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Save Author
                </button>
            </form>
        </div>
    </div>
</div>
@endsection