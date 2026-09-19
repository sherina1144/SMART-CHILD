<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop By Development - Smart Child</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>


<body>

@include('layout.header')


<style>

    /* =====================================================
       SMARTCHILD - SHOP BY DEVELOPMENT
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
       RESET
       ===================================================== */

    body {
        margin: 0;
    }

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
        position: relative;

        min-height: 300px;

        padding: 35px 70px 20px;

        display: flex;
        align-items: center;
        justify-content: space-between;

        overflow: hidden;

        background: var(--warm-cream);
    }


    .sbd-hero-content {
        position: relative;

        z-index: 3;

        width: 52%;
    }


    .sbd-hero-title {
        margin: 0 0 12px;

        color: var(--dark-green);

        font-size: 50px;
        font-weight: 800;

        line-height: 1.1;

        letter-spacing: -1.5px;
    }


    .sbd-hero-description {
        margin: 0;

        color: #34443F;

        font-size: 18px;
        line-height: 1.7;

        font-weight: 400;
    }


    /* =====================================================
       HERO RIGHT
       ===================================================== */

    .sbd-hero-visual {
        position: relative;

        width: 48%;
        height: 220px;

        display: flex;
        align-items: center;
        justify-content: center;
    }


    .sbd-hero-circle {
        position: absolute;

        width: 455px;
        height: 250px;

        background: #FFF1E8;

        border-radius: 50% 50% 0 0;

        bottom: -30px;
        right: 10px;

        z-index: 1;
    }


    .sbd-hero-image {
        position: relative;

        z-index: 2;

        width: 550px;
        height: 280px;

        object-fit: contain;
        object-position: center;

        display: block;
    }


    .sbd-hero-decoration {
        position: absolute;

        right: 5px;
        top: 10px;

        width: 45px;
        height: 45px;

        display: flex;
        align-items: center;
        justify-content: center;

        color: #8DB39D;

        font-size: 32px;

        z-index: 3;
    }


    /* =====================================================
       DEVELOPMENT CATEGORY
       ===================================================== */

    .sbd-development-categories {
        width: 100%;
        max-width: 1110px;

        margin: -2px auto 0;

        display: grid;

        grid-template-columns: repeat(5, 1fr);

        gap: 16px;

        position: relative;

        z-index: 5;
    }


    .sbd-development-card {
        min-height: 145px;

        padding: 18px 16px;

        border-radius: 18px;

        display: flex;
        align-items: center;

        border: 1px solid rgba(49, 92, 80, .12);

        overflow: hidden;
    }


    .sbd-development-card.sage {
        background: #F1F4EA;
    }


    .sbd-development-card.peach {
        background: #FFF0E8;
    }


    /* =====================================================
       DEVELOPMENT ICON
       ===================================================== */

    .sbd-development-icon {
        width: 58px;
        min-width: 58px;

        height: 58px;

        margin-right: 12px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 38px;

        line-height: 1;
    }


    .sbd-development-card.sage .sbd-development-icon {
        color: var(--sage-green);
    }


    .sbd-development-card.peach .sbd-development-icon {
        color: var(--soft-peach);
    }


    /* =====================================================
       DEVELOPMENT TEXT
       ===================================================== */

    .sbd-development-text {
        flex: 1;

        min-width: 0;
    }


    .sbd-development-title {
        margin: 0 0 7px;

        text-align: left;

        font-size: 14px;

        line-height: 1.3;

        font-weight: 700;

        color: var(--dark-green);
    }


    .sbd-development-description {
        margin: 0;

        font-size: 11.5px;

        line-height: 1.55;

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
       SORT & FILTER
       ===================================================== */

    .sbd-product-controls {
        display: flex;

        align-items: center;

        gap: 16px;
    }


    .sbd-sort-wrapper,
    .sbd-filter-wrapper {
        position: relative;
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
       DROPDOWN
       ===================================================== */

    .sbd-sort-menu,
    .sbd-filter-menu {
        position: absolute;

        top: 48px;
        right: 0;

        width: 180px;

        padding: 8px;

        background: var(--white);

        border: 1px solid rgba(49, 92, 80, .10);

        border-radius: 12px;

        box-shadow: 0 8px 25px rgba(49, 92, 80, .10);

        z-index: 100;

        display: none;
    }


    .sbd-sort-menu.show,
    .sbd-filter-menu.show {
        display: block;
    }


    .sbd-sort-option,
    .sbd-filter-option {
        width: 100%;

        padding: 10px 12px;

        border-radius: 8px;

        background: transparent;

        color: var(--soft-gray);

        font-family: inherit;

        font-size: 11px;

        line-height: 1.4;

        text-align: left;

        cursor: pointer;

        transition: .2s ease;

        display: block;
    }


    .sbd-sort-option:hover,
    .sbd-filter-option:hover {
        background: var(--warm-cream);

        color: var(--dark-green);
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

        transition: .2s ease;
    }


    .sbd-product-card:hover {
        transform: translateY(-2px);

        box-shadow: 0 8px 20px rgba(49, 92, 80, .08);
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


    .product-no-image {
        color: var(--soft-gray);

        font-size: 12px;

        text-align: center;
    }


    /* =====================================================
       PRODUCT TAG
       ===================================================== */

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
       PRODUCT INFO
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
        margin-top: 10px;

        display: flex;

        align-items: center;

        width: 100%;
    }


    .sbd-product-price {
        white-space: nowrap;

        font-size: 14px;

        font-weight: 600;

        color: var(--dark-green);
    }


    /* =====================================================
       FORM CART
       ===================================================== */

    .sbd-product-bottom .add-to-cart-form {
        margin-left: auto;

        padding: 0;

        display: flex;

        align-items: center;

        flex-shrink: 0;
    }


    /* =====================================================
       CART BUTTON - BULAT
       ===================================================== */

    .sbd-cart-button {
        width: 41px;
        height: 41px;

        margin: 0;

        padding: 0;

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


    .sbd-cart-button i {
        font-size: 15px;
    }


    /* =====================================================
       EMPTY PRODUCT
       ===================================================== */

    .sbd-empty-product {
        grid-column: 1 / -1;

        min-height: 80px;

        display: flex;

        align-items: center;
        justify-content: center;

        color: var(--soft-gray);

        font-size: 14px;

        text-align: center;
    }


    /* =====================================================
       SEE ALL PRODUCT
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
       FOOTER
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
       CART TOAST
       ===================================================== */

    .cart-toast {
        position: fixed;

        top: 90px;
        right: 30px;

        z-index: 9999;

        background: var(--dark-green);

        color: var(--white);

        padding: 14px 20px;

        border-radius: 10px;

        font-size: 14px;

        font-weight: 500;

        box-shadow: 0 8px 25px rgba(0, 0, 0, .15);

        opacity: 0;

        visibility: hidden;

        transform: translateY(-10px);

        transition: all .25s ease;
    }


    .cart-toast.show {
        opacity: 1;

        visibility: visible;

        transform: translateY(0);
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


        .sbd-product-controls {
            width: 100%;
        }


        .sbd-sort-button,
        .sbd-filter-button {
            width: 100%;
        }


        .sbd-sort-wrapper,
        .sbd-filter-wrapper {
            flex: 1;
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


        <div class="sbd-hero-visual">

            <div class="sbd-hero-circle"></div>

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


        <div class="sbd-development-card sage">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-brain"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Kognitif
                </h3>

                <p class="sbd-development-description">
                    Meningkatkan kemampuan berpikir dan memecahkan masalah
                </p>

            </div>

        </div>


        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-hand"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Motorik
                </h3>

                <p class="sbd-development-description">
                    Melatih koordinasi dan keterampilan motorik anak
                </p>

            </div>

        </div>


        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-comment-dots"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Bahasa
                </h3>

                <p class="sbd-development-description">
                    Mengembangkan kemampuan bahasa dan komunikasi
                </p>

            </div>

        </div>


        <div class="sbd-development-card sage">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-user-group"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Sosial
                </h3>

                <p class="sbd-development-description">
                    Mendorong interaksi dan keterampilan sosial
                </p>

            </div>

        </div>


        <div class="sbd-development-card peach">

            <div class="sbd-development-icon">
                <i class="fa-solid fa-heart"></i>
            </div>

            <div class="sbd-development-text">

                <h3 class="sbd-development-title">
                    Emosional
                </h3>

                <p class="sbd-development-description">
                    Mendukung regulasi emosi dan kepercayaan diri anak
                </p>

            </div>

        </div>

    </section>



    {{-- =====================================================
         PRODUCT SECTION
         ===================================================== --}}

    <section class="sbd-products-section">


        <div class="sbd-products-header">

            <h2 class="sbd-products-title">
                Rekomendasi Produk
            </h2>


            <div class="sbd-product-controls">


                {{-- SORT --}}

                <div class="sbd-sort-wrapper">

                    <button
                        type="button"
                        class="sbd-sort-button"
                        onclick="toggleSort(event)"
                    >

                        Urutkan

                        <i class="fa-solid fa-chevron-down"></i>

                    </button>


                    <div
                        class="sbd-sort-menu"
                        id="sortMenu"
                    >

                        <a
                            href="{{ request()->fullUrlWithQuery(['sort' => 'termurah']) }}"
                            class="sbd-sort-option"
                        >
                            Harga Terendah
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['sort' => 'termahal']) }}"
                            class="sbd-sort-option"
                        >
                            Harga Tertinggi
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['sort' => 'nama']) }}"
                            class="sbd-sort-option"
                        >
                            Nama A - Z
                        </a>

                    </div>

                </div>



                {{-- FILTER --}}

                <div class="sbd-filter-wrapper">

                    <button
                        type="button"
                        class="sbd-filter-button"
                        onclick="toggleFilter(event)"
                    >

                        <i class="fa-solid fa-filter"></i>

                        Filter

                    </button>


                    <div
                        class="sbd-filter-menu"
                        id="filterMenu"
                    >

                        <a
                            href="{{ route('shop.bydevelopment') }}"
                            class="sbd-filter-option"
                        >
                            Semua Produk
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['development' => 'Kognitif']) }}"
                            class="sbd-filter-option"
                        >
                            Kognitif
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['development' => 'Motorik']) }}"
                            class="sbd-filter-option"
                        >
                            Motorik
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['development' => 'Bahasa']) }}"
                            class="sbd-filter-option"
                        >
                            Bahasa
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['development' => 'Sosial']) }}"
                            class="sbd-filter-option"
                        >
                            Sosial
                        </a>


                        <a
                            href="{{ request()->fullUrlWithQuery(['development' => 'Emosional']) }}"
                            class="sbd-filter-option"
                        >
                            Emosional
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- PRODUCT GRID --}}

        <div class="sbd-product-grid">


            @forelse ($products as $product)


                <div class="sbd-product-card">


                    <div class="sbd-product-image">

                        @if ($product->gambar)

                            <img
                                src="{{ asset('images/' . $product->gambar) }}"
                                alt="{{ $product->nama_produk }}"
                            >

                        @else

                            <div class="product-no-image">
                                Gambar belum tersedia
                            </div>

                        @endif

                    </div>



                    <div class="sbd-product-info">


                        <h3 class="sbd-product-name">
                            {{ $product->nama_produk }}
                        </h3>


                        <p class="sbd-product-description">
                            {{ $product->deskripsi }}
                        </p>



                        <div class="sbd-product-bottom">


                            <div class="sbd-product-price">

                                Rp
                                {{ number_format($product->harga, 0, ',', '.') }}

                            </div>


                            <form
                                class="add-to-cart-form"
                                action="{{ route('shop.cart.add', $product->product_id) }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="sbd-cart-button"
                                    title="Tambah ke keranjang"
                                >

                                    <i class="fa-solid fa-cart-shopping"></i>

                                </button>

                            </form>


                        </div>

                    </div>

                </div>


            @empty


                <div class="sbd-empty-product">
                    Belum ada produk tersedia.
                </div>


            @endforelse


        </div>



        {{-- SEE ALL --}}

        <div class="sbd-see-all-wrapper">

            <a
                href="{{ route('shop.allproducts') }}"
                class="sbd-see-all-button"
            >

                Lihat Semua Produk

                <i class="fa-solid fa-arrow-right"></i>

            </a>

        </div>

    </section>



    {{-- FOOTER --}}

    <footer class="sbd-footer">

        <p>
            © {{ date('Y') }} SmartChild. Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>

    </footer>


</div>



<div class="cart-toast"></div>



<script>

    /* =====================================================
       SORT
       ===================================================== */

    function toggleSort(event) {

        event.stopPropagation();

        const sortMenu =
            document.getElementById('sortMenu');

        const filterMenu =
            document.getElementById('filterMenu');

        filterMenu.classList.remove('show');

        sortMenu.classList.toggle('show');
    }



    /* =====================================================
       FILTER
       ===================================================== */

    function toggleFilter(event) {

        event.stopPropagation();

        const filterMenu =
            document.getElementById('filterMenu');

        const sortMenu =
            document.getElementById('sortMenu');

        sortMenu.classList.remove('show');

        filterMenu.classList.toggle('show');
    }



    /* =====================================================
       CLOSE DROPDOWN
       ===================================================== */

    document.addEventListener('click', function(event) {

        if (
            !event.target.closest('.sbd-sort-wrapper') &&
            !event.target.closest('.sbd-filter-wrapper')
        ) {

            document
                .getElementById('sortMenu')
                .classList.remove('show');

            document
                .getElementById('filterMenu')
                .classList.remove('show');

        }

    });



    /* =====================================================
       ADD TO CART
       ===================================================== */

    document.addEventListener('DOMContentLoaded', function () {

        const forms =
            document.querySelectorAll('.add-to-cart-form');


        forms.forEach(function (form) {

            form.addEventListener('submit', async function (e) {

                e.preventDefault();

                e.stopPropagation();


                try {

                    const response =
                        await fetch(form.action, {

                            method: 'POST',

                            body: new FormData(form),

                            headers: {
                                'Accept': 'application/json',
                                'X-Requested-With': 'XMLHttpRequest'
                            }

                        });


                    const data =
                        await response.json();


                    if (data.success) {

                        updateCartBadge(data.cart_badge);

                        showCartToast(data.message);

                    } else {

                        showCartToast(data.message);

                    }


                } catch (error) {

                    console.error(error);

                    showCartToast(
                        'Terjadi kesalahan. Silakan coba lagi.'
                    );

                }

            });

        });

    });



    /* =====================================================
       UPDATE CART BADGE
       ===================================================== */

    function updateCartBadge(count) {

        let badge =
            document.querySelector('.cart-badge');


        if (count <= 0) {

            if (badge) {
                badge.remove();
            }

            return;
        }


        if (badge) {

            badge.textContent = count;

        } else {

            const cartIcon =
                document.querySelector('.header-cart');


            if (cartIcon) {

                const newBadge =
                    document.createElement('span');

                newBadge.className = 'cart-badge';

                newBadge.textContent = count;

                cartIcon.appendChild(newBadge);

            }

        }

    }



    /* =====================================================
       TOAST
       ===================================================== */

    function showCartToast(message) {

        let toast =
            document.querySelector('.cart-toast');


        if (!toast) {

            toast =
                document.createElement('div');

            toast.className =
                'cart-toast';

            document.body.appendChild(toast);

        }


        toast.textContent =
            message;


        toast.classList.add('show');


        setTimeout(function () {

            toast.classList.remove('show');

        }, 2500);

    }

</script>


</body>

</html>