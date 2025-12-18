@extends('layouts.admin.app')

@section('title', 'Data Developer')
@section('page_title', 'Data Developer')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Pengembang</h5>
                    <a href="{{ route('developer.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Developer
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @forelse($developers as $developer)
                    <div class="mb-4 p-3 border rounded">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                @if($developer->foto)
                                    <img src="{{ asset('images/developers/' . $developer->foto) }}" 
                                         alt="Foto Developer" class="rounded-circle" 
                                         style="width: 100px; height: 100px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" 
                                         alt="Placeholder" class="rounded-circle" 
                                         style="width: 100px; height: 100px; object-fit: cover; opacity: 0.7;">
                                @endif
                            </div>
                            <div class="col-md-6">
                                <h5 class="mb-1">{{ $developer->nama }}</h5>
                                <p class="text-muted mb-2">{{ $developer->posisi }}</p>
                                <p class="mb-2">{{ Str::limit($developer->deskripsi, 100) }}</p>
                                
                                @if($developer->email || $developer->github || $developer->linkedin)
                                <div class="d-flex gap-1">
                                    @if($developer->email)
                                        <a href="mailto:{{ $developer->email }}" class="btn btn-sm btn-outline-primary">
                                            <i class="bi bi-envelope"></i>
                                        </a>
                                    @endif
                                    @if($developer->github)
                                        <a href="{{ $developer->github }}" target="_blank" class="btn btn-sm btn-outline-dark">
                                            <i class="bi bi-github"></i>
                                        </a>
                                    @endif
                                    @if($developer->linkedin)
                                        <a href="{{ $developer->linkedin }}" target="_blank" class="btn btn-sm btn-outline-info">
                                            <i class="bi bi-linkedin"></i>
                                        </a>
                                    @endif
                                </div>
                                @endif
                            </div>
                            <div class="col-md-3 text-end">
                                <div class="d-grid gap-2">
                                    <a href="{{ route('developer.edit', $developer) }}" class="btn btn-warning btn-sm">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                    <form action="{{ route('developer.destroy', $developer) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100" 
                                                onclick="return confirm('Yakin hapus developer ini?')">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="text-center py-5">
                        <i class="bi bi-person-plus display-1 text-muted"></i>
                        <h5 class="mt-3">Belum ada data developer</h5>
                        <p class="text-muted">Klik tombol "Tambah Developer" untuk menambah data</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection