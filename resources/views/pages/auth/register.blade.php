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
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.25) 50%, rgba(29, 78, 216, 0.15) 100%);
            z-index: 2;
            backdrop-filter: blur(8px);
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
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            box-shadow: 
                0 20px 60px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.3),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            overflow: hidden;
            max-width: 520px;
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
        
        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #3b82f6, #2563eb, #1d4ed8);
        }
        
        .register-header {
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
        
        .register-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }
        
        .register-subtitle {
            color: #3b82f6;
            font-weight: 500;
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
            padding: 0.9rem 1.1rem;
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
        
        .password-strength {
            height: 4px;
            border-radius: 2px;
            margin-top: 0.5rem;
            transition: all 0.3s ease;
            background: rgba(59, 130, 246, 0.1);
            overflow: hidden;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }
        
        .password-match {
            font-size: 0.85rem;
            margin-top: 0.5rem;
            font-weight: 500;
            transition: all 0.3s ease;
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
            font-size: 0.88rem;
            cursor: pointer;
            user-select: none;
        }
        
        .form-check-label a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }
        
        .form-check-label a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
        
        .btn-register {
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
        
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.5);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }
        
        .btn-register:active {
            transform: translateY(0);
        }
        
        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
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
        
        .login-link {
            text-align: center;
            padding: 1.5rem 2.5rem;
            background: linear-gradient(180deg, transparent 0%, rgba(59, 130, 246, 0.03) 100%);
            border-top: 1px solid rgba(59, 130, 246, 0.1);
            font-size: 0.9rem;
            color: #1e40af;
        }
        
        .login-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .login-link a::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background: #2563eb;
            transition: width 0.3s ease;
        }
        
        .login-link a:hover {
            color: #1d4ed8;
        }
        
        .login-link a:hover::after {
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
    
    <div class="register-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="register-card mx-auto">
                        <div class="register-header">
                            <div class="logo-container">
                                <img src="{{ asset('siDesa.png') }}" alt="Logo SiDesa" class="logo-image">
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
                                               placeholder="Minimal 6 karakter" required>
                                    </div>
                                    <div class="password-strength">
                                        <div class="password-strength-bar" id="strengthBar"></div>
                                    </div>
                                    <small class="text-muted">Gunakan kombinasi huruf, angka, dan simbol</small>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">
                                        <i class="bi bi-shield-check"></i>Konfirmasi Password
                                    </label>
                                    <div class="input-wrapper">
                                        <input type="password" name="password_confirmation" id="passwordConfirm" class="form-control" 
                                               placeholder="Ulangi password" required>
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
        // Password Strength Checker
        const password = document.getElementById('password');
        const strengthBar = document.getElementById('strengthBar');
        
        password.addEventListener('input', function() {
            const val = this.value;
            let strength = 0;
            
            if (val.length >= 6) strength++;
            if (val.match(/[a-z]/)) strength++;
            if (val.match(/[A-Z]/)) strength++;
            if (val.match(/[0-9]/)) strength++;
            if (val.match(/[^a-zA-Z0-9]/)) strength++;
            
            const colors = ['#ef4444', '#f97316', '#eab308', '#22c55e', '#10b981'];
            const widths = ['20%', '40%', '60%', '80%', '100%'];
            
            if (val.length > 0) {
                strengthBar.style.backgroundColor = colors[strength - 1] || colors[0];
                strengthBar.style.width = widths[strength - 1] || widths[0];
            } else {
                strengthBar.style.width = '0%';
            }
            
            checkPasswordMatch();
        });
        
        // Password Match Checker
        const passwordConfirm = document.getElementById('passwordConfirm');
        const matchText = document.getElementById('passwordMatch');
        
        function checkPasswordMatch() {
            const pass = password.value;
            const confirm = passwordConfirm.value;
            
            if (confirm.length > 0) {
                if (pass === confirm && pass.length >= 6) {
                    matchText.innerHTML = '<i class="bi bi-check-circle-fill me-1"></i>Password cocok';
                    matchText.className = 'password-match text-success';
                    matchText.style.opacity = '1';
                } else {
                    matchText.innerHTML = '<i class="bi bi-x-circle-fill me-1"></i>Password tidak cocok';
                    matchText.className = 'password-match text-danger';
                    matchText.style.opacity = '1';
                }
            } else {
                matchText.style.opacity = '0';
            }
        }
        
        passwordConfirm.addEventListener('input', checkPasswordMatch);

        // Enhanced Input Focus Effects
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
                const label = this.closest('.form-group').querySelector('.form-label');
                label.style.color = '#3b82f6';
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
                const label = this.closest('.form-group').querySelector('.form-label');
                if (!this.value) {
                    label.style.color = '#1e40af';
                }
            });
        });

        // Ripple Effect on Button Click
        document.querySelector('.btn-register').addEventListener('click', function(e) {
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

        // Form Validation Feedback
        document.querySelectorAll('.form-control').forEach(input => {
            input.addEventListener('invalid', function(e) {
                e.preventDefault();
                this.style.borderColor = '#ef4444';
                this.style.animation = 'shake 0.5s';
                setTimeout(() => {
                    this.style.borderColor = '';
                    this.style.animation = '';
                }, 500);
            });
        });

        // Checkbox Animation
        document.getElementById('terms').addEventListener('change', function() {
            const label = this.nextElementSibling;
            if (this.checked) {
                label.style.transform = 'scale(1.05)';
                label.style.transition = 'transform 0.2s ease';
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

        // Smooth Scroll Animation
        window.addEventListener('load', function() {
            document.querySelector('.register-card').style.opacity = '0';
            setTimeout(() => {
                document.querySelector('.register-card').style.transition = 'opacity 0.6s ease-out';
                document.querySelector('.register-card').style.opacity = '1';
            }, 100);
        });

        // Add shake animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                25% { transform: translateX(-10px); }
                75% { transform: translateX(10px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>