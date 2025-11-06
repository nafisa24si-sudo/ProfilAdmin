@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Welcome Card -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h5 class="card-title text-primary">Selamat datang di Dashboard, {{ Auth::user()->name }}!</h5>
                        <p class="card-text">Sistem Informasi Desa - Kelola profil desa, berita, dan kategori dengan mudah.</p>
                        <div class="mt-3">
                            <span class="badge bg-primary me-2">Profil Desa</span>
                            <span class="badge bg-success me-2">Kategori</span>
                            <span class="badge bg-warning">Berita</span>
                        </div>
                    </div>
                    <div class="col-md-4 text-end">
                        <i class="fas fa-tachometer-alt fa-3x text-primary opacity-25"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Berita
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Berita::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Kategori
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\Kategori::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-tags fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Profil Desa
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\ProfilDesa::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-village fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pengguna
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ \App\Models\User::count() }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('profil.index') }}" class="btn btn-primary w-100">
                            <i class="fas fa-village me-2"></i>Profil Desa
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('kategori.index') }}" class="btn btn-success w-100">
                            <i class="fas fa-tags me-2"></i>Kategori
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('berita.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-newspaper me-2"></i>Berita
                        </a>
                    </div>
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('berita.create') }}" class="btn btn-warning w-100">
                            <i class="fas fa-plus me-2"></i>Tambah Berita
                        </a>
                    </div>
                     <div class="col-md-3 mb-3">
                        <a href="{{ route('berita.index') }}" class="btn btn-info w-100">
                            <i class="fas fa-newspaper me-2"></i>User
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    /* WhatsApp Floating Button Styles */
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 1000;
    }

    .whatsapp-link {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: #25D366;
        color: white;
        border-radius: 50%;
        text-align: center;
        box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
        text-decoration: none;
        transition: all 0.3s ease;
        position: relative;
        animation: pulse 2s infinite;
    }

    .whatsapp-link:hover {
        background: #128C7E;
        transform: scale(1.1);
        box-shadow: 0 6px 25px rgba(37, 211, 102, 0.6);
    }

    .whatsapp-link i {
        font-size: 32px;
    }

    .whatsapp-tooltip {
        position: absolute;
        bottom: 70px;
        right: 0;
        background: #333;
        color: white;
        padding: 8px 12px;
        border-radius: 6px;
        font-size: 12px;
        white-space: nowrap;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
        pointer-events: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.2);
    }

    .whatsapp-tooltip::after {
        content: '';
        position: absolute;
        top: 100%;
        right: 20px;
        border-width: 5px;
        border-style: solid;
        border-color: #333 transparent transparent transparent;
    }

    .whatsapp-float:hover .whatsapp-tooltip {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.7);
        }
        70% {
            box-shadow: 0 0 0 15px rgba(37, 211, 102, 0);
        }
        100% {
            box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
        }
    }

    @media (max-width: 768px) {
        .whatsapp-float {
            bottom: 20px;
            right: 20px;
        }

        .whatsapp-link {
            width: 55px;
            height: 55px;
        }

        .whatsapp-link i {
            font-size: 28px;
        }
    }
</style>
@endpush

<!-- Floating WhatsApp Button -->


@push('scripts')
<script>
    document.getElementById('whatsappFloat').addEventListener('click', function() {
        console.log('WhatsApp button clicked from dashboard');
    });
</script>
@endpush
@endsection
