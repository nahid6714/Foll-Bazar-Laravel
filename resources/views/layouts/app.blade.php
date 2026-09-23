<!doctype html>
<html lang="bn">
<head>
    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width,initial-scale=1,maximum-scale=5,viewport-fit=cover"
    >

    <title>@yield('title','ফল বাজার')</title>

    <meta
        name="description"
        content="@yield('description','ফল বাজার — তাজা ফল, সহজ অর্ডার ও দ্রুত ডেলিভারি।')"
    >

    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('canonical')

    <link
        rel="icon"
        href="{{ asset('uploads/100-removebg-preview.png') }}"
    >

    {{-- =========================================================
         MAIN STYLESHEET
         app.css is the consolidated stylesheet.
         Duplicate style.css / inline-styles.css / site-fixes.css
         are intentionally not loaded here.
         ========================================================= --}}

    <link
        rel="stylesheet"
        href="{{ asset('assets/css/app.css') }}"
    >

    {{-- Laravel page/reference UI styles --}}
    <link
        rel="stylesheet"
        href="{{ asset('assets/css/laravel-ui-reference.css') }}"
    >

    <style>
        [x-cloak] {
            display: none !important;
        }

        .fb-page-shell {
            min-height: 60vh;
        }

        .fb-loading {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 70px 20px;
            color: #6b7280;
        }

        .fb-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .fb-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,.04);
        }

        .fb-card img {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
        }

        .fb-card-body {
            padding: 13px;
        }

        .fb-card-title {
            font-weight: 700;
            margin: 0 0 7px;
        }

        .fb-price {
            font-weight: 800;
            color: #df2d4d;
            font-size: 18px;
        }

        .fb-old {
            color: #9ca3af;
            text-decoration: line-through;
            font-size: 13px;
            margin-left: 7px;
        }

        .fb-btn {
            border: 0;
            border-radius: 9px;
            padding: 10px 14px;
            background: #df2d4d;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            display: inline-block;
            text-decoration: none;
        }

        .fb-btn.secondary {
            background: #f3f4f6;
            color: #374151;
        }

        .fb-actions {
            display: flex;
            gap: 8px;
            margin-top: 10px;
            flex-wrap: wrap;
        }

        .fb-form {
            max-width: 650px;
            margin: 30px auto;
            padding: 22px;
            background: #fff;
            border-radius: 14px;
            border: 1px solid #eee;
        }

        .fb-form label {
            display: block;
            font-weight: 600;
            margin: 12px 0 6px;
        }

        .fb-form input,
        .fb-form textarea,
        .fb-form select {
            width: 100%;
            padding: 11px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
        }

        .fb-msg {
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
        }

        .fb-msg.error {
            background: #fee2e2;
            color: #991b1b;
        }

        .fb-msg.ok {
            background: #dcfce7;
            color: #166534;
        }

        .fb-section {
            padding: 20px 0;
        }

        .fb-section-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 14px;
        }

        .fb-section-head h2 {
            font-size: 24px;
            font-weight: 800;
            margin: 0;
        }

        .fb-category-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 12px;
        }

        .fb-category {
            display: block;
            text-align: center;
            text-decoration: none;
            color: inherit;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 10px;
        }

        .fb-category img {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 10px;
        }

        .fb-category span {
            display: block;
            font-weight: 700;
            margin-top: 7px;
        }

        .fb-hero {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
        }

        .fb-hero img {
            width: 100%;
            max-height: 430px;
            object-fit: cover;
            border-radius: 14px;
        }

        .fb-promo {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .fb-promo img {
            width: 100%;
            border-radius: 14px;
        }

        .fb-detail {
            display: grid;
            grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
            gap: 30px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 20px;
        }

        .fb-gallery {
            display: grid;
            grid-template-columns: 80px 1fr;
            gap: 12px;
        }

        .fb-thumbs {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .fb-thumbs button {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 8px;
            padding: 3px;
            cursor: pointer;
        }

        .fb-thumbs img {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 6px;
        }

        .fb-main-image {
            width: 100%;
            aspect-ratio: 1;
            object-fit: contain;
            border-radius: 12px;
            background: #fafafa;
        }

        .fb-empty {
            padding: 45px 20px;
            text-align: center;
            color: #6b7280;
        }

        .fb-toast {
            position: fixed;
            right: 18px;
            bottom: 18px;
            z-index: 9999;
            background: #222;
            color: #fff;
            padding: 12px 16px;
            border-radius: 10px;
            display: none;
        }

        .fb-toast.show {
            display: block;
        }

        @media (max-width: 900px) {
            .fb-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .fb-category-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .fb-detail {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 520px) {
            .fb-grid {
                gap: 10px;
            }

            .fb-card-body {
                padding: 9px;
            }

            .fb-card-title {
                font-size: 14px;
            }

            .fb-category-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 8px;
            }

            .fb-promo {
                grid-template-columns: 1fr;
            }

            .fb-gallery {
                grid-template-columns: 60px 1fr;
            }

            .fb-section-head h2 {
                font-size: 20px;
            }
        }
    </style>

    @stack('head')

    {{-- =========================================================
         HERO / PRODUCT / CHECKOUT / CHAT STYLES
         ========================================================= --}}

    <style>
        .fb-hero-slider {
            position: relative;
            overflow: hidden;
            border-radius: 14px;
            margin: 16px 0;
        }

        .fb-hero-track {
            display: flex;
            transition: transform .45s ease;
        }

        .fb-hero-slide {
            min-width: 100%;
        }

        .fb-hero-slide img {
            width: 100%;
            height: min(430px,52vw);
            min-height: 210px;
            object-fit: cover;
            display: block;
        }

        .fb-hero-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border: 0;
            border-radius: 50%;
            background: rgba(0,0,0,.45);
            color: #fff;
            font-size: 30px;
            cursor: pointer;
            z-index: 2;
        }

        .fb-hero-prev {
            left: 12px;
        }

        .fb-hero-next {
            right: 12px;
        }

        .fb-hero-dots {
            position: absolute;
            left: 50%;
            bottom: 12px;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
        }

        .fb-hero-dot {
            width: 9px;
            height: 9px;
            border-radius: 50%;
            border: 0;
            background: rgba(255,255,255,.65);
            padding: 0;
        }

        .fb-hero-dot.active {
            background: #df2d4d;
        }

        .fb-features {
            display: grid;
            grid-template-columns: repeat(4,1fr);
            gap: 10px;
            margin: 16px 0;
        }

        .fb-features > div {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 13px;
            text-align: center;
        }

        .fb-features small,
        .fb-features b {
            display: block;
        }

        .fb-features small {
            color: #777;
            margin-top: 3px;
        }

        .fb-countdown {
            display: flex;
            gap: 5px;
        }

        .fb-countdown span {
            background: #111827;
            color: #fff;
            border-radius: 7px;
            padding: 5px 8px;
            text-align: center;
            min-width: 46px;
        }

        .fb-countdown b,
        .fb-countdown small {
            display: block;
        }

        .fb-countdown small {
            font-size: 9px;
            color: #ddd;
        }

        .fb-filter-card {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1fr auto auto auto;
            gap: 9px;
            padding: 14px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            margin-bottom: 18px;
        }

        .fb-filter-card input,
        .fb-filter-card select {
            min-width: 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .filter-check {
            display: flex;
            gap: 5px;
            align-items: center;
            font-size: 13px;
            white-space: nowrap;
        }

        .fb-float-heart {
            position: absolute;
            top: 10px;
            right: 10px;
            border: 0;
            background: #fff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            box-shadow: 0 2px 8px rgba(0,0,0,.15);
            font-size: 20px;
            cursor: pointer;
        }

        .qty-box {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .qty-box button {
            width: 32px;
            height: 32px;
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 7px;
            font-weight: 800;
            cursor: pointer;
        }

        .qty-box input {
            width: 55px;
            text-align: center;
            padding: 7px;
            border: 1px solid #ddd;
            border-radius: 7px;
        }

        .share-row {
            display: flex;
            align-items: center;
            gap: 7px;
            flex-wrap: wrap;
            margin-top: 18px;
        }

        .share-row button {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 7px;
            padding: 6px 9px;
            cursor: pointer;
        }

        .fb-rating {
            margin: 12px 0;
            color: #f59e0b;
        }

        .fb-rating span {
            color: #777;
            font-size: 12px;
        }

        .fb-review-box {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 16px;
            padding: 20px;
            margin-top: 22px;
        }

        .review-summary {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #fafafa;
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .review-summary strong {
            font-size: 34px;
        }

        .review-summary span {
            color: #f59e0b;
        }

        .review-summary small {
            color: #777;
        }

        .review-item {
            padding: 13px 0;
            border-bottom: 1px solid #eee;
        }

        .review-item > div {
            color: #f59e0b;
        }

        .fb-checkout-grid {
            display: grid;
            grid-template-columns: minmax(0,1fr) 320px;
            gap: 20px;
            align-items: start;
        }

        .fb-order-summary {
            position: sticky;
            top: 15px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 14px;
            padding: 18px;
        }

        .fb-order-summary div {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
        }

        .fb-two {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .payment-options {
            display: grid;
            gap: 8px;
        }

        .payment-card {
            display: flex !important;
            gap: 10px;
            align-items: flex-start;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 10px;
            cursor: pointer;
        }

        .payment-card small {
            display: block;
            color: #777;
            margin-top: 3px;
        }

        .fb-modal {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.55);
            z-index: 99999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 15px;
        }

        .fb-modal[hidden] {
            display: none;
        }

        .fb-modal-box {
            position: relative;
            background: #fff;
            border-radius: 15px;
            padding: 22px;
            max-width: 600px;
            width: 100%;
            max-height: 92vh;
            overflow: auto;
        }

        .fb-modal-close {
            position: absolute;
            right: 12px;
            top: 10px;
            width: 32px;
            height: 32px;
            border: 0;
            border-radius: 50%;
            background: #f3f4f6;
            font-size: 22px;
            cursor: pointer;
        }

        .fb-modal-box h2 {
            margin-top: 0;
        }

        .quick-product {
            display: flex;
            gap: 12px;
            align-items: center;
            background: #fafafa;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 12px;
        }

        .quick-product img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
        }

        .fb-live-chat {
            position: fixed;
            right: 18px;
            bottom: 85px;
            z-index: 9000;
        }

        .fb-live-chat a {
            display: flex;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            background: #25d366;
            color: #fff;
            text-decoration: none;
            font-size: 25px;
            box-shadow: 0 5px 18px rgba(0,0,0,.2);
        }

        .cart-row {
            display: flex;
            gap: 14px;
            padding: 12px;
            margin-bottom: 10px;
            align-items: center;
        }

        .cart-row > img {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cart-total {
            text-align: right;
            padding: 18px;
        }

        .track-stages {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
            margin: 14px 0;
        }

        .track-stages span {
            padding: 7px 9px;
            border-radius: 8px;
            background: #f3f4f6;
            font-size: 12px;
        }

        .track-stages span.done {
            background: #dcfce7;
            color: #166534;
        }

        .fb-modal-open {
            overflow: hidden;
        }

        @media (max-width: 900px) {
            .fb-features {
                grid-template-columns: repeat(2,1fr);
            }

            .fb-filter-card {
                grid-template-columns: 1fr 1fr;
            }

            .fb-checkout-grid {
                grid-template-columns: 1fr;
            }

            .fb-order-summary {
                position: static;
            }
        }

        @media (max-width: 600px) {
            .fb-filter-card {
                grid-template-columns: 1fr;
            }

            .fb-two {
                grid-template-columns: 1fr;
            }

            .fb-hero-slide img {
                height: 58vw;
            }

            .fb-features {
                gap: 7px;
            }

            .fb-features > div {
                padding: 9px;
                font-size: 13px;
            }

            .fb-countdown {
                gap: 2px;
            }

            .fb-countdown span {
                min-width: 38px;
                padding: 4px;
            }

            .cart-row {
                align-items: flex-start;
            }

            .cart-row > img {
                width: 70px;
                height: 70px;
            }
        }
    </style>

    {{-- =========================================================
         CHAT WIDGET
         ========================================================= --}}

    <style>
        #fbChatWidget {
            position: fixed;
            right: 18px;
            bottom: 145px;
            z-index: 9500;
        }

        #fbChatOpen {
            width: 52px;
            height: 52px;
            border: 0;
            border-radius: 50%;
            background: #df2d4d;
            color: #fff;
            font-size: 25px;
            cursor: pointer;
            box-shadow: 0 7px 22px rgba(0,0,0,.25);
        }

        #fbChatPanel {
            position: absolute;
            right: 0;
            bottom: 62px;
            width: 340px;
            background: #fff;
            border: 1px solid #eee;
            border-radius: 15px;
            box-shadow: 0 15px 45px rgba(0,0,0,.2);
            overflow: hidden;
        }

        .fb-chat-head {
            background: #df2d4d;
            color: #fff;
            padding: 12px 14px;
            display: flex;
            justify-content: space-between;
        }

        .fb-chat-head button {
            border: 0;
            background: transparent;
            color: #fff;
            font-size: 22px;
        }

        .fb-chat-messages {
            height: 240px;
            overflow: auto;
            padding: 12px;
            background: #fafafa;
        }

        .fb-chat-messages > div {
            padding: 8px 10px;
            border-radius: 10px;
            margin: 6px 0;
            max-width: 88%;
            font-size: 13px;
        }

        .fb-chat-messages .bot {
            background: #fff;
            border: 1px solid #eee;
        }

        .fb-chat-messages .user {
            background: #fee2e2;
            margin-left: auto;
        }

        .fb-chat-quick {
            display: flex;
            gap: 5px;
            flex-wrap: wrap;
            padding: 8px;
            border-top: 1px solid #eee;
        }

        .fb-chat-quick button {
            border: 1px solid #ddd;
            background: #fff;
            border-radius: 15px;
            padding: 5px 8px;
            font-size: 11px;
        }

        .fb-chat-quick button:hover {
            border-color: #df2d4d;
            background: #fff7f8;
        }

        .fb-chat-faq-title {
            width: 100%;
            color: #6b7280;
            font-size: 11px;
            font-weight: 800;
            margin-bottom: 2px;
        }

        .fb-chat-quick button {
            width: 100%;
            text-align: left;
            cursor: pointer;
            font-family: inherit;
        }

        .fb-chat-whatsapp {
            display: block;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
            text-decoration: none;
            border-radius: 10px;
            padding: 9px 10px;
            background: #20c76b;
            color: #fff;
            font-size: 12px;
            font-weight: 800;
        }

        .fb-chat-form,
        #fbChatForm {
            display: flex;
            border-top: 1px solid #eee;
        }

        #fbChatForm input {
            flex: 1;
            border: 0;
            padding: 11px;
            outline: 0;
        }

        #fbChatForm button {
            border: 0;
            background: #df2d4d;
            color: #fff;
            width: 48px;
        }

        @media (max-width: 500px) {
            #fbChatPanel {
                width: calc(100vw - 30px);
                right: -3px;
            }
        }
    </style>
