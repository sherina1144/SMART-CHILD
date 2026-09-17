<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard - SmartChild' }}</title>
    
    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS Layout Admin -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #F8FAF9;
            color: #2D3748;
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR ADMIN --- */
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
        }

        .brand-logo {
            font-size: 20px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 35px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .brand-logo span {
            color: #F39C50;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 8px;
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

        .nav-link:hover, .nav-link.active {
            background-color: #314E41;
            color: #ffffff;
        }

        .nav-link i {
            font-size: 16px;
            width: 20px;
        }

        .user-profile {
            padding-top: 20px;
            border-top: 1px solid #314E41;
            display: flex;
            align-items: center;
            gap: 12px;
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
        }

        .user-info h5 {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
        }

        .user-info p {
            font-size: 11px;
            color: #A3B899;
        }

        /* --- MAIN CONTENT AREA --- */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            padding: 40px;
        }
    </style>
</head>
<body>

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div>
            <div class="brand-logo">
                <i class="fa-solid fa-child-reaching"></i>
                SMART<span>CHILD</span>
            </div>

            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}">
                        <i class="fa-solid fa-chart-pie"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/doctor/add') }}" class="nav-link {{ Request::is('admin/doctor*') ? 'active' : '' }}">
                        <i class="fa-solid fa-user-doctor"></i> Doctor and Therapist
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/admin/consultations') }}" class="nav-link {{ Request::is('admin/consultations*') ? 'active' : '' }}">
                        <i class="fa-solid fa-calendar-check"></i> Book Consultation
                    </a>
                </li>
            </ul>
        </div>

        <div class="user-profile">
            <div class="avatar">A</div>
            <div class="user-info">
                <h5>Admin SmartChild</h5>
                <p>admin@smartchild.id</p>
            </div>
        </div>
    </aside>

    <!-- KONTEN HALAMAN AKAN MASUK DI SINI -->
    <main class="main-wrapper">
        @yield('content')
    </main>

</body>
</html>