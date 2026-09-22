<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Partner - SmartChild</title>
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
            flex: 1.6; /* Membuat kontainer gambar memanjang jauh ke samping */
        }

        .hero-right img {
            width: 100%;
            height: 300px; /* Rasio landscape gepeng lebar */
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

        /* --- OPPORTUNITIES --- */
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
                <h1>Bussines<br>Partner</h1>
                <p>Bersama Smart Child, ciptakan peluang dan kolaborasi yang memberikan dampak positif bagia nak dan keluarga</p>
                
                <a href="{{ route('partnership.form', ['type' => 'Business']) }}class="btn-become-partner">
                    Become a Partner <i class="fa-solid fa-arrow-up-right-from-square"></i>
                </a>
            </div>

            <div class="hero-right">
                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=1200&q=80" alt="Business Partner">
            </div>
        </div>
    </div>

    <!-- MAIN KONTEN BAWAH -->
    <div class="main-content">
        <div class="container">
            
            <div class="section-title">
                <h2>Whay Partner with Smart Child?</h2>
                <p>Bersama kami, Bisnis anda dapat tumbuh sekaligus memberikan manfaat yang nyata</p>
            </div>

            <div class="why-grid">
                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-chart-line"></i></div>
                    <div class="why-info">
                        <h4>Business Growth</h4>
                        <p>Tingkatkan brand awareness dan penjualan melalui kolaborasi yang bermakna</p>
                    </div>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-solid fa-users"></i></div>
                    <div class="why-info">
                        <h4>Reach more Parents</h4>
                        <p>Akses ke komunitas orang tua yang aktif dan peduli terhadap tumbuh kembang anak</p>
                    </div>
                </div>

                <div class="why-card">
                    <div class="why-icon"><i class="fa-regular fa-heart"></i></div>
                    <div class="why-info">
                        <h4>Create positive Impact</h4>
                        <p>Bersama mendukung tumbuh kembang anak melalui produk dan layanan berkualitas</p>
                    </div>
                </div>
            </div>

            <div class="section-title">
                <h2>Partnership Opportunities</h2>
                <p>Pilih bentuk kerja sama yang paling sesuai dengan tujuan bisnis anda</p>
            </div>

            <div class="opp-grid">
                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?auto=format&fit=crop&w=600&q=80" alt="Product Partner">
                    <div class="opp-body">
                        <h4>Product Partner</h4>
                        <p>Jadilah mitra Produk Smart Child dan jangkau lebih banyak keluarga dengan produk terbaik.</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>

                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=600&q=80" alt="Campaign Partner">
                    <div class="opp-body">
                        <h4>Campaign Partner</h4>
                        <p>Kolaborasi kampanye dan promosi untuk meningkatkan brand awareness bersama Smart Child</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>

                <div class="opp-card">
                    <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=600&q=80" alt="Event Partner">
                    <div class="opp-body">
                        <h4>Event dan Sponsor Partner</h4>
                        <p>Dukung event dan program Smart Child sebagai sponsor dan dapatkan exposure yang positif!</p>
                        <a href="#" class="btn-learn-more">Pelajari selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</body>
</html>