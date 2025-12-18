@extends('layouts.admin.app')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<!-- Slideshow Indonesia -->
<div class="row mb-4">
    <div class="col-12">
        <div id="indonesiaCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#indonesiaCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#indonesiaCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#indonesiaCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#indonesiaCarousel" data-bs-slide-to="3"></button>
            </div>
            <div class="carousel-inner rounded-3 shadow">
                <div class="carousel-item active">
                    <div class="slide-content" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;">
                        <div class="slide-overlay">
                            <h2 class="fw-bold mb-3">Pertanian Desa</h2>
                            <p class="mb-3">Sistem Informasi Desa Digital</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slide-content" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;">
                        <div class="slide-overlay">
                            <h2 class="fw-bold mb-3">Sawah Padi</h2>
                            <p class="mb-3">Digitalisasi Desa Indonesia</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slide-content" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1416879595882-3373a0480b5b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;">
                        <div class="slide-overlay">
                            <h2 class="fw-bold mb-3">Ladang Hijau</h2>
                            <p class="mb-3">Potensi Desa Pertanian</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slide-content" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1625246333195-78d9c38ad449?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80') center/cover;">
                        <div class="slide-overlay">
                            <h2 class="fw-bold mb-3">Kebun Desa</h2>
                            <p class="mb-3">Kemajuan Desa Digital</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#indonesiaCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#indonesiaCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </div>
</div>

<!-- Welcome Card -->
<div class="row mb-4">
    <div class="col-12">
        <div class="card bg-gradient-primary text-white shadow">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <h4 class="mb-2">Selamat datang, {{ Auth::user()->name }}</h4>
                        <p class="mb-0">Sistem Informasi Desa</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Berita</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['total_berita'] }}</div>
                        <small class="text-success">Aktif</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kategori</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['total_kategori'] }}</div>
                        <small class="text-success">Tersedia</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Warga</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['total_warga'] }}</div>
                        <small class="text-info">Terdaftar</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Admin</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800">{{ $stats['total_users'] }}</div>
                        <small class="text-warning">Daring</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts and Recent Activity -->
<div class="row mb-4">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Statistik Berita Bulanan {{ date('Y') }}</h6>
            </div>
            <div class="card-body">
                <canvas id="monthlyChart" height="100"></canvas>
            </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="card shadow-sm mt-4">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Aksi Cepat</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('berita.create') }}" class="btn btn-primary w-100 py-3">
                            <i class="fas fa-plus-circle d-block mb-2"></i>
                            <small>Tambah Berita</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('kategori.create') }}" class="btn btn-success w-100 py-3">
                            <i class="fas fa-tag d-block mb-2"></i>
                            <small>Tambah Kategori</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('warga.index') }}" class="btn btn-info w-100 py-3">
                            <i class="fas fa-users d-block mb-2"></i>
                            <small>Data Warga</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('user.index') }}" class="btn btn-warning w-100 py-3">
                            <i class="fas fa-user-cog d-block mb-2"></i>
                            <small>Kelola User</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('profil.index') }}" class="btn btn-secondary w-100 py-3">
                            <i class="fas fa-village d-block mb-2"></i>
                            <small>Profil Desa</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('agenda.index') }}" class="btn btn-success w-100 py-3">
                            <i class="fas fa-calendar d-block mb-2"></i>
                            <small>Agenda</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('galeri.index') }}" class="btn btn-info w-100 py-3">
                            <i class="fas fa-images d-block mb-2"></i>
                            <small>Galeri</small>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-4 col-6 mb-3">
                        <a href="{{ route('about.developer') }}" class="btn btn-purple w-100 py-3">
                            <i class="fas fa-user-tie d-block mb-2"></i>
                            <small>Pengembang</small>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Berita Terbaru</h6>
            </div>
            <div class="card-body">
                @forelse($recentBerita as $berita)
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1">{{ Str::limit($berita->judul, 30) }}</h6>
                        <small class="text-muted">{{ $berita->created_at->diffForHumans() }}</small>
                    </div>
                </div>
                @empty
                <p class="text-muted text-center">Belum ada berita</p>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!-- System Information -->
<div class="row">
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Informasi Sistem</h6>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle p-2 me-3">
                                <i class="fas fa-server text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Versi Sistem</small>
                                <strong>SiDesa v1.0</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-success rounded-circle p-2 me-3">
                                <i class="fas fa-check-circle text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Status</small>
                                <strong class="text-success">Aktif</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-info rounded-circle p-2 me-3">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Terakhir Update</small>
                                <strong>{{ now()->format('d/m/Y') }}</strong>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning rounded-circle p-2 me-3">
                                <i class="fas fa-database text-white"></i>
                            </div>
                            <div>
                                <small class="text-muted d-block">Database</small>
                                <strong>MySQL</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-lg-6 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-header bg-white">
                <h6 class="m-0 font-weight-bold text-primary">Aktivitas Terbaru</h6>
            </div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-marker bg-primary"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Sistem Login Diperbarui</h6>
                            <small class="text-muted">{{ now()->subHours(2)->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-success"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Fitur Agenda Ditambahkan</h6>
                            <small class="text-muted">{{ now()->subHours(5)->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-info"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Galeri Foto Diaktifkan</h6>
                            <small class="text-muted">{{ now()->subDay()->diffForHumans() }}</small>
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-marker bg-warning"></div>
                        <div class="timeline-content">
                            <h6 class="mb-1">Database Warga Dioptimalkan</h6>
                            <small class="text-muted">{{ now()->subDays(2)->diffForHumans() }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    .card {
        transition: transform 0.2s;
    }
    .card:hover {
        transform: translateY(-2px);
    }
    .btn-purple {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        color: white;
    }
    .btn-purple:hover {
        background: linear-gradient(135deg, #5a6fd8 0%, #6a4190 100%);
        color: white;
    }
    
    /* Slideshow Styles */
    .slide-content {
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        position: relative;
    }
    
    .slide-overlay {
        z-index: 2;
        position: relative;
    }
    
    .carousel-indicators {
        margin-bottom: 1rem;
    }
    
    .carousel-indicators button {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        margin: 0 4px;
    }
    
    .carousel-control-prev,
    .carousel-control-next {
        width: 5%;
    }
    
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: rgba(0,0,0,0.5);
        border-radius: 50%;
        padding: 20px;
    }
    
    @media (max-width: 768px) {
        .slide-content {
            height: 250px;
        }
        .slide-overlay h2 {
            font-size: 1.5rem;
        }
    }
    
    /* Timeline Styles */
    .timeline {
        position: relative;
        padding-left: 30px;
    }
    
    .timeline::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 20px;
    }
    
    .timeline-marker {
        position: absolute;
        left: -23px;
        top: 5px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 3px solid white;
        box-shadow: 0 0 0 2px #e9ecef;
    }
    
    .timeline-content h6 {
        font-size: 0.9rem;
        margin-bottom: 2px;
    }
    
    .timeline-content small {
        font-size: 0.75rem;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Chart
    const ctx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Berita Dipublikasi',
                data: @json($chartData),
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0,0,0,0.1)'
                    }
                },
                x: {
                    grid: {
                        display: false
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection
