<aside class="sidebar">
        <div>
            <div class="text-center mb-4">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo-desa.png') }}" alt="Logo Desa" style="width: 100px; height: 100px; object-fit: contain;">
                </a>
            </div>

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

                <a href="{{ route('warga.index') }}" class="nav-link {{ request()->routeIs('warga.*') ? 'active' : '' }}">
                    <i class="bi bi-people me-2"></i> Warga
                </a>

                <a href="{{ route('user.index') }}" class="nav-link {{ request()->routeIs('user.index') ? 'active' : '' }}">
                    <i class="bi bi-person-gear me-2"></i> User
                </a>

                <a href="{{ route('agenda.index') }}" class="nav-link {{ request()->routeIs('agenda.*') ? 'active' : '' }}">
                    <i class="bi bi-calendar-event me-2"></i> Agenda
                </a>

                <a href="{{ route('galeri.index') }}" class="nav-link {{ request()->routeIs('galeri.*') ? 'active' : '' }}">
                    <i class="bi bi-images me-2"></i> Galeri 
                </a>

                <a href="{{ route('about.developer') }}" class="nav-link {{ request()->routeIs('about.*') ? 'active' : '' }}">
                    <i class="bi bi-person-badge me-2"></i> Tentang Pengembang
                </a>

                <a href="{{ route('user.avatar') }}" class="nav-link {{ request()->routeIs('user.avatar*') ? 'active' : '' }}">
                    <i class="bi bi-person-circle me-2"></i> Upload Foto
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
