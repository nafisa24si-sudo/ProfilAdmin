@extends('layouts.admin.app')

@section('title', 'Edit Foto')
@section('page_title', 'Edit Foto')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Foto</label>
                        <input type="text" name="judul" id="judul" 
                               class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul', $galeri->judul) }}" required>
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <div class="mb-2">
                            <img src="{{ Storage::url($galeri->foto) }}" class="img-thumbnail" style="max-height: 200px;" alt="Current photo">
                        </div>
                        <input type="file" name="foto" id="foto" 
                               class="form-control @error('foto') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('galeri.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection