@extends('layouts.app')
@section('title','ফল বাজার — তাজা ফল ও দ্রুত ডেলিভারি')
@section('content')
<div class="home-page">
  <section class="fb-hero-banner" aria-label="হিরো ব্যানার">
    <div class="fb-hero-slider" id="fbHeroSlider">
      <div class="fb-hero-track">
        @forelse($heroBanners as $i=>$b)
          <div class="fb-hero-slide">
            <a href="{{ $b->link_url ?: '#' }}" class="fb-hero-link">
              <span class="fb-hero-image-frame"><img src="{{ $b->image_url }}" alt="{{ $b->alt_text ?: $b->title ?: 'ফল বাজার' }}" class="fb-hero-img" loading="{{ $i===0?'eager':'lazy' }}"></span>
            </a>
          </div>
        @empty
          <div class="fb-hero-slide"><div class="fb-empty"><h1>ফল বাজার</h1><p>তাজা ফল, সহজ অর্ডার, দ্রুত ডেলিভারি।</p><a class="btn-order" href="{{ route('shop') }}">পণ্য দেখুন</a></div></div>
        @endforelse
      </div>
      @if($heroBanners->count()>1)
        <button class="fb-hero-nav fb-hero-prev" data-hero-prev aria-label="পূর্ববর্তী">‹</button>
        <button class="fb-hero-nav fb-hero-next" data-hero-next aria-label="পরবর্তী">›</button>
        <div class="fb-hero-dots">@foreach($heroBanners as $i=>$b)<button type="button" class="fb-hero-dot @if($i===0)active @endif" data-hero-dot="{{ $i }}" aria-label="ব্যানার {{ $i+1 }}"></button>@endforeach</div>
      @endif
    </div>
  </section>

  @if($categories->count())
  <section class="home-category-section" aria-label="পণ্য ক্যাটাগরি">
    <div class="container">
      <div class="home-category-heading">
        <div>
          <span class="home-category-kicker">ক্যাটাগরি</span>
          <h2>আপনার পছন্দের ফল বেছে নিন</h2>
        </div>
        <a href="{{ route('shop') }}">সব দেখুন <span aria-hidden="true">→</span></a>
      </div>
      <div class="home-category-chips">
        @foreach($categories as $category)
          <a class="home-category-chip" href="{{ route('shop',['category'=>$category->slug]) }}">
            <span class="home-category-chip-image">
              @if($category->image_url)
                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" loading="lazy">
              @else
                <span aria-hidden="true">🍎</span>
              @endif
            </span>
            <span class="home-category-chip-name">{{ $category->name }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  @if($flashProducts->count())
  <section class="flash-sale-section" id="flashSaleSection">
    <div class="container">
      <div class="flash-sale-head">
        <div class="flash-sale-heading"><span class="flash-sale-bolt">⚡</span><div class="flash-sale-heading-text"><h2>FLASH SALE</h2><p>ঝলমলে ছাড় — দ্রুত কিনুন!</p></div></div>
        <a href="#allProducts" class="flash-sale-viewall">সব দেখুন <i class="fas fa-arrow-right"></i></a>
        <div class="deal-countdown timer flash-sale-timer" data-end="{{ $flashSaleEndsAt }}">
          <div class="timer-box"><b data-days>00</b><small>দিন</small></div><span class="timer-colon">:</span>
          <div class="timer-box"><b data-hours>00</b><small>ঘণ্টা</small></div><span class="timer-colon">:</span>
          <div class="timer-box"><b data-minutes>00</b><small>মিনিট</small></div><span class="timer-colon">:</span>
          <div class="timer-box"><b data-seconds>00</b><small>সেকেন্ড</small></div>
        </div>
      </div>
      <div class="product-grid">@foreach($flashProducts as $p)@include('partials.product-card',['p'=>$p])@endforeach</div>
    </div>
  </section>
  @endif

  @if($promoBanners->count())<section class="promo-section"><div class="container"><a href="{{ $promoBanners[0]->link_url ?: '#' }}"><img src="{{ $promoBanners[0]->image_url }}" alt="{{ $promoBanners[0]->alt_text ?: 'প্রমো' }}"></a></div></section>@endif

  @if($hotProducts->count())
  <section class="hot-deal-section">
    <div class="container">
      <div class="hot-deal-header"><div class="hot-deal-title-wrap"><h2 class="hot-deal-title"><i class="fas fa-fire"></i><span>Hot Deal</span></h2><span class="hot-deal-subtitle">সেরা ডিল — সীমিত সময়ের জন্য!</span></div><a href="#allProducts" class="hot-deal-view-all"><span>সব দেখুন</span><i class="fas fa-arrow-right"></i></a></div>
      <div class="hot-deal-grid product-grid">@foreach($hotProducts as $p)@include('partials.product-card',['p'=>$p])@endforeach</div>
    </div>
  </section>
  @endif

  @if($promoBanners->count()>1)<section class="promo-section"><div class="container"><a href="{{ $promoBanners[1]->link_url ?: '#' }}"><img src="{{ $promoBanners[1]->image_url }}" alt="{{ $promoBanners[1]->alt_text ?: 'প্রমো' }}"></a></div></section>@endif

  @if($categories->count())
    @foreach($categories->take(2) as $category)
      @php($categoryProducts=$products->filter(fn($p)=>optional($p->category)->id===$category->id)->take(8))
      @if($categoryProducts->count())
      <section class="product-section">
        <div class="container">
          <div class="section-header"><h2 class="section-title">{{ $category->name }}</h2><a href="{{ route('shop',['category'=>$category->slug]) }}" class="section-view-all">সব দেখুন <i class="fas fa-arrow-right"></i></a></div>
          <div class="product-grid">@foreach($categoryProducts as $p)@include('partials.product-card',['p'=>$p])@endforeach</div>
        </div>
      </section>
      @endif
    @endforeach
  @endif

  @if($promoBanners->count()>2)<section class="promo-section"><div class="container"><a href="{{ $promoBanners[2]->link_url ?: '#' }}"><img src="{{ $promoBanners[2]->image_url }}" alt="{{ $promoBanners[2]->alt_text ?: 'প্রমো' }}"></a></div></section>@endif

  <section class="product-section" id="allProducts">
    <div class="container">
      <div class="section-header"><h2 class="section-title">সকল প্রোডাক্ট</h2><a href="{{ route('shop') }}" class="section-view-all">সব দেখুন <i class="fas fa-arrow-right"></i></a></div>
      @if($products->count())
        <div class="product-grid" id="all-product-grid">
          @foreach($products as $i=>$p)<div class="fb-load-item" @if($i>=10) style="display:none" @endif>@include('partials.product-card',['p'=>$p])</div>@endforeach
        </div>
        @if($products->count()>10)<div class="all-product-load-more"><button type="button" class="btn-all-product-load-more" id="loadMoreProducts" data-step="5">লোড মোর</button></div>@endif
      @else<div class="fb-empty">এখনো কোনো পণ্য পাওয়া যায়নি।</div>@endif
    </div>
  </section>

  @if($promoBanners->count()>3)<section class="promo-section"><div class="container"><a href="{{ $promoBanners[3]->link_url ?: '#' }}"><img src="{{ $promoBanners[3]->image_url }}" alt="{{ $promoBanners[3]->alt_text ?: 'প্রমো' }}"></a></div></section>@endif
</div>
@endsection
