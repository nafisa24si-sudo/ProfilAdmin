@extends('layouts.app')

@section('title', 'Data Warga')

@section('content')
<div class="container-fluid">
    <!-- HANYA SATU SECTION WARGA -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">Data Warga</h1>
                <a href="{{ route('warga.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Warga
                </a>
            </div>
        </div>
    </div>

    <!-- Notifikasi Success -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Notifikasi Error -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> Terjadi kesalahan:
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Tabel Warga -->
    <div class="card">
        <div class="card-body">
            @if($wargas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>TTL</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($wargas as $warga)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $warga->nik }}</td>
                                <td>{{ $warga->nama }}</td>
                                <td>{{ $warga->jenis_kelamin }}</td>
                                <td>
                                    {{ $warga->tempat_lahir ?: '-' }}, 
                                    {{ $warga->tanggal_lahir ? \Carbon\Carbon::parse($warga->tanggal_lahir)->format('d-m-Y') : '-' }}
                                </td>
                                <td>{{ $warga->alamat ?: '-' }}</td>
                                <td>
                                    <span class="badge bg-primary">{{ $warga->status_warga }}</span>
                                    <span class="badge {{ $warga->status_hidup == 'Hidup' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $warga->status_hidup }}
                                    </span>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('warga.edit', $warga->id_warga) }}" 
                                           class="btn btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('warga.destroy', $warga->id_warga) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" 
                                                    onclick="return confirm('Yakin menghapus warga {{ $warga->nama }}?')"
                                                    title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3">
                    {{ $wargas->links() }}
                </div>
            @else
                <!-- Empty State - HANYA SATU -->
                <div class="text-center py-5">
                    <i class="fas fa-users fa-4x text-muted mb-3"></i>
                    <h4 class="text-muted">Belum ada data warga</h4>
                    <p class="text-muted">Silakan gunakan tombol "Tambah Warga" di atas untuk menambahkan data warga baru</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection