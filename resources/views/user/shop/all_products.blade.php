<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Semua Produk - Smart Child</title>


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <style>

        :root {
            --sage-green: #6FAF9B;
            --soft-peach: #F4A89A;
            --warm-cream: #FFF9F2;
            --dark-green: #315C50;
            --white: #FFFFFF;
            --soft-gray: #667085;
        }


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: 'Poppins', sans-serif;

            background: var(--warm-cream);

            color: var(--dark-green);
        }


        /* =====================================================
           PAGE
           ===================================================== */

        .all-products-page {
            min-height: 100vh;

            background: var(--warm-cream);
        }


        /* =====================================================
           HERO
           ===================================================== */

        .all-products-hero {
            width: 100%;

            padding: 65px 20px 45px;

            text-align: center;
        }


        .all-products-hero h1 {
            font-size: 34px;

            font-weight: 700;

            color: var(--dark-green);

            margin-bottom: 12px;
        }


        .all-products-hero p {
            max-width: 620px;

            margin: 0 auto;

            font-size: 14px;

            line-height: 1.7;

            color: var(--soft-gray);
        }


        /* =====================================================
           PRODUCT SECTION
           ===================================================== */

        .all-products-section {
            width: 100%;

            max-width: 1110px;

            margin: 0 auto;

            padding: 0 20px 70px;
        }


        /* =====================================================
           TOP BAR
           ===================================================== */

        .all-products-topbar {
            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 25px;
        }


        .all-products-count {
            font-size: 13px;

            color: var(--soft-gray);
        }


        .all-products-count strong {
            color: var(--dark-green);
        }


        .all-products-controls {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        /* =====================================================
           BUTTON
           ===================================================== */

        .all-sort-wrapper,
        .all-filter-wrapper {
            position: relative;
        }


        .all-sort-button,
        .all-filter-button {
            height: 40px;

            border: 1px solid rgba(49, 92, 80, .11);

            border-radius: 11px;

            background: var(--white);

            color: var(--soft-gray);

            font-size: 11px;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: .2s ease;

            text-decoration: none;
        }


        .all-sort-button {
            width: 115px;

            gap: 10px;
        }


        .all-filter-button {
            width: 101px;

            gap: 8px;
        }


        .all-sort-button:hover,
        .all-filter-button:hover {
            border-color: var(--sage-green);

            color: var(--dark-green);
        }


        .all-sort-button i,
        .all-filter-button i {
            font-size: 10px;
        }


        /* =====================================================
           DROPDOWN
           ===================================================== */

        .all-sort-menu,
        .all-filter-menu {
            position: absolute;

            top: 48px;

            right: 0;

            width: 180px;

            padding: 8px;

            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .10);

            border-radius: 12px;

            box-shadow: 0 8px 25px rgba(49, 92, 80, .10);

            z-index: 50;

            display: none;
        }


        .all-sort-menu.show,
        .all-filter-menu.show {
            display: block;
        }


        .all-sort-menu a,
        .all-filter-menu a {
            display: block;

            width: 100%;

            padding: 10px 12px;

            border-radius: 8px;

            color: var(--soft-gray);

            font-size: 11px;

            line-height: 1.4;

            text-align: left;

            text-decoration: none;

            transition: .2s ease;
        }


        .all-sort-menu a:hover,
        .all-filter-menu a:hover {
            background: var(--warm-cream);

            color: var(--dark-green);
        }


        /* =====================================================
           PRODUCT GRID
           ===================================================== */

        .all-products-grid {
            display: grid;

            grid-template-columns: repeat(4, 1fr);

            gap: 20px;
        }


        /* =====================================================
           PRODUCT CARD
           ===================================================== */

        .all-product-card {
            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            overflow: hidden;

            transition: .25s ease;
        }


        .all-product-card:hover {
            transform: translateY(-4px);

            box-shadow:
                0 12px 28px
                rgba(49, 92, 80, .10);
        }


        /* =====================================================
           PRODUCT IMAGE
           ===================================================== */

        .all-product-image {
            position: relative;

            width: 100%;

            height: 210px;

            background: #F7F7F4;

            display: flex;

            align-items: center;

            justify-content: center;

            overflow: hidden;
        }


        .all-product-image img {
            width: 100%;

            height: 100%;

            object-fit: contain;

            padding: 18px;
        }


        .all-product-no-image {
            width: 100%;

            height: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            color: var(--soft-gray);

            font-size: 12px;
        }


        /* =====================================================
           PRODUCT TAG
           ===================================================== */

        .all-product-tag {
            position: absolute;

            top: 12px;

            left: 12px;

            z-index: 2;

            padding: 6px 10px;

            border-radius: 20px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 9px;

            font-weight: 600;
        }


        /* =====================================================
           PRODUCT INFO
           ===================================================== */

        .all-product-info {
            padding: 17px 16px 18px;
        }


        .all-product-name {
            font-size: 15px;

            font-weight: 700;

            color: var(--dark-green);

            margin-bottom: 8px;
        }


        .all-product-description {
            min-height: 45px;

            font-size: 11px;

            line-height: 1.6;

            color: var(--soft-gray);

            margin-bottom: 15px;
        }


        /* =====================================================
           PRODUCT BOTTOM
           ===================================================== */

        .all-product-bottom {
            width: 100%;

            display: flex;

            align-items: center;

            gap: 12px;
        }


        .all-product-price {
            font-size: 15px;

            font-weight: 700;

            color: var(--dark-green);

            white-space: nowrap;
        }


        /* =====================================================
           CART FORM
           ===================================================== */

        .all-product-bottom .add-to-cart-form {
            margin-left: auto;

            padding: 0;

            display: flex;

            align-items: center;

            flex-shrink: 0;
        }


        /* =====================================================
           CART BUTTON - BULAT
           ===================================================== */

        .all-product-cart {
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

            cursor: pointer;

            transition: .2s ease;
        }


        .all-product-cart:hover {
            background: var(--dark-green);

            transform: translateY(-1px);
        }


        .all-product-cart i {
            font-size: 14px;
        }


        /* =====================================================
           EMPTY
           ===================================================== */

        .all-products-empty {
            grid-column: 1 / -1;

            padding: 70px 20px;

            text-align: center;

            background: var(--white);

            border-radius: 18px;

            border: 1px solid rgba(49, 92, 80, .08);
        }


        .all-products-empty h3 {
            font-size: 18px;

            color: var(--dark-green);

            margin-bottom: 8px;
        }


        .all-products-empty p {
            font-size: 12px;

            color: var(--soft-gray);
        }


        /* =====================================================
           FOOTER
           ===================================================== */

        .sbd-footer {
            width: 100%;
            padding: 25px 20px;
            background: var(--dark-green);
            text-align: center;
        }

        .sbd-footer p {
            margin: 0;
            font-size: 11px;
            color: rgba(255, 255, 255, .75);
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

            box-shadow:
                0 8px 25px
                rgba(0, 0, 0, .15);

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

        @media (max-width: 1000px) {

            .all-products-grid {
                grid-template-columns: repeat(3, 1fr);
            }

        }


        @media (max-width: 750px) {

            .all-products-topbar {
                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }


            .all-products-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }


        @media (max-width: 500px) {

            .all-products-grid {
                grid-template-columns: 1fr;
            }


            .all-products-hero h1 {
                font-size: 28px;
            }

        }

        /* notifikasi pesanan */
        .order-success-notification {
            width: calc(100% - 40px);
            max-width: 1110px;

            margin: 25px auto 0;

            padding: 15px 18px;

            display: flex;
            align-items: center;
            gap: 13px;

            background: #F0F9F5;
            border: 1px solid rgba(111, 175, 155, .35);
            border-radius: 12px;

            color: var(--dark-green);

            box-shadow: 0 5px 15px rgba(49, 92, 80, .06);

            animation: notificationSlide .3s ease;
        }


        .order-success-icon {
            width: 34px;
            height: 34px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 50%;

            background: var(--sage-green);
            color: var(--white);

            font-size: 16px;

            flex-shrink: 0;
        }


        .order-success-text {
            flex: 1;
        }


        .order-success-text strong {
            display: block;

            margin-bottom: 3px;

            font-size: 13px;
            font-weight: 700;

            color: var(--dark-green);
        }


        .order-success-text span {
            display: block;

            font-size: 11px;

            color: var(--soft-gray);
        }


        .order-success-close {
            width: 30px;
            height: 30px;

            border: none;
            background: transparent;

            color: var(--soft-gray);

            cursor: pointer;

            font-size: 13px;
        }


        .order-success-close:hover {
            color: var(--dark-green);
        }


        @keyframes notificationSlide {

            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

    </style>

</head>



<body>


@include('layout.header')

@if (session('success'))
    <div class="order-success-notification" id="orderSuccessNotification">

        <div class="order-success-icon">
            <i class="fa-solid fa-circle-check"></i>
        </div>

        <div class="order-success-text">
            <strong>Pesanan berhasil dibuat!</strong>
            <span>
                Pesanan kamu sudah tercatat dan akan dikonfirmasi oleh admin.
            </span>
        </div>

        <button
            type="button"
            class="order-success-close"
            onclick="closeOrderNotification()"
        >
            <i class="fa-solid fa-xmark"></i>
        </button>

    </div>
@endif



<div class="all-products-page">


    {{-- =====================================================
         HERO
         ===================================================== --}}

    <section class="all-products-hero">

        <h1>
            Semua Produk
        </h1>

        <p>
            Temukan berbagai produk pilihan yang mendukung
            tumbuh kembang anak melalui aktivitas bermain dan belajar.
        </p>

    </section>



    {{-- =====================================================
         PRODUCTS
         ===================================================== --}}

    <section class="all-products-section">


        <div class="all-products-topbar">


            <div class="all-products-count">

                Menampilkan

                <strong>
                    {{ $products->count() }}
                </strong>

                produk

            </div>



            <div class="all-products-controls">


                {{-- SORT --}}

                <div class="all-sort-wrapper">

                    <button
                        type="button"
                        class="all-sort-button"
                        onclick="toggleAllSort()"
                    >

                        Urutkan

                        <i class="fa-solid fa-chevron-down"></i>

                    </button>


                    <div
                        class="all-sort-menu"
                        id="allSortMenu"
                    >

                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => request('development')
                            ])) }}"
                        >
                            Default
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => request('development'),
                                'sort' => 'termurah'
                            ])) }}"
                        >
                            Harga Terendah
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => request('development'),
                                'sort' => 'termahal'
                            ])) }}"
                        >
                            Harga Tertinggi
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => request('development'),
                                'sort' => 'nama'
                            ])) }}"
                        >
                            Nama A - Z
                        </a>

                    </div>

                </div>



                {{-- FILTER --}}

                <div class="all-filter-wrapper">

                    <button
                        type="button"
                        class="all-filter-button"
                        onclick="toggleAllFilter()"
                    >

                        <i class="fa-solid fa-filter"></i>

                        Filter

                    </button>


                    <div
                        class="all-filter-menu"
                        id="allFilterMenu"
                    >

                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Semua Produk
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => 'Kognitif',
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Kognitif
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => 'Motorik',
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Motorik
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => 'Bahasa',
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Bahasa
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => 'Sosial',
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Sosial
                        </a>


                        <a
                            href="{{ route('shop.allproducts', array_filter([
                                'development' => 'Emosional',
                                'sort' => request('sort')
                            ])) }}"
                        >
                            Emosional
                        </a>

                    </div>

                </div>

            </div>

        </div>



        {{-- =====================================================
             PRODUCT GRID
             ===================================================== --}}

        <div class="all-products-grid">


            @forelse ($products as $product)


                <div class="all-product-card">


                    <div class="all-product-image">


                        <span class="all-product-tag">
                            {{ $product->kategori_perkembangan }}
                        </span>


                        @if ($product->gambar)

                            <img
                                src="{{ asset('images/' . $product->gambar) }}"
                                alt="{{ $product->nama_produk }}"
                            >

                        @else

                            <div class="all-product-no-image">
                                Gambar belum tersedia
                            </div>

                        @endif


                    </div>



                    <div class="all-product-info">


                        <h3 class="all-product-name">
                            {{ $product->nama_produk }}
                        </h3>


                        <p class="all-product-description">
                            {{ $product->deskripsi }}
                        </p>



                        <div class="all-product-bottom">


                            <div class="all-product-price">

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
                                    class="all-product-cart"
                                    title="Tambah ke keranjang"
                                >

                                    <i class="fa-solid fa-cart-shopping"></i>

                                </button>

                            </form>


                        </div>

                    </div>

                </div>


            @empty


                <div class="all-products-empty">

                    <h3>
                        Belum Ada Produk
                    </h3>

                    <p>
                        Belum ada produk yang sesuai dengan filter yang dipilih.
                    </p>

                </div>


            @endforelse


        </div>

    </section>



    {{-- =====================================================
         FOOTER
         ===================================================== --}}

    <footer class="sbd-footer">

        <p>
            © {{ date('Y') }} SmartChild.
            Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>

    </footer>


</div>



<div class="cart-toast"></div>



<script>

    /* =====================================================
       SORT
       ===================================================== */

    function toggleAllSort() {

        const sortMenu =
            document.getElementById('allSortMenu');

        const filterMenu =
            document.getElementById('allFilterMenu');


        filterMenu.classList.remove('show');

        sortMenu.classList.toggle('show');

    }



    /* =====================================================
       FILTER
       ===================================================== */

    function toggleAllFilter() {

        const filterMenu =
            document.getElementById('allFilterMenu');

        const sortMenu =
            document.getElementById('allSortMenu');


        sortMenu.classList.remove('show');

        filterMenu.classList.toggle('show');

    }



    /* =====================================================
       CLOSE DROPDOWN
       ===================================================== */

    document.addEventListener('click', function(event) {

        const sortWrapper =
            event.target.closest('.all-sort-wrapper');

        const filterWrapper =
            event.target.closest('.all-filter-wrapper');


        if (!sortWrapper && !filterWrapper) {

            document
                .getElementById('allSortMenu')
                .classList.remove('show');


            document
                .getElementById('allFilterMenu')
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

                                'X-Requested-With':
                                    'XMLHttpRequest'

                            }

                        });


                    const data =
                        await response.json();


                    if (data.success) {


                        updateCartBadge(
                            data.cart_badge
                        );


                        showCartToast(
                            data.message
                        );


                    } else {


                        showCartToast(
                            data.message
                        );

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


            badge.textContent =
                count;


        } else {


            const cartIcon =
                document.querySelector('.header-cart');


            if (cartIcon) {


                const newBadge =
                    document.createElement('span');


                newBadge.className =
                    'cart-badge';


                newBadge.textContent =
                    count;


                cartIcon.appendChild(
                    newBadge
                );

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


            document.body.appendChild(
                toast
            );

        }


        toast.textContent =
            message;


        toast.classList.add('show');


        setTimeout(function () {

            toast.classList.remove('show');

        }, 2500);

    }

</script>

<script>

    function closeOrderNotification() {

        const notification =
            document.getElementById(
                'orderSuccessNotification'
            );

        if (notification) {

            notification.style.opacity = '0';

            notification.style.transform =
                'translateY(-8px)';

            setTimeout(function () {

                notification.remove();

            }, 300);

        }

    }


    // Hilang otomatis setelah 5 detik

    setTimeout(function () {

        closeOrderNotification();

    }, 5000);

</script>



</body>

</html>