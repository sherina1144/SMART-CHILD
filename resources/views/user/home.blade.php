@extends('layout.app')

@section('title', 'Home - Smart Child')

@section('content')

<style>

/* =========================
   HOME PAGE
========================= */

.home-page {
    background: #FFFDF9;
    color: #315C50;
    min-height: 100vh;
    font-family: 'Poppins', sans-serif;
}


/* =========================
   HERO
========================= */

.hero-section {
    max-width: 1200px;
    margin: 0 auto;
    padding: 55px 35px 45px;

    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    gap: 55px;
}

.hero-label {
    font-size: 14px;
    color: #4F8B79;
    font-weight: 600;
}

.hero-content h1 {
    margin: 12px 0 15px;
    font-size: 48px;
    line-height: 1.1;
    font-weight: 700;
    color: #274B3D;
}

.hero-content h1 span {
    color: #426F5C;
}

.hero-content p {
    max-width: 430px;
    margin-bottom: 22px;
    font-size: 14px;
    line-height: 1.7;
    color: #5F7F73;
}

.home-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;

    padding: 13px 20px;

    background: #315C50;
    color: #FFFFFF;

    border-radius: 6px;

    text-decoration: none;
    font-size: 13px;
    font-weight: 600;

    transition: 0.2s ease;
}

.home-btn:hover {
    opacity: 0.85;
    color: #FFFFFF;
}

.hero-image {
    display: flex;
    justify-content: center;
    position: relative;
}

.hero-image::before {
    content: "";

    position: absolute;

    width: 300px;
    height: 300px;

    background: rgba(244, 168, 154, 0.18);

    border-radius: 50%;

    top: -10px;
    left: 50%;

    transform: translateX(-50%);

    z-index: 1;
}

.hero-image img {
    width: 100%;
    max-width: 430px;
    height: 300px;

    object-fit: cover;

    border-radius: 220px 220px 0 0;

    position: relative;
    z-index: 2;
}


/* =========================
   QUICK MENU
========================= */

.quick-menu {
    max-width: 1200px;
    margin: 0 auto;

    padding: 10px 20px 40px;

    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 14px;
}

.quick-card {
    padding: 20px 14px;

    background: #FFFFFF;

    border: 1px solid #E7E8E3;
    border-radius: 10px;

    text-align: center;

    box-shadow: 0 4px 12px rgba(49, 92, 80, 0.04);

    min-height: 145px;
}

.quick-icon {
    width: 40px;
    height: 40px;

    margin: 0 auto 10px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #FFF4EC;

    border-radius: 9px;

    font-size: 17px;
}

.quick-card:nth-child(1) .quick-icon {
    background: #FFF0EA;
}

.quick-card:nth-child(2) .quick-icon {
    background: #EEF3E7;
}

.quick-card:nth-child(3) .quick-icon {
    background: #FFF6D9;
}

.quick-card:nth-child(4) .quick-icon {
    background: #FFF0EA;
}

.quick-card:nth-child(5) .quick-icon {
    background: #EEF3E7;
}

.quick-card h3 {
    margin: 0 0 7px;

    font-size: 13px;
    line-height: 1.4;
    font-weight: 700;

    color: #315C50;
}

.quick-card p {
    margin: 0;

    font-size: 11px;
    line-height: 1.5;

    color: #6C8179;
}


/* =========================
   SMART CHILD BOX
========================= */

.box-section {
    max-width: 1200px;
    margin: 0 auto;

    padding: 32px 35px;

    display: grid;
    grid-template-columns: 1.3fr 1fr;
    align-items: center;
    gap: 40px;

    background: #EEF3E7;

    border-radius: 12px;
}

.section-label {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;

    color: #4F8B79;
}

.box-content h2 {
    margin: 8px 0 10px;

    font-size: 27px;
    line-height: 1.3;

    color: #274B3D;
    font-weight: 700;
}

