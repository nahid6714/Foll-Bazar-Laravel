{{-- =========================================================
     FOL BAZAR — HEADER
     Laravel Blade Partial
     ========================================================= --}}

{{-- SPECIAL NOTICE --}}
<div
    class="notice-ticker"
    id="noticeTicker"
    role="region"
    aria-label="বিশেষ ঘোষণা"
>
    <div class="notice-badge">
        <span>SPECIAL NOTICE</span>
    </div>

    <div class="notice-track-wrap">
        <div class="notice-track">
            <span class="notice-text">
                ফল বাজার • তাজা ফল • দ্রুত ডেলিভারি • নিরাপদ অর্ডার • সারা দেশে ডেলিভারি
            </span>

            <span class="notice-text">
                ফল বাজার • তাজা ফল • দ্রুত ডেলিভারি
            </span>
        </div>
    </div>

    <button
        type="button"
        class="notice-close"
        id="noticeClose"
        aria-label="নোটিশ বন্ধ করুন"
    >
        ×
    </button>
</div>


{{-- =========================================================
     MAIN SITE HEADER
     ========================================================= --}}
<header class="site-header">
    <div class="container header-inner">

        {{-- MOBILE MENU BUTTON --}}
        <button
            class="menu-toggle"
            id="menuToggle"
            type="button"
            aria-label="মেনু খুলুন"
            aria-expanded="false"
            aria-controls="mobileDrawer"
        >
            <span aria-hidden="true">☰</span>
        </button>


        {{-- LOGO --}}
        <a
            href="{{ route('home') }}"
            class="logo"
            aria-label="ফল বাজার হোম"
        >
            <img
                src="https://demo.scaleuper.com/public/uploads/settings/1783100404-logo.webp"
                alt="ফল বাজার"
            >
        </a>


        {{-- HEADER ACTIONS --}}
        <div class="header-actions">

            {{-- CART --}}
            <a
                class="cart-btn"
                href="{{ route('cart') }}"
                aria-label="কার্ট"
            >
                <span
                    class="cart-amount"
                    id="cartAmount"
                >
                    0৳
                </span>

                <span aria-hidden="true">
                    🛍
                </span>

                <span
                    class="cart-count"
                    id="cartQty"
                    aria-label="কার্টে পণ্যের সংখ্যা"
                >
                    0
                </span>
            </a>


            {{-- PROFILE --}}
            <a
                class="profile-btn fb-desktop-only"
                href="{{ route('login') }}"
                aria-label="আমার অ্যাকাউন্ট"
            >
                <svg
                    viewBox="0 0 24 24"
                    width="21"
                    height="21"
                    aria-hidden="true"
                    focusable="false"
                >
                    <circle cx="12" cy="8" r="4" fill="none" stroke="currentColor" stroke-width="2"/>
                    <path d="M4.5 20c.9-4 3.4-6 7.5-6s6.6 2 7.5 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                </svg>
            </a>


            {{-- TRACK ORDER --}}
            <a
                class="btn-track fb-desktop-only"
                href="{{ route('track') }}"
            >
                Track Order
            </a>

        </div>

    </div>

    {{-- MOBILE SEARCH
         Kept outside .header-inner so the mobile header has a stable
         first row (menu / logo / cart) and a separate full-width search row. --}}
    <div class="mobile-search header-search">
        <form
            action="{{ route('shop') }}"
            method="get"
            role="search"
        >
            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                id="mobileSearchInput"
                placeholder="পণ্য খুঁজুন..."
                aria-label="পণ্য খুঁজুন"
                autocomplete="off"
            >
        </form>
    </div>
</header>


{{-- =========================================================
     MOBILE NAV OVERLAY
     ========================================================= --}}
<div
    class="fb-nav-overlay"
    id="mobileNavOverlay"
    hidden
    aria-hidden="true"
></div>


{{-- =========================================================
     MOBILE DRAWER
     ========================================================= --}}
<aside
    class="fb-mobile-drawer"
    id="mobileDrawer"
    aria-hidden="true"
    aria-label="মোবাইল মেনু"
>

    {{-- DRAWER HEADER --}}
    <div class="fb-drawer-head">

        <strong>
            ফল বাজার
        </strong>

        <button
            type="button"
            id="drawerClose"
            aria-label="মেনু বন্ধ করুন"
        >
            ×
        </button>

    </div>


    {{-- DRAWER LINKS --}}
    <div class="fb-drawer-links">

        {{-- HOME --}}
        <a href="{{ route('home') }}">
            <span aria-hidden="true">⌂</span>
            <span>হোম</span>
        </a>


        {{-- ALL PRODUCTS --}}
        <a href="{{ route('shop') }}">
            <span aria-hidden="true">🛍</span>
            <span>সব পণ্য</span>
        </a>


        {{-- WISHLIST --}}
        <a href="{{ route('wishlist') }}">
            <span aria-hidden="true">♡</span>
            <span>আমার পছন্দ</span>
        </a>


        {{-- TRACK ORDER --}}
        <a href="{{ route('track') }}">
            <span aria-hidden="true">📦</span>
            <span>অর্ডার ট্র্যাক করুন</span>
        </a>


        {{-- CART --}}
        <a href="{{ route('cart') }}">
            <span aria-hidden="true">🛒</span>
            <span>কার্ট</span>
        </a>


        {{-- ACCOUNT --}}
        <a href="{{ route('login') }}">
            <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" focusable="false">
                <circle cx="12" cy="8" r="4" fill="none" stroke="currentColor" stroke-width="2"/>
                <path d="M4.5 20c.9-4 3.4-6 7.5-6s6.6 2 7.5 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
            <span>আমার অ্যাকাউন্ট</span>
        </a>


        {{-- DIVIDER --}}
        <div class="fb-drawer-divider"></div>


        {{-- CATEGORY TITLE --}}
        <strong class="fb-drawer-label">
            ক্যাটাগরি
        </strong>


        {{-- ALL CATEGORIES --}}
        @foreach(($categories ?? collect()) as $category)

            <a
                href="{{ route('shop', ['category' => $category->slug]) }}"
            >
                <span aria-hidden="true">🍎</span>
                <span>{{ $category->name }}</span>
            </a>

        @endforeach


        {{-- DIVIDER --}}
        <div class="fb-drawer-divider"></div>


        {{-- COMPLAINT --}}
        <a href="{{ route('complaint') }}">
            <span aria-hidden="true">⚠️</span>
            <span>কমপ্লেইন করুন</span>
        </a>

    </div>

</aside>
