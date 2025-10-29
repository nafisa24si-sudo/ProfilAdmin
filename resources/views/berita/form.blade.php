@extends('layouts.app')

@section('title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')
@section('page_title', isset($berita) ? 'Edit Berita' : 'Tambah Berita')

@section('content')
<div class="card border-0 shadow-sm rounded-3">
    <div class="card-body">
        <form action="{{ isset($berita) ? route('berita.update', $berita->id) : route('berita.store') }}" 
              method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($berita))
                @method('PUT')
            @endif

            {{-- Judul --}}
            <div class="mb-3">
                <label for="judul" class="form-label fw-semibold">Judul Berita</label>
                <input type="text" name="judul" id="judul" class="form-control" 
                       value="{{ old('judul', $berita->judul ?? '') }}" required>
            </div>

            {{-- Kategori --}}
            <div class="mb-3">
                <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $item)
                        <option value="{{ $item->id }}" 
                            {{ old('kategori_id', $berita->kategori_id ?? '') == $item->id ? 'selected' : '' }}>
                            {{ $item->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Isi --}}
            <div class="mb-3">
                <label for="isi_html" class="form-label fw-semibold">Isi Berita</label>
                <textarea name="isi_html" id="isi_html" rows="6" class="form-control" required>{{ old('isi_html', $berita->isi_html ?? '') }}</textarea>
            </div>

            {{-- Cover --}}
            <div class="mb-3">
                <label for="cover" class="form-label fw-semibold">Cover Berita</label>
                @if(isset($berita) && $berita->cover)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $berita->cover) }}" alt="cover" width="150" class="rounded border shadow-sm">
                    </div>
                @endif
                <input type="file" name="cover" id="cover" class="form-control">
            </div>

            {{-- Penulis --}}
            <div class="mb-3">
                <label for="penulis" class="form-label fw-semibold">Penulis</label>
                <input type="text" name="penulis" id="penulis" class="form-control" 
                       value="{{ old('penulis', $berita->penulis ?? '') }}">
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label for="status" class="form-label fw-semibold">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="draft" {{ old('status', $berita->status ?? '') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $berita->status ?? '') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-end mt-4">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary me-2">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ isset($berita) ? 'Update' : 'Simpan' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
