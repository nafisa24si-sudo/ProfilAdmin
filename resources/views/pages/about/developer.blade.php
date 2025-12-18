@extends('layouts.admin.app')

@section('title', 'Tentang Pengembang')
@section('page_title', 'Tentang Pengembang')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body p-4">
                    <!-- Profile Section -->
                    <div class="text-center mb-4">
                        @if(Auth::user()->avatar)
                            <img src="{{ asset('images/profiles/' . Auth::user()->avatar) }}" 
                                 alt="Foto Pengembang" class="rounded-circle shadow-lg mb-3" 
                                 style="width: 250px; height: 250px; object-fit: cover; border: 4px solid #fff;">
                        @else
                            <img src="{{ asset('images/placeholder.png') }}" 
                                 alt="Foto Pengembang" class="rounded-circle shadow-lg mb-3" 
                                 style="width: 250px; height: 250px; object-fit: cover; border: 4px solid #fff; opacity: 0.8;">
                        @endif
                        
                        <h3 class="fw-bold text-dark mb-3">Nafisa Tahera</h3>
                        
                        <div class="row g-2 justify-content-center">
                            <div class="col-md-4">
                                <div class="text-center p-2 bg-light rounded">
                                    <i class="bi bi-card-text text-primary fs-5 d-block mb-1"></i>
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">NIM</small>
                                    <strong style="font-size: 0.85rem;">2457301106</strong>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="text-center p-2 bg-light rounded">
                                    <i class="bi bi-mortarboard text-primary fs-5 d-block mb-1"></i>
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">Program Studi</small>
                                    <strong style="font-size: 0.85rem;">Sistem Informasi</strong>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="text-center p-2 bg-light rounded">
                                    <i class="bi bi-building text-primary fs-5 d-block mb-1"></i>
                                    <small class="text-muted d-block" style="font-size: 0.75rem;">Universitas</small>
                                    <strong style="font-size: 0.85rem;">Politeknik Caltex Riau</strong>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="card border-0 bg-primary bg-opacity-10 mb-3">
                        <div class="card-body p-3">
                            <h6 class="fw-semibold mb-3 text-primary text-center" style="font-size: 0.9rem;">
                                <i class="bi bi-link-45deg me-1"></i>
                                Kontak & Media Sosial
                            </h6>
                            <div class="row g-2">
                                <div class="col-6">
                                    <a href="mailto:nafisa24si@mahasiswa.pcr.ac.id" class="btn btn-outline-success btn-sm w-100">
                                        <i class="bi bi-envelope me-1"></i><small>Email</small>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="https://linkedin.com/in/nafisa-tahera" target="_blank" class="btn btn-outline-primary btn-sm w-100">
                                        <i class="bi bi-linkedin me-1"></i><small>LinkedIn</small>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="https://github.com/nafisatahera" target="_blank" class="btn btn-outline-dark btn-sm w-100">
                                        <i class="bi bi-github me-1"></i><small>GitHub</small>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <a href="https://instagram.com/nafisa.tahera" target="_blank" class="btn btn-outline-danger btn-sm w-100">
                                        <i class="bi bi-instagram me-1"></i><small>Instagram</small>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Message -->
                    <div class="text-center pt-2 border-top">
                        <small class="text-muted" style="font-size: 0.8rem;">
                            <i class="bi bi-heart-fill text-danger me-1"></i>
                            Dibuat dengan penuh dedikasi untuk kemajuan digitalisasi desa Indonesia
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection