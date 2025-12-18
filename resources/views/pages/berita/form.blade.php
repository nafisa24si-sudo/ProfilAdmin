@extends('layouts.admin.app')

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

            <!-- Display Existing Media Files (Edit View Only) -->
            @if(isset($berita) && $berita->mediaFiles->count() > 0)
            <div class="card border-0 bg-light mb-4">
                <div class="card-body">
                    <h6 class="card-title fw-bold">File Media yang Sudah Ada</h6>
                    <div class="row">
                        @foreach($berita->mediaFiles as $media)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                @if($media->isImage())
                                    <img src="{{ $media->getFileUrl() }}" class="card-img-top" alt="{{ $media->caption }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top bg-secondary d-flex align-items-center justify-content-center" style="height: 200px;">
                                        <i class="bi bi-file-earmark text-white" style="font-size: 3rem;"></i>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <p class="card-text small"><strong>{{ $media->caption ?? 'Tanpa Keterangan' }}</strong></p>
                                    <p class="card-text text-muted small">{{ $media->file_name }}</p>
                                    <form action="{{ route('media.delete', $media->media_id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger w-100" onclick="return confirm('Yakin ingin menghapus file ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif

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
