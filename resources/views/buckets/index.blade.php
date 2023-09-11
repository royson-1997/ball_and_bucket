@extends('layouts.app')

@section('content')
<div class="container">
    <h1>List of Buckets</h1>
    <!-- Display the list of buckets here -->
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Capacity (cubic inches)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($buckets as $bucket)
                    <tr>
                        <td>{{ $bucket->name }}</td>
                        <td>{{ $bucket->capacity }}</td>
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
