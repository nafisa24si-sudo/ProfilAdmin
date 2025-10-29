@extends('layouts.app')

@section('title', 'Tambah Kategori')
@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Buat kategori baru untuk berita atau konten.')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold text-primary mb-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Kategori Baru
                </h4>

                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" 
                               class="form-control @error('nama') is-invalid @enderror" 
                               value="{{ old('nama') }}" placeholder="Contoh: Pemerintahan, Sosial, Ekonomi">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-semibold">Deskripsi (Opsional)</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" 
                                  placeholder="Tuliskan deskripsi kategori">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
