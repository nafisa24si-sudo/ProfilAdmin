<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Desa</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #4e73df;
            --primary-dark: #375ac1;
            --text-color: #333;
            --light-gray: #f8f9fa;
            --border-color: #e0e0e0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            color: var(--text-color);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            display: flex;
            max-width: 1100px;
            width: 100%;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .login-left {
            flex: 1;
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .login-right {
            flex: 1;
            background-color: white;
            padding: 50px 40px;
        }

        /* Logo Styles */
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo {
            max-width: 120px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .brand-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: white;
            margin-bottom: 5px;
        }

        .brand-tagline {
            font-size: 0.9rem;
            opacity: 0.9;
            font-style: italic;
        }

        /* Image Styles */
        .feature-image {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .welcome-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-align: center;
        }

        .welcome-text {
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 25px;
            opacity: 0.9;
            text-align: center;
        }

        .signin-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 40px;
            color: var(--text-color);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .signin-title i {
            background-color: var(--primary-color);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
        }

        .form-check-label {
            color: #495057;
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            color: white;
            padding: 12px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            margin-top: 10px;
            font-size: 1rem;
        }

        .btn-login:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .forgot-password {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .create-account {
            text-align: center;
            margin-top: 30px;
            color: #6c757d;
        }

        .create-account a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .create-account a:hover {
            text-decoration: underline;
        }

        /* Features List */
        .features-list {
            margin-top: 25px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            padding: 8px 0;
        }

        .feature-item i {
            background: rgba(255, 255, 255, 0.2);
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 0.9rem;
        }

        /* Notifikasi Styles */
        .alert {
            border-radius: 10px;
            border: none;
        }

        .alert-success {
            background-color: #d1edff;
            color: #0c5460;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert ul {
            margin-bottom: 0;
        }

        /* Loading spinner */
        .spinner-border {
            width: 1rem;
            height: 1rem;
        }

        /* WhatsApp Floating Button Styles */
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 1000;
        }

        .whatsapp-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: #25D366;
            color: white;
            border-radius: 50%;
            text-align: center;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            text-decoration: none;
            transition: all 0.3s ease;
            position: relative;
            animation: pulse 2s infinite;
        }

        .whatsapp-link:hover {
            background: #128C7E;
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
        }

        .whatsapp-link i {
            font-size: 32px;
        }

        .whatsapp-tooltip {
            position: absolute;
            bottom: 70px;
            right: 0;
            background: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            white-space: nowrap;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            pointer-events: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        .whatsapp-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            right: 20px;
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
        }

        .whatsapp-float:hover .whatsapp-tooltip {
            opacity: 1;
            transform: translateY(0);
        }

        /* Pulse Animation */
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
                max-width: 450px;
            }

            .login-left, .login-right {
                padding: 40px 30px;
            }

            .welcome-title {
                font-size: 1.8rem;
            }

            .signin-title {
                font-size: 1.6rem;
            }

            .brand-name {
                font-size: 1.5rem;
            }

            .whatsapp-float {
                bottom: 20px;
                right: 20px;
            }

            .whatsapp-link {
                width: 55px;
                height: 55px;
            }

            .whatsapp-link i {
                font-size: 28px;
            }
        }

        @media (max-width: 576px) {
            .login-left, .login-right {
                padding: 30px 20px;
            }

            .welcome-title {
                font-size: 1.6rem;
            }

            .signin-title {
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- Floating WhatsApp Button -->
    <div class="whatsapp-float">
        <a href="https://wa.me/6281234567890?text=Halo%2C%20saya%20membutuhkan%20bantuan%20untuk%20login%20ke%20sistem"
           target="_blank"
           class="whatsapp-link"
           id="whatsappFloat">
            <i class="fab fa-whatsapp"></i>
        </a>
        <div class="whatsapp-tooltip">
            Butuh Bantuan Login?
        </div>
    </div>

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

        <!-- Panel Kanan -->
        <div class="login-right">
            <!-- Logo kecil di form login -->
            <div class="text-center mb-4">
                <img src="https://via.placeholder.com/80x80/4e73df/ffffff?text=DS" alt="Logo" class="logo" style="max-width: 60px;">
            </div>

            <h2 class="signin-title">
                <i class="fas fa-user"></i>
                Masuk ke Sistem
            </h2>

            <!-- Notifikasi sukses -->
            @if (session('success'))
                <div class="alert alert-success py-2">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            <!-- Notifikasi error -->
            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form-label">
                        <i class="fas fa-envelope me-2 text-primary"></i>Alamat Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email') }}"
                        placeholder="contoh@email.com"
                        required
                        autofocus>
                </div>

                <div class="mb-4 password-container">
                    <label for="password" class="form-label">
                        <i class="fas fa-lock me-2 text-primary"></i>Kata Sandi
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        placeholder="Masukkan kata sandi"
                        required>
                    <button type="button" class="password-toggle" id="togglePassword">
                        <i class="far fa-eye"></i>
                    </button>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                        <label class="form-check-label" for="rememberMe">
                            Ingat saya
                        </label>
                    </div>
                    <a href="#" class="forgot-password">
                        <i class="fas fa-key me-1"></i>Lupa kata sandi?
                    </a>
                </div>

                <button type="submit" class="btn-login" id="loginButton">
                    <span id="loginText">
                        <i class="fas fa-sign-in-alt me-2"></i>Masuk ke Dashboard
                    </span>
                    <span id="loginSpinner" class="spinner-border spinner-border-sm d-none" role="status"></span>
                </button>

                <div class="create-account">
                    <p class="mb-0">Belum punya akun?
                        <a href="{{ route('register') }}">
                            <i class="fas fa-user-plus me-1"></i>Daftar di sini
                        </a>
                    </p>
                </div>

                <!-- Footer Copyright -->
                <div class="text-center mt-4 pt-3 border-top">
                    <small class="text-muted">
                        &copy; 2024 Sistem Desa Mandiri. All rights reserved.
                    </small>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form submission untuk login
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            // Tampilkan loading spinner
            const loginButton = document.getElementById('loginButton');
            const loginText = document.getElementById('loginText');
            const loginSpinner = document.getElementById('loginSpinner');

            loginText.innerHTML = '<i class="fas fa-spinner me-2"></i>Memproses...';
            loginSpinner.classList.remove('d-none');
            loginButton.disabled = true;
        });

        // WhatsApp button click tracking
        document.getElementById('whatsappFloat').addEventListener('click', function() {
            console.log('WhatsApp button clicked from login page');
        });
    </script>
</body>
</html>
