@extends('layouts.admin.app')

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

            <!-- Section untuk Upload Media Files -->
            <div class="card border-0 bg-light mt-4 mb-4">
                <div class="card-body">
                    <h6 class="card-title fw-bold">Upload File Media (opsional)</h6>
                    <p class="text-muted small">Unggah gambar, PDF, atau file lainnya untuk melengkapi berita. Ukuran maksimal per file: 10 MB.</p>
                    
                    <div id="media-uploads" class="mb-3">
                        <div class="media-upload-item mb-3 p-3 bg-white border rounded">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-label small fw-semibold">File</label>
                                    <input type="file" name="media_files[]" class="form-control form-control-sm" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold">Caption (opsional)</label>
                                    <input type="text" name="media_captions[]" class="form-control form-control-sm" placeholder="Deskripsi file...">
                                </div>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-danger mt-2 remove-media-upload" style="display:none;">Hapus</button>
                        </div>
                    </div>

                    <button type="button" id="add-media-upload" class="btn btn-sm btn-outline-primary">
                        <i class="bi bi-plus"></i> Tambah File Lain
                    </button>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('berita.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Tambah media upload field
    document.getElementById('add-media-upload').addEventListener('click', function() {
        const container = document.getElementById('media-uploads');
        const newItem = container.querySelector('.media-upload-item').cloneNode(true);
        
        // Reset input values
        newItem.querySelector('input[name="media_files[]"]').value = '';
        newItem.querySelector('input[name="media_captions[]"]').value = '';
        
        // Show remove button
        newItem.querySelector('.remove-media-upload').style.display = 'inline-block';
        newItem.querySelector('.remove-media-upload').addEventListener('click', function() {
            newItem.remove();
        });
        
        container.appendChild(newItem);
    });

    // Remove media upload field
    document.querySelectorAll('.remove-media-upload').forEach(btn => {
        btn.addEventListener('click', function() {
            this.closest('.media-upload-item').remove();
        });
    });
});
</script>
@endsection
