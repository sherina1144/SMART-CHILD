<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop By Age - Smart Child</title>
</head>
<body>

    @include('layout.header')

<style>
    /* =====================================================
       SMARTCHILD - SHOP BY DEVELOPMENT
       COLOR PALETTE
       ===================================================== */

    :root {
        --sage-green: #6FAF9B;
        --soft-peach: #F4A89A;
        --warm-cream: #FFF9F2;
        --dark-green: #315C50;
        --white: #FFFFFF;
        --soft-gray: #667085;
    }

    /* =====================================================
       RESET KHUSUS HALAMAN
       ===================================================== */

    .shop-development-page {
        width: 100%;
        background: var(--warm-cream);
        color: var(--dark-green);
        font-family: 'Poppins', sans-serif;
    }

    .shop-development-page *,
    .shop-development-page *::before,
    .shop-development-page *::after {
        box-sizing: border-box;
    }

    .shop-development-page button,
    .shop-development-page input {
        font-family: inherit;
    }

    .shop-development-page a {
        text-decoration: none;
    }


    /* =====================================================
       HERO
       ===================================================== */

    .sbd-hero {
        width: 100%;
        max-width: 1140px;
        min-height: 190px;
        margin: 0 auto;

        position: relative;

        display: flex;
        align-items: center;

        overflow: hidden;
    }

    .sbd-hero-content {
        position: relative;
        z-index: 3;

        padding-left: 9px;
        padding-top: 5px;
    }

    .sbd-hero-title {
        margin: 0 0 14px;

        font-size: 48px;
        line-height: 1.08;
        font-weight: 800;
        letter-spacing: -1.8px;

        color: var(--dark-green);
    }

    .sbd-hero-description {
        margin: 0;

        font-size: 17px;
        line-height: 1.65;
        font-weight: 400;

        color: var(--dark-green);
    }


    /* =====================================================
       HERO IMAGE / ILLUSTRATION
       ===================================================== */

    .sbd-hero-visual {
        position: absolute;

        top: 0;
        right: 5px;

        width: 480px;
        height: 190px;
    }

    .sbd-hero-circle {
        position: absolute;

        right: 10px;
        bottom: 0;

        width: 455px;
        height: 180px;

        border-radius: 240px 240px 0 0;

        background: #FFF9F2;
    }

    .sbd-hero-image {
        position: absolute;

        top: 8px;
        right: 82px;

        width: 285px;
        height: 170px;

        object-fit: contain;

        z-index: 2;
    }

    .sbd-hero-decoration {
        position: absolute;

        top: 45px;
        right: 0;

        color: var(--sage-green);

        font-size: 30px;

        opacity: .6;

        z-index: 3;
    }


    /* =====================================================
       DEVELOPMENT CATEGORY
       ===================================================== */

    .sbd-development-categories {
        width: 100%;
        max-width: 1110px;

        margin: 0 auto;

        display: grid;
        grid-template-columns: repeat(5, 1fr);

        gap: 16px;
    }

    .sbd-development-card {
        min-height: 123px;

        padding: 15px;

        border-radius: 16px;

        display: flex;
        align-items: center;

        border: 1px solid rgba(49, 92, 80, .10);
    }

    .sbd-development-card.sage {
        background: var(--warm-cream);
    }

    .sbd-development-card.peach {
        background: var(--warm-cream);
    }


    /* ICON */

    .sbd-development-icon {
        width: 50px;
        min-width: 50px;

        margin-right: 8px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 37px;
    }

    .sbd-development-card.sage .sbd-development-icon {
        color: var(--sage-green);
    }

    .sbd-development-card.peach .sbd-development-icon {
        color: var(--soft-peach);
    }


    /* TEXT */

    .sbd-development-text {
        flex: 1;
    }

    .sbd-development-title {
        margin: 0 0 7px;

        text-align: center;

        font-size: 14px;
        line-height: 1.3;
        font-weight: 700;

        color: var(--dark-green);
    }

    .sbd-development-description {
        margin: 0;

        font-size: 11.5px;
        line-height: 1.6;

        color: var(--soft-gray);
    }


    /* =====================================================
       PRODUCT SECTION
       ===================================================== */

    .sbd-products-section {
        width: 100%;
        max-width: 1110px;

        margin: 21px auto 0;
    }

    .sbd-products-header {
        margin: 0 3px 12px;

        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sbd-products-title {
        margin: 0;

        font-size: 19px;
        line-height: 1.3;
        font-weight: 700;

        color: var(--dark-green);
    }


    /* =====================================================
       SORT / FILTER
       ===================================================== */

    .sbd-product-controls {
        display: flex;
        align-items: center;

        gap: 16px;
    }

    .sbd-sort-button,
    .sbd-filter-button {
        height: 40px;

        border: 1px solid rgba(49, 92, 80, .11);
        border-radius: 11px;

        background: var(--warm-cream);

        color: var(--soft-gray);

        font-size: 11px;

        display: flex;
        align-items: center;
        justify-content: center;

        cursor: pointer;

        transition: .2s ease;
    }

    .sbd-sort-button {
        width: 115px;
        gap: 12px;
    }

    .sbd-filter-button {
        width: 101px;
        gap: 8px;
    }

    .sbd-sort-button:hover,
    .sbd-filter-button:hover {
        border-color: var(--sage-green);
        color: var(--dark-green);
    }

    .sbd-sort-button i {
        font-size: 9px;
    }

    .sbd-filter-button i {
        font-size: 10px;
    }


    /* =====================================================
       PRODUCT GRID
       ===================================================== */

    .sbd-product-grid {
        width: 100%;

        display: grid;
        grid-template-columns: repeat(4, 1fr);

        gap: 22px;
    }


    /* =====================================================
       PRODUCT CARD
       ===================================================== */

    .sbd-product-card {
        overflow: hidden;

        border: 1px solid rgba(49, 92, 80, .12);
        border-radius: 17px;

        background: var(--white);
    }


    /* =====================================================
       PRODUCT IMAGE
       ===================================================== */

    .sbd-product-image {
        height: 199px;

        position: relative;

        display: flex;
        align-items: center;
        justify-content: center;

        background: var(--warm-cream);

        overflow: hidden;
    }

    .sbd-product-image img {
        width: 90%;
        height: 90%;

        object-fit: contain;

        display: block;
    }


    /* PRODUCT TAG */

    .sbd-product-tag {
        position: absolute;

        top: 14px;
        left: 12px;

        z-index: 3;

        padding: 6px 12px;

        border-radius: 20px;

        font-size: 10px;
        line-height: 1;
        font-weight: 500;
    }

    .sbd-product-tag.sage {
        background: var(--sage-green);
        color: var(--white);
    }

    .sbd-product-tag.peach {
        background: var(--soft-peach);
        color: var(--white);
    }


    /* =====================================================
       PRODUCT INFORMATION
       ===================================================== */

    .sbd-product-info {
        padding: 13px 18px 11px;
    }

    .sbd-product-name {
        margin: 0 0 5px;

        font-size: 14px;
        line-height: 1.4;
        font-weight: 600;

        color: var(--dark-green);
    }

    .sbd-product-description {
        min-height: 38px;

        margin: 0;

        font-size: 10.5px;
        line-height: 1.6;

        color: var(--soft-gray);
    }


    /* =====================================================
       PRODUCT BOTTOM
       ===================================================== */

    .sbd-product-bottom {
        margin-top: 6px;

        display: flex;
        align-items: center;
    }

    .sbd-product-price {
        white-space: nowrap;

        font-size: 14px;
        font-weight: 600;

        color: var(--dark-green);
    }

    .sbd-product-rating {
        margin-left: 20px;

        display: flex;
        align-items: center;

        gap: 4px;

        white-space: nowrap;
    }

    .sbd-product-rating i {
        font-size: 11px;
        color: var(--soft-peach);
    }

    .sbd-product-rating span {
        font-size: 10px;
        color: var(--soft-gray);
    }


    /* =====================================================
       CART BUTTON
       ===================================================== */

    .sbd-cart-button {
        width: 41px;
        height: 41px;

        margin-left: auto;

        border: none;
        border-radius: 50%;

        background: var(--sage-green);

        color: var(--white);

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 15px;

        cursor: pointer;

        transition: .2s ease;
    }

    .sbd-cart-button:hover {
        background: var(--dark-green);

        transform: translateY(-1px);
    }


    /* =====================================================
       SEE ALL PRODUCT BUTTON
       ===================================================== */

    .sbd-see-all-wrapper {
        width: 100%;

        margin-top: 23px;
        margin-bottom: 21px;

        display: flex;
        justify-content: center;
    }

    .sbd-see-all-button {
        width: 308px;
        height: 43px;

        position: relative;

        border-radius: 25px;

        background: var(--sage-green);

        color: var(--white);

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 12px;
        font-weight: 500;

        transition: .2s ease;
    }

    .sbd-see-all-button:hover {
        background: var(--dark-green);
    }

    .sbd-see-all-button i {
        position: absolute;

        right: 43px;

        font-size: 16px;
    }


    /* =====================================================
       FOOTER KHUSUS HALAMAN INI
       ===================================================== */

    .sbd-footer {
        width: 100%;
        height: 57px;

        background: var(--dark-green);

        display: flex;
        align-items: center;
        justify-content: center;
    }

    .sbd-footer p {
        margin: 0;

        color: var(--white);

        font-size: 10px;
        font-weight: 400;
    }


    /* =====================================================
       RESPONSIVE
       ===================================================== */

    @media (max-width: 1200px) {

        .sbd-hero,
        .sbd-development-categories,
        .sbd-products-section {
            max-width: calc(100% - 80px);
        }

        .sbd-hero-title {
            font-size: 42px;
        }

        .sbd-product-grid {
            gap: 14px;
        }
    }


    @media (max-width: 1000px) {

        .sbd-development-categories {
            grid-template-columns: repeat(2, 1fr);
        }

        .sbd-product-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .sbd-hero-visual {
            opacity: .35;
        }
    }


    @media (max-width: 650px) {

        .sbd-hero,
        .sbd-development-categories,
        .sbd-products-section {
            max-width: calc(100% - 32px);
        }

        .sbd-hero {
            min-height: 240px;
        }

        .sbd-hero-title {
            font-size: 34px;
            letter-spacing: -1px;
        }

        .sbd-hero-description {
            font-size: 14px;
        }

        .sbd-hero-visual {
            display: none;
        }

        .sbd-development-categories {
            grid-template-columns: 1fr;
        }

        .sbd-products-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .sbd-product-grid {
            grid-template-columns: 1fr;
        }

        .sbd-see-all-button {
            width: 100%;
        }
    }
</style>


<div class="shop-development-page">

    {{-- =====================================================
         HERO
         ===================================================== --}}

    <section class="sbd-hero">

        <div class="sbd-hero-content">

            <h1 class="sbd-hero-title">
                Shop By Development
            </h1>

            <p class="sbd-hero-description">
                Pilih produk berdasarkan kebutuhan<br>
                perkembangan anak Anda.
            </p>

        </div>


        {{-- HERO IMAGE --}}
        <div class="sbd-hero-visual">

            <div class="sbd-hero-circle"></div>

            {{-- 
                Ganti nama file ini sesuai gambar
                yang ada di public/images
            --}}
            <img
                src="{{ asset('images/hero-toys.png') }}"
                alt="SmartChild Educational Toys"
                class="sbd-hero-image"
            >

            <div class="sbd-hero-decoration">
                <i class="fa-solid fa-clover"></i>
            </div>

        </div>

    </section>



    {{-- =====================================================
         DEVELOPMENT CATEGORY
         ===================================================== --}}

    <section class="sbd-development-categories">


        {{-- KOGNITIF --}}
        <div class="sbd-development-card sage">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-brain"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Kognitif
                </h3>

                <p class="sbd-development-description">
                    Meningkatkan kemampuan berpikir
                    dan memecahkan masalah
                </p>

            </div>

        </div>


        {{-- MOTORIK --}}
        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-hand"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Motorik
                </h3>

                <p class="sbd-development-description">
                    Melatih koordinasi dan keterampilan
                    motorik anak
                </p>

            </div>

        </div>


        {{-- BAHASA --}}
        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-comment-dots"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Bahasa
                </h3>

                <p class="sbd-development-description">
                    Mengembangkan kemampuan bahasa
                    dan komunikasi
                </p>

            </div>

        </div>


        {{-- SOSIAL --}}
        <div class="sbd-development-card sage">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-user-group"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Sosial
                </h3>

                <p class="sbd-development-description">
                    Mendorong interaksi dan keterampilan
                    sosial
                </p>

            </div>

        </div>


        {{-- EMOSIONAL --}}
        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Emosional
                </h3>

                <p class="sbd-development-description">
                    Mendukung regulasi emosi dan
                    kepercayaan diri anak
                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         PRODUCT SECTION
         ===================================================== --}}

    <section class="sbd-products-section">


        {{-- HEADER --}}
        <div class="sbd-products-header">

            <h2 class="sbd-products-title">
                Rekomendasi Produk
            </h2>

            <div class="sbd-product-controls">

                <button
                    type="button"
                    class="sbd-sort-button"
                >
                    Urutkan

                    <i class="fa-solid fa-chevron-down"></i>
                </button>


                <button
                    type="button"
                    class="sbd-filter-button"
                >
                    <i class="fa-solid fa-filter"></i>

                    Filter
                </button>

            </div>

        </div>



        {{-- =================================================
             PRODUCT GRID
             ================================================= --}}

        <div class="sbd-product-grid">


            {{-- PRODUCT 1 --}}
            <div class="sbd-product-card">

                <div class="sbd-product-image">

                    <span class="sbd-product-tag sage">
                        Untuk Kognitif
                    </span>

                    <img
                        src="{{ asset('images/shape-sorter.png') }}"
                        alt="Shape Sorter Box"
                    >

                </div>


                <div class="sbd-product-info">

                    <h3 class="sbd-product-name">
                        Shape Sorter Box
                    </h3>

                    <p class="sbd-product-description">
                        Mainan edukatif untuk mengenal
                        bentuk dan warna
                    </p>


                    <div class="sbd-product-bottom">

                        <div class="sbd-product-price">
                            Rp 135.000
                        </div>


                        <div class="sbd-product-rating">

                            <i class="fa-solid fa-star"></i>

                            <span>
                                4.9 (72)
                            </span>

                        </div>


                        <button
                            type="button"
                            class="sbd-cart-button"
                        >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>

                    </div>

                </div>

            </div>



            {{-- PRODUCT 2 --}}
            <div class="sbd-product-card">

                <div class="sbd-product-image">

                    <span class="sbd-product-tag peach">
                        Untuk Motorik
                    </span>

                    <img
                        src="{{ asset('images/rainbow-stacking.png') }}"
                        alt="Rainbow Stacking"
                    >

                </div>


                <div class="sbd-product-info">

                    <h3 class="sbd-product-name">
                        Rainbow Stacking
                    </h3>

                    <p class="sbd-product-description">
                        Melatih koordinasi tangan dan
                        kemampuan motorik halus
                    </p>


                    <div class="sbd-product-bottom">

                        <div class="sbd-product-price">
                            Rp 125.000
                        </div>


                        <div class="sbd-product-rating">

                            <i class="fa-solid fa-star"></i>

                            <span>
                                4.8 (63)
                            </span>

                        </div>


                        <button
                            type="button"
                            class="sbd-cart-button"
                        >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>

                    </div>

                </div>

            </div>



            {{-- PRODUCT 3 --}}
            <div class="sbd-product-card">

                <div class="sbd-product-image">

                    <span class="sbd-product-tag peach">
                        Untuk Bahasa
                    </span>

                    <img
                        src="{{ asset('images/flash-card.png') }}"
                        alt="Flash Card Binatang"
                    >

                </div>


                <div class="sbd-product-info">

                    <h3 class="sbd-product-name">
                        Flash Card Binatang
                    </h3>

                    <p class="sbd-product-description">
                        Membantu anak mengenal kata dan
                        meningkatkan kosakata
                    </p>


                    <div class="sbd-product-bottom">

                        <div class="sbd-product-price">
                            Rp 110.000
                        </div>


                        <div class="sbd-product-rating">

                            <i class="fa-solid fa-star"></i>

                            <span>
                                4.9 (58)
                            </span>

                        </div>


                        <button
                            type="button"
                            class="sbd-cart-button"
                        >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>

                    </div>

                </div>

            </div>



            {{-- PRODUCT 4 --}}
            <div class="sbd-product-card">

                <div class="sbd-product-image">

                    <span class="sbd-product-tag sage">
                        Untuk Sosial
                    </span>

                    <img
                        src="{{ asset('images/play-together.png') }}"
                        alt="Play Together Set"
                    >

                </div>


                <div class="sbd-product-info">

                    <h3 class="sbd-product-name">
                        Play Together Set
                    </h3>

                    <p class="sbd-product-description">
                        Mainan peran untuk melatih interaksi
                        dan kerja sama
                    </p>


                    <div class="sbd-product-bottom">

                        <div class="sbd-product-price">
                            Rp 145.000
                        </div>


                        <div class="sbd-product-rating">

                            <i class="fa-solid fa-star"></i>

                            <span>
                                4.7 (49)
                            </span>

                        </div>


                        <button
                            type="button"
                            class="sbd-cart-button"
                        >
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
             SEE ALL
             ================================================= --}}

        <div class="sbd-see-all-wrapper">

            <a
                href="#"
                class="sbd-see-all-button"
            >

                <span>
                    Lihat Semua Produk
                </span>

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </section>



    {{-- =====================================================
         FOOTER KHUSUS HALAMAN INI
         TIDAK MENGGUNAKAN layout/footer.blade.php
         ===================================================== --}}

    <footer class="sbd-footer">

        <p>
            © 2026 SmartChild. Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>

    </footer>

</div>

</body>
</html>