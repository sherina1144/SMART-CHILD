<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Dashboard Dokter - SmartChild' }}</title>

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Layout Dokter -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F8FAF9;
            color: #2D3748;
            display: flex;
            min-height: 100vh;
        }

        /* =====================================================
            SIDEBAR DOKTER
        ===================================================== */
        .sidebar {
            width: 260px;
            background-color: #253D32;
            color: #ffffff;
            padding: 24px 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: fixed;
            height: 100vh;
            z-index: 100;
            overflow-y: auto;
        }

        /* =====================================================
            LOGO
        ===================================================== */
        .brand-logo {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo i {
            color: #F39C50;
        }

        .brand-logo span {
            color: #F39C50;
        }

        /* =====================================================
            NAVIGATION
        ===================================================== */
        .nav-menu {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin-bottom: 8px;
            list-style: none;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #A3B899;
            text-decoration: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #314E41;
            color: #ffffff;
        }

        .nav-link i {
            font-size: 16px;
            width: 20px;
            text-align: center;
        }

        /* =====================================================
            NAV SECTION
        ===================================================== */
        .nav-section {
            list-style: none;
            color: #6F8A7A;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 0.8px;
            margin: 22px 8px 8px;
        }

        /* =====================================================
            SIDEBAR FOOTER
        ===================================================== */
        .sidebar-footer {
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding-top: 20px;
            border-top: 1px solid #314E41;
        }

        /* =====================================================
            USER PROFILE
        ===================================================== */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            padding: 8px;
            border-radius: 10px;
            transition: background 0.2s;
        }

        .user-profile:hover {
            background-color: #314E41;
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: #F39C50;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 14px;
            flex-shrink: 0;
        }

        .user-info h5 {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
            margin-bottom: 0;
        }

        .user-info p {
            font-size: 11px;
            color: #A3B899;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 150px;
            margin-bottom: 0;
        }

        /* =====================================================
            LOGOUT
        ===================================================== */
        .btn-logout {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px;
            background-color: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: none;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .btn-logout:hover {
            background-color: rgba(239, 68, 68, 0.3);
            color: #ffffff;
        }

        /* =====================================================
            MAIN CONTENT
        ===================================================== */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            padding: 40px;
        }

        /* =====================================================
            RESPONSIVE
        ===================================================== */
        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }
            .main-wrapper {
                margin-left: 220px;
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- SIDEBAR DOKTER -->
    <aside class="sidebar">
        <div>
            <!-- LOGO -->
            <div class="brand-logo">
                <i class="fa-solid fa-child-reaching"></i>
                SMART<span>CHILD</span>
            </div>

            <!-- NAVIGATION -->
            <ul class="nav-menu">
                <!-- DASHBOARD -->
                <li class="nav-item">
                    <a href="{{ route('dokter.dashboard') }}" class="nav-link {{ Request::is('dokter/dashboard*') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i>
                        Dashboard
                    </a>
                </li>

                <!-- MENU PRAKTIK -->
                <li class="nav-section">PRAKTIK & PASIEN</li>

                <li class="nav-item">
                    <a href="{{ route('dokter.consultations') }}" class="nav-link {{ Request::is('dokter/consultations*') ? 'active' : '' }}">
                        <i class="fa-solid fa-calendar-check"></i>
                        Konsultasi Pasien
                    </a>
                </li>

            </ul>
        </div>

        <!-- SIDEBAR FOOTER -->
        <div class="sidebar-footer">
    <!-- USER PROFILE -->
    
    <a href="{{ route('dokter.profile') }}" class="user-profile">
        <div class="avatar" style="overflow: hidden; padding: 0;">
            @if(Auth::user()->foto ?? false)
                <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Avatar" style="width: 100%; height: 100%; object-fit: cover;">
            @else
                {{ strtoupper(substr(Auth::user()->nama ?? (Auth::user()->name ?? 'D'), 0, 1)) }}
            @endif
        </div>
        <div class="user-info">
            <h5>{{ Auth::user()->nama ?? (Auth::user()->name ?? 'Dokter') }}</h5>
            <p>{{ Auth::user()->email ?? 'dokter@smartchild.id' }}</p>
        </div>
    </a>

            <!-- LOGOUT -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- KONTEN UTAMA HALAMAN -->
    <main class="main-wrapper">
        @yield('content')
    </main>

    <!-- BOOTSTRAP 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>