<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SiDesa Admin Panel</title>
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
            background: linear-gradient(135deg, rgba(192, 192, 192, 0.75) 0%, rgba(0, 0, 0, 0.459) 50%, rgba(158, 158, 158, 0.384) 100%);
            z-index: 2;
            backdrop-filter: blur(3px);
        }
        
        .login-container {
            position: relative;
            z-index: 3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 2rem 0;
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.97);
            backdrop-filter: blur(30px);
            border-radius: 24px;
            box-shadow: 
                0 30px 60px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #2e7d32, #43a047, #66bb6a);
        }
        
        .login-header {
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
            background: linear-gradient(135deg, #919191, #ffffff);
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
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #000000;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .login-subtitle {
            color: #000000;
            font-weight: 400;
            font-size: 0.95rem;
        }
        
        .login-body {
            padding: 0 2.5rem 2.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-label {
            font-weight: 600;
            color: #000000;
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
            padding: 0.9rem 3rem 0.9rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fafafa;
            color: #0564f1;
        }
        
        .form-control::placeholder {
            color: #a5d6a7;
        }
        
        .form-control:focus {
            border-color: #313131;
            box-shadow: 0 0 0 4px rgba(67, 160, 71, 0.1);
            background: white;
            outline: none;
        }
        
        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #000000;
            transition: color 0.3s ease;
            font-size: 1.1rem;
        }
        
        .form-control:focus ~ .input-icon {
            color: #000000;
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.75rem;
            font-size: 0.88rem;
        }
        
        .form-check-input:checked {
            background-color: #43a047;
            border-color: rgb(65, 65, 65);
        }
        
        .form-check-label {
            color: #006af5;
            font-weight: 500;
        }
        
        .help-link {
            color: #003f00;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .help-link:hover {
            color: #414141;
        }
        
        .btn-login {
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
            box-shadow: 0 4px 15px rgba(250, 250, 250, 0.3);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(117, 236, 162, 0.521);
            background: linear-gradient(135deg, #d4d4d4 0%, #cacaca 100%);
        }
        
        .btn-login::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(36, 214, 125, 0.767), transparent);
            transition: left 0.5s;
        }
        
        .btn-login:hover::before {
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
            background: rgb(255, 255, 255);
            padding: 0 1rem;
            color: #000000;
            font-size: 0.85rem;
            font-weight: 500;
            position: relative;
        }
        
        .register-link {
            text-align: center;
            padding: 1.5rem 2.5rem;
            background: linear-gradient(180deg, transparent 0%, rgba(255, 255, 255, 0.03) 100%);
            border-top: 1px solid #e8f5e9;
            font-size: 0.9rem;
        }
        
        .register-link a {
            color: #444444;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .register-link a:hover {
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
        
        @media (max-width: 576px) {
            .login-card {
                margin: 1rem;
            }
            
            .login-header {
                padding: 2rem 1.5rem 1.5rem;
            }
            
            .login-body {
                padding: 0 1.5rem 1.5rem;
            }
            
            .register-link {
                padding: 1.25rem 1.5rem;
            }
            
            .login-title {
                font-size: 1.5rem;
            }
        }
        
        .toggle-password {
            cursor: pointer;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="bg-image"></div>
    <div class="bg-overlay"></div>
    
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="login-card mx-auto">
                        <div class="login-header">
                            <div class="logo-container">
                                <i class="bi bi-house-heart-fill logo-icon"></i>
                            </div>
                            <h3 class="login-title">Selamat Datang!</h3>
                            <p class="login-subtitle">Masuk ke Panel Administrasi Desa</p>
                        </div>

                        <div class="login-body">
                            <div class="alert alert-success alert-dismissible fade show d-none" id="successAlert">
                                <i class="bi bi-check-circle me-2"></i><span id="successMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <div class="alert alert-danger alert-dismissible fade show d-none" id="errorAlert">
                                <i class="bi bi-exclamation-triangle me-2"></i><span id="errorMessage"></span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>

                            <form action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-envelope-fill"></i>Email Administrator
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="email" name="email" class="form-control" 
                                               value="{{ old('email') }}" 
                                               placeholder="Masukkan email admin" required>
                                        <i class="bi bi-at input-icon"></i>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-shield-lock-fill"></i>Password
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" name="password" id="password" class="form-control" 
                                               placeholder="Masukkan password" required>
                                        <i class="bi bi-eye input-icon toggle-password" id="togglePassword"></i>
                                    </div>
                                </div>

                                <div class="form-options">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Ingat saya
                                        </label>
                                    </div>
                                    <a href="#" class="help-link">
                                        <i class="bi bi-question-circle me-1"></i>Bantuan
                                    </a>
                                </div>

                                <button type="submit" class="btn btn-login w-100">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Masuk ke Dashboard
                                </button>
                            </form>

                            <div class="divider">
                                <span>atau</span>
                            </div>
                        </div>

                        <div class="register-link">
                            <p class="mb-0">Belum punya akun? 
                                <a href="{{ route('register') }}">
                                    <i class="bi bi-person-plus me-1"></i>Daftar sekarang
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
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this;
            
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                password.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        });

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