@extends('layout')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Author Details</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 text-center">
                    @if($author->imageprofile)
                        <img src="{{ asset('storage/' . $author->imageprofile) }}" 
                             class="img-fluid rounded-circle shadow-lg" 
                             style="max-width: 200px; border: 3px solid #1a237e;">
                    @else
                        <div class="text-muted">No Image Available</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h3 class="text-primary">{{ $author->name }}</h3>
                    <p class="text-muted">
                        <i class="fas fa-envelope me-2"></i>{{ $author->email }}
                    </p>
                    <h5 class="text-success">
                        <i class="fas fa-briefcase me-2"></i>{{ $author->jobdescription }}
                    </h5>
                    <p class="lead bg-light p-3 rounded">
                        {{ $author->bio }}
                    </p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('authors.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i>Back to List
            </a>
        </div>
    </div>
</div>
@endsection