<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Keranjang - Smart Child</title>

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

        .cart-page {
            min-height: calc(100vh - 65px);
            background: var(--warm-cream);
            padding: 55px 20px 80px;
        }


        .cart-container {
            width: 100%;
            max-width: 1110px;
            margin: 0 auto;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .cart-page-header {
            margin-bottom: 28px;
        }


        .cart-page-title {
            font-size: 32px;
            font-weight: 700;
            color: var(--dark-green);
            margin-bottom: 8px;
        }


        .cart-page-subtitle {
            font-size: 13px;
            color: var(--soft-gray);
        }


        /* =====================================================
           CART LAYOUT
        ===================================================== */

        .cart-layout {
            display: grid;
            grid-template-columns: minmax(0, 1fr) 330px;
            gap: 24px;
            align-items: start;
        }


        /* =====================================================
           CART ITEMS
        ===================================================== */

        .cart-items-box {
            background: var(--white);
            border: 1px solid rgba(49, 92, 80, .08);
            border-radius: 18px;
            overflow: hidden;
        }


        .cart-item {
            display: flex;
            align-items: center;
            gap: 18px;
            padding: 20px;
            border-bottom: 1px solid rgba(49, 92, 80, .08);
        }


        .cart-item:last-child {
            border-bottom: none;
        }


        /* =====================================================
           IMAGE
        ===================================================== */

        .cart-item-image {
            width: 105px;
            height: 105px;
            min-width: 105px;

            background: #F7F7F4;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;

            overflow: hidden;
        }


        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }


        .cart-item-no-image {
            color: var(--soft-gray);
            font-size: 10px;
            text-align: center;
            padding: 10px;
        }


        /* =====================================================
           INFO
        ===================================================== */

        .cart-item-info {
            flex: 1;
            min-width: 0;
        }


        .cart-item-category {
            display: inline-block;

            margin-bottom: 7px;

            padding: 5px 9px;

            border-radius: 20px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 9px;
            font-weight: 600;
        }


        .cart-item-name {
            margin-bottom: 6px;

            color: var(--dark-green);

            font-size: 16px;
            font-weight: 700;
        }


        .cart-item-price {
            color: var(--soft-gray);
            font-size: 12px;
        }


        /* =====================================================
           QUANTITY
        ===================================================== */

        .cart-item-actions {
            display: flex;
            align-items: center;
            gap: 18px;
        }


        .cart-quantity {
            display: flex;
            align-items: center;

            border: 1px solid rgba(49, 92, 80, .15);

            border-radius: 10px;

            overflow: hidden;
        }


        .cart-quantity button {
            width: 32px;
            height: 32px;

            border: none;

            background: var(--white);

            color: var(--dark-green);

            cursor: pointer;

            font-size: 13px;
        }


        .cart-quantity button:hover {
            background: var(--warm-cream);
        }


        .cart-quantity span {
            min-width: 34px;

            text-align: center;

            color: var(--dark-green);

            font-size: 12px;
            font-weight: 600;
        }


        .cart-item-subtotal {
            min-width: 110px;

            color: var(--dark-green);

            font-size: 14px;
            font-weight: 700;

            text-align: right;
        }


        /* =====================================================
           REMOVE
        ===================================================== */

        .cart-remove {
            width: 32px;
            height: 32px;

            border: none;

            background: transparent;

            color: var(--soft-gray);

            cursor: pointer;

            font-size: 13px;

            transition: .2s ease;
        }


        .cart-remove:hover {
            color: var(--soft-peach);
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .cart-summary {
            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            padding: 24px;

            position: sticky;
            top: 90px;
        }


        .cart-summary-title {
            margin-bottom: 20px;

            color: var(--dark-green);

            font-size: 18px;
            font-weight: 700;
        }


        .cart-summary-row {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 13px;

            color: var(--soft-gray);

            font-size: 12px;
        }


        .cart-summary-row.total {
            margin-top: 18px;
            padding-top: 18px;

            border-top: 1px solid rgba(49, 92, 80, .10);

            color: var(--dark-green);

            font-size: 16px;
            font-weight: 700;
        }


        .cart-checkout-button {
            width: 100%;
            height: 45px;

            margin-top: 20px;

            border: none;
            border-radius: 12px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 13px;
            font-weight: 600;

            cursor: pointer;

            transition: .2s ease;

            display: flex;
            align-items: center;
            justify-content: center;

            text-decoration: none;
        }


        .cart-checkout-button:hover {
            background: var(--dark-green);
        }


        /* =====================================================
           EMPTY CART
        ===================================================== */

        .cart-empty {
            width: 100%;

            background: var(--white);

            border: 1px solid rgba(49, 92, 80, .08);

            border-radius: 18px;

            padding: 75px 20px;

            text-align: center;
        }


        .cart-empty-icon {
            width: 65px;
            height: 65px;

            margin: 0 auto 18px;

            border-radius: 50%;

            background: #F1F4EA;

            color: var(--sage-green);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 25px;
        }


        .cart-empty h2 {
            margin-bottom: 8px;

            color: var(--dark-green);

            font-size: 20px;
        }


        .cart-empty p {
            margin-bottom: 22px;

            color: var(--soft-gray);

            font-size: 12px;
        }


        .cart-empty-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            height: 42px;

            padding: 0 24px;

            border-radius: 22px;

            background: var(--sage-green);

            color: var(--white);

            font-size: 12px;
            font-weight: 600;

            text-decoration: none;

            transition: .2s ease;
        }


        .cart-empty-button:hover {
            background: var(--dark-green);
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .cart-layout {
                grid-template-columns: 1fr;
            }


            .cart-summary {
                position: static;
            }

        }


        @media (max-width: 650px) {

            .cart-page {
                padding: 35px 15px 60px;
            }


            .cart-page-title {
                font-size: 27px;
            }


            .cart-item {
                align-items: flex-start;
                flex-wrap: wrap;
            }


            .cart-item-image {
                width: 85px;
                height: 85px;
                min-width: 85px;
            }


            .cart-item-info {
                width: calc(100% - 110px);
            }


            .cart-item-actions {
                width: 100%;

                justify-content: space-between;

                padding-left: 103px;
            }


            .cart-item-subtotal {
                min-width: auto;
            }

        }

    </style>

