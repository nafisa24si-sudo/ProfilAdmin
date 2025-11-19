@extends('layouts.admin.app')

@section('title', 'Daftar Berita')
@section('page_title', 'Daftar Berita')

@section('content')
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
                                <img src="{{ asset('storage/' . $item->cover) }}"
                                     alt="cover"
                                     width="70"
                                     height="50"
                                     class="rounded border shadow-sm hover-zoom">
                            @else
                                <span class="text-muted small fst-italic">Tidak ada</span>
                            @endif
                        </td>

                        {{-- Judul --}}
                        <td class="fw-semibold">
                            <a href="#" class="text-decoration-none text-dark hover-primary">
                                {{ $item->judul }}
                            </a>
                        </td>

                        {{-- Kategori --}}
                        <td>{{ $item->kategori->nama ?? '-' }}</td>

                        {{-- Status --}}
                        <td>
                            <span class="badge rounded-pill bg-{{ $item->status == 'terbit' ? 'success' : 'secondary' }}">
                                <i class="bi bi-{{ $item->status == 'terbit' ? 'check-circle' : 'clock' }} me-1"></i>
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
                                   class="btn btn-sm btn-warning shadow-sm"
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
                                            class="btn btn-sm btn-danger shadow-sm"
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
                            <i class="bi bi-info-circle me-1"></i> Belum ada berita yang ditambahkan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tombol Slide Halaman (Pagination) --}}
@if(method_exists($berita, 'links'))
<div class="mt-4 d-flex justify-content-between align-items-center">

    {{-- Info halaman --}}
    <div class="small text-muted">
        Halaman {{ $berita->currentPage() }} dari {{ $berita->lastPage() }}
    </div>

    {{-- Tombol pagination --}}
    <div>
        {{ $berita->links('pagination::bootstrap-5') }}
    </div>

</div>
@endif

@endsection
