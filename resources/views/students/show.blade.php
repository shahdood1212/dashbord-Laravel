@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h2 class="mb-3">📖 Book Details</h2>

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <td>{{ $student->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $student->email }}</td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td>{{ $student->phone }}</td>
            </tr>
            <tr>
                <th>Created At</th>
                <td>{{ $student->created_at->format('Y-m-d H:i') }}</td>
            </tr>
            <tr>
                <th>Updated At</th>
                <td>{{ $student->updated_at->format('Y-m-d H:i') }}</td>
            </tr>
        </table>

        <a href="{{ route('students.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> Back to List
        </a>
    </div>
</div>
@endsection
