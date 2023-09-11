<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title', 'Ball & Bucket')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <header class="container mt-5">
        <!-- Navigation menu -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('buckets.index') }}">Buckets</a></li>
                <li class="breadcrumb-item"><a href="{{ route('balls.index') }}">Balls</a></li>
                <li class="breadcrumb-item"><a href="{{ route('result.data') }}">Result</a></li>
            </ul>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>