</head>


<body>

    {{-- HEADER --}}
    @include('layout.header')


    <main class="cart-page">

        <div class="cart-container">


            {{-- =================================================
                 HEADER CART
            ================================================= --}}

            <div class="cart-page-header">

                <h1 class="cart-page-title">
                    Keranjang
                </h1>

                <p class="cart-page-subtitle">
                    Periksa kembali produk yang ingin kamu beli sebelum melanjutkan.
                </p>

            </div>


            @if (empty($cart))


                {{-- =================================================
                     EMPTY CART
                ================================================= --}}

                <div class="cart-empty">

                    <div class="cart-empty-icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>

                    <h2>
                        Keranjang Masih Kosong
                    </h2>

                    <p>
                        Belum ada produk yang kamu tambahkan ke keranjang.
                    </p>

                    <a
                        href="{{ route('shop.allproducts') }}"
                        class="cart-empty-button"
                    >
                        Lihat Produk
                    </a>

                </div>


            @else

                @php
                    $total = 0;
                    $totalQuantity = 0;
                @endphp


                {{-- =================================================
                    CART CONTENT
                ================================================= --}}

                <div class="cart-layout">


                    {{-- =================================================
                         PRODUCT LIST
                    ================================================= --}}

                    <div class="cart-items-box">

                        @foreach ($cart as $productId => $item)

                            @if (isset($products[$productId]))

                                @php
                                    $product = $products[$productId];

                                    $quantity = $item['quantity'];

                                    $subtotal = $product->harga * $quantity;

                                    $total += $subtotal;

                                    $totalQuantity += $quantity;
                                @endphp

                                <div class="cart-item">


                                    {{-- IMAGE --}}

                                    <div class="cart-item-image">

                                        @if ($product->gambar)

                                            <img
                                                src="{{ asset('images/' . $product->gambar) }}"
                                                alt="{{ $product->nama_produk }}"
                                            >

                                        @else

                                            <div class="cart-item-no-image">
                                                Gambar belum tersedia
                                            </div>

                                        @endif

                                    </div>


                                    {{-- INFO --}}

                                    <div class="cart-item-info">

                                        <span class="cart-item-category">
                                            {{ $product->kategori_perkembangan }}
                                        </span>

                                        <h3 class="cart-item-name">
                                            {{ $product->nama_produk }}
                                        </h3>

                                        <p class="cart-item-price">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                            / produk
                                        </p>

                                    </div>


                                    {{-- ACTIONS --}}

                                    <div class="cart-item-actions">


                                        {{-- QUANTITY --}}

                                        <div class="cart-quantity">

                                            <button
                                                type="button"
                                                class="quantity-minus"
                                                data-product-id="{{ $product->product_id }}"
                                                title="Kurangi jumlah"
                                            >
                                                <i class="fa-solid fa-minus"></i>
                                            </button>

                                            <span id="quantity-{{ $product->product_id }}">
                                                {{ $quantity }}
                                            </span>

                                            <button
                                                type="button"
                                                class="quantity-plus"
                                                data-product-id="{{ $product->product_id }}"
                                                title="Tambah jumlah"
                                            >
                                                <i class="fa-solid fa-plus"></i>
                                            </button>

                                        </div>


                                        {{-- SUBTOTAL --}}

                                        <div
                                            class="cart-item-subtotal"
                                            id="subtotal-{{ $product->product_id }}"
                                        >
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </div>


                                        {{-- REMOVE --}}

                                        <button
                                            type="button"
                                            class="cart-remove"
                                            data-product-id="{{ $product->product_id }}"
                                            title="Hapus produk"
                                        >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>

                                    </div>

                                </div>

                            @endif

                        @endforeach

                    </div>


                    {{-- =================================================
                         SUMMARY
                    ================================================= --}}

                    <div class="cart-summary">

                        <h2 class="cart-summary-title">
                            Ringkasan Belanja
                        </h2>


                        <div class="cart-summary-row">

                            <span>
                                Jumlah Produk
                            </span>

                            <span>
                                {{ $totalQuantity }}
                            </span>

                        </div>


                        <div class="cart-summary-row">

                            <span>
                                Subtotal
                            </span>

                            <span>
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>


                        <div class="cart-summary-row total">

                            <span>
                                Total
                            </span>

                            <span id="cart-total">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>


                        <a
                            href="{{ route('shop.checkout') }}"
                            class="cart-checkout-button"
                        >
                            Lanjut Checkout
                        </a>

                    </div>

                </div>

            @endif

        </div>

    </main>

    <script>

    document.addEventListener('DOMContentLoaded', function () {


        /*
        ==========================================
        UPDATE QUANTITY
        ==========================================
        */

        document.querySelectorAll('.quantity-minus').forEach(function (button) {

            button.addEventListener('click', function () {

                const productId =
                    this.dataset.productId;

                const quantityElement =
                    document.getElementById(
                        'quantity-' + productId
                    );

                let quantity =
                    parseInt(quantityElement.textContent);

                if (quantity > 1) {

                    quantity--;

                    updateCartQuantity(
                        productId,
                        quantity
                    );
                }

            });

        });


        document.querySelectorAll('.quantity-plus').forEach(function (button) {

            button.addEventListener('click', function () {

                const productId =
                    this.dataset.productId;

                const quantityElement =
                    document.getElementById(
                        'quantity-' + productId
                    );

                let quantity =
                    parseInt(quantityElement.textContent);

                quantity++;

                updateCartQuantity(
                    productId,
                    quantity
                );

            });

        });


        /*
        ==========================================
        REMOVE PRODUCT
        ==========================================
        */

        document.querySelectorAll('.cart-remove').forEach(function (button) {

            button.addEventListener('click', function () {

                const productId =
                    this.dataset.productId;

                removeCartProduct(productId);

            });

        });

    });


    /*
    ==========================================
    UPDATE CART
    ==========================================
    */

    async function updateCartQuantity(
        productId,
        quantity
    ) {

        try {

            const response = await fetch(
                `/shop/cart/update/${productId}`,
                {
                    method: 'POST',

                    headers: {
                        'Content-Type':
                            'application/json',

                        'Accept':
                            'application/json',

                        'X-CSRF-TOKEN':
                            '{{ csrf_token() }}'
                    },

                    body: JSON.stringify({
                        quantity: quantity
                    })
                }
            );


            const data =
                await response.json();


            if (!data.success) {

                alert(data.message);

                return;
            }


            /*
            UPDATE QUANTITY
            */

            const quantityElement =
                document.getElementById(
                    'quantity-' + productId
                );

            if (quantityElement) {

                quantityElement.textContent =
                    data.quantity;

            }


            /*
            UPDATE SUBTOTAL
            */

            const subtotalElement =
                document.getElementById(
                    'subtotal-' + productId
                );

            if (subtotalElement) {

                subtotalElement.textContent =
                    data.subtotal_formatted;

            }


            /*
            UPDATE TOTAL
            */

            const totalElement =
                document.getElementById(
                    'cart-total'
                );

            if (totalElement) {

                totalElement.textContent =
                    data.total_formatted;

            }


            /*
            UPDATE BADGE
            */

            updateCartBadge(
                data.cart_badge
            );

        }

        catch (error) {

            console.error(error);

            alert(
                'Terjadi kesalahan. Silakan coba lagi.'
            );

        }

    }


    /*
    ==========================================
    REMOVE CART PRODUCT
    ==========================================
    */

    async function removeCartProduct(productId)
    {

        try {

            const response = await fetch(
                `/shop/cart/remove/${productId}`,
                {
                    method: 'DELETE',

                    headers: {

                        'Accept':
                            'application/json',

                        'X-CSRF-TOKEN':
                            '{{ csrf_token() }}'
                    }
                }
            );


            const data =
                await response.json();


            if (!data.success) {

                alert(data.message);

                return;
            }


            /*
            REFRESH PAGE
            */

            location.reload();

        }

        catch (error) {

            console.error(error);

            alert(
                'Terjadi kesalahan. Silakan coba lagi.'
            );

        }

    }


    /*
    ==========================================
    UPDATE HEADER BADGE
    ==========================================
    */

    function updateCartBadge(count)
    {

        let badge =
            document.querySelector('.cart-badge');


        if (count > 0) {

            if (badge) {

                badge.textContent = count;

            }

            else {

                const cartIcon =
                    document.querySelector(
                        '.header-cart'
                    );


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

        else {

            if (badge) {

                badge.remove();

            }

        }

    }

    </script>

</body>

</html>