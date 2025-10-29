@extends('layouts.app')

@section('title', 'Profil Desa - Admin')
@section('page_title', 'Profil Desa')
@section('page_subtitle', 'Kelola informasi umum, visi, misi, dan sejarah desa.')

@section('page_actions')
<a href="{{ route('profil.create') }}" class="btn btn-primary shadow-sm px-3">
    <i class="bi bi-plus-lg me-1"></i> Tambah Profil Baru
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-10 col-xl-8">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">
                <h4 class="card-title fw-semibold text-primary mb-4">
                    <i class="bi bi-file-earmark-text me-2"></i> Profil Desa Saat Ini
                </h4>

                @if(isset($profil))
                    <div class="mb-3">
                        <p><strong>Nama Desa:</strong> {{ $profil->nama_desa ?? '-' }}</p>
                        <p><strong>Telepon:</strong> {{ $profil->telepon ?? '-' }}</p>
                        <p><strong>Email:</strong> {{ $profil->email ?? '-' }}</p>
                        <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
                        <p><strong>Sejarah Singkat:</strong><br> {!! nl2br(e($profil->sejarah_singkat)) ?: '-' !!}</p>
                        <p><strong>Visi:</strong><br> {!! nl2br(e($profil->visi)) ?: '-' !!}</p>
                        <p><strong>Misi:</strong><br> {!! nl2br(e($profil->misi)) ?: '-' !!}</p>
                    </div>

                    @if($profil->peta_embed_url)
                        <div class="mb-4">
                            <h6 class="fw-semibold text-secondary mb-2">Lokasi di Peta</h6>
                            <div class="ratio ratio-16x9 border rounded overflow-hidden">
                                <iframe src="{{ $profil->peta_embed_url }}" style="border:0;" allowfullscreen loading="lazy"></iframe>
                            </div>
                        </div>
                    @endif

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('profil.edit', $profil->id) }}" class="btn btn-warning">
                            <i class="bi bi-pencil-square me-1"></i> Edit
                        </a>
                        <form action="{{ route('profil.destroy', $profil->id) }}" method="POST" onsubmit="return confirm('Hapus profil ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi bi-trash me-1"></i> Hapus
                            </button>
                        </form>
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-info-circle display-6 d-block mb-2"></i>
                        <p>Belum ada profil desa yang ditambahkan.</p>
                        <a href="{{ route('profil.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> Tambah Profil
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
