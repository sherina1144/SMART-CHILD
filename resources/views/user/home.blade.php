@extends('layout.app')

@section('content')
<main class="home-page">
 
    <!-- =========================
         HERO SECTION
    ========================== -->
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

            <a href="{{ route('development.child') }}" class="home-btn">
                Mulai Jelajahi <span>→</span>
            </a>

        </div>

        <!-- Gambar sementara dikosongkan -->
        <div class="hero-image">
            <img src="{{ asset('images/hero2.jpg') }}" alt="Smart Child">
        </div>

    </section>


    <!-- =========================
         QUICK MENU
    ========================== -->
    <section class="quick-menu">

        <div class="quick-card">
            <div class="quick-icon">♨</div>
            <h3>Shop By Age</h3>
            <p>
                Temukan produk sesuai usia anak
            </p>
        </div>

        <div class="quick-card">
            <div class="quick-icon">🌱</div>
            <h3>Shop By Development</h3>
            <p>
                Pilih produk sesuai kebutuhan perkembangan
            </p>
        </div>

        <div class="quick-card">
            <div class="quick-icon">★</div>
            <h3>Smart Recommendation</h3>
            <p>
                Rekomendasi personal untuk anak Anda
            </p>
        </div>

        <div class="quick-card">
            <div class="quick-icon">🎁</div>
            <h3>Smart Child Box</h3>
            <p>
                Paket lengkap untuk mendukung tumbuh kembang
            </p>
        </div>

        <div class="quick-card">
            <div class="quick-icon">▣</div>
            <h3>Assessment</h3>
            <p>
                Kenali potensi dan kebutuhan anak
            </p>
        </div>

    </section>


    <!-- =========================
         SMART CHILD BOX
    ========================== -->
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

            <a href="#" class="home-btn">
                Lihat Selengkapnya
                <span>→</span>
            </a>

        </div>

        <!-- Gambar sementara -->
        <div class="box-image">
            <img src="{{ asset('images/smart-child-box2.jpg') }}" alt="Smart Child Box">
        </div>

    </section>


    <!-- =========================
         KATEGORI POPULER
    ========================== -->
    <section class="category-section">

        <div class="section-heading">

            <div>
                <span class="section-label">
                    PILIHAN TERBAIK
                </span>

                <h2>Kategori Populer</h2>
            </div>

            <a href="#" class="see-all">
                Lihat Semua →
            </a>

        </div>


        <!-- Filter kategori -->
        <div class="category-filter">
            <button class="active" onclick="filterCategory('semua', this)">Semua</button>
            <button onclick="filterCategory('kognitif', this)">Kognitif</button>
            <button onclick="filterCategory('motorik', this)">Motorik</button>
            <button onclick="filterCategory('bahasa', this)">Bahasa</button>
            <button onclick="filterCategory('sosial', this)">Sosial</button>
            <button onclick="filterCategory('emosional', this)">Emosional</button>
            <button onclick="filterCategory('kreativitas', this)">Kreativitas</button>
        </div>

           

            


        <!-- Product Cards -->
        <!-- Product Cards -->
        <div class="product-grid">

            @foreach($products as $product)

            <div class="product-card" data-category="{{ strtolower($product->kategori_perkembangan) }}">

                <div class="product-image">
                    @if($product->gambar)
                    <img src="{{ asset('images/' . $product->gambar) }}"
                        alt="{{ $product->nama_produk }}">
                    @else
                    Gambar
                    @endif
                </div>

                <h3>{{ $product->nama_produk }}</h3>

                <p>
                    {{ $product->deskripsi }}
                </p>

                <strong>
                    Rp {{ number_format($product->harga, 0, ',', '.') }}
                </strong>

            </div>

            @endforeach

        </div>

    </section>


    <!-- =========================
         KEUNGGULAN
    ========================== -->
    <section class="benefit-section">

        <div class="benefit-item">

            <div class="benefit-icon">●</div>

            <div>
                <h4>Aman & Berkualitas</h4>
                <p>Produk terbaik dan aman untuk anak</p>
            </div>

        </div>


        <div class="benefit-item">

            <div class="benefit-icon">🚚</div>

            <div>
                <h4>Pengiriman Cepat</h4>
                <p>Kirim dengan cepat dan aman</p>
            </div>

        </div>


        <div class="benefit-item">

            <div class="benefit-icon">♙</div>

            <div>
                <h4>Garansi Produk</h4>
                <p>Jaminan untuk setiap produk</p>
            </div>

        </div>


        <div class="benefit-item">

            <div class="benefit-icon">♧</div>

            <div>
                <h4>Customer Care</h4>
                <p>Siap membantu setiap kebutuhan</p>
            </div>

        </div>

    </section>

</main>



@include('layout.footer')

<script>
    function filterCategory(category, button) {

        // Mengubah tombol aktif
        const buttons = document.querySelectorAll('.category-filter button');

        buttons.forEach(function(btn) {
            btn.classList.remove('active');
        });

        button.classList.add('active');


        // Ambil semua produk
        const products = document.querySelectorAll('.product-card');

        // Sembunyikan semua produk terlebih dahulu
        products.forEach(function(product) {
            product.style.display = 'none';
        });


        // Tampilkan produk sesuai kategori
        if (category === 'semua') {
    let count = 0;

    products.forEach(function(product) {
        if (count < 4) {
            product.style.display = 'block';
            count++;
        }
    });

        } else {

            // Kategori lain maksimal 4 produk
            let count = 0;

            products.forEach(function(product) {

                const productCategory =
                    product.getAttribute('data-category');

                if (
                    productCategory.includes(category) &&
                    count < 4
                ) {
                    product.style.display = 'block';
                    count++;
                }

            });

        }

    }


    // =========================
    // FILTER SAAT HALAMAN DIBUKA
    // =========================

    window.addEventListener('DOMContentLoaded', function() {

        const semuaButton =
            document.querySelector('.category-filter button');

        filterCategory('semua', semuaButton);

    });
</script>


@endsection