.box-content p {
    max-width: 390px;

    margin-bottom: 18px;

    font-size: 13px;
    line-height: 1.6;

    color: #5F7F73;
}

.box-image {
    display: flex;
    justify-content: center;
}

.box-image img {
    width: 100%;
    max-width: 390px;
    height: 170px;

    object-fit: cover;

    border-radius: 14px;
}


/* =========================
   KATEGORI POPULER
========================= */

.category-section {
    max-width: 1200px;
    margin: 0 auto;

    padding: 55px 20px 35px;
}

.section-heading {
    display: flex;
    justify-content: space-between;
    align-items: end;

    margin-bottom: 18px;
}

.section-heading h2 {
    margin: 5px 0 0;

    font-size: 27px;

    color: #315C50;

    font-weight: 700;
}

.see-all {
    color: #6FAF9B;

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;
}

.see-all:hover {
    color: #315C50;
}


/* =========================
   FILTER KATEGORI
========================= */

.category-filter {
    display: flex;
    gap: 10px;

    margin-bottom: 20px;

    flex-wrap: wrap;
}

.category-filter button {
    padding: 10px 18px;

    border: none;
    border-radius: 20px;

    background: #F4F1EA;

    color: #667A72;

    font-family: 'Poppins', sans-serif;

    font-size: 12px;
    font-weight: 500;

    cursor: pointer;

    transition: 0.2s ease;
}

.category-filter button:hover {
    background: #E8E4DA;
}

.category-filter button.active {
    background: #315C50;
    color: #FFFFFF;
}


/* =========================
   PRODUCT GRID
========================= */

.product-grid {
    display: grid;

    grid-template-columns: repeat(4, 1fr);

    gap: 16px;

    align-items: stretch;
}


/* =========================
   PRODUCT CARD
========================= */

.product-card {
    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 12px;

    padding: 9px 9px 15px;

    height: 100%;

    display: flex;
    flex-direction: column;

    box-sizing: border-box;

    transition: 0.2s ease;
}

.product-card:hover {
    transform: translateY(-3px);

    box-shadow: 0 8px 20px rgba(49, 92, 80, 0.08);
}


/* =========================
   PRODUCT IMAGE
========================= */

.product-image {
    width: 100%;
    height: 170px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #FFF9F2;

    border-radius: 9px;

    color: #667085;
    font-size: 12px;

    overflow: hidden;
}

.product-image img {
    width: 100%;
    height: 100%;

    object-fit: contain;

    display: block;
}


/* =========================
   PRODUCT NAME
========================= */

.product-card h3 {
    margin: 12px 6px 6px;

    font-size: 14px;
    line-height: 1.4;

    color: #315C50;

    font-weight: 700;
}


/* =========================
   PRODUCT DESCRIPTION
========================= */

.product-card p {
    margin: 0 6px 12px;

    font-size: 12px;

    color: #667A72;

    line-height: 1.5;

    display: -webkit-box;

    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;

    overflow: hidden;
}


/* =========================
   PRODUCT BOTTOM
========================= */

.product-bottom {
    margin-top: auto;
    padding: 0 6px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 10px;
}

.product-price {
    font-size: 13px;

    color: #315C50;

    font-weight: 700;
}


/* =========================
   CART BUTTON
========================= */

.home-cart-form {
    margin: 0;

    display: flex;
    align-items: center;
}

.home-cart-button {
    width: 41px;
    height: 41px;

    padding: 0;

    border: none;
    border-radius: 50%;

    background: #6FAF9B;
    color: #FFFFFF;

    display: flex;
    align-items: center;
    justify-content: center;

    cursor: pointer;

    transition: 0.2s ease;
}

.home-cart-button:hover {
    background: #315C50;

    transform: translateY(-1px);
}

.home-cart-button i {
    font-size: 14px;
}


/* =========================
   BENEFIT
========================= */

