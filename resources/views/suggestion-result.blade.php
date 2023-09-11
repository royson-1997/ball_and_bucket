@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Suggestion Results</h1>
    <!-- Display Suggestion Results -->
    <div class="row">
        <div class="col-8">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Bucket</th>
                        <th scope="col">Result</th>
                    </tr>
                </thead>
                <tbody>
                <!-- @foreach ($bucketWiseSuggestion as $final)
                    <tr>
                        <td>Bucket {{ $final->count }}</td>
                        <td>Place {{ $final->count }} balls.</td>
                    </tr>
                @endforeach -->
                </tbody>
            </table>

            @if ($extraBallsMessage)
                <p>{{ $extraBallsMessage }}</p>
            @endif

        </div>
        
    </div>
    <!-- Back to Home Button -->
    <a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
    
</div>
@endsection
