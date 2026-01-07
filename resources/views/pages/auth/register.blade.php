<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - SiDesa Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        .bg-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://karosatuklik.com/wp-content/uploads/2021/11/6.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            z-index: 1;
        }
        
        .bg-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(61, 61, 61, 0.75) 0%, rgba(141, 141, 141, 0.438) 50%, rgba(133, 133, 133, 0.74) 100%);
            z-index: 2;
            backdrop-filter: blur(3px);
        }
        
        .register-container {
            position: relative;
            z-index: 3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .register-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(30px);
            border-radius: 24px;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            max-width: 520px;
            width: 100%;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #ffffff, #43a047, #66bb6a);
        }
        
        .register-header {
            text-align: center;
            padding: 3rem 2.5rem 2rem;
            background: linear-gradient(180deg, rgba(46, 125, 50, 0.03) 0%, transparent 100%);
        }
        
        .logo-container {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #2e7d32, #43a047);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(46, 125, 50, 0.3);
            position: relative;
        }
        
        .logo-container::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 22px;
            padding: 3px;
            background: linear-gradient(135deg, #66bb6a, #2e7d32);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.5;
        }
        
        .logo-icon {
            font-size: 2.5rem;
            color: white;
        }
        
        .register-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1b5e20;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .register-subtitle {
            color: #558b2f;
            font-weight: 400;
            font-size: 0.95rem;
        }
        
        .register-body {
            padding: 0 2.5rem 2.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #2e7d32;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
        }
        
        .form-label i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .form-control {
            border: 2px solid #e8f5e9;
            border-radius: 12px;
            padding: 0.9rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafafa;
            color: #1b5e20;
        }
        
        .form-control::placeholder {
            color: #a5d6a7;
        }
        
        .form-control:focus {
            border-color: #43a047;
            box-shadow: 0 0 0 4px rgba(67, 160, 71, 0.1);
            background: white;
            outline: none;
        }
        
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
            background: #e8f5e9;
        }
        
        .password-match {
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
        }
        
        .form-check-input:checked {
            background-color: #43a047;
            border-color: #43a047;
        }
        
        .form-check-label {
            color: #558b2f;
            font-weight: 500;
            font-size: 0.88rem;
        }
        
        .form-check-label a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 600;
        }
        
        .form-check-label a:hover {
            text-decoration: underline;
        }
        
        .btn-register {
            background: linear-gradient(135deg, #2e7d32 0%, #43a047 100%);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            color: white;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 15px rgba(46, 125, 50, 0.3);
        }
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(46, 125, 50, 0.4);
            background: linear-gradient(135deg, #cfcfcf 0%, #2e7d32 100%);
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-register:hover::before {
            left: 100%;
        }
        
        .divider {
            text-align: center;
            margin: 1.75rem 0;
            position: relative;
        }
        
        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #c8e6c9, transparent);
        }
        
        .divider span {
            background: white;
            padding: 0 1rem;
            color: #81c784;
            font-size: 0.85rem;
            font-weight: 500;
            position: relative;
        }
        
        .login-link {
            text-align: center;
            padding: 1.5rem 2.5rem;
            background: linear-gradient(180deg, transparent 0%, rgba(46, 125, 50, 0.03) 100%);
            border-top: 1px solid #e8f5e9;
            font-size: 0.9rem;
        }
        
        .login-link a {
            color: #2e7d32;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .login-link a:hover {
            color: #1b5e20;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
        }
        
        .alert-success {
            background: #e8f5e9;
            color: #2e7d32;
        }
        
        .alert-danger {
            background: #ffebee;
            color: #c62828;
        }
        
        .alert ul {
            margin-bottom: 0;
            padding-left: 1.25rem;
        }
        
        @media (max-width: 576px) {
            .register-card {
                margin: 1rem;
            }
            
            .register-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            
            .register-body {
                padding: 0 1.5rem 1.5rem;
            }
            
            .login-link {
                padding: 1.25rem 1.5rem;
            }
            
            .register-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="bg-overlay"></div>
    
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="register-card mx-auto">
                        <div class="register-header">
                            <div class="logo-container">
                                <i class="bi bi-person-plus-fill logo-icon"></i>
                            </div>
                            <h3 class="register-title">Buat Akun Baru</h3>
                            <p class="register-subtitle">Bergabunglah dengan Sistem Informasi Desa</p>
                        </div>

                        <div class="register-body">
                            <div class="alert alert-success alert-dismissible fade show d-none" id="successAlert">
                                <i class="bi bi-check-circle me-2"></i><span id="successMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div class="alert alert-danger alert-dismissible fade show d-none" id="errorAlert">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <ul class="mb-0 ps-3" id="errorList"></ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-person-fill"></i>Nama Lengkap
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="text" name="name" class="form-control" 
                                               value="{{ old('name') }}" 
                                               placeholder="Masukkan nama lengkap" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-envelope-fill"></i>Email
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="email" name="email" class="form-control" 
                                               value="{{ old('email') }}" 
                                               placeholder="contoh@email.com" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-lock-fill"></i>Password
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" name="password" id="password" class="form-control" 
                                               placeholder="Minimal 6 karakter" required onkeyup="checkPasswordStrength()">
                                    </div>
                                    <div class="password-strength" id="passwordStrength"></div>
                                    <small class="text-muted">Gunakan kombinasi huruf, angka, dan simbol</small>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-shield-check"></i>Konfirmasi Password
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" name="password_confirmation" id="passwordConfirm" class="form-control" 
                                               placeholder="Ulangi password" required onkeyup="checkPasswordMatch()">
                                    </div>
                                    <div class="password-match" id="passwordMatch"></div>
                                </div>

                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Saya setuju dengan <a href="#">syarat dan ketentuan</a>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-register w-100">
                                    <i class="bi bi-person-plus me-2"></i>
                                    Daftar Sekarang
                                </button>
                            </form>

                            <div class="divider">
                                <span>atau</span>
                            </div>
                        </div>

                        <div class="login-link">
                            <p class="mb-0">Sudah punya akun? 
                                <a href="{{ route('login') }}">
                                    <i class="bi bi-box-arrow-in-right me-1"></i>Masuk di sini
                                </a>
                            </p>
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
                    matchText.className = 'password-match text-success';
                } else {
                    matchText.textContent = '✗ Password tidak cocok';
                    matchText.className = 'password-match text-danger';
                }
            } else {
                matchText.textContent = '';
            }
        }

        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.01)';
                this.parentElement.style.transition = 'transform 0.2s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>