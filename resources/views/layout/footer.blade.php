<footer class="smart-footer">
    <div class="footer-container">

        <!-- Brand & Description -->
        <div class="footer-brand">
            <h3>SMARTCHILD</h3>
            <p>
                Platform terpadu untuk mendukung tumbuh kembang anak secara optimal
                melalui asesmen ilmiah, kurikulum parenting, dan komunitas orang tua hebat.
            </p>
        </div>

        <!-- Quick Links -->
        <div class="footer-menu">
            <h4>Navigasi</h4>
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('about') }}">Tentang Kami</a>
            <a href="{{ route('services.parenting_academy') }}">Parenting Academy</a>
            <a href="{{ route('community.index') }}">Komunitas</a>
        </div>

        <!-- Support / Contact -->
        <div class="footer-menu">
            <h4>Bantuan & Layanan</h4>
            <a href="{{ route('services.book_consultation') }}">Konsultasi Dokter</a>
            <a href="{{ route('development.assessment') }}">Asesmen Anak</a>
            <a href="{{ route('contact.us') }}">Hubungi Kami</a>
        </div>

    </div>

    <div class="footer-bottom">
        <p>
            &copy; {{ date('Y') }} SmartChild. Tumbuh Cerdas, Bahagia Setiap Hari.
        </p>
    </div>
</footer>

<style>
    /* Font Poppins */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');

    .smart-footer {
        width: 100%;
        background-color: #1E3A2F;
        color: #ffffff;
        margin-top: auto;
        font-family: 'Poppins', sans-serif;
    }

    .smart-footer *,
    .smart-footer a,
    .smart-footer p,
    .smart-footer h3,
    .smart-footer h4 {
        font-family: 'Poppins', sans-serif;
    }

    .footer-container {
        max-width: 80rem;
        margin: 0 auto;
        padding: 3rem 1.5rem 2rem 1.5rem;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 3rem;
    }

    .footer-brand h3 {
        margin: 0 0 1rem 0;
        font-size: 1.25rem;
        font-weight: 800;
        letter-spacing: 0.05em;
    }

    .footer-brand p {
        max-width: 20rem;
        margin: 0;
        font-size: 0.85rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.8);
    }

    .footer-menu {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .footer-menu h4 {
        margin: 0 0 0.5rem 0;
        font-size: 0.95rem;
        font-weight: 700;
        color: #F4D06F;
    }

    .footer-menu a {
        color: rgba(255, 255, 255, 0.8);
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 400;
        transition: color 0.2s ease;
    }

    .footer-menu a:hover {
        color: #ffffff;
        text-decoration: underline;
    }

    .footer-bottom {
        border-top: 1px solid rgba(255, 255, 255, 0.15);
        text-align: center;
        padding: 1.25rem 1.5rem;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 0.75rem;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.7);
    }

    /* Responsif untuk layar HP/Tablet */
    @media (max-width: 768px) {
        .footer-container {
            grid-template-columns: 1fr;
            gap: 2rem;
        }
    }
</style>