@include('layout.header')

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

            <a href="#" class="home-btn">
                Mulai Jelajahi
                <span>→</span>
            </a>

        </div>

        <!-- Gambar sementara dikosongkan -->
        <div class="hero-image">
            <div class="image-placeholder">
                Gambar
            </div>
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
            <div class="image-placeholder">
                Gambar
            </div>
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

            <button class="active">Semua</button>
            <button>Mainan Edukasi</button>
            <button>Buku Anak</button>
            <button>Perlengkapan</button>
            <button>Kesehatan</button>

        </div>


        <!-- Product Cards -->
        <div class="product-grid">

            <div class="product-card">

                <div class="product-image">
                    Gambar
                </div>

                <h3>Stacking Rings</h3>

                <p>
                    Melatih koordinasi tangan dan konsentrasi.
                </p>

                <strong>Rp 125.000</strong>

            </div>


            <div class="product-card">

                <div class="product-image">
                    Gambar
                </div>

                <h3>Busy Board Mini</h3>

                <p>
                    Melatih motorik halus dan konsentrasi.
                </p>

                <strong>Rp 175.000</strong>

            </div>


            <div class="product-card">

                <div class="product-image">
                    Gambar
                </div>

                <h3>Play Tunnel</h3>

                <p>
                    Melatih kemampuan motorik kasar.
                </p>

                <strong>Rp 225.000</strong>

            </div>


            <div class="product-card">

                <div class="product-image">
                    Gambar
                </div>

                <h3>Building Blocks</h3>

                <p>
                    Mainan edukatif untuk kreativitas anak.
                </p>

                <strong>Rp 150.000</strong>

            </div>

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