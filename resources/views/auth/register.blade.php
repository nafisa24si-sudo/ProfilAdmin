<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Akun</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4e73df;
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
        }
        .btn-primary:hover {
            background-color: #375ac1;
        }
    </style>
</head>
<body>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
