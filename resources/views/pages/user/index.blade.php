@extends('layouts.admin.app')

@section('title', 'User')
@section('page_title', 'User')
@section('page_subtitle', 'Kelola data pengguna sistem.')

@section('page_actions')
<a href="{{ route('user.create') }}" class="btn btn-primary shadow-sm px-3">
    <i class="bi bi-plus-lg me-1"></i> Tambah User
</a>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-body p-4">

                {{-- Alert sukses --}}
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="card-title fw-semibold text-primary mb-0">
                        <i class="bi bi-people me-2"></i> Daftar User
                    </h4>
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> Tambah
                    </a>
                </div>

                @if($users->count())
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Username</th>
                                    <th>Nama Lengkap</th>
                                    <th>Level Akses</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{ $users->firstItem() + $index }}</td>
                                        <td class="fw-semibold text-dark">{{ $user->username }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>
                                            @php
                                                $badgeColors = [
                                                    'admin' => 'danger',
                                                    'petugas' => 'warning',
                                                    'ketua_rt' => 'info',
                                                    'warga' => 'secondary'
                                                ];
                                            @endphp
                                            <span class="badge bg-{{ $badgeColors[$user->level_akses] ?? 'secondary' }}">
                                                {{ ucfirst(str_replace('_', ' ', $user->level_akses)) }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $user->status == 'aktif' ? 'success' : 'secondary' }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center gap-2">
                                                {{-- Edit --}}
                                                <a href="{{ route('user.edit', $user) }}"
                                                   class="btn btn-sm btn-outline-warning"
                                                   data-bs-toggle="tooltip"
                                                   title="Edit User">
                                                    <i class="bi bi-pencil"></i>
                                                </a>

                                                {{-- Delete --}}
                                                <form action="{{ route('user.destroy', $user) }}"
                                                      method="POST"
                                                      class="d-inline"
                                                      onsubmit="return confirm('Hapus user ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                            class="btn btn-sm btn-outline-danger"
                                                            data-bs-toggle="tooltip"
                                                            title="Hapus User"
                                                            {{ $user->id == auth()->id() ? 'disabled' : '' }}>
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

                    {{-- Pagination --}}
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-people display-6 d-block mb-2"></i>
                        <p class="mb-3">Belum ada data user.</p>
                        <a href="{{ route('user.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-lg me-1"></i> Tambah User
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection