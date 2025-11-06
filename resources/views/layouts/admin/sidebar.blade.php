<aside class="sidebar">
        <div>
            <a href="{{ route('dashboard') }}" class="sidebar-brand">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-newspaper"></i>
                </div>
                <span class="sidebar-brand-text">Bina Desa</span>
            </a>

            <nav class="nav flex-column">
                <span class="sidebar-section-title">Navigasi Utama</span>

                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>

                <a href="{{ route('profil.index') }}" class="nav-link {{ request()->routeIs('profil.*') ? 'active' : '' }}">
                    <i class="bi bi-building me-2"></i> Profil Desa
                </a>

                <a href="{{ route('kategori.index') }}" class="nav-link {{ request()->routeIs('kategori.*') ? 'active' : '' }}">
                    <i class="bi bi-tags me-2"></i> Kategori Berita
                </a>

                <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.*') ? 'active' : '' }}">
                    <i class="bi bi-newspaper me-2"></i> Berita
                </a>

                <a href="{{ route('warga.index') }}" class="nav-link {{ request()->routeIs('Warga.*') ? 'active' : '' }}">
                    <i class="bi bi-tags me-2"></i> Warga
                </a>

                <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('User.*') ? 'active' : '' }}">
                    <i class="bi bi-tags me-2"></i> User
                </a>
            </nav>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="mt-4">
            @csrf
            <button type="submit" class="btn-logout w-100">
                <i class="bi bi-box-arrow-right me-2"></i> Keluar
            </button>
        </form>
    </aside>
