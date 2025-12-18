@extends('layouts.admin.app')

@section('title', 'Galeri')
@section('page_title', 'Galeri')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Galeri Foto</h1>
            <a href="{{ route('galeri.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if($galeris->count() > 0)
    <div class="row">
        @foreach($galeris as $galeri)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                <img src="{{ Storage::url($galeri->foto) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="{{ $galeri->judul }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text flex-grow-1">{{ Str::limit($galeri->deskripsi, 100) }}</p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-center gap-2">
                            {{-- View --}}
                            <a href="{{ route('galeri.show', $galeri) }}"
                               class="btn btn-sm btn-outline-info"
                               data-bs-toggle="tooltip"
                               title="Lihat Detail">
                                <i class="bi bi-eye"></i>
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('galeri.edit', $galeri) }}"
                               class="btn btn-sm btn-outline-warning"
                               data-bs-toggle="tooltip"
                               title="Edit Foto">
                                <i class="bi bi-pencil"></i>
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('galeri.destroy', $galeri) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="tooltip"
                                        title="Hapus Foto">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $galeris->links() }}
    </div>
@else
    <div class="card">
        <div class="card-body text-center py-5">
            <i class="fas fa-images fa-4x text-muted mb-3"></i>
            <h4 class="text-muted">Belum ada foto di galeri</h4>
            <p class="text-muted">Silakan tambah foto baru</p>
        </div>
    </div>
@endif
@endsection