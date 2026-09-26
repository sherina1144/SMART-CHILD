@extends('layout.dashboard_admin') 

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Header Title -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="fw-bold" style="color: #285B4D;">Profil Administrator</h3>
                <a href="{{ route('profile.edit') }}" class="btn text-white px-4 py-2" style="background-color: #285B4D; border-radius: 10px; font-weight: 600;">
                    <i class="fa-solid fa-pen-to-square me-2"></i> Edit Profil
                </a>
            </div>

            <!-- Card Utama Profil -->
            <div class="card shadow-sm border-0" style="border-radius: 16px; background-color: #ffffff;">
                <div class="card-body p-4 p-md-5">
                    
                    <!-- Bagian Foto Profil & Status -->
                    <div class="row align-items-center mb-5 pb-4 border-bottom">
                        <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                            @if(Auth::user()->foto ?? false)
                                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil" class="rounded-circle shadow-sm" style="width: 100px; height: 100px; object-fit: cover; border: 3px solid #285B4D;">
                            @else
                                <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mx-md-0 shadow-sm text-white fw-bold" style="width: 100px; height: 100px; background-color: #285B4D; font-size: 36px; border: 3px solid #e2e8f0;">
                                    {{ strtoupper(substr(Auth::user()->nama ?? (Auth::user()->name ?? 'A'), 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-8 text-center text-md-start">
                            <h4 class="fw-bold mb-1" style="color: #2d3748;">{{ Auth::user()->nama ?? (Auth::user()->name ?? 'Belum diisi') }}</h4>
                            <p class="text-muted mb-2">{{ Auth::user()->email }}</p>
                            <span class="badge px-3 py-2 text-white" style="background-color: #285B4D; font-size: 12px; border-radius: 8px;">
                                <i class="fa-solid fa-shield-halved me-1"></i> Status: Administrator
                            </span>
                        </div>
                    </div>

                    <!-- Detail Data Profil -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">NAMA LENGKAP</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->nama ?? (Auth::user()->name ?? '-') }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">USERNAME</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->username ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">EMAIL (OTOMATIS TERISI)</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->email ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">NOMOR TELEPON / HP</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->no_hp ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label text-muted fw-semibold small">ALAMAT</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->alamat ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">KOTA</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                {{ Auth::user()->kota ?? '-' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label text-muted fw-semibold small">STATUS USER</label>
                            <div class="p-3 bg-light rounded-3 fw-medium text-dark border-0">
                                <span class="text-success fw-bold">Active</span> (Role: Admin)
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection