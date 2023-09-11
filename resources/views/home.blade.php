@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ball and Bucket Task</h1>

    <div class="row mb-3">
        <!-- Display Buckets -->
        <h2>Buckets:</h2>
        <div class="col-6 card p-4">
            <!-- Create Bucket Form -->
            <h2>Create a New Bucket:</h2>
            <form method="POST" action="{{ route('buckets.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="bucket_name" class="col-sm-4 col-form-label">Bucket Name:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="bucket_name" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bucket_capacity" class="col-sm-4 col-form-label">Capacity (cubic inches):</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="capacity" id="bucket_capacity" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Bucket</button>
            </form>
        </div>
        <div class="col-6">
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

    <div class="row mb-3">
        <!-- Display Balls -->
        <h2>Balls:</h2>
        <div class="col-6 card p-4">
            <!-- Create Ball Form -->
            <h2>Create a New Ball:</h2>
            <form method="POST" action="{{ route('balls.store') }}">
                @csrf
                <div class="row mb-3">
                    <label for="ball_color" class="col-sm-4 col-form-label">Ball Color:</label>
                    <div class="col-sm-8">
                    <input type="text" class="form-control" name="color" id="ball_color" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="ball_size" class="col-sm-4 col-form-label">Size (cubic inches):</label>
                    <div class="col-sm-8">
                    <input type="number" step="0.1" min="0.1" class="form-control" name="size" id="ball_size" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Ball</button>
            </form>
        </div>
        <div class="col-6">
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

    <div class="row mt-5 mb-5">
        <div class="col-6 card p-4">
            <!-- Suggest Buckets Form -->
            <h2>Suggest Buckets for Balls:</h2>
            <form method="POST" action="{{ route('buckets.suggest') }}">
                @csrf
                <div class="row mb-3">
                    <label for="pink_balls" class="col-sm-4 col-form-label">PINK:</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="pink_balls" id="pink_balls" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="red_balls" class="col-sm-4 col-form-label">RED:</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="red_balls" id="red_balls" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="blue_balls" class="col-sm-4 col-form-label">BLUE:</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="blue_balls" id="blue_balls" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="orange_balls" class="col-sm-4 col-form-label">ORANGE:</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="orange_balls" id="orange_balls" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="yellow_balls" class="col-sm-4 col-form-label">YELLOW:</label>
                    <div class="col-sm-8">
                    <input type="number" class="form-control" name="yellow_balls" id="yellow_balls" required>
                    </div>
                </div>
                <!-- Add input fields for other ball colors if needed -->
                <button type="submit" class="btn btn-primary">Suggest Buckets</button>
            </form>
        </div>

        <div class="col-6">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Bucket</th>
                        <th scope="col">Capacity</th>
                        <th scope="col">Remaining Volume</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($buckets as $bucket)
                    <tr>
                        <td>Bucket {{ $bucket->name }}</td>
                        <td>{{ $bucket->capacity }}</td>
                        <td>{{ $bucket->empty_volume }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    
</div>
@endsection