.benefit-section {
    max-width: 1200px;
    margin: 20px auto 30px;

    padding: 15px 20px;

    display: grid;
    grid-template-columns: repeat(4, 1fr);

    gap: 20px;

    background: #FFFFFF;

    border: 1px solid #E5E7EB;

    border-radius: 8px;
}

.benefit-item {
    display: flex;
    align-items: center;

    gap: 10px;
}

.benefit-icon {
    width: 40px;
    height: 40px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #EEF3E7;

    border-radius: 50%;

    font-size: 13px;
}

.benefit-item h4 {
    margin: 0 0 4px;

    font-size: 12px;

    font-weight: 700;

    color: #315C50;
}

.benefit-item p {
    margin: 0;

    font-size: 11px;

    color: #667A72;
}


/* =========================
   CART TOAST
========================= */

.home-cart-toast {
    position: fixed;

    top: 90px;
    right: 30px;

    z-index: 9999;

    padding: 14px 20px;

    background: #315C50;

    color: #FFFFFF;

    border-radius: 10px;

    /*
     * PENTING:
     * Pakai Poppins secara paksa supaya
     * tidak mengikuti Times New Roman
     * dari style browser / layout lain.
     */
    font-family: 'Poppins', sans-serif !important;

    font-size: 13px;
    font-weight: 500;

    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);

    opacity: 0;
    visibility: hidden;

    transform: translateY(-10px);

    transition: all 0.25s ease;
}

.home-cart-toast.show {
    opacity: 1;
    visibility: visible;

    transform: translateY(0);
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 900px) {

    .hero-section {
        grid-template-columns: 1fr;
        padding: 40px 25px;
    }

    .quick-menu {
        grid-template-columns: repeat(2, 1fr);
    }

    .box-section {
        grid-template-columns: 1fr;
        padding: 30px;
    }

    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .benefit-section {
        grid-template-columns: repeat(2, 1fr);
    }

}

@media (max-width: 600px) {

    .hero-content h1 {
        font-size: 36px;
    }

    .quick-menu {
        grid-template-columns: 1fr;
    }

    .product-grid {
        grid-template-columns: 1fr;
    }

    .benefit-section {
        grid-template-columns: 1fr;
    }

    .section-heading {
        align-items: flex-start;
        gap: 10px;
        flex-direction: column;
    }

    .home-cart-toast {
        left: 20px;
        right: 20px;
        top: 80px;
        text-align: center;
    }

}

</style>


<main class="home-page">


<!-- =========================
     HERO SECTION
========================= -->

<section class="hero-section">

    <div class="hero-content">

        <span class="hero-label">
            ✨ Teman Tumbuh Kembang Anak
        </span>

        <h1>
            Tumbuh Cerdas,<br>
            <span>Bahagia Setiap Hari</span>
        </h1>

        <p>
            Dukung setiap tahap tumbuh kembang anak dengan produk,
            panduan, dan komunitas terbaik.
        </p>

        <a
            href="{{ route('development.child') }}"
            class="home-btn"
        >
            Mulai Jelajahi
            <span>→</span>
        </a>

    </div>


    <div class="hero-image">

        <img
            src="{{ asset('images/hero2.jpg') }}"
            alt="Smart Child"
        >

    </div>

</section>


<!-- =========================
     QUICK MENU
========================= -->

<section class="quick-menu">

    <div class="quick-card">

        <div class="quick-icon">
            ♨
        </div>

        <h3>
            Shop By Age
        </h3>

        <p>
            Temukan produk sesuai usia anak
        </p>

    </div>


    <div class="quick-card">

        <div class="quick-icon">
            🌱
        </div>

        <h3>
            Shop By Development
        </h3>

        <p>
            Pilih produk sesuai kebutuhan perkembangan
        </p>

    </div>


    <div class="quick-card">

        <div class="quick-icon">
            ★
        </div>

        <h3>
            Smart Recommendation
        </h3>

        <p>
            Rekomendasi personal untuk anak Anda
        </p>

    </div>


    <div class="quick-card">

        <div class="quick-icon">
            🎁
        </div>

        <h3>
            Smart Child Box
        </h3>

        <p>
            Paket lengkap untuk mendukung tumbuh kembang
        </p>

    </div>


    <div class="quick-card">

        <div class="quick-icon">
            ▣
        </div>

        <h3>
            Assessment
        </h3>

        <p>
            Kenali potensi dan kebutuhan anak
        </p>

    </div>

