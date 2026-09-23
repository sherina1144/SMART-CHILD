<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pesanan Saya - Smart Child</title>

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
            font-family: 'Poppins', sans-serif;
            background: var(--warm-cream);
            color: var(--dark-green);
        }


        /* =====================================================
           PAGE
        ===================================================== */

        .my-orders-page {
            min-height: calc(100vh - 65px);

            background: var(--warm-cream);

            padding: 55px 20px 80px;
        }


        .my-orders-container {
            width: 100%;
            max-width: 1050px;

            margin: 0 auto;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .my-orders-header {
            margin-bottom: 30px;
        }


        .my-orders-title {
            margin-bottom: 8px;

            color: var(--dark-green);

            font-size: 32px;
            font-weight: 700;
        }


        .my-orders-subtitle {
            color: var(--soft-gray);

            font-size: 13px;
        }


        /* =====================================================
           ORDER CARD
        ===================================================== */

        .order-card {
            margin-bottom: 20px;

            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            overflow: hidden;
        }


        /* =====================================================
           ORDER HEADER
        ===================================================== */

        .order-card-header {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 20px 24px;

            border-bottom: 1px solid rgba(49, 92, 80, .08);
        }


        .order-number {
            margin-bottom: 5px;

            color: var(--dark-green);

            font-size: 13px;
            font-weight: 700;
        }


        .order-date {
            color: var(--soft-gray);

            font-size: 10px;
        }


        /* =====================================================
           STATUS
        ===================================================== */

        .order-status-wrapper {
            display: flex;

            flex-direction: column;

            align-items: flex-end;

            gap: 7px;
        }


        .order-status {
            display: inline-flex;

            align-items: center;

            padding: 7px 12px;

            border-radius: 20px;

            background: rgba(111, 175, 155, .12);

            color: var(--dark-green);

            font-size: 10px;
            font-weight: 700;
        }


        .payment-status {
            color: var(--soft-gray);

            font-size: 10px;
        }


        /* =====================================================
           ORDER BODY
        ===================================================== */

        .order-card-body {
            padding: 22px 24px;
        }


        .order-item {
            display: flex;

            align-items: center;

            gap: 14px;

            padding-bottom: 16px;

            margin-bottom: 16px;

            border-bottom: 1px solid rgba(49, 92, 80, .07);
        }


        .order-item:last-child {
            padding-bottom: 0;

            margin-bottom: 0;

            border-bottom: none;
        }


        .order-item-image {
            width: 58px;
            height: 58px;

            min-width: 58px;

            display: flex;

            align-items: center;
            justify-content: center;

            overflow: hidden;

            border-radius: 10px;

            background: #F7F7F4;
        }


        .order-item-image img {
            width: 100%;
            height: 100%;

            object-fit: contain;

            padding: 5px;
        }


        .order-item-no-image {
            padding: 5px;

            color: var(--soft-gray);

            font-size: 8px;

            text-align: center;
        }


        .order-item-info {
            flex: 1;
        }


        .order-item-name {
            margin-bottom: 5px;

            color: var(--dark-green);

            font-size: 12px;
            font-weight: 700;
        }


        .order-item-quantity {
            color: var(--soft-gray);

            font-size: 10px;
        }


        .order-item-subtotal {
            color: var(--dark-green);

            font-size: 11px;
            font-weight: 700;
        }


        /* =====================================================
           ORDER FOOTER
        ===================================================== */

        .order-card-footer {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 20px;

            padding: 18px 24px;

            background: #FAFAF7;

            border-top: 1px solid rgba(49, 92, 80, .07);
        }


        .order-recipient {
            color: var(--soft-gray);

            font-size: 10px;

            line-height: 1.6;
        }


        .order-recipient strong {
            color: var(--dark-green);

            font-size: 11px;
        }


        .order-total {
            text-align: right;
        }


        .order-total-label {
            margin-bottom: 4px;

            color: var(--soft-gray);

            font-size: 10px;
        }


        .order-total-price {
            color: var(--dark-green);

            font-size: 17px;
            font-weight: 700;
        }


        /* =====================================================
           EMPTY
        ===================================================== */

        .orders-empty {
            padding: 70px 30px;

            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            text-align: center;
        }


        .orders-empty-icon {
            margin-bottom: 18px;

            color: var(--sage-green);

            font-size: 38px;
        }


        .orders-empty h3 {
            margin-bottom: 8px;

            color: var(--dark-green);

            font-size: 18px;
        }


        .orders-empty p {
            margin-bottom: 20px;

            color: var(--soft-gray);

            font-size: 12px;
        }


        .orders-shop-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 11px 20px;

            border-radius: 10px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 11px;
            font-weight: 600;

            text-decoration: none;

            transition: .2s ease;
        }


        .orders-shop-button:hover {
            background: var(--dark-green);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 600px) {

            .my-orders-page {
                padding: 35px 15px 60px;
            }


            .my-orders-title {
                font-size: 27px;
            }


            .order-card-header,
            .order-card-footer {
                align-items: flex-start;

                flex-direction: column;
            }


            .order-status-wrapper {
                align-items: flex-start;
            }


            .order-total {
                text-align: left;
            }

        }

    </style>

