@vite(['resources/css/app.css', 'resources/js/app.js'])
<header class="navbar-header">
    <div class="navbar-container">
        <!-- Logo -->
        <a href="{{ route('home') }}" class="brand-logo">
            <span class="logo-icon">✦</span>
            <span class="logo-text">SMARTCHILD</span>
        </a>

        <!-- Navigation Menu -->
        <nav class="nav-menu">
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                </li>

                <!-- Dropdown: Development -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link {{ request()->routeIs('development.*') ? 'active' : '' }}">
                        Development <span class="arrow">▾</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">Development</div>
                        <ul class="dropdown-list">
                            <li>
                                <a href="{{ route('development.child') }}" class="{{ request()->routeIs('development.child') ? 'active-sub' : '' }}">
                                    Child Development
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('development.assessment') }}" class="{{ request()->routeIs('development.assessment') ? 'active-sub' : '' }}">
                                    Assessment
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('development.recommendation') }}" class="{{ request()->routeIs('development.recommendation') ? 'active-sub' : '' }}">
                                    Smart Recommendation
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Dropdown: Shop -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link {{ request()->routeIs('shop.*') ? 'active' : '' }}">
                        Shop <span class="arrow">▾</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">Shop</div>
                        <ul class="dropdown-list">
                            <li>
                                <a href="{{ route('shop.byage') }}" class="{{ request()->routeIs('shop.byage') ? 'active-sub' : '' }}">
                                    Shop By Age
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('shop.bydevelopment') }}" class="{{ request()->routeIs('shop.bydevelopment') ? 'active-sub' : '' }}">
                                    Shop By Development
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('shop.smartbox') }}" class="{{ request()->routeIs('shop.smartbox') ? 'active-sub' : '' }}">
                                    Smart Child Box
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Dropdown: Services -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link {{ request()->routeIs('services.*') ? 'active' : '' }}">
                        Services <span class="arrow">▾</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">Services</div>
                        <ul class="dropdown-list">
                            <li>
                                <a href="{{ route('services.doctor') }}" class="{{ request()->routeIs('services.doctor') ? 'active-sub' : '' }}">
                                    Doctor & Therapist
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services.book_consultation') }}" class="{{ request()->routeIs('services.book_consultation') ? 'active-sub' : '' }}">
                                    Book Consultation
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services.parenting_academy') }}" class="{{ request()->routeIs('services.parenting_academy') ? 'active-sub' : '' }}">
                                    Parenting Academy
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- Menu Community -->
                <li class="nav-item">
                    <a href="{{ route('community') }}" class="nav-link {{ request()->routeIs('community') ? 'active' : '' }}">
                        Community
                    </a>
                </li>
                <!-- Dropdown: Partnership -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link {{ request()->routeIs('partnership.*') ? 'active' : '' }}">
                        Partnership <span class="arrow">▾</span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">Partnership</div>
                        <ul class="dropdown-list">
                            <li>
                                <a href="{{ route('partnership.school') }}" class="{{ request()->routeIs('partnership.school') ? 'active-sub' : '' }}">
                                    School Partnership
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('partnership.business') }}" class="{{ request()->routeIs('partnership.business') ? 'active-sub' : '' }}">
                                    Business Partner
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a href="{{ route('contact.us') }}" class="nav-link {{ request()->routeIs('contact.us') ? 'active' : '' }}">Contact</a>
                </li>
            </ul>
        </nav>

        <!-- Right Icons -->
        <div class="nav-actions">
            <button type="button" class="action-btn search-btn" aria-label="Search">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>
            <a href="#" class="action-btn cart-btn" aria-label="Cart">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="9" cy="21" r="1"></circle>
                    <circle cx="20" cy="21" r="1"></circle>
                    <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                </svg>
                <span class="cart-badge">0</span>
            </a>
        </div>
    </div>
</header>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
    }

    .navbar-header {
        background-color: #ffffff;
        border-bottom: 1px solid #f0f0f0;
        position: relative;
        width: 100%;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
    }

    .navbar-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 2rem;
        height: 80px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .brand-logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
    }

    .logo-icon {
        color: #f26d5b;
        font-size: 24px;
    }

    .logo-text {
        color: #1e4d3b;
        font-weight: 800;
        font-size: 1.35rem;
        letter-spacing: 0.5px;
    }

    .nav-list {
        display: flex;
        align-items: center;
        list-style: none;
        gap: 2rem;
    }

    .nav-item {
        position: relative;
        padding: 28px 0;
    }

    .nav-link {
        text-decoration: none;
        color: #4a5568;
        font-weight: 600;
        font-size: 0.95rem;
        transition: color 0.2s ease;
        display: flex;
        align-items: center;
        gap: 4px;
        position: relative;
    }

    .nav-link.active,
    .nav-link:hover {
        color: #1e4d3b;
    }

    /* Garis Oranye di bawah menu yang sedang aktif */
    .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -28px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #f26d5b;
        border-radius: 4px 4px 0 0;
    }

    .arrow {
        font-size: 0.75rem;
        color: #1e4d3b;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        width: 220px;
        background-color: #ffffff;
        border-radius: 16px;
        padding: 18px 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.04);
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
        pointer-events: none;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
        pointer-events: auto;
    }

    .dropdown-header {
        color: #1e4d3b;
        font-weight: 700;
        font-size: 0.95rem;
        padding-bottom: 10px;
        margin-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-list {
        list-style: none;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .dropdown-list a {
        text-decoration: none;
        color: #4a5568;
        font-size: 0.88rem;
        font-weight: 500;
        transition: color 0.2s ease, transform 0.2s ease;
        display: block;
    }

    .dropdown-list a:hover {
        color: #1e4d3b;
        transform: translateX(3px);
    }

    .dropdown-list a.active-sub {
        color: #f26d5b;
        font-weight: 700;
    }

    .nav-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .action-btn {
        background: none;
        border: none;
        color: #4a5568;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        text-decoration: none;
        padding: 4px;
        transition: color 0.2s ease;
    }

    .action-btn:hover {
        color: #1e4d3b;
    }

    .cart-badge {
        position: absolute;
        top: -6px;
        right: -8px;
        background-color: #f26d5b;
        color: white;
        font-size: 0.7rem;
        font-weight: 700;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>