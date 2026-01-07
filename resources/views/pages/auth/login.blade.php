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
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.25) 50%, rgba(29, 78, 216, 0.15) 100%);
            z-index: 2;
            backdrop-filter: blur(8px);
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
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
            max-width: 450px;
            width: 100%;
            position: relative;
            border: 1px solid rgba(255, 255, 255, 0.3);
            animation: cardEnter 0.6s ease-out;
        }
        
        @keyframes cardEnter {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6, #2563eb, #1d4ed8);
        }
        
        .login-header {
            text-align: center;
            padding: 3rem 2.5rem 2rem;
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.05) 0%, transparent 100%);
        }
        
        .logo-container {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.3);
            position: relative;
            animation: logoFloat 3s ease-in-out infinite;
        }
        
        @keyframes logoFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .logo-container::after {
            content: '';
            position: absolute;
            inset: -3px;
            border-radius: 22px;
            padding: 3px;
            background: linear-gradient(135deg, #60a5fa, #3b82f6);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0.5;
        }
        
        .logo-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
            filter: brightness(0) invert(1);
        }
        
        .login-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .login-subtitle {
            color: #3b82f6;
            font-weight: 500;
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
            color: #1e40af;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }
        
        .form-label i {
            margin-right: 0.5rem;
            font-size: 1.1rem;
        }
        
        .input-wrapper {
            position: relative;
        }
        
        .form-control {
            border: 2px solid rgba(59, 130, 246, 0.2);
            border-radius: 12px;
            padding: 0.9rem 3rem 0.9rem 1.1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.7);
            color: #1e40af;
        }
        
        .form-control::placeholder {
            color: #93c5fd;
        }
        
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
            background: rgba(255, 255, 255, 0.95);
            outline: none;
        }
        
        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #60a5fa;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }
        
        .form-control:focus ~ .input-icon {
            color: #3b82f6;
            transform: translateY(-50%) scale(1.1);
        }
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.75rem;
            font-size: 0.88rem;
        }
        
        .form-check-input {
            border: 2px solid #93c5fd;
            transition: all 0.3s ease;
        }
        
        .form-check-input:checked {
            background-color: #3b82f6;
            border-color: #2563eb;
        }
        
        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
        
        .form-check-label {
            color: #1e40af;
            font-weight: 500;
            cursor: pointer;
            user-select: none;
        }
        
        .help-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .help-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2563eb;
            transition: width 0.3s ease;
        }
        
        .help-link:hover {
            color: #1d4ed8;
        }
        
        .help-link:hover::after {
            width: 100%;
        }
        
        .btn-login {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
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
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.4);
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.5);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        
        .btn-login:active {
            transform: translateY(0);
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
            background: linear-gradient(90deg, transparent, rgba(59, 130, 246, 0.3), transparent);
        }
        
        .divider span {
            background: rgba(255, 255, 255, 0.9);
            padding: 0 1rem;
            color: #60a5fa;
            font-size: 0.85rem;
            font-weight: 500;
            position: relative;
        }
        
        .register-link {
            text-align: center;
            padding: 1.5rem 2.5rem;
            background: linear-gradient(180deg, transparent 0%, rgba(59, 130, 246, 0.03) 100%);
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            font-size: 0.9rem;
            color: #1e40af;
        }
        
        .register-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .register-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2563eb;
            transition: width 0.3s ease;
        }
        
        .register-link a:hover {
            color: #1d4ed8;
        }
        
        .register-link a:hover::after {
            width: 100%;
        }
        
        .alert {
            border-radius: 12px;
            border: none;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            color: #15803d;
            border-left: 4px solid #22c55e;
        }
        
        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            color: #b91c1c;
            border-left: 4px solid #ef4444;
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
        
        .toggle-password:hover {
            color: #3b82f6;
        }
        
        .input-wrapper.focused {
            animation: inputPulse 0.3s ease-out;
        }
        
        @keyframes inputPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
        
        /* Ripple Effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(59, 130, 246, 0.3);
            transform: scale(0);
            animation: rippleEffect 0.6s ease-out;
            pointer-events: none;
        }
        
        @keyframes rippleEffect {
            to {
                transform: scale(4);
                opacity: 0;
            }
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
                                <img src="{{ asset('siDesa.png') }}" alt="Logo SiDesa" class="logo-image">
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
        // Toggle Password Visibility
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

        // Enhanced Input Focus Effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
            });
            
            // Floating label effect
            input.addEventListener('input', function() {
                const label = this.closest('.form-group').querySelector('.form-label');
                if (this.value) {
                    label.style.color = '#3b82f6';
                } else {
                    label.style.color = '#1e40af';
                }
            });
        });

        // Ripple Effect on Button Click
        document.querySelector('.btn-login').addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            ripple.classList.add('ripple');
            
            this.appendChild(ripple);
            
            setTimeout(() => {
                ripple.remove();
            }, 600);
        });

        // Smooth Scroll Animation
        window.addEventListener('load', function() {
            document.querySelector('.login-card').style.opacity = '0';
            setTimeout(() => {
                document.querySelector('.login-card').style.transition = 'opacity 0.6s ease-out';
                document.querySelector('.login-card').style.opacity = '1';
            }, 100);
        });

        // Form Validation Feedback
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.style.borderColor = '#ef4444';
                setTimeout(() => {
                    this.style.borderColor = '';
                }, 2000);
            });
        });

        // Checkbox Animation
        document.getElementById('remember').addEventListener('change', function() {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    label.style.transform = 'scale(1)';
                }, 200);
            }
        });

        // Keyboard Accessibility
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.matches('.form-control')) {
                const form = e.target.closest('form');
                const inputs = Array.from(form.querySelectorAll('.form-control'));
                const index = inputs.indexOf(e.target);
                
                if (index < inputs.length - 1) {
                    e.preventDefault();
                    inputs[index + 1].focus();
                }
            }
        });
    </script>
</body>
</html>