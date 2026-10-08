<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Admin Dashboard - SmartChild' }}</title>

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- =====================================================
         CSS LAYOUT ADMIN
    ====================================================== -->

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
            min-height: 100vh;
        }


        /* =====================================================
           SIDEBAR ADMIN
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
            top: 0;
            left: 0;

            height: 100vh;

            z-index: 1000;

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
           SIDEBAR BADGE PESANAN
        ===================================================== */

        .nav-link-with-badge {
            display: flex;
            align-items: center;
            justify-content: space-between;

            width: 100%;
        }

        .nav-link-content {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-badge {
            min-width: 20px;
            height: 20px;

            padding: 0 6px;

            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #F39C50;
            color: #ffffff;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 700;
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
           MAIN AREA
        ===================================================== */

        .main-wrapper {
            margin-left: 260px;

            min-height: 100vh;

            background-color: #F8FAF9;
        }


        /* =====================================================
           ADMIN NAVBAR
        ===================================================== */

        .admin-navbar {
            height: 76px;

            background-color: #ffffff;

            border-bottom: 1px solid #E8E4DC;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 40px;

            position: sticky;
            top: 0;

            z-index: 900;
        }


        /* =====================================================
           NAVBAR TITLE
        ===================================================== */

        .navbar-title {
            font-size: 22px;
            font-weight: 700;

            color: #315C50;
        }


        /* =====================================================
           NAVBAR RIGHT
        ===================================================== */

        .navbar-right {
            display: flex;
            align-items: center;

            gap: 22px;
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .notification-btn {
            position: relative;

            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background-color: #FFF9F2;

            color: #315C50;

            text-decoration: none;

            font-size: 18px;

            transition: all 0.2s;
        }

        .notification-btn:hover {
            background-color: #EAF3EF;
            color: #315C50;
        }


        /* =====================================================
           NOTIFICATION BADGE
        ===================================================== */

        .notification-badge {
            position: absolute;

            top: -3px;
            right: -3px;

            min-width: 19px;
            height: 19px;

            padding: 0 5px;

            display: flex;
            align-items: center;
            justify-content: center;

            background-color: #F4A89A;

            color: #ffffff;

            border-radius: 20px;

            font-size: 10px;
            font-weight: 700;

            border: 2px solid #ffffff;
        }


        /* =====================================================
           ADMIN NAVBAR PROFILE
        ===================================================== */

        .navbar-profile {
            display: flex;
            align-items: center;

            gap: 10px;

            text-decoration: none;
        }

        .navbar-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background-color: #EAF3EF;

            color: #315C50;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 15px;

            overflow: hidden;
        }

        .navbar-avatar img {
            width: 100%;
            height: 100%;

            object-fit: cover;
        }

        .navbar-user-info {
            display: flex;
            flex-direction: column;

            line-height: 1.3;
        }

        .navbar-user-name {
            font-size: 13px;
            font-weight: 700;

            color: #315C50;
        }

        .navbar-user-role {
            font-size: 10px;

            color: #667085;
        }


        /* =====================================================
           PAGE CONTENT
        ===================================================== */

        .page-content {
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
            }

            .admin-navbar {
                padding: 0 25px;
            }

            .page-content {
                padding: 25px;
            }

        }


        @media (max-width: 700px) {

            .sidebar {
                width: 200px;
            }

            .main-wrapper {
                margin-left: 200px;
            }

            .admin-navbar {
                padding: 0 18px;
            }

            .navbar-user-info {
                display: none;
            }

            .page-content {
                padding: 20px;
            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
         SIDEBAR
    ===================================================== -->

    <aside class="sidebar">


        <div>


            <!-- =================================================
                 LOGO
            ================================================== -->

            <div class="brand-logo">

                <i class="fa-solid fa-child-reaching"></i>

                SMART<span>CHILD</span>

            </div>


            <!-- =================================================
                 NAVIGATION
            ================================================== -->

            <ul class="nav-menu">


                <!-- ================= DASHBOARD ================= -->

                <li class="nav-item">

                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">

                        <i class="fa-solid fa-chart-pie"></i>

                        Dashboard

                    </a>

                </li>


                <!-- =================================================
                     LAYANAN
                ================================================== -->

                <li class="nav-section">

                    LAYANAN

                </li>


                <!-- DOCTOR -->

                <li class="nav-item">

                    <a href="{{ route('admin.doctor.add') }}"
                        class="nav-link {{ Request::is('admin/doctor*') ? 'active' : '' }}">

                        <i class="fa-solid fa-user-doctor"></i>

                        Doctor and Therapist

                    </a>

                </li>


                <!-- CONSULTATION -->

                <li class="nav-item">

                    <a href="{{ route('admin.consultation.index') }}"
                        class="nav-link {{ Request::is('admin/consultations*') ? 'active' : '' }}">

                        <i class="fa-solid fa-calendar-check"></i>

                        Book Consultation

                    </a>

                </li>


                <!-- =================================================
                     SHOP
                ================================================== -->

                <li class="nav-section">

                    SHOP

                </li>


                <!-- PRODUK -->

                <li class="nav-item">

                    <a href="{{ url('/admin/products') }}"
                        class="nav-link {{ Request::is('admin/products*') ? 'active' : '' }}">

                        <i class="fa-solid fa-box-open"></i>

                        Produk

                    </a>

                </li>


                <!-- SMART CHILD BOX -->

                <li class="nav-item">

                    <a href="{{ route('admin.smartbox.index') }}"
                        class="nav-link {{ Request::is('admin/smart-child-box*') ? 'active' : '' }}">

                        <i class="fa-solid fa-boxes-stacked"></i>

                        Smart Child Box

                    </a>

                </li>


                <!-- PESANAN -->

                <li class="nav-item">

                    <a
                        href="{{ url('/admin/orders') }}"
                        class="nav-link nav-link-with-badge {{ Request::is('admin/orders*') ? 'active' : '' }}"
                    >

                        <span class="nav-link-content">

                            <i class="fa-solid fa-receipt"></i>

                            Pesanan

                        </span>

                        @php
                            $pesananMenunggu = \App\Models\Order::where(
                                'payment_status',
                                'Menunggu Konfirmasi'
                            )->count();
                        @endphp

                        @if($pesananMenunggu > 0)

                            <span class="sidebar-badge">
                                {{ $pesananMenunggu > 99 ? '99+' : $pesananMenunggu }}
                            </span>

                        @endif

                    </a>

                </li>


                <!-- =================================================
                     KONTEN
                ================================================== -->

                <li class="nav-section">

                    KONTEN

                </li>


                <!-- PARENTING ACADEMY -->

                <li class="nav-item">

                    <a href="{{ route('admin.parenting.index') }}"
                        class="nav-link {{ Request::is('admin/parenting*') ? 'active' : '' }}">

                        <i class="fa-solid fa-graduation-cap"></i>

                        Parenting Academy

                    </a>

                </li>

                <!-- NEWSLETTER -->

                <li class="nav-item">

                    <a href="{{ route('admin.newsletter.index') }}" class="nav-link">
                        <i class="fa-solid fa-envelope"></i> Newsletter
                    </a>

                </li>

                <!-- =================================================
                     LAINNYA
                ================================================== -->

                <li class="nav-section">

                    LAINNYA

                </li>


                <!-- PARTNERSHIPS -->

                <li class="nav-item">

                    <a href="{{ route('admin.partnership') }}"
                        class="nav-link {{ Request::is('admin/partnerships*') ? 'active' : '' }}">

                        <i class="fa-solid fa-handshake"></i>

                        Partnerships

                    </a>

                </li>


                <!-- CONTACT -->

                <li class="nav-item">

                    <a href="{{ route('admin.contact') }}"
                        class="nav-link {{ Request::is('admin/contact*') ? 'active' : '' }}">

                        <i class="fa-solid fa-envelope"></i>

                        Contact

                    </a>

                </li>


            </ul>


        </div>



        <!-- =====================================================
             SIDEBAR FOOTER
        ===================================================== -->

        <div class="sidebar-footer">


            <!-- USER PROFILE -->

            <a href="{{ Route::has('profile.show') ? route('profile.show') : (Route::has('profile') ? route('profile') : url('/profile')) }}"
                class="user-profile">

                <div class="avatar" style="overflow: hidden; padding: 0;">

                    @if(Auth::user()->foto ?? false)

                        <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Avatar"
                            style="width: 100%; height: 100%; object-fit: cover;">

                    @else

                        {{ strtoupper(substr(Auth::user()->nama ?? (Auth::user()->name ?? 'A'), 0, 1)) }}

                    @endif

                </div>


                <div class="user-info">

                    <h5>
                        {{ Auth::user()->nama ?? (Auth::user()->name ?? 'Admin') }}
                    </h5>

                    <p>
                        {{ Auth::user()->email ?? 'admin@smartchild.id' }}
                    </p>

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



    <!-- =====================================================
         MAIN CONTENT
    ===================================================== -->

    <div class="main-wrapper">


        <!-- =================================================
            NAVBAR
        ================================================== -->

        <header class="admin-navbar">


            <!-- PAGE TITLE -->

            <div class="navbar-title">

                @yield('page-title', 'Dashboard')

            </div>


            <!-- RIGHT SIDE -->

            <div class="navbar-right">


                <!-- NOTIFICATION -->

                @php

                    $totalNotifikasi = \App\Models\Order::where(
                        'payment_status',
                        'Menunggu Konfirmasi'
                    )->count();

                @endphp


                <a
                    href="{{ route('admin.notifications') }}"
                    class="notification-btn"
                    title="Notifikasi"
                >

                    <i class="fa-regular fa-bell"></i>


                    @if($totalNotifikasi > 0)

                        <span class="notification-badge">

                            {{ $totalNotifikasi > 99 ? '99+' : $totalNotifikasi }}

                        </span>

                    @endif

                </a>


                <!-- ADMIN PROFILE -->

                <a
                    href="{{ Route::has('profile.show') ? route('profile.show') : url('/profile') }}"
                    class="navbar-profile"
                >

                    <div class="navbar-avatar">

                        @if(Auth::user()->foto ?? false)

                            <img
                                src="{{ asset('storage/' . Auth::user()->foto) }}"
                                alt="Avatar"
                            >

                        @else

                            {{ strtoupper(
                                substr(
                                    Auth::user()->nama
                                    ?? (Auth::user()->name ?? 'A'),
                                    0,
                                    1
                                )
                            ) }}

                        @endif

                    </div>


                    <div class="navbar-user-info">

                        <span class="navbar-user-name">

                            {{ Auth::user()->nama
                                ?? (Auth::user()->name ?? 'Admin')
                            }}

                        </span>


                        <span class="navbar-user-role">

                            Administrator

                        </span>

                    </div>

                </a>


            </div>


        </header>


        <!-- =================================================
            PAGE CONTENT
        ================================================== -->

        <main class="page-content">

            @yield('content')

        </main>


    </div>



    <!-- =====================================================
         BOOTSTRAP 5 JS
    ===================================================== -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>