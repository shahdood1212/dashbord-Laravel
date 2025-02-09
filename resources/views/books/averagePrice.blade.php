@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Average Book Price</h2>
    <div class="alert alert-warning">
        <h4>Average Price:</h4>
        <p>${{ number_format($averagePrice, 2) }}</p>
    </div>
</div>
@endsection
