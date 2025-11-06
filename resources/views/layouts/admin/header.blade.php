<nav class="top-navbar">
        <h5 class="page-title">@yield('page_title', 'Dashboard')</h5>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none" data-bs-toggle="dropdown">
                <div class="user-avatar me-2">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <span class="text-muted">{{ Auth::user()->name ?? 'Admin' }}</span>
                <i class="bi bi-chevron-down ms-2 text-muted"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow-sm">
                <li><a class="dropdown-item" href="{{ route('dashboard') }}"><i class="bi bi-house-door me-2"></i> Dashboard</a></li>
                <li><a class="dropdown-item" href="{{ route('profil.index') }}"><i class="bi bi-person me-2"></i> Profil Saya</a></li>
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
