
@extends('layouts.auth.app')
        <!-- Panel Kanan -->
@section('content')
        <div class="login-right">
            <!-- Logo kecil di form login -->
            <div class="text-center mb-4">
                <img src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fgiriemas-buleleng.desa.id%2Findex.php%2Ffirst%2Fartikel%2F112-MAKNA-DARI-LAMBANG-BUMDES-LABDAJAYA-DESA-GIRI-EMAS&psig=AOvVaw2K5NrFdC9G2B3JH5kB3oBC&ust=1762962589804000&source=images&cd=vfe&opi=89978449&ved=0CBUQjRxqFwoTCKDox8e56pADFQAAAAAdAAAAABAT" alt="Logo" class="logo" style="max-width: 60px;">
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
@endsection

