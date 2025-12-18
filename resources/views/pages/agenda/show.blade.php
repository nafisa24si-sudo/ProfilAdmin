@extends('layouts.admin.app')

@section('title', 'Detail Agenda')
@section('page_title', 'Detail Agenda')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $agenda->judul }}</h5>
                <div class="btn-group">
                    <a href="{{ route('agenda.edit', $agenda) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('agenda.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Lokasi:</strong></div>
                    <div class="col-md-9">{{ $agenda->lokasi }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Tanggal Mulai:</strong></div>
                    <div class="col-md-9">{{ $agenda->tanggal_mulai->format('d F Y, H:i') }} WIB</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Tanggal Selesai:</strong></div>
                    <div class="col-md-9">{{ $agenda->tanggal_selesai->format('d F Y, H:i') }} WIB</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Penyelenggara:</strong></div>
                    <div class="col-md-9">{{ $agenda->penyelenggara }}</div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Deskripsi:</strong></div>
                    <div class="col-md-9">{!! nl2br(e($agenda->deskripsi)) !!}</div>
                </div>
                
                @if($agenda->poster)
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Poster/Dokumen:</strong></div>
                    <div class="col-md-9">
                        <a href="{{ Storage::url($agenda->poster) }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-download"></i> Lihat/Download File
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection