@extends('layouts.app')

@section('title', $product->name . ' — ফল বাজার')

@section(
    'description',
    \Illuminate\Support\Str::limit(
        strip_tags($product->description),
        155
    )
)

@section('canonical')
    <link rel="canonical" href="{{ route('product', $product->slug) }}">
@endsection

@section('content')

<div class="product-details-container">

    @php
        $gallery = array_values(
            array_filter(
                array_merge(
                    [$product->image_url],
                    $product->gallery_urls ?? []
                )
            )
        );
    @endphp

    <nav class="product-breadcrumb">
        <a href="{{ route('home') }}">হোম</a>
        <span>/</span>

        <a href="{{ route('shop', ['category' => $product->category?->slug]) }}">
            {{ $product->category?->name }}
        </a>

        <span>/</span>

        <strong>{{ $product->name }}</strong>
    </nav>

    <div class="product-detail">

        {{-- Product Gallery --}}
        <div class="media-gallery">

            <div class="main-image-wrapper">
                <img
                    id="productMainImage"
                    src="{{ $gallery[0] ?? asset('uploads/100-removebg-preview.png') }}"
                    alt="{{ $product->name }}"
                >
            </div>

            <div class="thumbnails-row">
                @foreach($gallery as $i => $img)

                    <button
                        type="button"
                        class="product-thumb-select"
                        data-gallery="{{ $i }}"
                    >
                        <img
                            src="{{ $img }}"
                            alt="{{ $product->name }}"
                        >
                    </button>

                @endforeach
            </div>

        </div>


        {{-- Product Information --}}
        <div class="product-info-column">

            <div class="product-category-label">
                {{ $product->category?->name }}
            </div>

            <h1 class="product-detail-title">
                {{ $product->name }}
            </h1>

            <div class="product-rating">
                ★★★★★
                <span>(0 রিভিউ)</span>
            </div>

            <div class="product-detail-price">

                <span id="productPrice">
                    {{ number_format((float) $product->price, 0) }}৳
                </span>

                @if($product->old_price)
                    <del>
                        {{ number_format((float) $product->old_price, 0) }}৳
                    </del>
                @endif

            </div>

            <div class="product-detail-short">
                {!! nl2br(e($product->description)) !!}
            </div>


            {{-- Product Variants --}}
            @if($product->variants->count())

                <label class="auth-label">
                    প্যাকেজ
                </label>

                <select
                    id="productVariant"
                    class="auth-input"
                >

                    @foreach($product->variants as $v)

                        <option
                            value="{{ $v->id }}"
                            data-price="{{ $v->price }}"
                            data-stock="{{ $v->stock_quantity }}"
                        >
                            {{ $v->label }}
                            —
                            {{ number_format((float) $v->price, 0) }}৳
                        </option>

                    @endforeach

                </select>

            @endif


            {{-- Product Actions --}}
            <div class="product-detail-actions">

                <div class="qty-box">

                    <button
                        type="button"
                        data-qty-minus
                    >
                        −
                    </button>

                    <input
                        id="productQty"
                        type="number"
                        min="1"
                        max="{{ max(1, (int) $product->stock_quantity) }}"
                        value="1"
                        @disabled((int) $product->stock_quantity === 0)
                    >

                    <button
                        type="button"
                        data-qty-plus
                    >
                        +
                    </button>

                </div>


                <button
                    class="btn-order"
                    id="addProductToCart"
                    type="button"
                    @disabled((int) $product->stock_quantity === 0)
                >
                    {{ (int) $product->stock_quantity === 0 ? 'স্টক নেই' : 'কার্টে যোগ করুন' }}
                </button>


                <button
                    class="btn-all-product-load-more"
                    type="button"
                    data-quick-order
                    data-product='@json($product, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP|JSON_HEX_TAG)'
                >
                    এখনই অর্ডার
                </button>

            </div>


            {{-- Stock Status --}}
            <p class="stock-status">

                @if((int) $product->stock_quantity === 0)

                    স্টক শেষ

                @elseif((int) $product->stock_quantity <= 5)

                    মাত্র {{ $product->stock_quantity }}টি বাকি আছে

                @else

                    স্টকে আছে

                @endif

            </p>


            {{-- Share --}}
            <div class="product-wishlist-row">
                <button
                    type="button"
                    class="product-wishlist-btn product-wishlist-detail"
                    data-wishlist-product="{{ $product->id }}"
                    aria-label="পছন্দের তালিকায় যোগ করুন"
                >
                    <span aria-hidden="true">♡</span>
                    <span>পছন্দের তালিকায়</span>
                </button>
            </div>

            <div class="share-row">

                <b>Share:</b>

                <button
                    type="button"
                    data-share="facebook"
                >
                    Facebook
                </button>

                <button
                    type="button"
                    data-share="whatsapp"
                >
                    WhatsApp
                </button>

                <button
                    type="button"
                    data-copy-share
                >
                    লিংক কপি
                </button>

                <span id="shareMsg"></span>

            </div>

        </div>

    </div>


    {{-- Reviews --}}
    <section
        class="fb-review-box"
        id="reviews-section"
    >

        <div class="fb-section-head">

            <h2>
                Customer Reviews
            </h2>

            <button
                class="btn-all-product-load-more"
                type="button"
                id="openReview"
            >
                রিভিউ লিখুন
            </button>

        </div>


        <div class="review-summary">

            <strong id="avgRating">
                0.0
            </strong>

            <span>
                ★★★★★
            </span>

            <small id="reviewTotal">
                0টি রিভিউ
            </small>

        </div>


        <div id="reviewList">

            <div class="fb-empty">
                এখনো কোনো রিভিউ নেই।
            </div>

        </div>

    </section>


    {{-- Related Products --}}
    @if($related->count())

        <section class="product-section">

            <div class="container">

                <div class="section-header">

                    <h2 class="section-title">
                        সম্পর্কিত পণ্য
                    </h2>

                </div>


                <div class="product-grid">

                    @foreach($related as $p)

                        @include(
                            'partials.product-card',
                            ['p' => $p]
                        )

                    @endforeach

                </div>

            </div>

        </section>

    @endif

</div>


{{-- Review Modal --}}
<div
    class="fb-modal"
    id="reviewModal"
    hidden
>

    <div class="fb-modal-box">

        <button
            class="fb-modal-close"
            data-close-modal
        >
            ×
        </button>

        <h2>
            রিভিউ লিখুন
        </h2>


        <form id="reviewForm">

            <input
                name="name"
                placeholder="আপনার নাম"
                required
            >


            <select name="rating">

                <option value="5">
                    ★★★★★
                </option>

                <option value="4">
                    ★★★★
                </option>

                <option value="3">
                    ★★★
                </option>

                <option value="2">
                    ★★
                </option>

                <option value="1">
                    ★
                </option>

            </select>


            <textarea
                name="comment"
                rows="4"
                placeholder="আপনার মতামত"
                required
            ></textarea>


            <button
                class="btn-order"
                type="submit"
            >
                জমা দিন
            </button>

        </form>

    </div>

</div>

@endsection


@push('scripts')

<script>
    window.FOL_PRODUCT = @json(
        $product,
        JSON_HEX_APOS |
        JSON_HEX_QUOT |
        JSON_HEX_AMP |
        JSON_HEX_TAG
    );

    window.FOL_GALLERY = @json($gallery);

    window.FOL_PRODUCT_KEY = '{{ $product->id }}';
</script>

@endpush