<article class="product-card vom-card cursor-pointer" data-id="{{ $p->id }}" data-title="{{ $p->name }}" data-price="{{ $p->price }}" data-image="{{ $p->image_url }}">
  <a href="{{ route('product',$p->slug) }}" class="product-card-link">
    <div class="product-thumb">
      <button type="button" class="product-wishlist-btn" data-wishlist-product="{{ $p->id }}" aria-label="পছন্দের তালিকায় যোগ করুন">
        <span aria-hidden="true">♡</span>
      </button>
      @if($p->old_price && (float)$p->old_price > (float)$p->price)
        <span class="deal-badge">{{ round((((float)$p->old_price-(float)$p->price)/(float)$p->old_price)*100) }}% ছাড়</span>
      @endif
      @if((int)$p->stock_quantity===0)<span class="deal-badge" style="background:#6b7280">স্টক নেই</span>@endif
      <div><img src="{{ $p->image_url ?: asset('uploads/100-removebg-preview.png') }}" alt="{{ $p->name }}" class="product-thumb-img" loading="lazy"></div>
    </div>
    <div class="product-body">
      <h3 class="product-title"><span>{{ $p->name }}</span></h3>
      <p class="product-price">@if($p->old_price)<del>৳{{ number_format((float)$p->old_price,0) }}</del> @endif৳{{ number_format((float)$p->price,0) }}</p>
      <div class="product-stock" style="font-size:12px;color:#777">স্টক: {{ $p->stock_quantity }}</div>
    </div>
  </a>
  <div class="product-actions">
    <button type="button" class="btn-order vom-btn" data-quick-order data-product='@json($p, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP|JSON_HEX_TAG)' @disabled((int)$p->stock_quantity===0)>
      <span>{{ (int)$p->stock_quantity===0 ? 'স্টক নেই' : 'অর্ডার করুন' }}</span>
    </button>
    <button type="button" class="btn-cart add-to-cart" aria-label="কার্টে যোগ করুন" data-product='@json($p, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_HEX_AMP|JSON_HEX_TAG)' @disabled((int)$p->stock_quantity===0)>
      <svg viewBox="0 0 24 24" width="19" height="19" aria-hidden="true" focusable="false">
        <path d="M3 4h2l2.1 10.1a2 2 0 0 0 2 1.6h7.7a2 2 0 0 0 1.9-1.4L20.5 8H7" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"/>
        <circle cx="10" cy="20" r="1.5" fill="currentColor"/>
        <circle cx="18" cy="20" r="1.5" fill="currentColor"/>
      </svg>
    </button>
  </div>
</article>
