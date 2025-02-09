@extends('layout')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3 shadow">
                <h5>Total Books</h5>
                <h2>{{ $totalBooks }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white p-3 shadow">
                <h5>Total Price of Books</h5>
                <h2>${{ number_format($totalPrice, 2) }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-secondary text-white p-3 shadow">
                <h5>Average Book Price</h5>
                <h2>${{ number_format($averagePrice, 2) }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection
