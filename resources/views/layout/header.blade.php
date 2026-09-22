<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<header class="navbar-header">

    <div class="navbar-container">

        {{-- LOGO --}}
        <a href="{{ route('home') }}" class="brand-logo">
            <span class="logo-icon">✦</span>
            <span class="logo-text">SMARTCHILD</span>
        </a>


        {{-- NAVIGATION --}}
        <nav class="nav-menu">

            <ul class="nav-list">

                {{-- HOME --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        Home
                    </a>
                </li>


                {{-- ABOUT --}}
                <li class="nav-item">
                    <a href="{{ route('about') }}"
                        class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                        About
                    </a>
                </li>


                {{-- DEVELOPMENT --}}
                <li class="nav-item dropdown">

                    <a href="#"
                        class="nav-link {{ request()->routeIs('development.*') ? 'active' : '' }}">

                        Development

                        <span class="arrow">▾</span>

                    </a>


                    <div class="dropdown-menu">

                        <div class="dropdown-header">
                            Development
                        </div>


                        <ul class="dropdown-list">

                            <li>
                                <a href="{{ route('development.child') }}"
                                    class="{{ request()->routeIs('development.child') ? 'active-sub' : '' }}">
                                    Child Development
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('development.assessment') }}"
                                    class="{{ request()->routeIs('development.assessment') ? 'active-sub' : '' }}">
                                    Assessment
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('development.recommendation') }}"
                                    class="{{ request()->routeIs('development.recommendation') ? 'active-sub' : '' }}">
                                    Smart Recommendation
                                </a>
                            </li>

                        </ul>

                    </div>

                </li>


                {{-- SHOP --}}
                <li class="nav-item dropdown">

                    <a href="#"
                        class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}">

                        Shop

                        <span class="arrow">▾</span>

                    </a>


                    <div class="dropdown-menu">

                        <div class="dropdown-header">
                            Shop
                        </div>


                        <ul class="dropdown-list">

                            <li>
                                <a href="{{ route('shop.byage') }}"
                                    class="{{ request()->routeIs('shop.byage') ? 'active-sub' : '' }}">
                                    Shop By Age
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop.bydevelopment') }}"
                                    class="{{ request()->routeIs('shop.bydevelopment') ? 'active-sub' : '' }}">
                                    Shop By Development
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('shop.smartbox') }}"
                                    class="{{ request()->routeIs('shop.smartbox') ? 'active-sub' : '' }}">
                                    Smart Child Box
                                </a>
                            </li>

                        </ul>

                    </div>

                </li>


                {{-- SERVICES --}}
                <li class="nav-item dropdown">

                    <a href="#"
                        class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">

                        Services

                        <span class="arrow">▾</span>

                    </a>


                    <div class="dropdown-menu">

                        <div class="dropdown-header">
                            Services
                        </div>


                        <ul class="dropdown-list">

                            <li>
                                <a href="{{ route('user.doctor.index') }}"
                                    class="{{ request()->routeIs('user.doctor.index') ? 'active-sub' : '' }}">
                                    Doctor & Therapist
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('services.book_consultation') }}"
                                    class="{{ request()->routeIs('services.book_consultation') ? 'active-sub' : '' }}">
                                    Book Consultation
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('services.parenting_academy') }}"
                                    class="{{ request()->routeIs('services.parenting_academy') ? 'active-sub' : '' }}">
                                    Parenting Academy
                                </a>
                            </li>

                        </ul>

                    </div>

                </li>


                {{-- COMMUNITY --}}
                <li class="nav-item">

                    <a href="{{ route('community') }}"
                        class="nav-link {{ request()->routeIs('community') ? 'active' : '' }}">

                        Community

                    </a>

                </li>


                {{-- PARTNERSHIP --}}
                <li class="nav-item dropdown">

                    <a href="#"
                        class="nav-link {{ request()->routeIs('partnership.*') ? 'active' : '' }}">

                        Partnership

                        <span class="arrow">▾</span>

                    </a>


                    <div class="dropdown-menu">

                        <div class="dropdown-header">
                            Partnership
                        </div>


                        <ul class="dropdown-list">

                            <li>
                                <a href="{{ route('partnership.school') }}"
                                    class="{{ request()->routeIs('partnership.school') ? 'active-sub' : '' }}">
                                    School Partnership
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('partnership.business') }}"
                                    class="{{ request()->routeIs('partnership.business') ? 'active-sub' : '' }}">
                                    Business Partner
                                </a>
                            </li>

                        </ul>

                    </div>

                </li>


                {{-- CONTACT --}}
                <li class="nav-item">

                    <a href="{{ route('contact.us') }}"
                        class="nav-link {{ request()->routeIs('contact.us') ? 'active' : '' }}">

                        Contact

                    </a>

                </li>

            </ul>

        </nav>


        {{-- RIGHT ACTIONS --}}
        <div class="nav-actions">

            {{-- SEARCH --}}
            <button
                type="button"
                class="action-btn search-btn"
                aria-label="Search"
            >

                <svg
                    width="18"
                    height="18"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2.5"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <circle cx="11" cy="11" r="8"></circle>

                    <line
                        x1="21"
                        y1="21"
                        x2="16.65"
                        y2="16.65"
                    ></line>

                </svg>

            </button>


            {{-- CART --}}
            <a
                href="{{ route('shop.cart') }}"
                class="header-cart"
            >

                <i class="fa-solid fa-cart-shopping"></i>

                @php

                    $cart = session('cart', []);

                    $cartCount = collect($cart)->sum('quantity');

                    $cartBadge = min($cartCount, 99);

                @endphp


                @if ($cartCount > 0)

                    <span class="cart-badge">
                        {{ $cartBadge }}
                    </span>

                @endif

            </a>


            {{-- PROFILE --}}
            <li class="nav-item dropdown profile-item">

                <a
                    href="#"
                    class="action-btn profile-btn"
                >

                    @if(auth()->user()->foto)

                        <img
                            src="{{ asset('storage/' . auth()->user()->foto) }}"
                            alt="Profile"
                            class="profile-image"
                        >

                    @else

                        <div class="profile-placeholder">

                            <i class="fa-solid fa-user"></i>

                        </div>

                    @endif

                </a>


                <div class="dropdown-menu profile-menu">

                    <div class="dropdown-header">
                        Akun Saya
                    </div>
                    
                    <ul class="dropdown-list">

                        <li>

                            <a
                                href="{{ route('profile.show') }}"
                                class="{{ request()->routeIs('profile.*') ? 'active-sub' : '' }}"
                            >

                                <i class="fa-solid fa-user-pen"></i>

                                Lihat Profil

                            </a>

                        </li>


                        <li>

                            <a
                                href="{{ route('shop.myorders') }}"
                                class="{{ request()->routeIs('shop.myorders') || request()->routeIs('shop.myorders.show') ? 'active-sub' : '' }}"
                            >

                                <i class="fa-solid fa-box"></i>

                                My Order

                            </a>

                        </li>


                        <li>

                            <a
                                href="{{ route('user.partnership') }}"
                                class="{{ request()->routeIs('user.partnership') ? 'active-sub' : '' }}"
                            >

                                <i class="fa-solid fa-handshake"></i>

                                Partnership

                            </a>

                        </li>

                    </ul>

                </div>

            </li>

        </div>

    </div>

