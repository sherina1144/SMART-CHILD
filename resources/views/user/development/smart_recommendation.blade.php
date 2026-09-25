<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Recommendation - Smart Child</title>

    {{-- Font Poppins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet"
    >

    {{-- Font Awesome --}}
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >
</head>

<body>

    @include('layout.header')


    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            background: #FFF9F2;
            font-family: 'Poppins', sans-serif;
            color: #315C50;
        }

        /* =========================
           MAIN
        ========================= */

        .recommendation-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 45px 40px 60px;
        }


        /* =========================
           HERO
        ========================= */

        .recommendation-hero {
            display: grid;
            grid-template-columns: 1fr 430px;
            gap: 55px;
            align-items: center;
            margin-bottom: 45px;
        }

        .recommendation-hero h1 {
            margin: 0 0 14px;
            font-size: 43px;
            line-height: 1.15;
            font-weight: 800;
            color: #315C50;
        }

        .recommendation-hero p {
            margin: 0;
            max-width: 570px;
            color: #667085;
            font-size: 15px;
            line-height: 1.8;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: 265px;
            object-fit: cover;
            border-radius: 28px;
            display: block;
        }


        /* =========================
           PROFILE + FOCUS
        ========================= */

        .recommendation-top {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .profile-card {
            background: #FFFFFF;
            border-radius: 22px;
            padding: 25px;
            display: flex;
            align-items: center;
            gap: 18px;
            border: 1px solid #E8EEE9;
        }

        .profile-photo {
            width: 76px;
            height: 76px;
            border-radius: 50%;
            object-fit: cover;
            flex-shrink: 0;
        }

        .profile-card h3 {
            margin: 0 0 5px;
            font-size: 15px;
            font-weight: 700;
            color: #315C50;
        }

        .profile-card h2 {
            margin: 0 0 12px;
            font-size: 20px;
            line-height: 1.35;
            font-weight: 800;
            color: #315C50;
        }

        .assessment-button {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 14px;
            border-radius: 10px;
            background: #6FAF9B;
            color: #FFFFFF;
            text-decoration: none;
            font-size: 11px;
            font-weight: 600;
        }

        .assessment-button:hover {
            background: #5F9F8B;
        }


        /* =========================
           FOCUS
        ========================= */

        .focus-card {
            background: #FFFFFF;
            border-radius: 22px;
            padding: 25px;
            border: 1px solid #E8EEE9;
        }

        .focus-card h2 {
            margin: 0 0 18px;
            font-size: 19px;
            font-weight: 800;
            color: #315C50;
        }

        .focus-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
        }

        .focus-item {
            border-radius: 15px;
            padding: 15px 10px;
            text-align: center;
            background: #F4F8F5;
        }

        .focus-item.needs-support {
            background: #FFF0EC;
        }

        .focus-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            margin: 0 auto 8px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #DCEDE6;
            color: #315C50;
            font-size: 14px;
        }

        .needs-support .focus-icon {
            background: #F4A89A;
            color: #FFFFFF;
        }

        .focus-item strong {
            display: block;
            font-size: 12px;
            margin-bottom: 4px;
            color: #315C50;
        }

        .focus-item span {
            font-size: 10px;
            color: #667085;
        }

        .needs-support span {
            color: #C86F61;
            font-weight: 600;
        }


        /* =========================
           TABS
        ========================= */

        .recommendation-tabs {
            display: flex;
            gap: 10px;
            margin: 35px 0 25px;
        }

        .recommendation-tab {
            border: 1px solid #DDE7E2;
            background: #FFFFFF;
            color: #667085;

            border-radius: 12px;
            padding: 12px 20px;

            font-family: inherit;
            font-size: 12px;
            font-weight: 600;

            cursor: pointer;
            transition: .2s;
        }

        .recommendation-tab:hover {
            border-color: #6FAF9B;
            color: #315C50;
        }

        .recommendation-tab.active {
            background: #6FAF9B;
            color: #FFFFFF;
            border-color: #6FAF9B;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }


        /* =========================
           PRODUCT AREA
        ========================= */

        .recommendation-content {
            display: grid;
            grid-template-columns: 1fr 290px;
            gap: 25px;
            align-items: start;
        }

        .products-area h2 {
            margin: 0 0 20px;
            font-size: 21px;
            font-weight: 800;
            color: #315C50;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .product-card {
            background: #FFFFFF;
            border-radius: 18px;
            padding: 14px;
            border: 1px solid #E8EEE9;
            position: relative;
        }

        .product-image {
            width: 100%;
            height: 145px;
            border-radius: 13px;
            object-fit: cover;
            display: block;
            background: #F2F5F3;
        }

        .product-card h3 {
            margin: 14px 0 5px;
            font-size: 14px;
            font-weight: 800;
            color: #315C50;
        }

        .product-card p {
            margin: 0 0 10px;
            font-size: 11px;
            line-height: 1.5;
            color: #667085;
            min-height: 34px;
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-price {
            font-size: 13px;
            font-weight: 800;
            color: #315C50;
        }

        .cart-button {
            width: 32px;
            height: 32px;

            border: none;
            border-radius: 50%;

            background: #6FAF9B;
            color: #FFFFFF;

            cursor: pointer;

            display: flex;
            align-items: center;
            justify-content: center;
        }


        /* =========================
           WHY CARD
        ========================= */

        .why-card {
            background: #F4A89A;
            border-radius: 22px;
            padding: 25px;
            color: #FFFFFF;
        }

        .why-card h2 {
            margin: 0 0 12px;
            font-size: 17px;
            font-weight: 800;
        }

        .why-card > p {
            margin: 0 0 18px;
            font-size: 11px;
            line-height: 1.7;
        }

        .why-list {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .why-item {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 11px;
        }

        .why-item i {
            font-size: 11px;
        }


        /* =========================
           SEE ALL
        ========================= */

        .see-all {
            margin-top: 25px;

            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #315C50;
            color: #FFFFFF;

            text-decoration: none;

            padding: 12px 19px;
            border-radius: 11px;

            font-size: 12px;
            font-weight: 600;
        }

        .see-all:hover {
            background: #264D43;
        }


        /* =========================
           HELP CARD
        ========================= */

        .help-card {
            margin-top: 18px;
            padding: 20px;

            background: #FFFFFF;
            border: 1px solid #E8EEE9;
            border-radius: 18px;

            text-align: center;
        }

        .help-card i {
            width: 38px;
            height: 38px;

            display: flex;
            align-items: center;
            justify-content: center;

            margin: 0 auto 10px;

            border-radius: 50%;
            background: #E5F1EC;
            color: #315C50;
        }

        .help-card strong {
            display: block;
            margin-bottom: 4px;
            font-size: 12px;
            color: #315C50;
        }

        .help-card span {
            font-size: 10px;
            color: #667085;
        }


        /* =========================
           ACTIVITY
        ========================= */

        .activity-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
        }

        .activity-card {
            background: #FFFFFF;
            border: 1px solid #E8EEE9;
            border-radius: 18px;
            padding: 22px;
        }

        .activity-icon {
            width: 42px;
            height: 42px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;
            background: #E5F1EC;
            color: #315C50;

            margin-bottom: 15px;
        }

        .activity-card h3 {
            margin: 0 0 8px;
            font-size: 14px;
            font-weight: 800;
            color: #315C50;
        }

        .activity-card p {
            margin: 0;
            color: #667085;
            font-size: 11px;
            line-height: 1.7;
        }


        /* =========================
           ARTICLE
        ========================= */

        .articles-area h2 {
            margin: 0 0 20px;
            font-size: 21px;
            font-weight: 800;
            color: #315C50;
        }

        .article-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .recommendation-article {
            background: #FFFFFF;
            border: 1px solid #E8EEE9;
            border-radius: 18px;
            overflow: hidden;
        }

        .recommendation-article img {
            width: 100%;
            height: 170px;
            object-fit: cover;
            display: block;
            background: #F2F5F3;
        }

        .article-content {
            padding: 18px;
        }

        .article-category {
            display: inline-block;
            margin-bottom: 8px;

            padding: 5px 9px;
            border-radius: 8px;

            background: #E5F1EC;
            color: #315C50;

            font-size: 9px;
            font-weight: 600;
        }

        .article-content h3 {
            margin: 0 0 8px;
            font-size: 14px;
            line-height: 1.5;
            font-weight: 800;
            color: #315C50;
        }

        .article-content p {
            margin: 0;
            color: #667085;
            font-size: 11px;
            line-height: 1.7;

            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .empty-article {
            background: #FFFFFF;
            border: 1px solid #E8EEE9;
            border-radius: 18px;
            padding: 35px;
            text-align: center;
            color: #667085;
            font-size: 12px;
        }


        /* =========================
           FOOTER
        ========================= */

        .sbd-footer {
            width: 100%;
            background: #315C50;
            text-align: center;
            padding: 18px 20px;
        }

        .sbd-footer p {
            margin: 0;
            color: #FFFFFF;
            font-size: 11px;
            line-height: 1.6;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 950px) {

            .recommendation-hero,
            .recommendation-top,
            .recommendation-content {
                grid-template-columns: 1fr;
            }

            .focus-list {
                grid-template-columns: repeat(3, 1fr);
            }

            .activity-grid {
                grid-template-columns: 1fr 1fr;
            }
        }


        @media (max-width: 600px) {

            .recommendation-page {
                padding: 30px 20px 45px;
            }

            .recommendation-hero h1 {
                font-size: 32px;
            }

            .focus-list,
            .product-grid,
            .article-grid,
            .activity-grid {
                grid-template-columns: 1fr 1fr;
            }

            .recommendation-tabs {
                flex-wrap: wrap;
            }

            .recommendation-tab {
                padding: 10px 13px;
            }
        }
    </style>


    <main class="recommendation-page">


        {{-- =========================================================
             HERO
        ========================================================== --}}

        <section class="recommendation-hero">

            <div>

                <h1>
                    Smart Recommendation
                </h1>

                <p>
                    Rekomendasi personal untuk mendukung
                    perkembangan optimal anak Anda.
                </p>

            </div>


            <div class="hero-image">

                <img
                    src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=900&q=80"
                    alt="Anak bermain"
                >

            </div>

        </section>



        {{-- =========================================================
             PROFILE + FOCUS
        ========================================================== --}}

        <section class="recommendation-top">


            {{-- PROFILE --}}

            <div class="profile-card">

                <img
                    class="profile-photo"
                    src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=300&q=80"
                    alt="Aqila"
                >

                <div>

                    <h3>
                        Halo, Bunda!
                    </h3>

                    <h2>
                        Ini rekomendasi untuk<br>
                        Aqila (4 Tahun)
                    </h2>

                    <a
                        href="{{ route('development.assessment') }}"
                        class="assessment-button"
                    >

                        <i class="fa-solid fa-chart-column"></i>

                        Lihat Hasil Assessment

                    </a>

                </div>

            </div>



            {{-- FOCUS --}}

            <div class="focus-card">

                <h2>
                    Fokus Perkembangan Aqila
                </h2>

                <div class="focus-list">


                    {{-- MOTORIK --}}

                    <div class="focus-item needs-support">

                        <div class="focus-icon">
                            <i class="fa-solid fa-person-running"></i>
                        </div>

                        <strong>
                            Motorik
                        </strong>

                        <span>
                            Perlu Dukungan
                        </span>

                    </div>


                    {{-- BAHASA --}}

                    <div class="focus-item">

                        <div class="focus-icon">
                            <i class="fa-solid fa-comments"></i>
                        </div>

                        <strong>
                            Bahasa
                        </strong>

                        <span>
                            Baik
                        </span>

                    </div>


                    {{-- SOSIAL --}}

                    <div class="focus-item">

                        <div class="focus-icon">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <strong>
                            Sosial
                        </strong>

                        <span>
                            Baik
                        </span>

                    </div>


                    {{-- KOGNITIF --}}

                    <div class="focus-item">

                        <div class="focus-icon">
                            <i class="fa-solid fa-brain"></i>
                        </div>

                        <strong>
                            Kognitif
                        </strong>

                        <span>
                            Baik
                        </span>

                    </div>


                    {{-- EMOSIONAL --}}

                    <div class="focus-item">

                        <div class="focus-icon">
                            <i class="fa-solid fa-heart"></i>
                        </div>

                        <strong>
                            Emosional
                        </strong>

                        <span>
                            Baik
                        </span>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             TABS
        ========================================================== --}}

        <div class="recommendation-tabs">


            <button
                type="button"
                class="recommendation-tab active"
                onclick="showRecommendationTab('products', this)"
            >

                <i class="fa-solid fa-box"></i>

                Rekomendasi Produk

            </button>


            <button
                type="button"
                class="recommendation-tab"
                onclick="showRecommendationTab('activities', this)"
            >

                <i class="fa-solid fa-puzzle-piece"></i>

                Rekomendasi Aktivitas

            </button>


            <button
                type="button"
                class="recommendation-tab"
                onclick="showRecommendationTab('articles', this)"
            >

                <i class="fa-solid fa-book-open"></i>

                Rekomendasi Artikel

            </button>

        </div>



        {{-- =========================================================
             TAB 1 - PRODUK
        ========================================================== --}}

        <section
            id="products"
            class="tab-content active"
        >

            <div class="recommendation-content">


                <div class="products-area">

                    <h2>
                        Rekomendasi Produk
                    </h2>


                    <div class="product-grid">


                        {{-- PRODUCT 1 --}}

                        <div class="product-card">

                            <img
                                class="product-image"
                                src="https://images.unsplash.com/photo-1594784055412-5b2a6c5b7d8e?auto=format&fit=crop&w=600&q=80"
                                alt="Balance Board"
                            >

                            <h3>
                                Balance Board
                            </h3>

                            <p>
                                Melatih keseimbangan dan motorik kasar.
                            </p>

                            <div class="product-bottom">

                                <span class="product-price">
                                    Rp 135.000
                                </span>

                                <button
                                    type="button"
                                    class="cart-button"
                                >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                            </div>

                        </div>



                        {{-- PRODUCT 2 --}}

                        <div class="product-card">

                            <img
                                class="product-image"
                                src="https://images.unsplash.com/photo-1560969184-10fe8719e047?auto=format&fit=crop&w=600&q=80"
                                alt="Shape Sorter"
                            >

                            <h3>
                                Shape Sorter
                            </h3>

                            <p>
                                Melatih logika dan motorik halus.
                            </p>

                            <div class="product-bottom">

                                <span class="product-price">
                                    Rp 135.000
                                </span>

                                <button
                                    type="button"
                                    class="cart-button"
                                >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                            </div>

                        </div>



                        {{-- PRODUCT 3 --}}

                        <div class="product-card">

                            <img
                                class="product-image"
                                src="https://images.unsplash.com/photo-1596464716127-f2a82984de30?auto=format&fit=crop&w=600&q=80"
                                alt="Play Dough Set"
                            >

                            <h3>
                                Play Dough Set
                            </h3>

                            <p>
                                Meningkatkan kreativitas dan motorik halus.
                            </p>

                            <div class="product-bottom">

                                <span class="product-price">
                                    Rp 95.000
                                </span>

                                <button
                                    type="button"
                                    class="cart-button"
                                >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                            </div>

                        </div>



                        {{-- PRODUCT 4 --}}

                        <div class="product-card">

                            <img
                                class="product-image"
                                src="https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=600&q=80"
                                alt="Maze Beads"
                            >

                            <h3>
                                Maze Beads
                            </h3>

                            <p>
                                Melatih koordinasi tangan dan mata.
                            </p>

                            <div class="product-bottom">

                                <span class="product-price">
                                    Rp 125.000
                                </span>

                                <button
                                    type="button"
                                    class="cart-button"
                                >
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>

                            </div>

                        </div>

                    </div>



                    {{-- SEE ALL PRODUCTS --}}

                    <a
                        href="{{ route('shop.allproducts') }}"
                        class="see-all"
                    >

                        Lihat Semua Rekomendasi Produk

                        <i class="fa-solid fa-arrow-right"></i>

                    </a>

                </div>



                {{-- WHY RECOMMENDED --}}

                <aside>

                    <div class="why-card">

                        <h2>
                            Kenapa Ini Direkomendasikan?
                        </h2>

                        <p>
                            Berdasarkan hasil assessment, Aqila
                            membutuhkan stimulasi pada aspek motorik.
                        </p>


                        <div class="why-list">


                            <div class="why-item">

                                <i class="fa-solid fa-check"></i>

                                <span>
                                    Meningkatkan koordinasi tangan
                                </span>

                            </div>


                            <div class="why-item">

                                <i class="fa-solid fa-check"></i>

                                <span>
                                    Melatih konsentrasi
                                </span>

                            </div>


                            <div class="why-item">

                                <i class="fa-solid fa-check"></i>

                                <span>
                                    Mendukung kemandirian
                                </span>

                            </div>


                            <div class="why-item">

                                <i class="fa-solid fa-check"></i>

                                <span>
                                    Aktivitas menyenangkan
                                </span>

                            </div>

                        </div>

                    </div>



                    <div class="help-card">

                        <i class="fa-regular fa-comments"></i>

                        <strong>
                            Butuh bantuan memilih?
                        </strong>

                        <span>
                            Chat dengan Tim Smart Child
                        </span>

                    </div>

                </aside>

            </div>

        </section>



        {{-- =========================================================
             TAB 2 - AKTIVITAS
        ========================================================== --}}

        <section
            id="activities"
            class="tab-content"
        >

            <div class="products-area">

                <h2>
                    Rekomendasi Aktivitas
                </h2>


                <div class="activity-grid">


                    <div class="activity-card">

                        <div class="activity-icon">
                            <i class="fa-solid fa-person-running"></i>
                        </div>

                        <h3>
                            Permainan Keseimbangan
                        </h3>

                        <p>
                            Ajak anak berjalan di atas garis,
                            bantal, atau permukaan yang aman
                            untuk melatih keseimbangan tubuh.
                        </p>

                    </div>



                    <div class="activity-card">

                        <div class="activity-icon">
                            <i class="fa-solid fa-puzzle-piece"></i>
                        </div>

                        <h3>
                            Bermain Puzzle
                        </h3>

                        <p>
                            Gunakan puzzle sederhana untuk
                            melatih koordinasi tangan, fokus,
                            dan kemampuan memecahkan masalah.
                        </p>

                    </div>



                    <div class="activity-card">

                        <div class="activity-icon">
                            <i class="fa-solid fa-palette"></i>
                        </div>

                        <h3>
                            Aktivitas Menggambar
                        </h3>

                        <p>
                            Berikan kesempatan anak menggambar
                            dan mewarnai untuk melatih kreativitas
                            serta motorik halus.
                        </p>

                    </div>

                </div>

            </div>

        </section>



        {{-- =========================================================
             TAB 3 - ARTIKEL
        ========================================================== --}}

        <section
            id="articles"
            class="tab-content"
        >

            <div class="articles-area">

                <h2>
                    Rekomendasi Artikel
                </h2>


                @if ($articles->count() > 0)

                    <div class="article-grid">

                        @foreach ($articles as $article)

                            <article class="recommendation-article">


                                {{-- THUMBNAIL --}}

                                @if ($article->thumbnail)

                                    <img
                                        src="{{ asset('images/' . $article->thumbnail) }}"
                                        alt="{{ $article->title }}"
                                    >

                                @else

                                    <div
                                        style="
                                            height: 170px;
                                            background: #E5F1EC;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                            color: #315C50;
                                            font-size: 30px;
                                        "
                                    >

                                        <i class="fa-solid fa-book-open"></i>

                                    </div>

                                @endif


                                {{-- ARTICLE CONTENT --}}

                                <div class="article-content">


                                    @if ($article->category)

                                        <span class="article-category">
                                            {{ $article->category }}
                                        </span>

                                    @endif


                                    <h3>
                                        {{ $article->title }}
                                    </h3>


                                    @if ($article->description)

                                        <p>
                                            {{ $article->description }}
                                        </p>

                                    @endif

                                </div>

                            </article>

                        @endforeach

                    </div>

                @else

                    <div class="empty-article">

                        <i
                            class="fa-regular fa-newspaper"
                            style="font-size: 28px; margin-bottom: 12px;"
                        ></i>

                        <p style="margin: 0;">
                            Belum ada artikel rekomendasi.
                        </p>

                    </div>

                @endif

            </div>

        </section>

    </main>



    {{-- =========================================================
         FOOTER
    ========================================================== --}}

    <footer class="sbd-footer">

        <p>
            © {{ date('Y') }} SmartChild.
            Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>

    </footer>



    {{-- =========================================================
         TAB SCRIPT
    ========================================================== --}}

    <script>

        function showRecommendationTab(tabId, button) {

            // Sembunyikan semua tab
            document
                .querySelectorAll('.tab-content')
                .forEach(function (tab) {

                    tab.classList.remove('active');

                });


            // Hilangkan active dari semua tombol
            document
                .querySelectorAll('.recommendation-tab')
                .forEach(function (tabButton) {

                    tabButton.classList.remove('active');

                });


            // Tampilkan tab yang dipilih
            const selectedTab = document.getElementById(tabId);

            if (selectedTab) {
                selectedTab.classList.add('active');
            }


            // Aktifkan tombol
            button.classList.add('active');

        }

    </script>


</body>
</html>