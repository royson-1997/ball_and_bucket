@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Balls</h1>
    <!-- Display the list of balls here -->
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Size (cubic inches)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($balls as $ball)
                    <tr>
                        <td>{{ $ball->color }}</td>
                        <td>{{ $ball->size }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Back to Home Button -->
    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
</div>
@endsection
