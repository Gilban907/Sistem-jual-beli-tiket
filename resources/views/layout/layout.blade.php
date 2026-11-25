<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', sans-serif; }
        .navbar { background: linear-gradient(to right, #0044cc, #007bff); }
        .event-card img { height: 200px; object-fit: cover; }
    </style>
</head>
<body>
    @include('components.navbar')
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
