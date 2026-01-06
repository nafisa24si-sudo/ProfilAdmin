@extends('layouts.admin.app')

@section('title', 'Detail Foto')
@section('page_title', 'Detail Foto')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $galeri->judul }}</h5>
                <div class="btn-group">
                    <a href="{{ route('galeri.edit', $galeri) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body text-center">
                @php
                    $publicPath = public_path('storage/' . ($galeri->foto ?? ''));
                @endphp
                @if(!empty($galeri->foto) && file_exists($publicPath))
                    <img src="{{ Storage::url($galeri->foto) }}" class="img-fluid rounded mb-3" alt="{{ $galeri->judul }}" style="max-height: 500px;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded mb-3" style="height:300px;">
                        <span class="text-muted">No image available</span>
                    </div>
                @endif

                <div class="text-start mt-2">
                    <small class="text-muted">Debug: stored path = <code>{{ $galeri->foto }}</code></small><br>
                    <small class="text-muted">File exists in public/storage: <strong>{{ file_exists($publicPath) ? 'yes' : 'no' }}</strong></small>
                </div>
                
                <div class="mt-4">
                    <h6><strong>Deskripsi:</strong></h6>
                    <p class="text-muted">{!! nl2br(e($galeri->deskripsi)) !!}</p>
                </div>
                
                <div class="mt-3">
                    <small class="text-muted">
                        Ditambahkan pada: {{ $galeri->created_at->format('d F Y, H:i') }} WIB
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection