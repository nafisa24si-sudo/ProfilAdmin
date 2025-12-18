@extends('layouts.admin.app')

@section('title', 'Agenda')
@section('page_title', 'Agenda')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">Daftar Agenda</h1>
            <a href="{{ route('agenda.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Agenda
            </a>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        @if($agendas->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Penyelenggara</th>
                            <th>Poster</th>
                            <th class="text-center" style="width: 120px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendas as $agenda)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $agenda->judul }}</td>
                            <td>{{ $agenda->lokasi }}</td>
                            <td>
                                {{ $agenda->tanggal_mulai->format('d/m/Y H:i') }} - 
                                {{ $agenda->tanggal_selesai->format('d/m/Y H:i') }}
                            </td>
                            <td>{{ $agenda->penyelenggara }}</td>
                            <td>
                                @if($agenda->poster)
                                    <a href="{{ Storage::url($agenda->poster) }}" target="_blank" class="btn btn-sm btn-info">
                                        <i class="fas fa-file"></i> Lihat
                                    </a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- View --}}
                                    <a href="{{ route('agenda.show', $agenda) }}"
                                       class="btn btn-sm btn-outline-info"
                                       data-bs-toggle="tooltip"
                                       title="Lihat Detail">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    {{-- Edit --}}
                                    <a href="{{ route('agenda.edit', $agenda) }}"
                                       class="btn btn-sm btn-outline-warning"
                                       data-bs-toggle="tooltip"
                                       title="Edit Agenda">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('agenda.destroy', $agenda) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin hapus agenda ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-sm btn-outline-danger"
                                                data-bs-toggle="tooltip"
                                                title="Hapus Agenda">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $agendas->links() }}
        @else
            <div class="text-center py-5">
                <i class="fas fa-calendar fa-4x text-muted mb-3"></i>
                <h4 class="text-muted">Belum ada agenda</h4>
                <p class="text-muted">Silakan tambah agenda baru</p>
            </div>
        @endif
    </div>
</div>
@endsection