</head>

<body class="@yield('body_class','app-home')">

    <div class="site-wrapper">

        {{-- Header --}}
        @include('partials.header')

        {{-- Main content --}}
        <main
            class="app-main fb-page-shell"
            style="flex:1"
        >
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')

        {{-- Toast --}}
        <div id="fbToast" class="fb-toast"></div>

        {{-- =====================================================
             QUICK ORDER MODAL
             ===================================================== --}}

        <div
            class="fb-modal"
            id="quickOrderModal"
            hidden
        >
            <div class="fb-modal-box">

                <button
                    class="fb-modal-close"
                    data-close-modal
                >
                    ×
                </button>

                <h2>⚡ দ্রুত অর্ডার</h2>

                <div class="quick-product">
                    <img
                        id="quickOrderImage"
                        src="{{ asset('uploads/100-removebg-preview.png') }}"
                        alt=""
                    >

                    <div>
                        <b id="quickOrderName"></b>
                        <div
                            id="quickOrderPrice"
                            class="fb-price"
                        ></div>
                    </div>
                </div>

                <form id="quickOrderForm">

                    <input
                        type="hidden"
                        name="quantity"
                        id="quickOrderQty"
                        value="1"
                    >

                    <label>নাম</label>
                    <input
                        name="customer_name"
                        required
                    >

                    <label>মোবাইল</label>
                    <input
                        name="customer_phone"
                        required
                    >

                    <label>সম্পূর্ণ ডেলিভারি ঠিকানা</label>
                    <textarea
                        name="address"
                        required
                        rows="3"
                    ></textarea>

                    <label>ডেলিভারি</label>

                    <select name="shipping_method">
                        <option value="dhaka">
                            ঢাকার ভিতরে — ৬০৳
                        </option>

                        <option value="outside">
                            ঢাকার বাইরে — ১২০৳
                        </option>
                    </select>

                    <label>নোট</label>

                    <textarea
                        name="order_note"
                        rows="2"
                    ></textarea>

                    <div id="quickOrderMsg"></div>

                    <button
                        class="fb-btn"
                        style="width:100%"
                    >
                        অর্ডার করুন
                    </button>

                </form>

            </div>
        </div>

        {{-- =====================================================
             CHAT WIDGET
             ===================================================== --}}

        <div id="fbChatWidget">

            <div
                id="fbChatPanel"
                hidden
            >

                <div class="fb-chat-head">

                    <b>
                        ফল বাজার সহায়তা
                    </b>

                    <button
                        type="button"
                        id="fbChatClose"
                    >
                        ×
                    </button>

                </div>

                <div
                    id="fbChatMessages"
                    class="fb-chat-messages"
                >

                    <div class="bot">
                        স্বাগতম! 👋 অর্ডার, ডেলিভারি, পেমেন্ট বা কমপ্লেইন সম্পর্কে প্রশ্ন করুন।
                    </div>

                </div>

                <div class="fb-chat-quick">
                    <div class="fb-chat-faq-title">সাধারণ প্রশ্ন</div>

                    <button type="button" data-chat="track">
                        📦 আমার অর্ডার কীভাবে ট্র্যাক করব?
                    </button>

                    <button type="button" data-chat="delivery">
                        🚚 ডেলিভারি চার্জ কত?
                    </button>

                    <button type="button" data-chat="payment">
                        💳 কী কী পেমেন্ট করা যায়?
                    </button>

                    <button type="button" data-chat="complaint">
                        ⚠️ পণ্য নিয়ে সমস্যা হলে কী করব?
                    </button>

                    <a class="fb-chat-whatsapp" href="https://wa.me/8801810502120" target="_blank" rel="noopener">
                        💬 WhatsApp-এ যোগাযোগ করুন
                    </a>
                </div>

                <form id="fbChatForm">

                    <input
                        id="fbChatInput"
                        placeholder="আপনার প্রশ্ন লিখুন..."
                        autocomplete="off"
                    >

                    <button>
                        ➤
                    </button>

                </form>

            </div>

            <button
                id="fbChatOpen"
                aria-label="সাপোর্ট চ্যাট"
            >
                💬
            </button>

        </div>



        {{-- =====================================================
             GLOBAL JS CONFIG
             ===================================================== --}}

        <script>
            window.FOL_BAZAR = {
                api: @json(url('/api')),
                asset: @json(asset(''))
            };
        </script>

        <script
            src="{{ asset('assets/js/fol-bazar.js') }}"
            defer
        ></script>

        @stack('scripts')

    </div>

</body>
</html>