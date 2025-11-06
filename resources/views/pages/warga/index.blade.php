@extends('layouts.admin.app')

@section('title', 'Warga')
@section('page_title', 'Warga')
@section('page_subtitle', 'Kelola daftar warga.')

@section('page_actions')
<a href="{{ route('warga.create') }}" class="btn btn-primary shadow-sm px-3">
    <i class="bi bi-plus-lg me-1"></i> Tambah Warga
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-9">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">

                {{-- Alert sukses --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title fw-semibold text-primary mb-0">
                        <i class="bi bi-people me-2"></i> Daftar Warga
                    </h4>
                    <a href="{{ route('warga.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Tambah
                    </a>
                </div>

                @if($wargas->count())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama Warga</th>
                                    <th>Email</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th width="15%" class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($wargas as $index => $warga)
                                    <tr>
                                        <td>{{ $wargas->firstItem() + $index }}</td>
                                        <td class="fw-semibold text-dark">{{ $warga->nama }}</td>
                                        <td><span class="text-muted">{{ $warga->email ?: '-' }}</span></td>
                                        <td>{{ $warga->alamat ?: '-' }}</td>
                                        <td>{{ $warga->telepon ?: '-' }}</td>
                                        <td class="text-end">
                                            <a href="{{ route('warga.edit', $warga->id) }}" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('warga.destroy', $warga->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus warga ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $wargas->links() }}
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-people display-6 d-block mb-2"></i>
                        <p class="mb-3">Belum ada warga yang ditambahkan.</p>
                        <a href="{{ route('warga.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Warga
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
