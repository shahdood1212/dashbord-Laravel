@extends('layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
            <h2>📚 Authors Management</h2>
            <a href="{{ route('authors.create') }}" class="btn text-white px-4 py-2 rounded-pill shadow"
   style="background-color: #1a237e;">
    <i class="fas fa-plus me-2"></i> Add Author

        </a>
    </div>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Job Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                    <tr>
                        <td>{{ $author->name }}</td>
                        <td>{{ $author->email }}</td>
                        <td>{{ $author->jobdescription }}</td>
                        <td>
                            <a href="{{ route('authors.show', $author->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-warning">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('authors.destroy', $author->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection