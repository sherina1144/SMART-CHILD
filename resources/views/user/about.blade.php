@include('layout.header')

<style>
    /* =========================
       ABOUT PAGE
    ========================= */

    .about-page {
        background: #FFFDF9;
        color: #315C50;
        min-height: 100vh;
    }


    /* =========================
       ABOUT HERO
    ========================= */

    .about-hero {
    max-width: 1200px;
    margin: 0 auto;
    padding: 45px 55px 25px;

    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: start;
    gap: 55px;
}

    .about-content h1 {
        margin: 0 0 12px;

        font-size: 40px;
        line-height: 1.15;
        font-weight: 700;

        color: #315C50;
    }

    .about-content p {
        max-width: 380px;

        margin: 0;

        font-size: 11px;
        line-height: 1.7;

        color: #667085;
    }


    /* =========================
       ABOUT IMAGE
    ========================= */

    .about-image {
        display: flex;
        justify-content: center;
    }

    .about-image img {
        width: 100%;
        max-width: 390px;
        height: 245px;

        object-fit: cover;

        border-radius: 180px 180px 0 0;
    }


    /* =========================
       ABOUT INFORMATION
    ========================= */

    .about-info {
    width: 100%;
    margin-top: 30px;

    padding: 0;

    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

    .about-info-item {
    display: flex;
    gap: 8px;
    align-items: flex-start;
}

    .about-info-icon {
        width: 30px;
        height: 30px;

        flex-shrink: 0;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #EEF3E7;

        border-radius: 50%;

        font-size: 12px;
    }

    .about-info-item h3 {
    margin: 0 0 6px;

    font-size: 13px;
    font-weight: 700;

    color: #315C50;
}

    .about-info-item p {
        margin: 0;

        font-size: 10px;
        line-height: 1.6;

        color: #667085;
    }


    /* =========================
       STATISTIC
    ========================= */

    .about-stat {
        max-width: 1200px;
        margin: 0 auto;

        padding: 15px 35px;

        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;

        background: #EEF3E7;

        border-radius: 10px;
    }

    .stat-item {
        display: flex;
        align-items: center;
        justify-content: center;

        gap: 10px;

        padding: 8px 10px;

        border-right: 1px solid rgba(49, 92, 80, 0.15);
    }

    .stat-item:last-child {
        border-right: none;
    }

    .stat-icon {
        font-size: 15px;
    }

    .stat-number {
        margin: 0 0 3px;

        font-size: 14px;
        font-weight: 700;

        color: #315C50;
    }

    .stat-label {
        margin: 0;

        font-size: 7px;

        color: #667085;
    }


    /* =========================
       QUOTE
    ========================= */

    .about-quote {
        max-width: 1200px;
        margin: 18px auto 45px;

        padding: 22px 35px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        background: #FCE9DD;

        border-radius: 10px;
    }

    .quote-content {
        display: flex;
        align-items: flex-start;

        gap: 12px;

        max-width: 600px;
    }

    .quote-mark {
        font-size: 30px;
        line-height: 1;

        color: #F4A89A;
    }

    .quote-content p {
        margin: 0;

        font-size: 11px;
        line-height: 1.7;

        color: #667085;
    }

    .quote-decor {
        display: flex;
        align-items: center;
        gap: 15px;

        font-size: 28px;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 900px) {

        .about-hero {
            grid-template-columns: 1fr;
            padding: 40px 25px;
        }

        .about-info {
            grid-template-columns: 1fr;
            padding: 10px 25px 30px;
        }

        .about-stat {
            grid-template-columns: repeat(2, 1fr);
            margin: 0 25px;
        }

        .about-quote {
            margin-left: 25px;
            margin-right: 25px;
        }

    }


    @media (max-width: 600px) {

        .about-content h1 {
            font-size: 32px;
        }

        .about-stat {
            grid-template-columns: 1fr;
        }

        .stat-item {
            border-right: none;
            border-bottom: 1px solid rgba(49, 92, 80, 0.15);
        }

        .stat-item:last-child {
            border-bottom: none;
        }

        .about-quote {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

    }

    /* =========================
   FOOTER ABOUT
========================= */

.about-footer {
    width: 100%;
    height: 45px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #315C50;
}

.about-footer p {
    margin: 0;

    font-size: 11px;
    font-weight: 400;

    color: #FFFFFF;
}

</style>


<main class="about-page">

    <!-- =========================
         ABOUT HERO
    ========================== -->

    <section class="about-hero">

    <div class="about-content">

        <h1>
            About Smart Child
        </h1>

        <p>
            Teman terbaik orang tua dalam mendukung
            tumbuh kembang anak secara optimal.
        </p>

        <!-- ABOUT INFORMATION -->
        <div class="about-info">

            <div class="about-info-item">

                <div class="about-info-icon">
                    ♧
                </div>

                <div>
                    <h3>Misi Kami</h3>

                    <p>
                        Menyediakan produk berkualitas dan informasi
                        terpercaya untuk mendukung tumbuh kembang anak.
                    </p>
                </div>

            </div>


            <div class="about-info-item">

                <div class="about-info-icon">
                    ♧
                </div>

                <div>
                    <h3>Apa Yang Kami Lakukan</h3>

                    <p>
                        Mengkurasi produk, menyediakan edukasi,
                        rekomendasi personal, dan membangun komunitas
                        positif.
                    </p>
                </div>

            </div>


            <div class="about-info-item">

                <div class="about-info-icon">
                    ♧
                </div>

                <div>
                    <h3>Untuk Siapa Kami</h3>

                    <p>
                        Untuk orang tua, pendidik, dan siapa saja yang
                        peduli pada masa depan anak.
                    </p>
                </div>

            </div>

        </div>

    </div>


    <div class="about-image">

        <img
            src="{{ asset('images/about.jpg') }}"
            alt="About Smart Child"
        >

    </div>

</section>
          


   

    


    <!-- =========================
         STATISTIC
    ========================== -->

    <section class="about-stat">

        <div class="stat-item">

            <div class="stat-icon">🎁</div>

            <div>
                <p class="stat-number">10.000+</p>
                <p class="stat-label">Produk Terkurasi</p>
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-icon">♙</div>

            <div>
                <p class="stat-number">5.000+</p>
                <p class="stat-label">Orang Tua Terpercaya</p>
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-icon">♧</div>

            <div>
                <p class="stat-number">50+</p>
                <p class="stat-label">Partner Ahli</p>
            </div>

        </div>


        <div class="stat-item">

            <div class="stat-icon">▤</div>

            <div>
                <p class="stat-number">100+</p>
                <p class="stat-label">Artikel Edukasi</p>
            </div>

        </div>

    </section>


    <!-- =========================
         QUOTE
    ========================== -->

    <section class="about-quote">

        <div class="quote-content">

            <span class="quote-mark">
                “
            </span>

            <p>
                Setiap anak memiliki potensi luar biasa.
                <br>
                Tugas kita adalah memberikan dukungan terbaik
                di setiap langkah perkembangan mereka.
            </p>

        </div>


        <div class="quote-decor">
            ☁️ 🧸 🌈
        </div>

    </section>

</main>

<!-- =========================
     FOOTER ABOUT
========================= -->

<footer class="about-footer">

    <p>
        © 2026 SmartChild. Tumbuh Cerdas, Bahagia Setiap Hari.
    </p>

</footer>
