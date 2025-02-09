@extends('layout')

@section('content')
<div class="container mt-4">
    <h1>Total Price of Books</h1>
    <p>Total Price: ${{ number_format($totalPrice, 2) }}</p>
</div>
@endsection
