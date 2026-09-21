@extends('layout.dashboard_admin') 

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <!-- Header Title -->
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h3 class="fw-bold" style="color: #285B4D;">Edit Profil Administrator</h3>
                <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary px-3 py-2" style="border-radius: 10px; font-weight: 600;">
                    <i class="fa-solid fa-arrow-left me-1"></i> Kembali
                </a>
            </div>

            <!-- Card Form Edit -->
            <div class="card shadow-sm border-0" style="border-radius: 16px; background-color: #ffffff;">
                <div class="card-body p-4 p-md-5">
                    
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Bagian Ganti Foto Profil -->
                        <div class="row align-items-center mb-4 pb-4 border-bottom">
                            <div class="col-md-3 text-center mb-3 mb-md-0">
                                @if(Auth::user()->foto ?? false)
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Foto Profil" class="rounded-circle shadow-sm" style="width: 90px; height: 90px; object-fit: cover; border: 3px solid #285B4D;">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto shadow-sm text-white fw-bold" style="width: 90px; height: 90px; background-color: #285B4D; font-size: 32px; border: 3px solid #e2e8f0;">
                                        {{ strtoupper(substr(Auth::user()->nama ?? (Auth::user()->name ?? 'A'), 0, 1)) }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-9">
                                <label class="form-label fw-bold text-dark">Ganti Foto Profil</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                                <small class="text-muted">Format yang diizinkan: JPEG, PNG, JPG. Maksimal 2MB.</small>
                            </div>
                        </div>

                        <!-- Input Fields -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Nama Lengkap</label>
                                <input type="text" name="nama" class="form-control" value="{{ old('nama', Auth::user()->nama ?? Auth::user()->name) }}" placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username', Auth::user()->username ?? '') }}" placeholder="Masukkan username">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Email (Otomatis)</label>
                                <input type="email" name="email" class="form-control bg-light" value="{{ old('email', Auth::user()->email ?? '') }}" readonly>
                                <small class="text-muted">Email tidak dapat diubah secara bebas.</small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Nomor Telepon / HP</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', Auth::user()->no_hp ?? '') }}" placeholder="Contoh: 081234567890">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label fw-semibold text-dark">Alamat</label>
                                <textarea name="alamat" class="form-control" rows="2" placeholder="Masukkan alamat lengkap">{{ old('alamat', Auth::user()->alamat ?? '') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Kota</label>
                                <input type="text" name="kota" class="form-control" value="{{ old('kota', Auth::user()->kota ?? '') }}" placeholder="Contoh: Cilacap">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold text-dark">Status User</label>
                                <input type="text" class="form-control bg-light" value="Administrator (Active)" disabled>
                            </div>
                        </div>

                        <!-- Button Action -->
                        <div class="d-flex justify-content-end gap-2 mt-5 pt-3 border-top">
                            <a href="{{ route('profile.show') }}" class="btn btn-light px-4 py-2 fw-semibold">Batal</a>
                            <button type="submit" class="btn text-white px-4 py-2" style="background-color: #285B4D; font-weight: 600; border-radius: 8px;">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Simpan Perubahan
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection