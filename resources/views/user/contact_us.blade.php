<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - SmartChild</title>
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

        /* --- HERO BANNER --- */
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

        .hero-left h3 {
            font-size: 16px;
            font-weight: 700;
            color: #253D32;
            margin-bottom: 12px;
        }

        .hero-left p {
            color: #4A5568;
            font-size: 13px;
            line-height: 1.6;
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

        /* --- MAIN KONTEN BAWAH --- */
        .main-content {
            padding: 60px 0 80px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* --- SECTION HUBUNGI KAMI (4 KONTAK) --- */
        .contact-section-title {
            font-size: 24px;
            font-weight: 800;
            color: #253D32;
            margin-bottom: 30px;
        }

        .contact-channels-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 70px;
        }

        .channel-card {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            text-decoration: none;
            color: inherit;
        }

        .channel-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            flex-shrink: 0;
        }

        /* Warna khusus bulatan ikon */
        .icon-email { background-color: #E8F5E9; color: #388E3C; }
        .icon-telpon { background-color: #FBE9E7; color: #FF7043; }
        .icon-wa { background-color: #E8F5E9; color: #2E7D32; }
        .icon-lokasi { background-color: #FBE9E7; color: #FF7043; }

        .channel-info h4 {
            font-size: 16px;
            font-weight: 700;
            color: #253D32;
            margin-bottom: 4px;
        }

        .channel-info p {
            font-size: 12px;
            color: #718096;
            line-height: 1.5;
        }

        /* --- SECTION FORM & MAPS --- */
        .form-map-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }

        .content-title {
            font-size: 22px;
            font-weight: 800;
            color: #253D32;
            margin-bottom: 6px;
        }

        .content-subtitle {
            font-size: 12px;
            color: #718096;
            margin-bottom: 24px;
        }

        /* --- FORM KIRIM PESAN --- */
        .form-row-double {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #253D32;
            margin-bottom: 6px;
        }

        .form-control {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            font-size: 13px;
            color: #2D3748;
            outline: none;
            background-color: #ffffff;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            border-color: #253D32;
        }

        textarea.form-control {
            resize: none;
            height: 140px;
        }

        .btn-submit {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #253D32;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: #1a2c24;
        }

        /* --- CARD MAPS TEMUI KAMI --- */
        .map-card {
            border: 1px solid #E2E8F0;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }

        .map-card iframe {
            width: 100%;
            height: 250px;
            border: none;
            display: block;
        }

        .map-info-footer {
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
            background-color: #ffffff;
        }

        .map-icon {
            width: 38px;
            height: 38px;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #253D32;
            font-size: 18px;
            flex-shrink: 0;
        }

        .map-text h5 {
            font-size: 14px;
            font-weight: 700;
            color: #253D32;
            margin-bottom: 2px;
        }

        .map-text p {
            font-size: 11px;
            color: #718096;
            margin-bottom: 4px;
        }

        .map-text a {
            font-size: 11px;
            color: #253D32;
            font-weight: 700;
            text-decoration: none;
        }

        .map-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    @include('layout.header')

    <!-- HERO BANNER WRAPPER -->
    <div class="hero-wrapper">
        <div class="hero-banner">
            <div class="hero-left">
                <h1>Contact us</h1>
                <h3>Kami siap membantu anda</h3>
                <p>Punya pertanyaan, saran, atau ingin bekerja sama? jangan ragu untuk menghubungi kami melalui saluran yang tersedia di bawah ini</p>
            </div>

            <div class="hero-right">
                <img src="https://images.unsplash.com/photo-1534536281715-e28d76689b4d?auto=format&fit=crop&w=1200&q=80" alt="Contact Us Customer Service">
            </div>
        </div>
    </div>

    <!-- MAIN KONTEN BAWAH -->
    <div class="main-content">
        <div class="container">
            
            <!-- SECTION HUBUNGI KAMI MELALUI -->
            <h2 class="contact-section-title">Hubungi kami melalui</h2>

            <div class="contact-channels-grid">
                <!-- Email -->
                <a href="mailto:hello@smartchild.id" class="channel-card">
                    <div class="channel-icon icon-email">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div class="channel-info">
                        <h4>Email</h4>
                        <p>hello@smartchild.id<br>kami akan membalas email anda segera</p>
                    </div>
                </a>

                <!-- Telpon -->
                <a href="tel:+6281234567890" class="channel-card">
                    <div class="channel-icon icon-telpon">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div class="channel-info">
                        <h4>Telpon</h4>
                        <p>+62 812-3456-7890<br>Senin - Jumat<br>08.00 - 17.00 WIB</p>
                    </div>
                </a>

                <!-- WhatsApp -->
                <a href="https://wa.me/6281234567890" target="_blank" class="channel-card">
                    <div class="channel-icon icon-wa">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="channel-info">
                        <h4>WhatsApp</h4>
                        <p>+62 812-3456-7890<br>Chat kami untuk respon lebih cepat</p>
                    </div>
                </a>

                <!-- Lokasi -->
                <a href="https://maps.google.com" target="_blank" class="channel-card">
                    <div class="channel-icon icon-lokasi">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div class="channel-info">
                        <h4>Lokasi</h4>
                        <p>Jl. cerdas No.10,<br>Jakarta, Indonesia 12345</p>
                    </div>
                </a>
            </div>

            <!-- SECTION FORM KIRIM PESAN & MAPS TEMUI KAMI -->
            <div class="form-map-grid">
                
                <!-- KOLOM KIRI: FORM KIRIM PESAN -->
                <div class="form-column">
                    <h3 class="content-title">Kirim Pesan</h3>
                    <p class="content-subtitle">Isi formulir di bawah ini dan tim kami akan segera menghubungi anda</p>

                    <form action="#" method="POST">
                        @csrf
                        <div class="form-row-double">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="subjek">Subjek</label>
                            <select id="subjek" name="subjek" class="form-control">
                                <option value="Business Partner">Business Partner</option>
                                <option value="School Partnership">School Partnership</option>
                                <option value="General Inquiry">Pertanyaan Umum</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea id="pesan" name="pesan" class="form-control" placeholder=""></textarea>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa-regular fa-paper-plane"></i> Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- KOLOM KANAN: MAPS TEMUI KAMI -->
                <div class="map-column">
                    <h3 class="content-title">Temui kami</h3>
                    <div style="height: 18px;"></div> <!-- Spacing alignment -->

                    <div class="map-card">
                        <!-- Peta Google Maps Embed -->
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.28312028682!2d106.759478!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        
                        <div class="map-info-footer">
                            <div class="map-icon">
                                <i class="fa-solid fa-door-open"></i>
                            </div>
                            <div class="map-text">
                                <h5>Smart Child Indonesia</h5>
                                <p>Jl. Cerdas No. 10, Jakarta, Indonesia 12345</p>
                                <a href="https://maps.google.com" target="_blank">Lihat di Google Maps <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 10px;"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>
</html>