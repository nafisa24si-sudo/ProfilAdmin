<nav class="top-navbar">
        <div class="text-center">
            <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa" style="width: 60px; height: 60px; object-fit: contain; margin-bottom: 10px;">
            <h5 class="page-title mb-0">@yield('page_title', 'Dashboard')</h5>
        </div>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                <div class="user-avatar me-2">
                    @if(Auth::user()->avatar)
                        <img src="{{ asset('images/profiles/' . Auth::user()->avatar) }}" alt="Avatar" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover;">
                    @else
                        <img src="{{ asset('images/placeholder.png') }}" alt="Avatar" style="width: 32px; height: 32px; border-radius: 50%; object-fit: cover; opacity: 0.7;">
                    @endif
                </div>
                <span class="text-muted">{{ Auth::user()->name ?? 'Admin' }}</span>
                <i class="bi bi-chevron-down ms-2 text-muted"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-2"></i> Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('profil.index') }}"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
                <li><hr class="dropdown-divider"></li>
                <li class="dropdown-item-text">
                    <small class="text-muted">
                        <i class="bi bi-clock me-2"></i>Login terakhir:<br>
                        <strong>{{ session('last_login') ? session('last_login')->format('d/m/Y H:i:s') : 'Tidak tersedia' }}</strong>
                    </small>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i> Keluar
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
