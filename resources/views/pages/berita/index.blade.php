@extends('layouts.admin.app')

@section('title', 'Daftar Berita')
@section('page_title', 'Daftar Berita')

@push('styles')
<style>
    .news-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        color: white;
    }
    .filter-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .news-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .news-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .status-badge {
        position: absolute;
        top: 10px;
        right: 10px;
        z-index: 2;
    }
    .news-image {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
    }
    .news-image img {
        transition: transform 0.3s ease;
    }
    .news-image:hover img {
        transform: scale(1.05);
    }
    .media-overlay {
        position: absolute;
        bottom: 5px;
        left: 5px;
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 2px 6px;
        border-radius: 4px;
        font-size: 0.7rem;
    }
</style>
@endpush

@section('content')
@php
    $kategori = $kategori ?? collect();
@endphp

<!-- Header Section -->
<div class="news-header p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h3 class="fw-bold mb-2">
                <i class="bi bi-newspaper me-2"></i>Manajemen Berita
            </h3>
            <p class="mb-0 opacity-75">Kelola dan publikasikan berita desa dengan mudah</p>
        </div>
        <div class="text-end">
            <div class="d-flex gap-2">
                <a href="{{ route('berita.create') }}" class="btn btn-light btn-lg shadow-sm">
                    <i class="bi bi-plus-circle me-2"></i>Buat Berita
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-card card border-0 rounded-3 mb-4">
    <div class="card-body p-4">
        <form method="GET" action="{{ route('berita.index') }}">
            <div class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-dark">
                        <i class="bi bi-funnel me-1"></i>Kategori
                    </label>
                    <select name="kategori_id" class="form-select border-0 shadow-sm" onchange="this.form.submit()">
                        <option value="">🏷️ Semua Kategori</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label fw-semibold text-dark">
                        <i class="bi bi-toggle-on me-1"></i>Status
                    </label>
                    <select name="status" class="form-select border-0 shadow-sm" onchange="this.form.submit()">
                        <option value="">📊 Semua Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>📝 Draft</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>✅ Published</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">
                        <i class="bi bi-search me-1"></i>Pencarian
                    </label>
                    <div class="input-group">
                        <input type="search" name="search" value="{{ request('search') }}" 
                               class="form-control border-0 shadow-sm" 
                               placeholder="🔍 Cari judul, konten, atau penulis...">
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-search"></i>
                        </button>
                        @if(request()->hasAny(['search', 'kategori_id', 'status']))
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- News Grid -->
@if($berita->count() > 0)
<div class="row g-4 mb-4">
    @php
        $statusLabels = [
            'published' => 'Terbit',
            'draft' => 'Draf',
        ];
    @endphp
    @foreach ($berita as $item)
    <div class="col-lg-4 col-md-6">
        <div class="news-card card h-100 position-relative">
            <!-- Status Badge -->
                    <div class="status-badge">
                        <span class="badge rounded-pill bg-{{ $item->status == 'published' ? 'success' : 'warning' }} shadow">
                            <i class="bi bi-{{ $item->status == 'published' ? 'check-circle' : 'clock' }} me-1"></i>
                            {{ $statusLabels[$item->status] ?? ucfirst($item->status) }}
                        </span>
                    </div>
            
            <!-- Image -->
            <div class="news-image">
                @if ($item->cover)
                    @php
                        $cover = $item->cover;
                        $isUrl = preg_match('/^https?:\/\//', $cover);
                    @endphp
                    <img src="{{ $isUrl ? $cover : asset('storage/' . $cover) }}"
                         class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $item->judul }}">
                @else
                    <div class="bg-gradient-primary d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="bi bi-image text-white" style="font-size: 3rem; opacity: 0.5;"></i>
                    </div>
                @endif
                
                <!-- Media Count Overlay -->
                @if($item->mediaFiles->count() > 0)
                <div class="media-overlay">
                    <i class="bi bi-images"></i> {{ $item->mediaFiles->count() }}
                </div>
                @endif
            </div>
            
            <div class="card-body d-flex flex-column">
                <!-- Category -->
                <div class="mb-2">
                    <span class="badge bg-light text-dark border">
                        <i class="bi bi-tag me-1"></i>{{ $item->kategori->nama ?? 'Uncategorized' }}
                    </span>
                </div>
                
                <!-- Title -->
                <h5 class="card-title fw-bold mb-2">{{ Str::limit($item->judul, 60) }}</h5>
                
                <!-- Meta Info -->
                <div class="text-muted small mb-3">
                    <i class="bi bi-person me-1"></i>{{ $item->penulis }}
                    <span class="mx-2">•</span>
                    <i class="bi bi-calendar me-1"></i>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}
                </div>
                
                <!-- Content Preview -->
                <p class="card-text text-muted flex-grow-1">{{ Str::limit(strip_tags($item->isi), 100) }}</p>
                
                <!-- Actions -->
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <div class="d-flex gap-1">
                        <a href="{{ route('berita.edit', $item->id) }}"
                           class="btn btn-sm btn-outline-warning"
                           data-bs-toggle="tooltip" title="Edit Berita">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('berita.destroy', $item->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus berita ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    data-bs-toggle="tooltip" title="Hapus Berita">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                    <small class="text-muted">
                        <i class="bi bi-eye me-1"></i>Preview
                    </small>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="text-center py-5">
    <div class="mb-4">
        <i class="bi bi-newspaper display-1 text-muted"></i>
    </div>
    <h4 class="text-muted mb-3">
        @if(request()->hasAny(['kategori_id', 'status', 'search']))
            Tidak ada berita yang sesuai dengan filter
        @else
            Belum ada berita yang dibuat
        @endif
    </h4>
    <p class="text-muted mb-4">
        @if(request()->hasAny(['kategori_id', 'status', 'search']))
            Coba ubah filter atau kata kunci pencarian
        @else
            Mulai buat berita pertama untuk desa Anda
        @endif
    </p>
    <div class="d-flex gap-2 justify-content-center">
        @if(request()->hasAny(['kategori_id', 'status', 'search']))
        <a href="{{ route('berita.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-clockwise me-1"></i>Reset Filter
        </a>
        @endif
        <a href="{{ route('berita.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Buat Berita Baru
        </a>
    </div>
</div>
@endif



{{-- Pagination --}}
@if(method_exists($berita, 'links') && $berita->total() > 0)
<div class="d-flex justify-content-between align-items-center mt-4 p-4 bg-light rounded-3">
    <div class="text-muted">
        <i class="bi bi-info-circle me-1"></i>
        Menampilkan <strong>{{ $berita->firstItem() }} - {{ $berita->lastItem() }}</strong> dari <strong>{{ $berita->total() }}</strong> berita
    </div>
    <div>
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>
</div>
@endif

@push('scripts')
<script>
// Initialize tooltips
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
@endpush

@endsection