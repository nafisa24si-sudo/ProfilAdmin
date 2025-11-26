@extends('layouts.admin.app')

@section('title', 'Daftar Berita')
@section('page_title', 'Daftar Berita')

@section('content')
@php
    // Pastikan variabel untuk filter tersedia agar view tidak error
    $kategori = $kategori ?? collect();
    $authors = $authors ?? collect();
@endphp
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1 text-primary">
            <i class="bi bi-newspaper me-2"></i>Daftar Berita
        </h4>
        <p class="text-muted small mb-0">Kelola semua berita yang telah dibuat di sistem</p>
    </div>
    <a href="{{ route('berita.create') }}" class="btn btn-primary shadow-sm px-3 py-2">
        <i class="bi bi-plus-lg me-1"></i> Tambah Berita
    </a>
</div>

<div class="card border-0 shadow-sm rounded-3 overflow-hidden">
    <div class="card-body p-0">
        {{-- Form Filter --}}
        <form method="GET" action="{{ route('berita.index') }}" onchange="this.form.submit()" class="p-3 border-bottom bg-light">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">Filter Kategori</label>
                    <select name="kategori_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Categories</option>
                        @foreach($kategori as $kat)
                            <option value="{{ $kat->id }}" {{ request('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">Filter Status</label>
                    <select name="status" class="form-select" onchange="this.form.submit()">
                        <option value="">All Status</option>
                        <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">Filter Penulis</label>
                    <select name="penulis" class="form-select" onchange="this.form.submit()">
                        <option value="">All Authors</option>
                        @foreach($authors as $author)
                            <option value="{{ $author }}" {{ request('penulis') == $author ? 'selected' : '' }}>
                                {{ $author }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">Search</label>
                    <div class="input-group">
                        <input type="search" name="search" value="{{ request('search') }}" class="form-control" placeholder="Cari judul, isi atau penulis..." onkeydown="if(event.key==='Enter'){ this.form.submit(); }">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-search"></i>&nbsp;Cari
                        </button>
                    </div>
                </div>

                <div class="col-md-3">
                    <label class="form-label small text-muted mb-1">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <a href="{{ route('berita.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-arrow-clockwise me-1"></i> Reset
                        </a>

                        <a href="{{ route('berita.index', request()->except('search','page')) }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-x-circle me-1"></i> Bersihkan Pencarian
                        </a>
                    </div>
                </div>
            </div>
        </form>

        <script>
            // Fallback: pastikan semua select di form filter mengirim form saat berubah
            (function(){
                try {
                    document.querySelectorAll('form[action="{{ route('berita.index') }}"] select').forEach(function(el){
                        el.addEventListener('change', function(){
                            el.form.submit();
                        });
                    });
                } catch (e) {
                    console && console.warn && console.warn('Filter auto-submit fallback error', e);
                }
            })();
        </script>

        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr class="text-nowrap">
                    <th style="width: 90px;">Cover</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Penulis</th>
                    <th>Terbit</th>
                    <th class="text-center" style="width: 120px;">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($berita as $item)
                    <tr class="border-bottom">
                        {{-- Cover --}}
                        <td>
                            @if ($item->cover)
                                @php
                                    $cover = $item->cover;
                                    $isUrl = preg_match('/^https?:\/\//', $cover);
                                @endphp
                                @if ($isUrl)
                                    <img src="{{ $cover }}"
                                         alt="cover"
                                         width="70"
                                         height="50"
                                         class="rounded border shadow-sm">
                                @else
                                    <img src="{{ asset('storage/' . $cover) }}"
                                         alt="cover"
                                         width="70"
                                         height="50"
                                         class="rounded border shadow-sm">
                                @endif
                            @else
                                <span class="text-muted small fst-italic">No Cover</span>
                            @endif
                        </td>

                        {{-- Judul --}}
                        <td class="fw-semibold">
                            <a href="#" class="text-decoration-none text-dark">
                                {{ Str::limit($item->judul, 50) }}
                            </a>
                        </td>

                        {{-- Kategori --}}
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $item->kategori->nama ?? '-' }}
                            </span>
                        </td>

                        {{-- Status --}}
                        <td>
                            <span class="badge rounded-pill bg-{{ $item->status == 'published' ? 'success' : 'secondary' }}">
                                <i class="bi bi-{{ $item->status == 'published' ? 'check-circle' : 'clock' }} me-1"></i>
                                {{ ucfirst($item->status) }}
                            </span>
                        </td>

                        {{-- Penulis --}}
                        <td>{{ $item->penulis }}</td>

                        {{-- Tanggal --}}
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>

                        {{-- Aksi --}}
                        <td class="text-center">
                            <div class="d-flex justify-content-center gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('berita.edit', $item->id) }}"
                                   class="btn btn-sm btn-outline-warning"
                                   data-bs-toggle="tooltip"
                                   title="Edit Berita">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('berita.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus berita ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="tooltip"
                                            title="Hapus Berita">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-info-circle me-1"></i> 
                            @if(request()->hasAny(['kategori_id', 'status', 'penulis']))
                                Tidak ada berita yang sesuai dengan filter.
                            @else
                                Belum ada berita yang ditambahkan.
                            @endif
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Pagination --}}
@if(method_exists($berita, 'links') && $berita->total() > 0)
<div class="mt-4 d-flex justify-content-between align-items-center">
    {{-- Info halaman --}}
    <div class="small text-muted">
        Menampilkan {{ $berita->firstItem() }} - {{ $berita->lastItem() }} dari {{ $berita->total() }} berita
    </div>

    {{-- Tombol pagination --}}
    <div>
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>
</div>
@endif

@endsection