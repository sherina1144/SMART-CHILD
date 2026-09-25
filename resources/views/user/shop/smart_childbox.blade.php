<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Smart Child Box - Smart Child</title>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    @include('layout.header')


    <style>

        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');


        :root {
            --sage-green: #6FAF9B;
            --peach: #F4A89A;
            --cream: #FFF9F2;
            --dark-green: #315C50;
            --white: #FFFFFF;
            --soft-gray: #667085;
            --line: #E7E1D9;
        }


        /* =====================================================
        RESET
        ===================================================== */

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            width: 100%;
            font-family: 'Poppins', sans-serif;
        }


        /* =====================================================
        PAGE
        ===================================================== */

        .smart-box-page {
            min-height: calc(100vh - 90px);

            background: var(--cream);

            font-family: 'Poppins', sans-serif;

            color: #25322E;

            padding-bottom: 0;
        }


        .smart-box-page *,
        .smart-box-page *::before,
        .smart-box-page *::after {
            box-sizing: border-box;
        }


        /* =====================================================
        CART TOAST NOTIFICATION
        ===================================================== */

        .cart-toast {
            position: fixed;

            top: 85px;
            right: 30px;

            z-index: 9999;

            min-width: 280px;

            padding: 14px 18px;

            background: var(--dark-green);
            color: var(--white);

            border-radius: 10px;

            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            font-weight: 500;

            box-shadow:
                0 8px 25px rgba(49, 92, 80, .18);

            opacity: 0;
            visibility: hidden;

            transform: translateY(-10px);

            transition: .3s ease;
        }


        .cart-toast.show {
            opacity: 1;
            visibility: visible;

            transform: translateY(0);
        }


        /* =====================================================
        HERO
        ===================================================== */

        .smart-box-hero {
            height: 155px;

            position: relative;

            padding: 20px 84px 0;

            overflow: hidden;
        }


        .smart-box-hero h1 {
            position: relative;

            z-index: 2;

            margin: 0;

            color: var(--dark-green);

            font-size: 42px;
            line-height: 1.15;
            font-weight: 800;

            letter-spacing: -1.4px;
        }


        .smart-box-hero p {
            position: relative;

            z-index: 2;

            margin: 9px 0 0;

            color: #25322E;

            font-size: 15px;
            line-height: 1.65;

            max-width: 390px;
        }


        /* =====================================================
        LEAF
        ===================================================== */

        .hero-leaf {
            position: absolute;

            left: 490px;
            bottom: 8px;

            z-index: 2;

            color: #AFC6A6;

            font-size: 43px;

            transform: rotate(-12deg);
        }


        .hero-flower {
            position: absolute;

            left: 548px;
            bottom: 8px;

            z-index: 2;

            color: var(--peach);

            font-size: 18px;
        }


        /* =====================================================
        HERO DECORATION
        ===================================================== */

        .hero-decoration {
            position: absolute;

            right: 35px;
            top: 0;

            width: 500px;
            height: 145px;

            z-index: 1;

            pointer-events: none;
        }


        .hero-decoration img {
            display: block;

            width: 100%;
            height: 100%;

            object-fit: contain;
            object-position: center;
        }


        /* =====================================================
        MAIN CONTENT
        ===================================================== */

        .smart-box-content {
            position: relative;

            padding: 0 57px 20px;
        }


        /* =====================================================
        LEFT BOX MENU
        ===================================================== */

        .box-menu {
            position: absolute;

            left: 57px;
            top: 0;

            width: 260px;
        }


        .box-menu-card {
            width: 260px;
            height: 84px;

            margin-bottom: 14px;

            padding: 0 23px;

            display: flex;
            align-items: center;

            position: relative;

            border-radius: 13px;
            border: 1px solid var(--line);

            text-decoration: none;

            transition: .2s ease;
        }


        .box-menu-card.sage {
            background: #F0F3E9;
        }


        .box-menu-card.peach {
            background: #FFF1E8;
        }


        .box-menu-card.active {
            border-color: rgba(111, 175, 155, .45);

            box-shadow:
                0 4px 12px rgba(49, 92, 80, .07);
        }


        .box-menu-icon {
            width: 43px;

            color: var(--sage-green);

            font-size: 27px;
        }


        .box-menu-card.peach .box-menu-icon {
            color: #F18A6B;
        }


        .box-menu-text h3 {
            margin: 0 0 2px;

            color: #163F34;

            font-size: 14px;
            font-weight: 600;
        }


        .box-menu-text p {
            margin: 0;

            color: #25322E;

            font-size: 11px;
        }


        .box-menu-arrow {
            position: absolute;

            right: 20px;

            color: var(--dark-green);

            font-size: 14px;
        }


        /* =====================================================
        MAIN RIGHT
        ===================================================== */

        .box-main {
            margin-left: 286px;

            width: calc(100% - 286px);
        }


        /* =====================================================
        MAIN PRODUCT CARD
        ===================================================== */

        .box-product-card {
            height: 250px;

            position: relative;

            overflow: hidden;

            padding: 21px 33px;

            border: 1px solid #E4DED4;
            border-radius: 15px;

            background: rgba(255, 255, 255, .72);
        }


        .box-product-copy {
            position: relative;

            z-index: 3;
        }


        .box-product-copy h2 {
            margin: 0;

            color: #174B3D;

            font-size: 23px;
            font-weight: 600;
        }


        .box-product-copy h2 span {
            font-size: 15px;
            font-weight: 500;
        }


        .box-description {
            margin: 8px 0 0;

            max-width: 390px;

            color: #25322E;

            font-size: 12px;
            line-height: 1.6;
        }


        /* =====================================================
        PRICE
        ===================================================== */

        .box-price-row {
            margin-top: 20px;

            display: flex;
            align-items: center;
        }


        .box-sale-price {
            color: #ED805F;

            font-size: 21px;
            font-weight: 600;
        }


        .box-price-unavailable {
            color: var(--soft-gray);

            font-size: 11px;
            font-weight: 500;
        }


        /* =====================================================
        BUTTONS
        ===================================================== */

        .box-action-row {
            display: flex;

            gap: 11px;

            margin-top: 17px;
        }


        .box-choose-btn {
            width: 150px;
            height: 39px;

            border: 0;
            border-radius: 10px;

            background: #5C8F7A;

            color: var(--white);

            font-family: 'Poppins', sans-serif;

            font-size: 11px;
            font-weight: 500;

            cursor: pointer;

            transition: .2s ease;
        }


        .box-choose-btn:hover {
            background: var(--dark-green);
        }


        .box-choose-btn:disabled {
            opacity: .5;
            cursor: not-allowed;
        }


        .box-choose-btn i {
            margin-left: 17px;
        }


        .box-cart-btn {
            width: 42px;
            height: 39px;

            border: 1px solid #CAD8CE;
            border-radius: 10px;

            background: var(--white);

            color: #5A8C77;

            font-size: 16px;

            cursor: pointer;
        }


        /* =====================================================
        MAIN BOX IMAGE
        ===================================================== */

        .box-main-image {
            position: absolute;

            right: 0;
            bottom: 0;

            width: 390px;
            height: 245px;

            object-fit: contain;
            object-position: center bottom;

            z-index: 2;

            mix-blend-mode: multiply;
        }


        .box-no-image {
            position: absolute;

            right: 50px;
            top: 45px;

            width: 300px;
            height: 140px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 14px;

            background: #F0F3E9;

            color: var(--soft-gray);

            font-size: 11px;
        }


        /* =====================================================
        LOWER CONTENT
        ===================================================== */

        .box-lower {
            display: grid;

            grid-template-columns:
                minmax(0, 1.18fr)
                minmax(300px, 1fr);

            gap: 14px;

            margin-top: 14px;
        }


        .box-contents-card,
        .box-why-card {
            height: 255px;

            border: 1px solid #E6E0D7;
            border-radius: 15px;

            background: rgba(255, 255, 255, .72);
        }


        /* =====================================================
        CONTENTS
        ===================================================== */

        .box-contents-card {
            padding: 15px 20px;
        }


        .box-section-title {
            margin: 0;

            color: #123F34;

            font-size: 16px;
            font-weight: 600;
        }


        .box-items {
            height: 195px;

            margin-top: 10px;

            display: grid;

            grid-template-columns:
                repeat(5, 1fr);
        }


        .box-item {
            text-align: center;

            padding: 0 5px;

            border-right: 1px solid #E8E3DB;
        }


        .box-item:last-child {
            border-right: 0;
        }


        .box-item-image {
            width: 100%;
            height: 125px;

            object-fit: contain;

            mix-blend-mode: multiply;
        }


        .box-item-no-image {
            width: 100%;
            height: 125px;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #98A29E;

            font-size: 10px;
        }


        .box-item h3 {
            margin: 0;

            color: #25322E;

            font-size: 10px;
            font-weight: 600;
        }


        .box-item p {
            margin: 3px 0 0;

            color: #25322E;

            font-size: 9px;
        }


        /* =====================================================
        WHY SMART CHILD BOX
        ===================================================== */

        .box-why-card {
            padding: 15px 20px;
        }


        .box-reason {
            min-height: 52px;

            display: flex;
            align-items: center;

            gap: 12px;

            border-bottom: 1px solid #E9E3DB;
        }


        .box-reason:last-child {
            border-bottom: 0;
        }


        .box-reason-icon {
            width: 40px;
            height: 40px;

            flex: none;

            border-radius: 50%;

            background: #F0F2E9;

            display: grid;
            place-items: center;

            color: #5D8D78;

            font-size: 16px;
        }


        .box-reason h3 {
            margin: 0;

            color: #183F35;

            font-size: 10px;
            font-weight: 600;
        }


        .box-reason p {
            margin: 2px 0 0;

            color: #25322E;

            font-size: 9px;
        }


        /* =====================================================
        BOTTOM FEATURES
        ===================================================== */

        .box-features {
            height: 74px;

            margin-top: 14px;

            padding: 0 18px;

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            align-items: center;

            border: 1px solid #E6E0D7;
            border-radius: 15px;

            background: rgba(255, 255, 255, .72);
        }


        .box-feature {
            height: 45px;

            padding: 0 13px;

            display: flex;
            align-items: center;

            gap: 13px;

            border-right: 1px solid #E7E1D9;
        }


        .box-feature:last-child {
            border-right: 0;
        }


        .box-feature i {
            width: 38px;

            text-align: center;

            color: #5F8F7A;

            font-size: 26px;
        }


        .box-feature h3 {
            margin: 0;

            color: #173F34;

            font-size: 10px;
            font-weight: 600;
        }


        .box-feature p {
            margin: 2px 0 0;

            color: #25322E;

            font-size: 8px;
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
        RESPONSIVE
        ===================================================== */

        @media (max-width: 1000px) {

            .smart-box-hero {
                padding-left: 40px;
            }


            .smart-box-content {
                padding-left: 30px;
                padding-right: 30px;
            }


            .box-menu {
                left: 30px;
            }


            .box-main {
                margin-left: 280px;

                width: calc(100% - 280px);
            }


            .box-main-image {
                width: 340px;

                opacity: .9;
            }


            .box-lower {
                grid-template-columns: 1fr;
            }

        }


        @media (max-width: 760px) {

            .smart-box-hero {
                height: 190px;

                padding: 30px 25px;
            }


            .smart-box-hero h1 {
                font-size: 34px;
            }


            .hero-decoration,
            .hero-leaf,
            .hero-flower {
                display: none;
            }


            .smart-box-content {
                padding: 0 20px 20px;
            }


            .box-menu {
                position: static;

                width: 100%;
            }


            .box-menu-card {
                width: 100%;
            }


            .box-main {
                width: 100%;

                margin-left: 0;
                margin-top: 14px;
            }


            .box-product-card {
                height: 380px;
            }


            .box-main-image {
                width: 340px;
                height: 250px;

                right: -5px;
                bottom: -5px;
            }


            .box-lower {
                grid-template-columns: 1fr;
            }


            .box-items {
                grid-template-columns:
                    repeat(2, 1fr);

                height: auto;
            }


            .box-contents-card {
                height: auto;
            }


            .box-item {
                margin-bottom: 15px;
            }


            .box-features {
                grid-template-columns:
                    repeat(2, 1fr);

                height: auto;

                padding: 10px;
            }


            .box-feature {
                margin: 5px 0;
            }

        }


        @media (max-width: 500px) {

            .box-product-card {
                padding: 20px;
            }


            .box-main-image {
                width: 290px;
            }


            .box-features {
                grid-template-columns: 1fr;
            }


            .box-feature {
                border-right: 0;

                border-bottom: 1px solid #E7E1D9;
            }


            .box-feature:last-child {
                border-bottom: 0;
            }


            .cart-toast {
                top: 75px;
                right: 15px;
                left: 15px;

                min-width: unset;
            }

        }

    </style>


    <div class="smart-box-page">


        {{-- =====================================================
            HERO
        ===================================================== --}}

        <section class="smart-box-hero">

            <h1>
                Smart Child Box
            </h1>


            <p>
                Paket lengkap untuk mendukung<br>
                tumbuh kembang anak sesuai usianya.
            </p>


            <i class="fa-solid fa-leaf hero-leaf"></i>


            <span class="hero-flower">
                ✦
            </span>


            <div class="hero-decoration">

                <img
                    src="{{ asset('images/smart-box-decoration.png') }}"
                    alt=""
                >

            </div>

        </section>


        {{-- =====================================================
            CONTENT
        ===================================================== --}}

        <section class="smart-box-content">


            {{-- =================================================
                BOX MENU
            ================================================= --}}

            <aside class="box-menu">

                @foreach ($boxes as $index => $box)

                    <a
                        href="{{ route('shop.smartbox', ['box' => $box->box_id]) }}"
                        class="
                            box-menu-card
                            {{ $index % 2 === 0 ? 'sage' : 'peach' }}
                            {{ $activeBox->box_id == $box->box_id ? 'active' : '' }}
                        "
                    >

                        <div class="box-menu-icon">

                            <i class="fa-solid fa-gift"></i>

                        </div>


                        <div class="box-menu-text">

                            <h3>
                                {{ $box->nama_box }}
                            </h3>


                            <p>
                                {{ $box->kategori_usia }}
                            </p>

                        </div>


                        <i class="fa-solid fa-chevron-right box-menu-arrow"></i>

                    </a>

                @endforeach

            </aside>


            {{-- =================================================
                MAIN
            ================================================= --}}

            <div class="box-main">


                {{-- =================================================
                    MAIN BOX
                ================================================= --}}

                <article class="box-product-card">


                    <div class="box-product-copy">


                        <h2>

                            {{ $activeBox->nama_box }}

                            <span>
                                ({{ $activeBox->kategori_usia }})
                            </span>

                        </h2>


                        <p class="box-description">

                            {{ $activeBox->deskripsi }}

                        </p>


                        {{-- PRICE --}}

                        <div class="box-price-row">

                            @if ($activeBox->harga !== null)

                                <span class="box-sale-price">

                                    Rp
                                    {{ number_format($activeBox->harga, 0, ',', '.') }}

                                </span>

                            @else

                                <span class="box-price-unavailable">

                                    Harga belum ditentukan

                                </span>

                            @endif

                        </div>


                        {{-- BUTTON --}}

                        <div class="box-action-row">

                            <button
                                type="button"
                                class="box-choose-btn"
                                onclick="addBoxToCart({{ $activeBox->box_id }})"
                                @if ($activeBox->harga === null) disabled @endif
                            >

                                Pilih Box Ini

                                <i class="fa-solid fa-arrow-right"></i>

                            </button>


                            <button
                                type="button"
                                class="box-cart-btn"
                                title="Lihat keranjang"
                                onclick="window.location.href='{{ route('shop.cart') }}'"
                            >

                                <i class="fa-solid fa-cart-shopping"></i>

                            </button>

                        </div>

                    </div>


                    {{-- BOX IMAGE --}}

                    @if ($activeBox->gambar)

                        <img
                            src="{{ asset('images/' . $activeBox->gambar) }}"
                            alt="{{ $activeBox->nama_box }}"
                            class="box-main-image"
                        >

                    @else

                        <div class="box-no-image">

                            Gambar box belum tersedia

                        </div>

                    @endif

                </article>


                {{-- =================================================
                    LOWER
                ================================================= --}}

                <div class="box-lower">


                    {{-- =================================================
                        BOX CONTENTS
                    ================================================= --}}

                    <article class="box-contents-card">


                        <h2 class="box-section-title">

                            Isi dalam
                            {{ $activeBox->nama_box }}

                        </h2>


                        <div class="box-items">


                            @forelse ($activeBox->items as $item)

                                <div class="box-item">


                                    @if (
                                        $item->product &&
                                        $item->product->gambar
                                    )

                                        <img
                                            src="{{ asset('images/' . $item->product->gambar) }}"
                                            alt="{{ $item->product->nama_produk }}"
                                            class="box-item-image"
                                        >

                                    @else

                                        <div class="box-item-no-image">

                                            Gambar belum tersedia

                                        </div>

                                    @endif


                                    <h3>

                                        {{ $item->product->nama_produk ?? 'Produk' }}

                                    </h3>


                                    <p>

                                        {{ $item->jumlah }}
                                        {{ $item->satuan }}

                                    </p>

                                </div>


                            @empty

                                <div
                                    style="
                                        grid-column: 1 / -1;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        color: #98A29E;
                                        font-size: 11px;
                                    "
                                >

                                    Belum ada produk dalam box ini.

                                </div>

                            @endforelse


                        </div>

                    </article>


                    {{-- =================================================
                        WHY SMART CHILD BOX
                    ================================================= --}}

                    <article class="box-why-card">


                        <h2 class="box-section-title">

                            Kenapa Memilih Smart Child Box?

                        </h2>


                        <div class="box-reason">

                            <div class="box-reason-icon">

                                <i class="fa-solid fa-shield-halved"></i>

                            </div>


                            <div>

                                <h3>
                                    Aman & Berkualitas
                                </h3>

                                <p>
                                    Produk terpilih dan aman untuk anak
                                </p>

                            </div>

                        </div>


                        <div class="box-reason">

                            <div class="box-reason-icon">

                                <i class="fa-solid fa-seedling"></i>

                            </div>


                            <div>

                                <h3>
                                    Mendukung Perkembangan
                                </h3>

                                <p>
                                    Dirancang sesuai tahap perkembangan anak
                                </p>

                            </div>

                        </div>


                        <div class="box-reason">

                            <div class="box-reason-icon">

                                <i class="fa-solid fa-gift"></i>

                            </div>


                            <div>

                                <h3>
                                    Praktis & Lengkap
                                </h3>

                                <p>
                                    Semua kebutuhan dalam satu paket
                                </p>

                            </div>

                        </div>


                        <div class="box-reason">

                            <div class="box-reason-icon">

                                <i class="fa-solid fa-truck-fast"></i>

                            </div>


                            <div>

                                <h3>
                                    Pengiriman Cepat
                                </h3>

                                <p>
                                    Dikirim dengan cepat dan aman
                                </p>

                            </div>

                        </div>


                    </article>

                </div>


                {{-- =================================================
                    BOTTOM FEATURES
                ================================================= --}}

                <section class="box-features">


                    <div class="box-feature">

                        <i class="fa-solid fa-truck-fast"></i>

                        <div>

                            <h3>
                                Pengiriman Cepat
                            </h3>

                            <p>
                                2–3 hari sampai
                            </p>

                        </div>

                    </div>


                    <div class="box-feature">

                        <i class="fa-solid fa-shield-halved"></i>

                        <div>

                            <h3>
                                Garansi Produk
                            </h3>

                            <p>
                                Aman untuk anak
                            </p>

                        </div>

                    </div>


                    <div class="box-feature">

                        <i class="fa-solid fa-gift"></i>

                        <div>

                            <h3>
                                Bisa untuk Hadiah
                            </h3>

                            <p>
                                Packaging eksklusif
                            </p>

                        </div>

                    </div>


                    <div class="box-feature">

                        <i class="fa-solid fa-headset"></i>

                        <div>

                            <h3>
                                Customer Care
                            </h3>

                            <p>
                                Siap membantu
                            </p>

                        </div>

                    </div>


                </section>


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


    {{-- =====================================================
        SMART CHILD BOX CART SCRIPT
    ===================================================== --}}

    <script>

        function addBoxToCart(boxId) {

            fetch("{{ url('/shop/cart/add-box') }}/" + boxId, {

                method: "POST",

                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                    "Content-Type": "application/json"
                }

            })

            .then(response => response.json())

            .then(data => {

                if (data.success) {

                    /*
                     * Update angka cart di header
                     */

                    const cartBadge =
                        document.querySelector('.cart-badge');


                    if (cartBadge) {

                        cartBadge.textContent =
                            data.cart_badge;


                        cartBadge.style.display =
                            data.cart_badge > 0
                                ? 'flex'
                                : 'none';

                    }


                    /*
                     * Tampilkan notif
                     */

                    showBoxCartToast(data.message);

                } else {

                    showBoxCartToast(data.message);

                }

            })

            .catch(error => {

                console.error(error);


                showBoxCartToast(
                    'Terjadi kesalahan saat menambahkan ke keranjang.'
                );

            });

        }


        /*
         * Toast notification
         */

        function showBoxCartToast(message) {

            let toast =
                document.querySelector('.cart-toast');


            /*
             * Kalau elemen toast belum ada,
             * buat otomatis.
             */

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


            /*
             * Hilangkan notif setelah 2,5 detik.
             */

            setTimeout(function () {

                toast.classList.remove('show');

            }, 2500);

        }

    </script>


</body>
</html>