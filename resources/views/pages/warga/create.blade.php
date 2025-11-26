@extends('layouts.app')

@section('title', 'Tambah Warga')
@section('page_title', 'Tambah Warga')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold text-primary mb-4">
                    <i class="fas fa-user-plus me-2"></i> Tambah Warga Baru
                </h4>

                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nik" class="form-label fw-semibold">NIK</label>
                        <input type="text" name="nik" id="nik"
                               class="form-control @error('nik') is-invalid @enderror"
                               value="{{ old('nik') }}" maxlength="16" placeholder="Nomor Identitas Kependudukan" required>
                        @error('nik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" id="nama"
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror" required>
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label fw-semibold">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir"
                                       class="form-control @error('tempat_lahir') is-invalid @enderror"
                                       value="{{ old('tempat_lahir') }}">
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                                       class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                       value="{{ old('tanggal_lahir') }}">
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label fw-semibold">Agama</label>
                        <input type="text" name="agama" id="agama"
                               class="form-control @error('agama') is-invalid @enderror"
                               value="{{ old('agama') }}">
                        @error('agama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="status_perkawinan" class="form-label fw-semibold">Status Perkawinan</label>
                        <select name="status_perkawinan" id="status_perkawinan" class="form-select @error('status_perkawinan') is-invalid @enderror">
                            <option value="">Pilih</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                            <option value="Cerai" {{ old('status_perkawinan') == 'Cerai' ? 'selected' : '' }}>Cerai</option>
                        </select>
                        @error('status_perkawinan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan"
                               class="form-control @error('pekerjaan') is-invalid @enderror"
                               value="{{ old('pekerjaan') }}">
                        @error('pekerjaan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-semibold">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                                  class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="rt" class="form-label fw-semibold">RT</label>
                                <input type="text" name="rt" id="rt"
                                       class="form-control @error('rt') is-invalid @enderror"
                                       value="{{ old('rt') }}">
                                @error('rt')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="rw" class="form-label fw-semibold">RW</label>
                                <input type="text" name="rw" id="rw"
                                       class="form-control @error('rw') is-invalid @enderror"
                                       value="{{ old('rw') }}">
                                @error('rw')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_warga" class="form-label fw-semibold">Status Warga</label>
                                <select name="status_warga" id="status_warga" class="form-select @error('status_warga') is-invalid @enderror" required>
                                    <option value="">Pilih</option>
                                    <option value="Tetap" {{ old('status_warga') == 'Tetap' ? 'selected' : '' }}>Tetap</option>
                                    <option value="Kontrak/Kos" {{ old('status_warga') == 'Kontrak/Kos' ? 'selected' : '' }}>Kontrak/Kos</option>
                                    <option value="Pendatang" {{ old('status_warga') == 'Pendatang' ? 'selected' : '' }}>Pendatang</option>
                                </select>
                                @error('status_warga')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status Hidup</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status_hidup" id="hidup" value="Hidup" 
                                       class="form-check-input @error('status_hidup') is-invalid @enderror"
                                       {{ old('status_hidup', 'Hidup') == 'Hidup' ? 'checked' : '' }}>
                                <label class="form-check-label" for="hidup">Hidup</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="radio" name="status_hidup" id="meninggal" value="Meninggal" 
                                       class="form-check-input @error('status_hidup') is-invalid @enderror"
                                       {{ old('status_hidup') == 'Meninggal' ? 'checked' : '' }}>
                                <label class="form-check-label" for="meninggal">Meninggal</label>
                            </div>
                        </div>
                        @error('status_hidup')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('warga.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i> Batal
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
