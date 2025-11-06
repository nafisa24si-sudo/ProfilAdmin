@extends('layouts.auth.app')
@section('content')
<div class="login-right ">
    <div class="card shadow-lg p-4" style="width: 420px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Buat Akun Anda</h3>
            <p class="text-muted small mb-0">Isi data dengan benar untuk registrasi</p>
        </div>

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success py-2">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control"
                    placeholder="Ulangi password"
                    required>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary fw-semibold">Daftar</button>
            </div>
        </form>

        <p class="text-center mt-4 mb-0">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-decoration-none text-primary fw-semibold">
                Login di sini
            </a>
        </p>
    </div>
</div>
@endsection
