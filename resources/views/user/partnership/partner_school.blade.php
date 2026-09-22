<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Partnership - SmartChild</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: #ffffff;
            color: #2D3748;
        }

        /* --- HERO BANNER (CONTAINER MELEBAR) --- */
        .hero-wrapper {
            max-width: 1320px;
            margin: 20px auto 0;
            padding: 0 20px;
        }

        .hero-banner {
            background-color: #EEF2E6;
            border-radius: 20px;
            padding: 50px 60px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 40px;
        }

        .hero-left {
            flex: 1;
            max-width: 420px;
        }

        .hero-left h1 {
            font-size: 58px;
            font-weight: 800;
            color: #253D32;
            line-height: 1.05;
            margin-bottom: 18px;
            letter-spacing: -1px;
        }

        .hero-left p {
            color: #4A5568;
            font-size: 13px;
            line-height: 1.6;
            margin-bottom: 28px;
        }

        .btn-become-partner {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background-color: #F39C50;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            box-shadow: 0 4px 14px rgba(243, 156, 80, 0.35);
            transition: all 0.2s ease;
        }

        .btn-become-partner:hover {
            background-color: #E08B3E;
        }

        .hero-right {
            flex: 1.6;
        }

        .hero-right img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 18px;
            display: block;
        }

        /* --- MAIN CONTENT AREA --- */
        .main-content {
            background-color: #FFFDF9;
            margin-top: 40px;
            padding: 60px 0 80px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-title h2 {
            font-size: 26px;
            font-weight: 800;
            color: #253D32;
            margin-bottom: 8px;
        }

        .section-title p {
            color: #6C757D;
            font-size: 13px;
            max-width: 580px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* --- WHY PARTNER --- */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 70px;
        }

        .why-card {
            background-color: #FFF2E7;
            border-radius: 14px;
            padding: 22px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .why-icon {
            width: 44px;
            height: 44px;
            background-color: #FFE5D3;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #F39C50;
            font-size: 18px;
            flex-shrink: 0;
        }

        .why-info h4 {
            font-size: 14px;
            font-weight: 700;
            color: #253D32;
            margin-bottom: 4px;
        }

        .why-info p {
            font-size: 11px;
            color: #6C757D;
            line-height: 1.4;
        }

        /* --- PROGRAM OPPORTUNITIES --- */
        .opp-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .opp-card {
            background-color: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            display: flex;
            flex-direction: column;
        }

        .opp-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .opp-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .opp-body h4 {
            font-size: 14px;
            font-weight: 700;
            color: #253D32;
            margin-bottom: 8px;
        }

        .opp-body p {
            font-size: 11px;
            color: #6C757D;
            line-height: 1.5;
            margin-bottom: 20px;
            flex-grow: 1;
        }

        .btn-learn-more {
            display: block;
            width: 100%;
            padding: 9px 0;
            border: 1px solid #F39C50;
            color: #F39C50;
            background: transparent;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            font-size: 12px;
            font-weight: 600;
        }

        .btn-learn-more:hover {
            background-color: #F39C50;
            color: #ffffff;
        }
    </style>
</head>
<body>

    @include('layout.header')

    <!-- HERO BANNER WRAPPER -->
    <div class="hero-wrapper">
        <div class="hero-banner">
            <div class="hero-left">
                <h1>School<br>Partnership</h1>
                <p>Bersama Smart Child, ciptakan lingkungan pendidikan yang mendukung tumbuh kembang setiap anak secara optimal.</p>
                
                <a href="{{ route('partnership.form', ['type' => 'School']) }} class="btn-become-partner">
                    Become a Partner <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>

            <div class="hero-right">
                <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=1200&q=80" alt="School Partnership">
            </div>
        </div>
    </div>

    <!-- MAIN KONTEN BAWAH -->
    <div class="main-content">
        <div class="container">
            
            <div class="section-title">
                <h2>Whay Partner with Smart Child?</h2>
                <p>Kami datang untuk mendukung sekolah dalam memahami dan mendampingi perkembangan anak dengan lebih baik</p>
            </div>

            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-brain"></i></div>
                    <div class="why-info">
                        <h4>Child Development</h4>
                        <p>Mendukung pemantauan dan pemahaman perkembangan serta kebutuhan anak</p>
                    </div>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-regular fa-comment-dots"></i></div>
                    <div class="why-info">
                        <h4>Teacher Support</h4>
                        <p>Menyediakan edukasi, pelatihan, dan informasi bermanfaat untuk guru dan sekolah</p>
                    </div>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-regular fa-hand-shake"></i></div>
                    <div class="why-info">
                        <h4>Better Learning Environment</h4>
                        <p>Bersama menciptakan lingkungan belajar yang positif dan mendukung tumbuh kembang anak</p>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <h2>Our Partnership Program</h2>
                <p>Program kerja sama yang dapat dipilih sesuai kebutuhan sekolah anda</p>
            </div>

            <div class="opp-grid">
                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=600&q=80" alt="Child Assessment">
                    <div class="opp-body">
                        <h4>Child Assessment</h4>
                        <p>Assessment perkembangan anak untuk membantu sekolah memahami kebutuhan anak</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>

                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?auto=format&fit=crop&w=600&q=80" alt="Teach Program">
                    <div class="opp-body">
                        <h4>Teach Program</h4>
                        <p>Program edukasi dan pelatihan untuk meningkatkan pengetahuan dan keterampilan guru</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>

                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?auto=format&fit=crop&w=600&q=80" alt="Parenting Program">
                    <div class="opp-body">
                        <h4>Parenting Program</h4>
                        <p>Edukasi dan seminar parenting untuk orang tua siswa dalam mendukung tumbuh kembang anak</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>