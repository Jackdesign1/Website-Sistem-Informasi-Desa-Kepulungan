<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Wisata Air Panas Wong Pulungan')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}">

</head>
<body>
    <!-- Panggil Navbar -->
    @include('partials.navbar')  

    <!-- Main Content -->
    <div class="container mt-4">
        @yield('content')  
    </div>

    @include('partials.footer')
    <!-- Bootstrap 5 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

