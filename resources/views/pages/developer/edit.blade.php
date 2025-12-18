@extends('layouts.admin.app')

@section('title', 'Edit Developer')
@section('page_title', 'Edit Developer')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('developer.update', $developer) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Developer</label>
                        <input type="text" name="nama" id="nama" 
                               class="form-control @error('nama') is-invalid @enderror"
                               value="{{ old('nama', $developer->nama) }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi/Jabatan</label>
                        <input type="text" name="posisi" id="posisi" 
                               class="form-control @error('posisi') is-invalid @enderror"
                               value="{{ old('posisi', $developer->posisi) }}" required>
                        @error('posisi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4" 
                                  class="form-control @error('deskripsi') is-invalid @enderror" required>{{ old('deskripsi', $developer->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($developer->foto)
                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label>
                        <div>
                            <img src="{{ asset('images/developers/' . $developer->foto) }}" 
                                 alt="Foto Developer" class="img-thumbnail" style="max-width: 200px;">
                        </div>
                    </div>
                    @endif

                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Baru (Opsional)</label>
                        <input type="file" name="foto" id="foto" 
                               class="form-control @error('foto') is-invalid @enderror"
                               accept=".jpg,.jpeg,.png">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB. Kosongkan jika tidak ingin mengubah foto.</small>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email (Opsional)</label>
                        <input type="email" name="email" id="email" 
                               class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email', $developer->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="github" class="form-label">GitHub URL (Opsional)</label>
                        <input type="url" name="github" id="github" 
                               class="form-control @error('github') is-invalid @enderror"
                               value="{{ old('github', $developer->github) }}" placeholder="https://github.com/username">
                        @error('github')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn URL (Opsional)</label>
                        <input type="url" name="linkedin" id="linkedin" 
                               class="form-control @error('linkedin') is-invalid @enderror"
                               value="{{ old('linkedin', $developer->linkedin) }}" placeholder="https://linkedin.com/in/username">
                        @error('linkedin')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('developer.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection