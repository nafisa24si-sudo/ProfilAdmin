@extends('layouts.admin.app')

@section('title', 'Edit Profil Desa')
@section('page_title', 'Edit Profil Desa')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title text-primary fw-semibold mb-4">
                    <i class="bi bi-pencil-square me-2"></i> Edit Profil
                </h4>

                <form action="{{ route('profil.update', $profil->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nama Desa</label>
                        <input type="text" name="nama_desa" value="{{ old('nama_desa', $profil->nama_desa) }}" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Telepon</label>
                            <input type="text" name="telepon" value="{{ old('telepon', $profil->telepon) }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $profil->email) }}" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" rows="2" class="form-control">{{ old('alamat', $profil->alamat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sejarah Singkat</label>
                        <textarea name="sejarah_singkat" rows="3" class="form-control">{{ old('sejarah_singkat', $profil->sejarah_singkat) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Visi</label>
                        <textarea name="visi" rows="3" class="form-control">{{ old('visi', $profil->visi) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Misi</label>
                        <textarea name="misi" rows="3" class="form-control">{{ old('misi', $profil->misi) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">URL Peta (Google Maps Embed)</label>
                        <input type="text" name="peta_embed_url" value="{{ old('peta_embed_url', $profil->peta_embed_url) }}" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('profil.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i> Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
