<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Opción de CSS con Laravel Mix -->
    @if (config('app.use_mix'))
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @endif
</head>
<body>
    <!-- Your content here -->
    @yield('content')
    <!-- Opción de JS con Laravel Mix -->
    @if (config('app.use_mix'))
        <script src="{{ mix('js/app.js') }}"></script>
    @else
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    @endif
</body>
</html>
