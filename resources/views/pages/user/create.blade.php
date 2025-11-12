@extends('layouts.admin.app')

@section('title', 'Tambah User')
@section('page_title', 'Tambah User')
@section('page_subtitle', 'Tambah user baru ke sistem.')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold text-primary mb-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah User Baru
                </h4>

                <form action="{{ route('user.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="username" class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" id="username"
                               class="form-control @error('username') is-invalid @enderror"
                               value="{{ old('username') }}" placeholder="Masukkan username">
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" id="password"
                               class="form-control @error('password') is-invalid @enderror"
                               placeholder="Masukkan password">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                               class="form-control"
                               placeholder="Konfirmasi password">
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="nama_lengkap"
                               class="form-control @error('nama_lengkap') is-invalid @enderror"
                               value="{{ old('nama_lengkap') }}" placeholder="Masukkan nama lengkap">
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="level_akses" class="form-label fw-semibold">Level Akses</label>
                        <select name="level_akses" id="level_akses"
                                class="form-select @error('level_akses') is-invalid @enderror">
                            <option value="">Pilih level akses</option>
                            <option value="admin" {{ old('level_akses') == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="petugas" {{ old('level_akses') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                            <option value="ketua_rt" {{ old('level_akses') == 'ketua_rt' ? 'selected' : '' }}>Ketua RT</option>
                            <option value="warga" {{ old('level_akses') == 'warga' ? 'selected' : '' }}>Warga</option>
                        </select>
                        @error('level_akses')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label fw-semibold">Status</label>
                        <select name="status" id="status"
                                class="form-select @error('status') is-invalid @enderror">
                            <option value="">Pilih status</option>
                            <option value="aktif" {{ old('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                            <option value="non-aktif" {{ old('status') == 'non-aktif' ? 'selected' : '' }}>Non-aktif</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
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