</header>


<style>

/* Font Awesome DIHAPUS dari sini - sudah dimuat sekali lewat <link> di atas.
   Memuat 2x lewat @import + <link> adalah salah satu penyebab icon kotak. */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap');


/* =====================================================
   HEADER
   ===================================================== */

.navbar-header {

    width: 100%;
    height: 80px;

    background-color: #ffffff;

    border-bottom: 1px solid #f0f0f0;

    position: relative;

    z-index: 1000;

    font-family: 'Poppins', Arial, sans-serif;

    box-sizing: border-box;
}


/* Semua elemen di dalam header */

.navbar-header *,
.navbar-header *::before,
.navbar-header *::after {

    box-sizing: border-box;

}


/* =====================================================
   CONTAINER
   ===================================================== */

.navbar-header .navbar-container {

    width: 100%;

    max-width: 1280px;

    height: 80px;

    margin: 0 auto;

    padding: 0 2rem;

    display: flex;

    align-items: center;

    justify-content: space-between;

}


/* =====================================================
   LOGO
   ===================================================== */

.navbar-header .brand-logo {

    display: flex;

    align-items: center;

    gap: 8px;

    text-decoration: none;

    flex-shrink: 0;

}


.navbar-header .logo-icon {

    color: #f26d5b;

    font-size: 24px;

    line-height: 1;

}


.navbar-header .logo-text {

    color: #1e4d3b;

    font-size: 1.35rem;

    font-weight: 800;

    letter-spacing: 0.5px;

    line-height: 1;

}


/* =====================================================
   NAVIGATION
   ===================================================== */

.navbar-header .nav-menu {

    display: flex;

    align-items: center;

}


.navbar-header .nav-list {

    display: flex;

    align-items: center;

    list-style: none;

    gap: 2rem;

    margin: 0;

    padding: 0;

}


.navbar-header .nav-item {

    position: relative;

    margin: 0;

    padding: 28px 0;

}


.navbar-header .nav-link {

    display: flex;

    align-items: center;

    gap: 4px;

    position: relative;

    text-decoration: none;

    color: #4a5568;

    font-family: 'Poppins', Arial, sans-serif;

    font-size: 0.95rem;

    font-weight: 600;

    line-height: 1;

    transition: color 0.2s ease;

}


.navbar-header .nav-link:hover,
.navbar-header .nav-link.active {

    color: #1e4d3b;

}


.navbar-header .nav-link.active::after {

    content: '';

    position: absolute;

    left: 0;

    bottom: -28px;

    width: 100%;

    height: 3px;

    background-color: #f26d5b;

    border-radius: 4px 4px 0 0;

}


