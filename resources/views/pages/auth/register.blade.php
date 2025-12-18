<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SiDesa Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .auth-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            max-width: 900px;
            width: 100%;
        }
        .auth-left {
            background: linear-gradient(45deg, #667eea, #764ba2);
            color: white;
            padding: 3rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
        .auth-right {
            padding: 3rem;
        }
        .brand-logo {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background: linear-gradient(45deg, #667eea, #764ba2);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        .shape {
            position: absolute;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }
        .shape:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 10%; animation-delay: 0s; }
        .shape:nth-child(2) { width: 120px; height: 120px; top: 70%; left: 80%; animation-delay: 2s; }
        .shape:nth-child(3) { width: 60px; height: 60px; top: 40%; left: 70%; animation-delay: 4s; }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 5px;
            transition: all 0.3s ease;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="auth-container">
                    <div class="row g-0">
                        <!-- Left Panel -->
                        <div class="col-lg-6 auth-left position-relative">
                            <div class="floating-shapes">
                                <div class="shape"></div>
                                <div class="shape"></div>
                                <div class="shape"></div>
                            </div>
                            <div class="brand-logo">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                            <h2 class="fw-bold mb-3">Bergabung dengan Kami!</h2>
                            <p class="mb-4 opacity-75">Daftarkan diri Anda untuk mengakses sistem informasi desa dan berkontribusi dalam pembangunan desa.</p>
                            <div class="d-flex justify-content-center gap-3">
                                <div class="text-center">
                                    <i class="bi bi-shield-check fs-4 mb-2 d-block"></i>
                                    <small>Aman & Terpercaya</small>
                                </div>
                                <div class="text-center">
                                    <i class="bi bi-lightning fs-4 mb-2 d-block"></i>
                                    <small>Cepat & Mudah</small>
                                </div>
                                <div class="text-center">
                                    <i class="bi bi-people fs-4 mb-2 d-block"></i>
                                    <small>Komunitas Desa</small>
                                </div>
                            </div>
                        </div>

                        <!-- Right Panel -->
                        <div class="col-lg-6 auth-right">
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-dark">Buat Akun Baru</h3>
                                <p class="text-muted">Isi data dengan lengkap dan benar</p>
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
                                    <ul class="mb-0 ps-3">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-person me-2 text-primary"></i>Nama Lengkap
                                    </label>
                                    <input type="text" name="name" class="form-control" 
                                           value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-envelope me-2 text-primary"></i>Email
                                    </label>
                                    <input type="email" name="email" class="form-control" 
                                           value="{{ old('email') }}" placeholder="contoh@email.com" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-lock me-2 text-primary"></i>Password
                                    </label>
                                    <input type="password" name="password" id="password" class="form-control" 
                                           placeholder="Minimal 6 karakter" required onkeyup="checkPasswordStrength()">
                                    <div class="password-strength bg-light" id="passwordStrength"></div>
                                    <small class="text-muted">Gunakan kombinasi huruf, angka, dan simbol</small>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">
                                        <i class="bi bi-lock-fill me-2 text-primary"></i>Konfirmasi Password
                                    </label>
                                    <input type="password" name="password_confirmation" id="passwordConfirm" class="form-control" 
                                           placeholder="Ulangi password" required onkeyup="checkPasswordMatch()">
                                    <small id="passwordMatch" class="text-muted"></small>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Saya setuju dengan <a href="#" class="text-decoration-none">syarat dan ketentuan</a>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary w-100 mb-3">
                                    <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                                </button>

                                <div class="text-center">
                                    <span class="text-muted">Sudah punya akun? </span>
                                    <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                                        Masuk di sini
                                    </a>
                                </div>
                            </form>

                            <div class="text-center mt-4 pt-3 border-top">
                                <small class="text-muted">
                                    © 2024 SiDesa - Sistem Informasi Desa. Semua hak dilindungi.
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            
            let strength = 0;
            if (password.length >= 6) strength++;
            if (password.match(/[a-z]/)) strength++;
            if (password.match(/[A-Z]/)) strength++;
            if (password.match(/[0-9]/)) strength++;
            if (password.match(/[^a-zA-Z0-9]/)) strength++;
            
            const colors = ['#dc3545', '#fd7e14', '#ffc107', '#20c997', '#28a745'];
            const widths = ['20%', '40%', '60%', '80%', '100%'];
            
            if (password.length > 0) {
                strengthBar.style.backgroundColor = colors[strength - 1] || colors[0];
                strengthBar.style.width = widths[strength - 1] || widths[0];
            } else {
                strengthBar.style.width = '0%';
            }
        }
        
        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('passwordConfirm').value;
            const matchText = document.getElementById('passwordMatch');
            
            if (confirm.length > 0) {
                if (password === confirm) {
                    matchText.textContent = '✓ Password cocok';
                    matchText.className = 'text-success';
                } else {
                    matchText.textContent = '✗ Password tidak cocok';
                    matchText.className = 'text-danger';
                }
            } else {
                matchText.textContent = '';
            }
        }
    </script>
</body>
</html>