</head>


<body>

    @include('layout.header')


    <main class="my-orders-page">

        <div class="my-orders-container">


            {{-- =================================================
                 HEADER
            ================================================= --}}

            <div class="my-orders-header">

                <h1 class="my-orders-title">
                    Pesanan Saya
                </h1>

                <p class="my-orders-subtitle">
                    Lihat riwayat pesanan dan perkembangan pesanan kamu.
                </p>

            </div>


            {{-- =================================================
                 ORDER LIST
            ================================================= --}}

            @forelse ($orders as $order)

                <div class="order-card">


                    {{-- =================================================
                         ORDER HEADER
                    ================================================= --}}

                    <div class="order-card-header">

                        <div>

                            <div class="order-number">
                                {{ $order->nomor_order }}
                            </div>

                            <div class="order-date">
                                {{ \Carbon\Carbon::parse($order->created_at)->format('d M Y, H:i') }}
                            </div>

                        </div>


                        <div class="order-status-wrapper">

                            <span class="order-status">

                                <i
                                    class="fa-solid fa-clock"
                                    style="margin-right: 6px;"
                                ></i>

                                {{ $order->status_pesanan }}

                            </span>


                            <span class="payment-status">

                                Pembayaran:
                                {{ $order->payment_status }}

                            </span>

                        </div>

                    </div>


                    {{-- =================================================
                         ORDER ITEMS
                    ================================================= --}}

                    <div class="order-card-body">

                        @foreach ($order->items as $item)

                        @if ($item->product)

                            <div class="order-item">

                                <div class="order-item-image">

                                    @if ($item->product->gambar)

                                        <img
                                            src="{{ asset('images/' . $item->product->gambar) }}"
                                            alt="{{ $item->product->nama_produk }}"
                                        >

                                    @else

                                        <div class="order-item-no-image">
                                            Gambar belum tersedia
                                        </div>

                                    @endif

                                </div>

                                <div class="order-item-info">

                                    <div class="order-item-name">
                                        {{ $item->product->nama_produk }}
                                    </div>

                                    <div class="order-item-quantity">
                                        {{ $item->jumlah }}
                                        ×
                                        Rp {{ number_format($item->product->harga, 0, ',', '.') }}
                                    </div>

                                </div>

                                <div class="order-item-subtotal">
                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                </div>

                            </div>

                        @endif

                    @endforeach

                    </div>


                    {{-- =================================================
                         ORDER FOOTER
                    ================================================= --}}

                    <div class="order-card-footer">


                        <div class="order-recipient">

                            <strong>
                                Dikirim kepada
                            </strong>

                            <br>

                            {{ $order->nama_penerima }}

                            <br>

                            {{ $order->no_hp }}

                        </div>


                        <div class="order-total">

                            <div class="order-total-label">
                                Total Pesanan
                            </div>

                            <div class="order-total-price">
                                Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                            </div>

                        </div>


                    </div>


                </div>

            @empty


                {{-- =================================================
                     EMPTY
                ================================================= --}}

                <div class="orders-empty">

                    <div class="orders-empty-icon">

                        <i class="fa-solid fa-box-open"></i>

                    </div>


                    <h3>
                        Belum Ada Pesanan
                    </h3>


                    <p>
                        Kamu belum memiliki riwayat pesanan.
                    </p>


                    <a
                        href="{{ route('shop.allproducts') }}"
                        class="orders-shop-button"
                    >
                        Lihat Produk
                    </a>

                </div>

            @endforelse


        </div>

    </main>

</body>

</html>