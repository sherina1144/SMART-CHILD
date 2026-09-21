<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - Smart Child</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #EEF3E9;
            color: #285B4D;
            line-height: 1.6;
        }

        /* Header Banner Profil Atas - Lurus dengan max-width 1300px */
        .profile-banner {
            background-color: #dce7d7;
            padding: 40px 40px;
            border-bottom: 1px solid #c8d8c3;
            max-width: 1300px;
            margin: 30px auto 0 auto;
            border-radius: 20px 20px 0 0;
        }

        .banner-inner {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .banner-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #285B4D;
        }

        .banner-avatar-placeholder {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #c8d8c3;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #285B4D;
            font-size: 36px;
            border: 2px solid #285B4D;
            flex-shrink: 0;
        }

        .banner-info h1 {
            font-size: 1.8rem;
            color: #285B4D;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .banner-info p {
            font-size: 0.9rem;
            color: #4a6b5d;
            font-weight: 600;
            text-transform: capitalize;
        }

        /* Container Utama - Lurus dengan max-width 1300px */
        .profile-container {
            max-width: 1300px;
            margin: 0 auto 50px auto;
        }

        .profile-card {
            background: #faf8f5;
            border-radius: 0 0 20px 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(40, 91, 77, 0.05);
            border: 1px solid #c8d8c3;
            border-top: none;
        }

        /* Layout Grid Informasi */
        .profile-grid-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 40px;
            align-items: start;
        }

        /* Kolom Kiri (Foto & Tombol Edit) */
        .profile-left-col {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .section-title {
            font-size: 1rem;
            font-weight: 700;
            color: #285B4D;
            margin-bottom: 5px;
        }

        /* FIX: Judul Informasi Profile dibuat memenuhi 2 kolom */
        .section-title.full-width {
            grid-column: span 2;
        }

        .main-avatar {
            width: 100%;
            height: 240px;
            border-radius: 16px;
            object-fit: cover;
            border: 2px solid #c8d8c3;
        }

        .main-avatar-placeholder {
            width: 100%;
            height: 240px;
            border-radius: 16px;
            background: #dce7d7;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #285B4D;
            font-size: 50px;
            border: 2px solid #c8d8c3;
        }

        .btn-edit-profile {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: transparent;
            color: #285B4D;
            border: 1px solid #285B4D;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
            width: 100%;
        }

        .btn-edit-profile:hover {
            background: #285B4D;
            color: #fff;
        }

        /* Kolom Kanan (Form Fields / Box Informasi) */
        .profile-right-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: span 2;
        }

        .form-group label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #4a6b5d;
        }

        .form-control-box {
            background: #EEF3E9;
            border: 1px solid #c8d8c3;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 0.95rem;
            color: #285B4D;
            min-height: 45px;
            display: flex;
            align-items: center;
            word-break: break-word;
            width: 100%;
        }

        /* Tombol Logout Pojok Kanan Bawah */
        .logout-container {
            grid-column: span 2;
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            color: #d9534f;
            border: 1px solid #d9534f;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-logout:hover {
            background: #d9534f;
            color: #fff;
        }

        /* Responsive Breakpoints */
        @media (max-width: 1340px) {
            .profile-banner,
            .profile-container {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        @media (max-width: 768px) {
            .profile-grid-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .profile-right-col {
                grid-template-columns: 1fr;
            }

            .section-title.full-width {
                grid-column: span 1;
            }

            .form-group.full-width {
                grid-column: span 1;
            }

            .logout-container {
                grid-column: span 1;
                justify-content: flex-start;
            }

            .btn-logout {
                width: 100%;
                justify-content: center;
            }

            .profile-card {
                padding: 25px;
            }

            .profile-banner {
                padding: 30px 20px;
            }

            .banner-inner {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>

<body>

    @include('layout.header')

    <!-- Banner Atas Profil -->
    <div class="profile-banner">
        <div class="banner-inner">

            <div>
                @if($user->foto)
                    <img src="{{ asset('storage/' . $user->foto) }}"
                         alt="Foto Profil"
                         class="banner-avatar">
                @else
                    <div class="banner-avatar-placeholder">
                        <i class="fa-solid fa-user"></i>
                    </div>
                @endif
            </div>

            <div class="banner-info">
                <h1>{{ $user->nama ?? 'Nama Lengkap Belum Diisi' }}</h1>
                <p>{{ $user->role }}</p>
            </div>

        </div>
    </div>

    <!-- Container Isi Halaman -->
    <div class="profile-container">
        <div class="profile-card">

            @if(session('success'))
                <div style="background: #e1efe6; color: #285B4D; padding: 12px 18px; border-radius: 10px; margin-bottom: 25px; font-size: 14px; font-weight: 600; border: 1px solid #b8d8c7;">
                    <i class="fa-solid fa-circle-check" style="margin-right: 6px;"></i>
                    {{ session('success') }}
                </div>
            @endif

            <div class="profile-grid-layout">

                <!-- Kolom Kiri: Foto Besar & Tombol Edit -->
                <div class="profile-left-col">

                    <div class="section-title">
                        Foto profil
                    </div>

                    <div>
                        @if($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}"
                                 alt="Foto Profil"
                                 class="main-avatar">
                        @else
                            <div class="main-avatar-placeholder">
                                <i class="fa-solid fa-user"></i>
                            </div>
                        @endif
                    </div>

                    <a href="{{ route('profile.edit') }}" class="btn-edit-profile">
                        <i class="fa-regular fa-pen-to-square"></i>
                        Edit profile
                    </a>

                </div>

                <!-- Kolom Kanan: Informasi Detail Profil -->
                <div class="profile-right-col">

                    <div class="section-title full-width">
                        Informasi profile
                    </div>

                    <!-- Baris 1: Nama Lengkap & Username (Sejajar) -->
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <div class="form-control-box">
                            {{ $user->nama ?? '-' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <div class="form-control-box">
                            {{ $user->username ?? '-' }}
                        </div>
                    </div>

                    <!-- Baris 2: Email & No Handphone (Sejajar) -->
                    <div class="form-group">
                        <label>Email</label>
                        <div class="form-control-box">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>No Handphone</label>
                        <div class="form-control-box">
                            {{ $user->no_hp ?? '-' }}
                        </div>
                    </div>

                    <!-- Baris 3: Alamat (Full Width) -->
                    <div class="form-group full-width">
                        <label>Alamat</label>
                        <div class="form-control-box"
                             style="height: auto; min-height: 45px; align-items: flex-start; padding-top: 12px;">
                            {{ $user->alamat ?? '-' }}
                        </div>
                    </div>

                    <!-- Baris 4: Kota & Status Profile -->
                    <div class="form-group">
                        <label>Kota</label>
                        <div class="form-control-box">
                            {{ $user->kota ?? '-' }}
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status Profile</label>
                        <div class="form-control-box" style="text-transform: capitalize;">
                            {{ $user->role }}
                        </div>
                    </div>

                    <!-- Tombol Logout di Pojok Kanan Bawah -->
                    <div class="logout-container">
                        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                            @csrf

                            <button type="submit" class="btn-logout">
                                <i class="fa-solid fa-right-from-bracket"></i>
                                Logout
                            </button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
    </div>

</body>
</html>