<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

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
    <div class="card shadow-lg p-4" style="width: 400px;">
        <div class="text-center mb-4">
            <h3 class="fw-bold text-primary">Login Admin</h3>
            <p class="text-muted small mb-0">Masuk untuk melanjutkan</p>
        </div>

        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="alert alert-success py-2">
                {{ session('success') }}
            </div>
        @endif

        {{-- Notifikasi error --}}
        @if ($errors->any())
            <div class="alert alert-danger py-2">
                <ul class="mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    class="form-control" 
                    value="{{ old('email') }}" 
                    placeholder="Masukkan email" 
                    required 
                    autofocus>
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

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary fw-semibold">
                    Masuk
                </button>
            </div>
        </form>

        <p class="text-center mt-4 mb-0">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-decoration-none text-primary fw-semibold">
                Daftar di sini
            </a>
        </p>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
