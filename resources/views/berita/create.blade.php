@extends('layouts.app')

@section('title', 'Tambah Berita')
@section('page_title', 'Tambah Berita')
@section('page_subtitle', 'Buat berita baru untuk portal desa.')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-body">
        <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}" required>
                @error('judul')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="isi_html" class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi_html" id="isi_html" rows="8" class="form-control @error('isi_html') is-invalid @enderror" required>{{ old('isi_html') }}</textarea>
                @error('isi_html')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="penulis" class="form-label fw-semibold">Penulis</label>
                    <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis') }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="terbit_at" class="form-label fw-semibold">Tanggal Terbit</label>
                    <input type="date" name="terbit_at" id="terbit_at" class="form-control" value="{{ old('terbit_at') }}">
                </div>
            </div>

            <div class="mb-3">
                <label for="cover" class="form-label fw-semibold">Cover Berita (opsional)</label>
                <input type="file" name="cover" id="cover" class="form-control">
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
