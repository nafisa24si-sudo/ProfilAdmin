@extends('layouts.app')

@section('title', 'Tambah Profil Desa')
@section('page_title', 'Tambah Profil Desa')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title text-primary fw-semibold mb-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Profil Baru
                </h4>

                <form action="{{ route('profil.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" name="nama_desa" value="{{ old('nama_desa') }}" class="form-control @error('nama_desa') is-invalid @enderror" required>
                        @error('nama_desa')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon') }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" rows="2" class="form-control">{{ old('alamat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sejarah Singkat</label>
                        <textarea name="sejarah_singkat" rows="3" class="form-control">{{ old('sejarah_singkat') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Visi</label>
                        <textarea name="visi" rows="3" class="form-control">{{ old('visi') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Misi</label>
                        <textarea name="misi" rows="3" class="form-control">{{ old('misi') }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">URL Peta (Google Maps Embed)</label>
                        <input type="text" name="peta_embed_url" value="{{ old('peta_embed_url') }}" class="form-control">
                        <small class="text-muted">Masukkan URL embed dari Google Maps (bukan link biasa).</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('profil.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