</section>


<!-- =========================
     SMART CHILD BOX
========================= -->

<section class="box-section">

    <div class="box-content">

        <span class="section-label">
            SMART CHILD BOX
        </span>

        <h2>
            Paket Lengkap untuk<br>
            Tumbuh Kembang Anak
        </h2>

        <p>
            Paket pilihan berisi produk edukatif berkualitas yang
            disesuaikan dengan tahapan perkembangan anak.
        </p>

        <a
            href="{{ route('shop.smartbox') }}"
            class="home-btn"
        >
            Lihat Selengkapnya
            <span>→</span>
        </a>

    </div>


    <div class="box-image">

        <img
            src="{{ asset('images/smart-child-box2.jpg') }}"
            alt="Smart Child Box"
        >

    </div>

</section>


<!-- =========================
     KATEGORI POPULER
========================= -->

<section class="category-section">

    <div class="section-heading">

        <div>

            <span class="section-label">
                PILIHAN TERBAIK
            </span>

            <h2>
                Kategori Populer
            </h2>

        </div>


        <!-- Arahkan ke Shop By Development -->

        <a
            href="{{ route('shop.bydevelopment') }}"
            class="see-all"
        >
            Lihat Semua →
        </a>

    </div>


    <!-- =========================
         FILTER KATEGORI
    ========================== -->

    <div class="category-filter">

        <button
            type="button"
            class="active"
            onclick="filterCategory('semua', this)"
        >
            Semua
        </button>


        <button
            type="button"
            onclick="filterCategory('kognitif', this)"
        >
            Kognitif
        </button>


        <button
            type="button"
            onclick="filterCategory('motorik', this)"
        >
            Motorik
        </button>


        <button
            type="button"
            onclick="filterCategory('bahasa', this)"
        >
            Bahasa
        </button>


        <button
            type="button"
            onclick="filterCategory('sosial', this)"
        >
            Sosial
        </button>


        <button
            type="button"
            onclick="filterCategory('emosional', this)"
        >
            Emosional
        </button>

    </div>


    <!-- =========================
         PRODUCT GRID
    ========================== -->

    <div class="product-grid">

        @foreach($products as $product)

            <div
                class="product-card"
                data-category="{{ strtolower($product->kategori_perkembangan) }}"
            >

                <!-- PRODUCT IMAGE -->

                <div class="product-image">

                    @if($product->gambar)

                        <img
                            src="{{ asset('images/' . $product->gambar) }}"
                            alt="{{ $product->nama_produk }}"
                        >

                    @else

                        Gambar

                    @endif

                </div>


                <!-- PRODUCT NAME -->

                <h3>
                    {{ $product->nama_produk }}
                </h3>


                <!-- PRODUCT DESCRIPTION -->

                <p>
                    {{ $product->deskripsi }}
                </p>


                <!-- PRODUCT BOTTOM -->

                <div class="product-bottom">

                    <strong class="product-price">

                        Rp
                        {{ number_format($product->harga, 0, ',', '.') }}

                    </strong>


                    <!-- CART -->

                    <form
                        class="home-cart-form"
                        action="{{ route('shop.cart.add', $product->product_id) }}"
                        method="POST"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="home-cart-button"
                            title="Tambah ke keranjang"
                        >

                            <i class="fa-solid fa-cart-shopping"></i>

                        </button>

                    </form>

                </div>

            </div>

        @endforeach

    </div>

</section>


<!-- =========================
     BENEFIT
========================= -->

<section class="benefit-section">

    <div class="benefit-item">

        <div class="benefit-icon">
            ●
        </div>

        <div>

            <h4>
                Aman & Berkualitas
            </h4>

            <p>
                Produk terbaik dan aman untuk anak
            </p>

        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            🚚
        </div>

        <div>

            <h4>
                Pengiriman Cepat
            </h4>

            <p>
                Kirim dengan cepat dan aman
            </p>

        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            ♙
        </div>

        <div>

            <h4>
                Garansi Produk
            </h4>

            <p>
                Jaminan untuk setiap produk
            </p>

        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            ♧
        </div>

        <div>

            <h4>
                Customer Care
            </h4>

            <p>
                Siap membantu setiap kebutuhan
            </p>

        </div>

    </div>

</section>


</main>


<!-- =========================
     CART TOAST
========================= -->

<div
    class="home-cart-toast"
    aria-live="polite"
></div>


<script>

/* =========================
   FILTER KATEGORI
========================= */

function filterCategory(category, button) {

    const buttons =
        document.querySelectorAll(
            '.category-filter button'
        );


    buttons.forEach(function(btn) {

        btn.classList.remove('active');

    });


    button.classList.add('active');


    const products =
        document.querySelectorAll(
            '.product-card'
        );


    products.forEach(function(product) {

        product.style.display = 'none';

    });


    let count = 0;


    products.forEach(function(product) {

        const productCategory =
            product.getAttribute('data-category');


        if (category === 'semua') {

            if (count < 4) {

                product.style.display = 'flex';

                count++;

            }

        } else {

            if (
                productCategory &&
                productCategory.includes(category) &&
                count < 4
            ) {

                product.style.display = 'flex';

                count++;

            }

        }

    });

}


/* =========================
   FILTER SAAT HALAMAN DIBUKA
========================= */

window.addEventListener(
    'DOMContentLoaded',
    function() {

        const semuaButton =
            document.querySelector(
                '.category-filter button'
            );


        if (semuaButton) {

            filterCategory(
                'semua',
                semuaButton
            );

        }

    }
);


/* =========================
   ADD TO CART
========================= */

document.addEventListener(
    'DOMContentLoaded',
    function() {

        const forms =
            document.querySelectorAll(
                '.home-cart-form'
            );


        forms.forEach(function(form) {

            form.addEventListener(
                'submit',
                async function(e) {

                    e.preventDefault();
                    e.stopPropagation();


                    try {

                        const response =
                            await fetch(
                                form.action,
                                {
                                    method: 'POST',

                                    body:
                                        new FormData(form),

                                    headers: {
                                        'Accept':
                                            'application/json',

                                        'X-Requested-With':
                                            'XMLHttpRequest'
                                    }
                                }
                            );


                        const data =
                            await response.json();


                        if (data.success) {

                            updateCartBadge(
                                data.cart_badge
                            );


                            showHomeCartToast(
                                data.message
                            );

                        } else {

                            showHomeCartToast(
                                data.message
                            );

                        }


                    } catch (error) {

                        console.error(error);


                        showHomeCartToast(
                            'Terjadi kesalahan. Silakan coba lagi.'
                        );

                    }

                }
            );

        });

    }
);


/* =========================
   UPDATE CART BADGE
========================= */

function updateCartBadge(count) {

    let badge =
        document.querySelector(
            '.cart-badge'
        );


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
            document.querySelector(
                '.header-cart'
            );


        if (cartIcon) {

            const newBadge =
                document.createElement(
                    'span'
                );


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


/* =========================
   CART TOAST
========================= */

function showHomeCartToast(message) {

    const toast =
        document.querySelector(
            '.home-cart-toast'
        );


    if (!toast) {

        return;

    }


    toast.textContent =
        message;


    toast.classList.add(
        'show'
    );


    setTimeout(
        function() {

            toast.classList.remove(
                'show'
            );

        },
        2500
    );

}

</script>

@endsection