.navbar-header .arrow {

    font-size: 0.75rem;

    color: #1e4d3b;

}


/* =====================================================
   DROPDOWN
   ===================================================== */

.navbar-header .dropdown-menu {

    position: absolute;

    top: 100%;

    left: 0;

    width: 220px;

    margin: 0;

    padding: 18px 20px;

    background-color: #ffffff;

    border: 1px solid rgba(0, 0, 0, 0.04);

    border-radius: 16px;

    box-shadow:
        0 10px 30px rgba(0, 0, 0, 0.08);

    opacity: 0;

    visibility: hidden;

    transform: translateY(10px);

    transition:
        opacity 0.25s ease,
        transform 0.25s ease,
        visibility 0.25s ease;

    pointer-events: none;

}


.navbar-header .nav-item.dropdown:hover > .dropdown-menu {

    opacity: 1;

    visibility: visible;

    transform: translateY(0);

    pointer-events: auto;

}


.navbar-header .dropdown-header {

    color: #1e4d3b;

    font-family: 'Poppins', Arial, sans-serif;

    font-size: 0.95rem;

    font-weight: 700;

    line-height: 1.4;

    padding-bottom: 10px;

    margin-bottom: 12px;

    border-bottom: 1px solid #f0f0f0;

}


.navbar-header .dropdown-list {

    list-style: none;

    display: flex;

    flex-direction: column;

    gap: 12px;

    margin: 0;

    padding: 0;

}


.navbar-header .dropdown-list li {

    margin: 0;

    padding: 0;

}


.navbar-header .dropdown-list a {

    display: block;

    margin: 0;

    padding: 0;

    text-decoration: none;

    color: #4a5568;

    font-family: 'Poppins', Arial, sans-serif;

    font-size: 0.88rem;

    font-weight: 500;

    line-height: 1.4;

    transition:
        color 0.2s ease,
        transform 0.2s ease;

}


.navbar-header .dropdown-list a:hover {

    color: #1e4d3b;

    transform: translateX(3px);

}


.navbar-header .dropdown-list a.active-sub {

    color: #1e4d3b;

    font-weight: 600;

}


/* =====================================================
   RIGHT ACTIONS
   ===================================================== */

.navbar-header .nav-actions {

    display: flex;

    align-items: center;

    gap: 15px;

    margin: 0;

    padding: 0;

    flex-shrink: 0;

}


.navbar-header .action-btn {

    display: flex;

    align-items: center;

    justify-content: center;

    position: relative;

    width: auto;

    height: auto;

    padding: 4px;

    margin: 0;

    background: none;

    border: none;

    color: #4a5568;

    text-decoration: none;

    cursor: pointer;

    line-height: 1;

}


.navbar-header .action-btn:hover {

    color: #1e4d3b;

}


/* =====================================================
   CART
   ===================================================== */

.navbar-header .header-cart {

    position: relative;

    display: flex;

    align-items: center;

    justify-content: center;

    width: auto;

    height: auto;

    padding: 4px;

    margin: 0;

    color: #4a5568;

    text-decoration: none;

    line-height: 1;

}


.navbar-header .header-cart:hover {

    color: #1e4d3b;

}


.navbar-header .cart-badge {

    position: absolute;

    top: -6px;

    right: -8px;

    width: 18px;

    height: 18px;

    padding: 0;

    margin: 0;

    border-radius: 50%;

    background-color: #f26d5b;

    color: #ffffff;

    display: flex;

    align-items: center;

    justify-content: center;

    font-family: 'Poppins', Arial, sans-serif;

    font-size: 0.7rem;

    font-weight: 700;

    line-height: 1;

}


/* =====================================================
   PROFILE
   ===================================================== */

.navbar-header .profile-item {

    list-style: none;

    padding: 28px 0;

}


.navbar-header .profile-menu {

    left: auto;

    right: 0;

    min-width: 170px;

    width: 170px;

}


.navbar-header .profile-btn {

    padding: 4px;

}


.navbar-header .profile-image {

    width: 28px;

    height: 28px;

    border-radius: 50%;

    object-fit: cover;

    border: 1.5px solid #cbd5e1;

}


.navbar-header .profile-placeholder {

    width: 28px;

    height: 28px;

    border-radius: 50%;

    background: #e2e8f0;

    display: flex;

    align-items: center;

    justify-content: center;

    color: #64748b;

    font-size: 13px;

    border: 1.5px solid #cbd5e1;

}


.navbar-header .profile-menu .dropdown-list a {

    display: flex;

    align-items: center;

    gap: 8px;

}


.navbar-header .profile-menu .dropdown-list a i {

    width: 16px;

    text-align: center;

    color: #718096;

}


/* =====================================================
   FONT
   ===================================================== */

.navbar-header,
.navbar-header *:not(i) {

    font-family: 'Poppins', Arial, sans-serif;

}

</style>