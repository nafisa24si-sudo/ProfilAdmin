@extends('layouts.admin.app')

@section('title', 'Tambah Warga')
@section('page_title', 'Tambah Warga')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('warga.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">NIK</label>
                        <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik') }}" maxlength="16">
                        @error('nik')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama') }}">
                        @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select @error('jenis_kelamin') is-invalid @enderror">
                            <option value="">Pilih</option>
                            <option value="Laki-laki" {{ old('jenis_kelamin')=='Laki-laki'?'selected':'' }}>Laki-laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin')=='Perempuan'?'selected':'' }}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir') }}">
                            @error('tempat_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}">
                            @error('tanggal_lahir')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Agama</label>
                        <input type="text" name="agama" class="form-control @error('agama') is-invalid @enderror" value="{{ old('agama') }}">
                        @error('agama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Perkawinan</label>
                        <select name="status_perkawinan" class="form-select @error('status_perkawinan') is-invalid @enderror">
                            <option value="">Pilih</option>
                            <option value="Belum Kawin" {{ old('status_perkawinan')=='Belum Kawin'?'selected':'' }}>Belum Kawin</option>
                            <option value="Kawin" {{ old('status_perkawinan')=='Kawin'?'selected':'' }}>Kawin</option>
                            <option value="Cerai" {{ old('status_perkawinan')=='Cerai'?'selected':'' }}>Cerai</option>
                        </select>
                        @error('status_perkawinan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan') }}">
                        @error('pekerjaan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                        @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3 row">
                        <div class="col-md-3">
                            <label class="form-label">RT</label>
                            <input type="text" name="rt" class="form-control @error('rt') is-invalid @enderror" value="{{ old('rt') }}">
                            @error('rt')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">RW</label>
                            <input type="text" name="rw" class="form-control @error('rw') is-invalid @enderror" value="{{ old('rw') }}">
                            @error('rw')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Status Warga</label>
                            <select name="status_warga" class="form-select @error('status_warga') is-invalid @enderror">
                                <option value="">Pilih</option>
                                <option value="Tetap" {{ old('status_warga')=='Tetap'?'selected':'' }}>Tetap</option>
                                <option value="Kontrak/Kos" {{ old('status_warga')=='Kontrak/Kos'?'selected':'' }}>Kontrak/Kos</option>
                                <option value="Pendatang" {{ old('status_warga')=='Pendatang'?'selected':'' }}>Pendatang</option>
                            </select>
                            @error('status_warga')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Hidup</label>
                        <div>
                            <label class="me-3"><input type="radio" name="status_hidup" value="Hidup" {{ old('status_hidup','Hidup')=='Hidup'?'checked':'' }}> Hidup</label>
                            <label><input type="radio" name="status_hidup" value="Meninggal" {{ old('status_hidup')=='Meninggal'?'checked':'' }}> Meninggal</label>
                        </div>
                        @error('status_hidup')<div class="text-danger small">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('warga.index') }}" class="btn btn-secondary me-2">Batal</a>
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin.app')

@section('title', 'Tambah Warga')
@section('page_title', 'Tambah Warga')
@section('page_subtitle', 'Buat Warga baru untuk berita atau konten.')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold text-primary mb-4">
                    <i class="bi bi-plus-circle me-2"></i> Tambah Warga Baru
                </h4>

                <form action="{{ route('kategori.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label fw-semibold">Nama User</label>
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
