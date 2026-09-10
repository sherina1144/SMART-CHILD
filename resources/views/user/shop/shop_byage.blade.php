<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop By Age - Smart Child</title>

    <style>
        /* =====================================================
           PALET WARNA SMART CHILD
           ===================================================== */
        :root {
            --sage: #6FAF9B;
            --peach: #F4A89A;
            --cream: #FFF9F2;
            --dark-green: #315C50;
            --white: #FFFFFF;
            --gray: #667085;
            --border: #E8E4DC;
        }


        /* =====================================================
           GENERAL
           ===================================================== */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--cream);
            color: var(--dark-green);
        }

        .shop-age-page {
            width: 100%;
            min-height: 100vh;
            background: var(--cream);
        }


        /* =====================================================
           HERO
           ===================================================== */
        .shop-age-hero {
            width: 100%;
            max-width: 1200px;
            min-height: 270px;

            margin: 0 auto;
            padding: 45px 60px 25px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            position: relative;
            overflow: hidden;
        }

        .shop-age-hero-content {
            width: 47%;
            position: relative;
            z-index: 2;
        }

        .shop-age-label {
            display: inline-block;
            margin-bottom: 14px;

            color: var(--sage);
            font-size: 14px;
            font-weight: 600;
        }

        .shop-age-hero h1 {
            font-size: 54px;
            line-height: 1.05;

            color: var(--dark-green);
            font-weight: 800;

            margin-bottom: 18px;
        }

        .shop-age-hero p {
            color: var(--gray);
            font-size: 19px;
            line-height: 1.6;

            max-width: 420px;
        }


        /* =====================================================
           HERO IMAGE
           ===================================================== */
        .shop-age-hero-image {
            width: 48%;
            height: 250px;

            position: relative;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-circle {
            position: absolute;

            width: 410px;
            height: 230px;

            background: #FCEDE5;

            border-radius: 220px 220px 0 0;

            right: 5px;
            bottom: 0;
        }

        .shop-age-hero-image img {
            position: relative;

            z-index: 2;

            width: 100%;
            max-width: 500px;
            height: 250px;

            object-fit: contain;
            object-position: center bottom;
        }


        /* =====================================================
           DECORATION
           ===================================================== */
        .decor {
            position: absolute;
            z-index: 1;
        }

        .decor-star {
            right: 51%;
            top: 95px;

            color: #F5B83D;
            font-size: 35px;
        }

        .decor-leaf {
            right: 3%;
            bottom: 25px;

            width: 45px;
            height: 25px;

            border-radius: 100% 0 100% 0;

            background: #B6CCAF;

            transform: rotate(-25deg);
        }


        /* =====================================================
           AGE CARDS
           ===================================================== */
        .shop-age-cards {
            width: 100%;
            max-width: 1140px;

            margin: 10px auto 35px;
            padding: 0 20px;

            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 22px;
        }


        /* =====================================================
           CARD
           ===================================================== */
        .age-card {
            height: 265px;

            position: relative;

            overflow: hidden;

            border: 1px solid var(--border);
            border-radius: 18px;

            padding: 30px 25px;

            transition: transform 0.2s ease;
        }

        .age-card:hover {
            transform: translateY(-3px);
        }

        .age-card-green {
            background: #EEF4E8;
        }

        .age-card-peach {
            background: #FFF0E7;
        }


        /* =====================================================
           TEXT CARD
           ===================================================== */
        .age-card-text {
            position: relative;

            z-index: 4;

            width: 62%;
        }

        .age-card h2 {
            font-size: 28px;
            line-height: 1.2;

            color: var(--dark-green);

            margin-bottom: 15px;
        }

        .age-card p {
            color: #465952;

            font-size: 14px;
            line-height: 1.5;
        }


        /* =====================================================
           GAMBAR ANAK
           
           INI BAGIAN PENTING
           GAMBAR DIKANAN BAWAH
           ===================================================== */
        .age-card img {
            position: absolute;

            /* POSISI KE KANAN */
            right: -65px;

            /* POSISI KE BAWAH */
            bottom: -5px;

            /*
             * Dibuat besar supaya gambar anak
             * memenuhi bagian bawah card.
             */
            height: 80%;

            width: auto;

            /*
             * Jangan kasih left / transform
             * karena itu bisa bikin gambar
             * balik ke tengah.
             */
            left: auto;
            top: auto;
            transform: none;

            max-width: none;

            object-fit: contain;
            object-position: bottom right;

            z-index: 2;

            pointer-events: none;
        }


        /* =====================================================
           ARROW BUTTON
           ===================================================== */
        .age-arrow {
            position: absolute;

            right: 13px;
            bottom: 13px;

            width: 50px;
            height: 50px;

            border: none;
            border-radius: 50%;

            background: var(--sage);
            color: var(--white);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 28px;

            cursor: pointer;

            z-index: 10;
        }

        .age-arrow.peach {
            background: var(--peach);
        }


        /* =====================================================
           BENEFITS
           ===================================================== */
        .shop-age-benefits {
            width: 100%;
            max-width: 1140px;

            margin: 0 auto 25px;
            padding: 22px 25px;

            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 18px;

            display: grid;

            grid-template-columns: repeat(4, 1fr);
        }

        .benefit-item {
            min-height: 75px;

            display: flex;
            align-items: center;

            gap: 15px;

            padding: 0 20px;

            border-right: 1px solid var(--border);
        }

        .benefit-item:last-child {
            border-right: none;
        }


        /* =====================================================
           BENEFIT ICON
           ===================================================== */
        .benefit-icon {
            width: 48px;
            height: 48px;

            flex-shrink: 0;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .benefit-icon.green {
            background: #EAF2E8;
            color: var(--sage);
        }

        .benefit-icon.peach {
            background: #FFF0E9;
            color: var(--peach);
        }

        .benefit-icon svg {
            width: 25px;
            height: 25px;
        }

        .benefit-item h3 {
            font-size: 14px;

            color: var(--dark-green);

            margin-bottom: 5px;
        }

        .benefit-item p {
            font-size: 12px;

            color: var(--gray);

            line-height: 1.4;
        }


        /* =====================================================
           TRUST SECTION
           ===================================================== */
        .shop-age-trust {
            width: 100%;
            max-width: 1140px;

            margin: 0 auto 45px;
            padding: 18px 30px;

            background: #EDF3E8;

            border-radius: 15px;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .trust-left {
            display: flex;
            align-items: center;

            gap: 15px;
        }

        .trust-icon {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: var(--sage);
            color: white;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .trust-left h3 {
            font-size: 17px;
            color: var(--dark-green);
        }

        .trust-right {
            display: flex;
            align-items: center;

            gap: 30px;
        }

        .trust-avatars {
            display: flex;
            align-items: center;
        }

        .avatar {
            width: 38px;
            height: 38px;

            margin-left: -7px;

            border-radius: 50%;

            background: #D9D9D9;

            border: 2px solid var(--white);

            display: flex;
            align-items: center;
            justify-content: center;

            color: var(--dark-green);
        }

        .avatar:first-child {
            margin-left: 0;
        }

        .rating {
            display: flex;
            align-items: center;

            gap: 10px;
        }

        .rating-stars {
            color: #F5B83D;

            font-size: 19px;

            letter-spacing: 2px;
        }

        .rating strong {
            color: var(--dark-green);

            font-size: 16px;
        }


        /* =====================================================
           FOOTER
           ===================================================== */
        .simple-footer {
            width: 100%;

            min-height: 75px;

            background: var(--dark-green);

            display: flex;
            align-items: center;
            justify-content: center;

            padding: 20px;
        }

        .simple-footer p {
            color: var(--white);

            font-size: 13px;

            text-align: center;
        }


        /* =====================================================
           RESPONSIVE TABLET
           ===================================================== */
        @media (max-width: 1000px) {

            .shop-age-hero {
                padding: 40px 30px 20px;
            }

            .shop-age-hero h1 {
                font-size: 42px;
            }

            .shop-age-cards {
                grid-template-columns: repeat(2, 1fr);
            }

            .shop-age-benefits {
                grid-template-columns: repeat(2, 1fr);

                gap: 15px;
            }

            .benefit-item {
                border-right: none;
            }
        }


        /* =====================================================
           RESPONSIVE HP
           ===================================================== */
        @media (max-width: 700px) {

            .shop-age-hero {
                flex-direction: column;

                text-align: center;
            }

            .shop-age-hero-content {
                width: 100%;
            }

            .shop-age-hero-image {
                width: 100%;
            }

            .shop-age-cards {
                grid-template-columns: 1fr;
            }

            .shop-age-benefits {
                grid-template-columns: 1fr;
            }

            .shop-age-trust {
                flex-direction: column;

                gap: 20px;
            }
        }
    </style>
</head>


<body>

    {{-- HEADER DARI LAYOUT --}}
    @include('layout.header')


    <main class="shop-age-page">


        <!-- =================================================
             HERO
             ================================================= -->
        <section class="shop-age-hero">

            <div class="shop-age-hero-content">

                <span class="shop-age-label">
                    ✦ Pilih Sesuai Usia
                </span>

                <h1>
                    Shop By Age
                </h1>

                <p>
                    Temukan produk terbaik sesuai
                    dengan usia anak Anda.
                </p>

            </div>


            <div class="shop-age-hero-image">

                <div class="hero-circle"></div>

                <img
                    src="{{ asset('images/shop-age-child.png') }}"
                    alt="Anak bermain"
                >

            </div>


            <span class="decor decor-star">
                ✦
            </span>

            <span class="decor decor-leaf"></span>

        </section>



        <!-- =================================================
             AGE CARDS
             ================================================= -->
        <section class="shop-age-cards">


            <!-- ================= 0 - 2 ================= -->
            <div class="age-card age-card-green">

                <div class="age-card-text">

                    <h2>
                        0 – 2<br>
                        Tahun
                    </h2>

                    <p>
                        Produk untuk bayi
                        0 sampai 2 tahun
                    </p>

                </div>


                <img
                    src="{{ asset('images/age-0-2.png') }}"
                    alt="Anak usia 0 sampai 2 tahun"
                >


                <button class="age-arrow">
                    →
                </button>

            </div>



            <!-- ================= 3 - 5 ================= -->
            <div class="age-card age-card-peach">

                <div class="age-card-text">

                    <h2>
                        3 – 5<br>
                        Tahun
                    </h2>

                    <p>
                        Produk untuk anak
                        3 sampai 5 tahun
                    </p>

                </div>


                <img
                    src="{{ asset('images/age-3-5.png') }}"
                    alt="Anak usia 3 sampai 5 tahun"
                >


                <button class="age-arrow peach">
                    →
                </button>

            </div>



            <!-- ================= 6 - 8 ================= -->
            <div class="age-card age-card-green">

                <div class="age-card-text">

                    <h2>
                        6 – 8<br>
                        Tahun
                    </h2>

                    <p>
                        Produk untuk anak
                        6 sampai 8 tahun
                    </p>

                </div>


                <img
                    src="{{ asset('images/age-6-8.png') }}"
                    alt="Anak usia 6 sampai 8 tahun"
                >


                <button class="age-arrow">
                    →
                </button>

            </div>



            <!-- ================= 9 - 12 ================= -->
            <div class="age-card age-card-peach">

                <div class="age-card-text">

                    <h2>
                        9 – 12<br>
                        Tahun
                    </h2>

                    <p>
                        Produk untuk anak
                        9 sampai 12 tahun
                    </p>

                </div>


                <img
                    src="{{ asset('images/age-9-12.png') }}"
                    alt="Anak usia 9 sampai 12 tahun"
                >


                <button class="age-arrow peach">
                    →
                </button>

            </div>

        </section>



        <!-- =================================================
             BENEFITS
             ================================================= -->
        <section class="shop-age-benefits">


            <!-- AMAN -->
            <div class="benefit-item">

                <div class="benefit-icon green">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>

                        <path d="m9 12 2 2 4-4"/>

                    </svg>

                </div>


                <div>

                    <h3>
                        Aman & Berkualitas
                    </h3>

                    <p>
                        Produk terpilih dan aman
                        untuk anak
                    </p>

                </div>

            </div>



            <!-- PERKEMBANGAN -->
            <div class="benefit-item">

                <div class="benefit-icon peach">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M20 4c-5.5 0-10 2.5-10 8 0 3 2 5 5 5 5.5 0 7-5.5 7-13z"/>

                        <path d="M4 20c3-6 7-9 13-12"/>

                    </svg>

                </div>


                <div>

                    <h3>
                        Mendukung Perkembangan
                    </h3>

                    <p>
                        Dirancang untuk mendukung
                        perkembangan anak
                    </p>

                </div>

            </div>



            <!-- BELAJAR -->
            <div class="benefit-item">

                <div class="benefit-icon green">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <rect
                            x="3"
                            y="8"
                            width="18"
                            height="13"
                            rx="2"
                        />

                        <path d="M12 8v13"/>

                        <path d="M3 12h18"/>

                        <path d="M12 8H7.5a2.5 2.5 0 1 1 0-5C10 3 12 8 12 8z"/>

                        <path d="M12 8h4.5a2.5 2.5 0 1 0 0-5C14 3 12 8 12 8z"/>

                    </svg>

                </div>


                <div>

                    <h3>
                        Bermain Sambil Belajar
                    </h3>

                    <p>
                        Membantu anak belajar
                        dengan cara menyenangkan
                    </p>

                </div>

            </div>



            <!-- PENGIRIMAN -->
            <div class="benefit-item">

                <div class="benefit-icon peach">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <path d="M3 5h11v11H3z"/>

                        <path d="M14 8h4l3 3v5h-7z"/>

                        <circle
                            cx="7"
                            cy="18"
                            r="2"
                        />

                        <circle
                            cx="18"
                            cy="18"
                            r="2"
                        />

                        <path d="M9 18h7"/>

                    </svg>

                </div>


                <div>

                    <h3>
                        Pengiriman Cepat
                    </h3>

                    <p>
                        Pesanan dikirim dengan
                        cepat dan aman
                    </p>

                </div>

            </div>

        </section>



        <!-- =================================================
             TRUST
             ================================================= -->
        <section class="shop-age-trust">


            <div class="trust-left">

                <span class="trust-icon">

                    <svg
                        width="20"
                        height="20"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >

                        <path d="m12 2 2.9 6 6.6.9-4.8 4.7 1.1 6.6L12 17l-5.8 3.2 1.1-6.6-4.8-4.7 6.6-.9L12 2z"/>

                    </svg>

                </span>


                <h3>
                    Dipercaya oleh 10.000+
                    orang tua di Indonesia
                </h3>

            </div>



            <div class="trust-right">


                <div class="trust-avatars">

                    <span class="avatar">A</span>
                    <span class="avatar">B</span>
                    <span class="avatar">C</span>
                    <span class="avatar">D</span>
                    <span class="avatar">E</span>

                </div>


                <div class="rating">

                    <span class="rating-stars">
                        ★ ★ ★ ★ ★
                    </span>

                    <strong>
                        4.9/5
                    </strong>

                </div>

            </div>

        </section>

    </main>



    <!-- =====================================================
         FOOTER
         ===================================================== -->
    <footer class="simple-footer">

        <p>
            © 2026 SmartChild.
            Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>

    </footer>


</body>

</html>