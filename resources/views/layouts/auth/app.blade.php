<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Desa</title>

    <!-- Bootstrap 5 -->


    {{-- Start CSS --}}
    @include('layouts.auth.css');
    {{-- End CSs --}}
</head>
<body>
    <!-- Floating WhatsApp Button -->
    @include('layouts.auth.footer');

    <div class="login-container">
        <!-- Panel Kiri -->
        <div class="login-left">
            <!-- Logo dan Brand -->
            <div class="logo-container">
                <img src="https://via.placeholder.com/120x120/4e73df/ffffff?text=LOGO" alt="Logo Desa" class="logo">
                <div class="brand-name">DESA MANDIRI</div>
                <div class="brand-tagline">Membangun Desa Digital</div>
            </div>

            <!-- Gambar Ilustrasi -->
            <div class="text-center">
                <img src="https://via.placeholder.com/300x200/ffffff/4e73df?text=ILUSTRASI" alt="Ilustrasi Desa Digital" class="feature-image">
            </div>

            <h1 class="welcome-title">Selamat Datang!</h1>
            <p class="welcome-text">Sistem Informasi Desa - Kelola data desa dengan mudah dan efisien</p>

            <div class="features-list">
                <div class="feature-item">
                    <i class="fas fa-check"></i>
                    <span>Kelola data profil desa</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check"></i>
                    <span>Publikasi berita dan informasi</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check"></i>
                    <span>Manajemen kategori konten</span>
                </div>
                <div class="feature-item">
                    <i class="fas fa-check"></i>
                    <span>Akses data real-time</span>
                </div>
            </div>
        </div>

        @yield('content');
    </div>

    <!-- Bootstrap JS -->
    @include('layouts.auth.js');
</body>
</html>
