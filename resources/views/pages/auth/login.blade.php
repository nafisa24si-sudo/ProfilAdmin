<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiDesa Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Animated Background */
        .bg-animation {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }
        
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        .shape:nth-child(1) {
            width: 100px;
            height: 100px;
            top: 10%;
            left: 10%;
            animation-delay: 0s;
        }
        
        .shape:nth-child(2) {
            width: 150px;
            height: 150px;
            top: 70%;
            left: 80%;
            animation-delay: 3s;
        }
        
        .shape:nth-child(3) {
            width: 80px;
            height: 80px;
            top: 40%;
            left: 70%;
            animation-delay: 6s;
        }
        
        .shape:nth-child(4) {
            width: 120px;
            height: 120px;
            top: 20%;
            left: 60%;
            animation-delay: 9s;
        }
        
        .shape:nth-child(5) {
            width: 90px;
            height: 90px;
            top: 80%;
            left: 20%;
            animation-delay: 12s;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0px) rotate(0deg);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-30px) rotate(180deg);
                opacity: 1;
            }
            100% {
                transform: translateY(0px) rotate(360deg);
                opacity: 0.7;
            }
        }
        
        /* Main Container */
        .login-container {
            position: relative;
            z-index: 2;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border-radius: 25px;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.15),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            overflow: hidden;
            max-width: 1100px;
            width: 100%;
            position: relative;
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }
        
        /* Left Panel */
        .login-left {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 4rem 3rem;
            position: relative;
            overflow: hidden;
            min-height: 600px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        
        .login-left::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: backgroundMove 20s linear infinite;
        }
        
        @keyframes backgroundMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-30px, -30px); }
        }
        
        .login-content {
            position: relative;
            z-index: 2;
            text-align: center;
        }
        
        .system-logo {
            width: 100px;
            height: 100px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            overflow: hidden;
            border: 3px solid rgba(255, 255, 255, 0.3);
            animation: logoFloat 3s ease-in-out infinite;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }
        
        .logo-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 22px;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .village-illustration {
            width: 100%;
            height: 180px;
            border-radius: 20px;
            margin: 2rem 0;
            overflow: hidden;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .village-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 18px;
            transition: transform 0.3s ease;
        }
        
        .village-image:hover {
            transform: scale(1.05);
        }
        
        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }
        
        .feature-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .feature-item {
            background: rgba(255, 255, 255, 0.1);
            padding: 1rem;
            border-radius: 15px;
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            text-align: left;
        }
        
        .feature-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
        
        /* Right Panel */
        .login-right {
            padding: 4rem 3rem;
            background: white;
            position: relative;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: #718096;
            font-weight: 400;
        }
        
        /* Demo Credentials */
        .demo-box {
            background: linear-gradient(135deg, #e6f3ff 0%, #f0e6ff 100%);
            border: 2px dashed #667eea;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            position: relative;
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from { box-shadow: 0 0 10px rgba(102, 126, 234, 0.3); }
            to { box-shadow: 0 0 20px rgba(102, 126, 234, 0.6); }
        }
        
        .demo-box::before {
            content: '🔑';
            position: absolute;
            top: -15px;
            left: 20px;
            background: white;
            padding: 0 10px;
            font-size: 1.5rem;
        }
        
        /* Form Styling */
        .form-group {
            margin-bottom: 1.5rem;
            position: relative;
        }
        
        .form-label {
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }
        
        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 15px;
            padding: 1rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f7fafc;
            position: relative;
        }
        
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            background: white;
            transform: translateY(-1px);
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #a0aec0;
            transition: color 0.3s ease;
        }
        
        .form-control:focus + .input-icon {
            color: #667eea;
        }
        
        /* Button */
        .btn-login {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 15px;
            padding: 1rem 2rem;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        
        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
            left: 100%;
        }
        
        /* Additional Elements */
        .divider {
            text-align: center;
            margin: 2rem 0;
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
        }
        
        .divider span {
            background: white;
            padding: 0 1rem;
            color: #718096;
            font-size: 0.9rem;
        }
        
        .register-link {
            text-align: center;
            margin-top: 2rem;
        }
        
        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .register-link a:hover {
            color: #764ba2;
            text-decoration: underline;
        }
        
        /* Footer */
        .login-footer {
            text-align: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #e2e8f0;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .login-left {
                padding: 2rem;
                min-height: auto;
            }
            
            .login-right {
                padding: 2rem;
            }
            
            .feature-grid {
                grid-template-columns: 1fr;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <!-- Animated Background -->
    <div class="bg-animation">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
    </div>
    
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="login-card">
                        <div class="row g-0">
                            <!-- Left Panel - Identitas Sistem -->
                            <div class="col-lg-6 login-left">
                                <div class="login-content">
                                    <!-- Logo Horizontal -->
                                    <div class="text-center mb-4">
                                        <img src="{{ asset('images/logo-desa.png') }}" 
                                             alt="Logo Desa" style="width: 180px; height: 180px; object-fit: contain;">
                                        <h6 class="fw-light mt-3 opacity-90">Panel Admin</h6>
                                    </div>
                                    <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Sistem Informasi Desa Terpadu untuk Digitalisasi Administrasi Desa</p>
                                    
                                    <!-- Ilustrasi Desa dengan Foto -->
                                    <div class="village-illustration">
                                        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                                             alt="Perdesaan Hijau" class="village-image">
                                    </div>
                                    
                                    <!-- Fitur Grid -->
                                    <div class="feature-grid">
                                        <div class="feature-item">
                                            <i class="bi bi-newspaper mb-2 d-block" style="font-size: 1.2rem;"></i>
                                            <h6 class="fw-semibold mb-1" style="font-size: 0.8rem;">Berita Desa</h6>
                                            <small class="opacity-75" style="font-size: 0.7rem;">Publikasi informasi terkini</small>
                                        </div>
                                        
                                        <div class="feature-item">
                                            <i class="bi bi-calendar-event mb-2 d-block" style="font-size: 1.2rem;"></i>
                                            <h6 class="fw-semibold mb-1" style="font-size: 0.8rem;">Agenda</h6>
                                            <small class="opacity-75" style="font-size: 0.7rem;">Jadwal kegiatan desa</small>
                                        </div>
                                        
                                        <div class="feature-item">
                                            <i class="bi bi-people mb-2 d-block" style="font-size: 1.2rem;"></i>
                                            <h6 class="fw-semibold mb-1" style="font-size: 0.8rem;">Data Warga</h6>
                                            <small class="opacity-75" style="font-size: 0.7rem;">Database kependudukan</small>
                                        </div>
                                        
                                        <div class="feature-item">
                                            <i class="bi bi-images mb-2 d-block" style="font-size: 1.2rem;"></i>
                                            <h6 class="fw-semibold mb-1" style="font-size: 0.8rem;">Galeri</h6>
                                            <small class="opacity-75" style="font-size: 0.7rem;">Dokumentasi kegiatan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Panel - Form Login -->
                            <div class="col-lg-6 login-right">
                                <div class="login-header">
                                    <h3 class="login-title" style="font-size: 1.5rem;">Selamat Datang!</h3>
                                    <p class="login-subtitle" style="font-size: 0.8rem;">Masuk ke panel administrasi desa</p>
                                </div>



                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show">
                                        <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show">
                                        <i class="bi bi-exclamation-triangle me-2"></i>
                                        @foreach($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                    </div>
                                @endif

                                <form action="{{ route('login.post') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="bi bi-envelope-fill me-2 text-primary"></i>Email Administrator
                                        </label>
                                        <div class="position-relative">
                                            <input type="email" name="email" class="form-control" 
                                                   value="{{ old('email') }}" 
                                                   placeholder="Masukkan email admin" required>
                                            <i class="bi bi-at input-icon"></i>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">
                                            <i class="bi bi-shield-lock-fill me-2 text-primary"></i>Password
                                        </label>
                                        <div class="position-relative">
                                            <input type="password" name="password" id="password" class="form-control" 
                                                   placeholder="Masukkan password" required>
                                            <i class="bi bi-eye input-icon" id="togglePassword" style="cursor: pointer;"></i>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                            <label class="form-check-label text-muted" for="remember">
                                                Ingat saya
                                            </label>
                                        </div>
                                        <a href="#" class="text-decoration-none text-primary">
                                            <i class="bi bi-question-circle me-1"></i>Bantuan
                                        </a>
                                    </div>

                                    <button type="submit" class="btn btn-login text-white w-100 mb-3">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>
                                        Masuk ke Dashboard
                                    </button>
                                </form>

                                <div class="divider">
                                    <span>atau</span>
                                </div>

                                <div class="register-link">
                                    <p class="mb-0">Belum punya akun? 
                                        <a href="{{ route('register') }}">
                                            <i class="bi bi-person-plus me-1"></i>Daftar sekarang
                                        </a>
                                    </p>
                                </div>

                                <div class="login-footer">
                                    <small class="text-muted" style="font-size: 0.75rem;">
                                        <i class="bi bi-shield-check me-1"></i>
                                        © 2024 SiDesa - Sistem Informasi Desa Digital Indonesia
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this;
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.className = 'bi bi-eye-slash input-icon';
            } else {
                password.type = 'password';
                icon.className = 'bi bi-eye input-icon';
            }
        });

        // Form Animation
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>