@extends('layouts.app')
@section('title','সব পণ্য — ফল বাজার')
@section('content')
<div class="shop-page-wrapper shop-page-modern">
  <div class="container">
    <div class="shop-page-toolbar">
      <div class="shop-breadcrumb"><a href="{{ route('home') }}">⌂</a><span>/</span><strong>সব পণ্য</strong>@if($search)<span>/</span><span>“{{ $search }}”</span>@endif</div>
      <span class="shop-result-count">{{ $products->count() }}টি পণ্য</span>
    </div>

    <div class="shop-mobile-filter-bar">
      <button type="button" id="shopMobileFilterToggle" class="shop-mobile-filter-toggle" aria-expanded="false" aria-controls="shopModernSidebar">
        <span aria-hidden="true">☰</span>
        <span>ফিল্টার</span>
      </button>
      <span class="shop-mobile-filter-hint">ক্যাটাগরি, দাম ও সাজানোর অপশন</span>
    </div>

    <div class="shop-modern-layout">
      <div class="shop-mobile-filter-overlay" id="shopMobileFilterOverlay" hidden></div>
      <aside class="shop-modern-sidebar" id="shopModernSidebar" aria-label="পণ্য ফিল্টার">
        <div class="shop-modern-sidebar-head">
          <strong>ফিল্টার</strong>
          <a href="{{ route('shop') }}">রিসেট</a>
        </div>

        <form method="get" class="shop-modern-filter-form">
          <div class="shop-filter-section">
            <h3>ক্যাটাগরি</h3>
            <label class="shop-cat-option">
              <input type="radio" name="category" value="" @checked(!$selectedCategory)>
              <span>সব পণ্য</span>
            </label>
            @foreach($categories as $c)
              <label class="shop-cat-option">
                <input type="radio" name="category" value="{{ $c->slug }}" @checked($selectedCategory===$c->slug)>
                <span>{{ $c->name }}</span>
              </label>
            @endforeach
          </div>

          <div class="shop-filter-section">
            <h3>পণ্য খুঁজুন</h3>
            <input class="shop-modern-input" name="search" value="{{ $search }}" placeholder="পণ্য খুঁজুন...">
          </div>

          <div class="shop-filter-section">
            <h3>দামের পরিসর</h3>
            <div class="shop-price-row">
              <input class="shop-modern-input" name="min_price" type="number" min="0" value="{{ $minPrice }}" placeholder="সর্বনিম্ন">
              <input class="shop-modern-input" name="max_price" type="number" min="0" value="{{ $maxPrice }}" placeholder="সর্বোচ্চ">
            </div>
          </div>

          <div class="shop-filter-section">
            <h3>সাজান</h3>
            <select class="shop-modern-input" name="sort">
              <option value="newest" @selected($sort==='newest')>নতুন আগে</option>
              <option value="popular" @selected($sort==='popular')>জনপ্রিয়</option>
              <option value="price_asc" @selected($sort==='price_asc')>দাম: কম → বেশি</option>
              <option value="price_desc" @selected($sort==='price_desc')>দাম: বেশি → কম</option>
              <option value="name" @selected($sort==='name')>নাম অনুযায়ী</option>
            </select>
          </div>

          <label class="shop-discount-option">
            <input type="checkbox" name="discounted" value="1" @checked($discounted)>
            <span>শুধু ডিসকাউন্ট পণ্য</span>
          </label>

          <button type="submit" class="shop-filter-submit">ফিল্টার প্রয়োগ করুন</button>
        </form>
      </aside>

      <main class="shop-modern-results">
        <div class="shop-results-top">
          <div>
            <span class="shop-page-kicker">ফল বাজার</span>
            <h1>সকল পণ্য</h1>
          </div>
          <span>{{ $products->count() }}টি পণ্য</span>
        </div>

        @if($products->count())
          <div class="product-grid shop-product-grid">
            @foreach($products as $p)
              @include('partials.product-card',['p'=>$p])
            @endforeach
          </div>
        @else
          <div class="shop-empty">
            <h3>কোনো পণ্য পাওয়া যায়নি</h3>
            <p>আপনার নির্বাচিত ফিল্টারের সাথে মিলে এমন কোনো পণ্য নেই।</p>
            <a class="btn-order" href="{{ route('shop') }}">ফিল্টার রিসেট করুন</a>
          </div>
        @endif
      </main>
    </div>
  </div>
</div>
@endsection
