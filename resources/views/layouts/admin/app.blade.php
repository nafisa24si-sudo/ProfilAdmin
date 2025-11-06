<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard Admin')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-32x32.png') }}">

    <!-- Bootstrap + Icons -->
    @include('layouts.admin.css')

    @stack('styles')
</head>

<body>
    <!-- MOBILE TOGGLE BUTTON -->
    <button class="mobile-toggle" onclick="document.querySelector('.sidebar').classList.toggle('hide')">
        <i class="bi bi-list"></i>
    </button>

    <!-- SIDEBAR -->
    @include('layouts.admin.sidebar');

    <!-- TOP NAVBAR -->
    @include('layouts.admin.header');

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    @include('layouts.admin.footer');

    <!-- Scripts -->
 @include('layouts.admin.js');

    @stack('scripts')
</body>
</html>
