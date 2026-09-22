<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Checkout - Smart Child</title>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    >

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
            font-family: Arial, sans-serif;
            background: var(--warm-cream);
            color: var(--dark-green);
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .checkout-page {
            min-height: calc(100vh - 65px);
            background: var(--warm-cream);
            padding: 55px 20px 80px;
        }


        .checkout-container {
            width: 100%;
            max-width: 1110px;
            margin: 0 auto;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .checkout-header {
            margin-bottom: 30px;
        }


        .checkout-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 8px;
        }


        .checkout-subtitle {
            font-size: 13px;
            color: var(--soft-gray);
        }


        /* =====================================================
           LAYOUT
        ===================================================== */

        .checkout-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 360px;
            gap: 24px;
            align-items: start;
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .checkout-form-card {
            background: var(--white);
            border: 1px solid rgba(49, 92, 80, .08);
            border-radius: 18px;
            padding: 28px;
        }


        .checkout-section {
            margin-bottom: 32px;
        }


        .checkout-section:last-child {
            margin-bottom: 0;
        }


        .checkout-section-title {
            display: flex;
            align-items: center;
            gap: 10px;

            margin-bottom: 20px;

            color: var(--dark-green);

            font-size: 18px;
            font-weight: 700;
        }


        .checkout-section-number {
            width: 27px;
            height: 27px;

            border-radius: 50%;

            background: var(--sage-green);
            color: var(--white);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 12px;
            font-weight: 700;
        }


        /* =====================================================
           FORM
        ===================================================== */

        .checkout-form-group {
            margin-bottom: 18px;
        }


        .checkout-form-group:last-child {
            margin-bottom: 0;
        }


        .checkout-form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }


        .checkout-label {
            display: block;

            margin-bottom: 7px;

            color: var(--dark-green);

            font-size: 12px;
            font-weight: 600;
        }


        .checkout-required {
            color: var(--soft-peach);
        }


        .checkout-input,
        .checkout-textarea {
            width: 100%;

            border: 1px solid rgba(49, 92, 80, .15);
            border-radius: 10px;

            background: var(--white);

            color: var(--dark-green);

            font-family: Arial, sans-serif;
            font-size: 12px;

            outline: none;

            transition: .2s ease;
        }


        .checkout-input {
            height: 43px;
            padding: 0 13px;
        }


        .checkout-textarea {
            min-height: 100px;
            padding: 12px 13px;
            resize: vertical;
        }


        .checkout-input:focus,
        .checkout-textarea:focus {
            border-color: var(--sage-green);
            box-shadow: 0 0 0 3px rgba(111, 175, 155, .10);
        }


        .checkout-input::placeholder,
        .checkout-textarea::placeholder {
            color: #A0A8B0;
        }


        /* =====================================================
           PAYMENT INFO
        ===================================================== */

        .payment-box {
            padding: 18px;

            background: #F7F7F4;

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 13px;
        }


        .payment-box-title {
            margin-bottom: 14px;

            color: var(--dark-green);

            font-size: 13px;
            font-weight: 700;
        }


        .payment-bank {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 8px;
        }


        .payment-bank-name {
            color: var(--dark-green);

            font-size: 13px;
            font-weight: 700;
        }


        .payment-account {
            color: var(--soft-gray);

            font-size: 12px;
        }


        .payment-owner {
            color: var(--soft-gray);

            font-size: 11px;
        }


        .payment-total {
            margin-top: 15px;
            padding-top: 15px;

            border-top: 1px solid rgba(49, 92, 80, .10);
        }


        .payment-total-label {
            margin-bottom: 5px;

            color: var(--soft-gray);

            font-size: 11px;
        }


        .payment-total-price {
            color: var(--dark-green);

            font-size: 20px;
            font-weight: 700;
        }


        /* =====================================================
           UPLOAD
        ===================================================== */

        .payment-upload {
            margin-top: 18px;
        }


        .payment-file {
            width: 100%;

            padding: 12px;

            border: 1px dashed rgba(49, 92, 80, .25);
            border-radius: 10px;

            background: var(--white);

            color: var(--soft-gray);

            font-size: 11px;

            cursor: pointer;
        }


        .payment-note {
            margin-top: 8px;

            color: var(--soft-gray);

            font-size: 10px;
            line-height: 1.5;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .checkout-summary {
            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            padding: 24px;

            position: sticky;
            top: 90px;
        }


        .checkout-summary-title {
            margin-bottom: 20px;

            color: var(--dark-green);

            font-size: 18px;
            font-weight: 700;
        }


        /* =====================================================
           PRODUCT SUMMARY
        ===================================================== */

        .checkout-product-list {
            margin-bottom: 20px;
        }


        .checkout-product {
            display: flex;
            align-items: center;
            gap: 12px;

            padding-bottom: 15px;
            margin-bottom: 15px;

            border-bottom: 1px solid rgba(49, 92, 80, .08);
        }


        .checkout-product-image {
            width: 55px;
            height: 55px;
            min-width: 55px;

            background: #F7F7F4;

            border-radius: 9px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }


        .checkout-product-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            padding: 5px;
        }


        .checkout-product-no-image {
            color: var(--soft-gray);

            font-size: 8px;

            text-align: center;
        }


        .checkout-product-info {
            flex: 1;
            min-width: 0;
        }


        .checkout-product-name {
            margin-bottom: 4px;

            color: var(--dark-green);

            font-size: 12px;
            font-weight: 700;
        }


        .checkout-product-quantity {
            color: var(--soft-gray);

            font-size: 10px;
        }


        .checkout-product-price {
            color: var(--dark-green);

            font-size: 11px;
            font-weight: 700;

            text-align: right;
        }


        /* =====================================================
           SUMMARY TOTAL
        ===================================================== */

        .checkout-summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 12px;

            color: var(--soft-gray);

            font-size: 12px;
        }


        .checkout-summary-row.total {
            margin-top: 17px;
            padding-top: 17px;

            border-top: 1px solid rgba(49, 92, 80, .10);

            color: var(--dark-green);

            font-size: 16px;
            font-weight: 700;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .checkout-submit-button {
            width: 100%;
            height: 46px;

            margin-top: 20px;

            border: none;
            border-radius: 12px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;
        }


        .checkout-submit-button:hover {
            background: var(--dark-green);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .checkout-layout {
                grid-template-columns: 1fr;
            }


            .checkout-summary {
                position: static;
            }

        }


        @media (max-width: 600px) {

            .checkout-page {
                padding: 35px 15px 60px;
            }


            .checkout-title {
                font-size: 27px;
            }


            .checkout-form-card {
                padding: 20px;
            }


            .checkout-form-row {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>


<body>

    @include('layout.header')


    <main class="checkout-page">

        <div class="checkout-container">


            {{-- =================================================
                 HEADER
            ================================================= --}}

            <div class="checkout-header">

                <h1 class="checkout-title">
                    Checkout
                </h1>

                <p class="checkout-subtitle">
                    Lengkapi data penerima dan lakukan pembayaran
                    untuk menyelesaikan pesanan.
                </p>

            </div>


            {{-- =================================================
                 CHECKOUT LAYOUT
            ================================================= --}}
            <form
                action="{{ route('shop.checkout.order') }}"
                method="POST"
                enctype="multipart/form-data"
            >
                @csrf

                <div class="checkout-layout">


                    {{-- =================================================
                        FORM
                    ================================================= --}}

                    <div class="checkout-form-card">


                        {{-- =================================================
                            DATA PEMBELI
                        ================================================= --}}

                        <section class="checkout-section">

                            <h2 class="checkout-section-title">

                                <span class="checkout-section-number">
                                    1
                                </span>

                                Data Penerima

                            </h2>


                            <div class="checkout-form-row">


                                <div class="checkout-form-group">

                                    <label class="checkout-label">
                                        Nama Penerima
                                        <span class="checkout-required">*</span>
                                    </label>

                                    <input
                                        type="text"
                                        name="nama_penerima"
                                        class="checkout-input"
                                        placeholder="Masukkan nama penerima"
                                        required
                                    >

                                </div>


                                <div class="checkout-form-group">

                                    <label class="checkout-label">
                                        No. HP
                                        <span class="checkout-required">*</span>
                                    </label>

                                    <input
                                        type="tel"
                                        name="no_hp"
                                        class="checkout-input"
                                        placeholder="08xxxxxxxxxx"
                                        required
                                    >

                                </div>


                            </div>


                            <div class="checkout-form-group">

                                <label class="checkout-label">
                                    Alamat Lengkap
                                    <span class="checkout-required">*</span>
                                </label>

                                <textarea
                                    name="alamat"
                                    class="checkout-textarea"
                                    placeholder="Masukkan alamat lengkap untuk pengiriman"
                                    required
                                ></textarea>

                            </div>

                        </section>


                        {{-- =================================================
                            PEMBAYARAN
                        ================================================= --}}

                        <section class="checkout-section">

                            <h2 class="checkout-section-title">

                                <span class="checkout-section-number">
                                    2
                                </span>

                                Pembayaran

                            </h2>


                            <div class="payment-box">

                                <div class="payment-box-title">
                                    Transfer ke rekening berikut
                                </div>


                                <div class="payment-bank">

                                    <span class="payment-bank-name">
                                        BCA
                                    </span>

                                    <span class="payment-account">
                                        1234567890
                                    </span>

                                </div>


                                <div class="payment-owner">
                                    a.n. Smart Child
                                </div>


                                <div class="payment-total">

                                    <div class="payment-total-label">
                                        Total yang harus dibayar
                                    </div>

                                    <div class="payment-total-price">
                                        Rp {{ number_format($total, 0, ',', '.') }}
                                    </div>

                                </div>


                                <div class="payment-upload">

                                    <label class="checkout-label">
                                        Bukti Pembayaran
                                        <span class="checkout-required">*</span>
                                    </label>

                                    <input
                                        type="file"
                                        name="bukti_pembayaran"
                                        class="payment-file"
                                        accept="image/*"
                                        required
                                    >

                                    <p class="payment-note">
                                        Upload screenshot atau foto bukti transfer.
                                        Format JPG, JPEG, atau PNG.
                                    </p>

                                </div>

                            </div>

                        </section>


                        {{-- =================================================
                            BUTTON
                        ================================================= --}}

                        <button
                            type="submit"
                            class="checkout-submit-button"
                        >
                            Kirim Pesanan
                        </button>


                    </div>


                    {{-- =================================================
                        SUMMARY
                    ================================================= --}}

                    <aside class="checkout-summary">

                        <h2 class="checkout-summary-title">
                            Ringkasan Pesanan
                        </h2>


                        <div class="checkout-product-list">


                            @foreach ($cart as $productId => $item)

                                @if (isset($products[$productId]))

                                    @php
                                        $product = $products[$productId];

                                        $quantity = $item['quantity'];

                                        $subtotal =
                                            $product->harga * $quantity;
                                    @endphp


                                    <div class="checkout-product">


                                        <div class="checkout-product-image">

                                            @if ($product->gambar)

                                                <img
                                                    src="{{ asset('images/' . $product->gambar) }}"
                                                    alt="{{ $product->nama_produk }}"
                                                >

                                            @else

                                                <div class="checkout-product-no-image">
                                                    Gambar belum tersedia
                                                </div>

                                            @endif

                                        </div>


                                        <div class="checkout-product-info">

                                            <div class="checkout-product-name">
                                                {{ $product->nama_produk }}
                                            </div>

                                            <div class="checkout-product-quantity">
                                                {{ $quantity }} ×
                                                Rp {{ number_format($product->harga, 0, ',', '.') }}
                                            </div>

                                        </div>


                                        <div class="checkout-product-price">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </div>


                                    </div>

                                @endif

                            @endforeach


                        </div>


                        <div class="checkout-summary-row">

                            <span>
                                Jumlah Produk
                            </span>

                            <span>
                                {{ $totalQuantity }}
                            </span>

                        </div>


                        <div class="checkout-summary-row total">

                            <span>
                                Total
                            </span>

                            <span>
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>


                    </aside>


                </div>

            </form>

        </div>

    </main>

</body>

</html>