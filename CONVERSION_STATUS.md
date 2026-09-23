# Fol Bazar Laravel — Full Conversion Update

This build is based on the supplied original Next.js website and the Laravel v5 base.

## Included in this update
- Responsive hero slider: auto-advance, arrows, dots and touch swipe.
- Flash-sale countdown and flash-sale product section.
- Features/service bar and mobile bottom navigation.
- Homepage product load-more (10 initially, +5 per click).
- Shop search, category, price-range, discount and sorting filters.
- Product gallery, quantity controls, wishlist, quick order and social sharing.
- Browser-local customer reviews matching the original frontend behavior (the original source stored reviews only in component state; no reviews table existed in the supplied DB).
- Full checkout fields: division, district, upazila, address, delivery note, COD, bKash, Nagad, Rocket, ShurjoPay/card selection, sender phone and TrxID for MFS.
- Coupon validation using Laravel API.
- Order-success modal and order tracking stages.
- Complaint image upload to Laravel local `public` disk (`storage/app/public/complaints`).
- WhatsApp/live-support floating button.
- Existing Admin UI remains excluded; `/api/admin/*` remains available for the separate Admin App.
- Existing `foll_bazar` database is preserved; a conditional migration adds missing delivery fields to `orders`.

## Important payment note
ShurjoPay/card options are represented in the UI and stored as the selected payment method. A real payment-gateway transaction requires the gateway credentials/callback flow and is intentionally not fabricated here. COD and MFS order metadata are handled by the Laravel order API.

## Storage
Run `php artisan storage:link` once so local uploaded complaint/product/banner files are publicly accessible.

## Database
The database name remains `foll_bazar`. Do not run destructive migrations against the existing production database.

## v6 review (this upload) — great progress, 2 real bugs found & fixed
This version is a big step up: real hero slider (autoplay/swipe/dots), flash-sale
countdown, load-more, promo popup, order-success modal, a "quick order" (buy-now)
modal, product reviews (local), share buttons, and a simple FAQ chat widget were
all added — this directly closes most of the "not 100% converted" gaps flagged
earlier. Division/District/Upazila + delivery note fields were also added to
checkout, matching the original spec.

**Bugs found in this pass and fixed:**
1. **Guest coupon-apply was broken.** `/api/coupons/validate` was still registered
   only inside the `auth:sanctum`-protected route group, but the new checkout
   page's "Apply coupon" button is available to everyone, including guests (guest
   checkout is explicitly supported — `/api/orders` POST has no auth requirement).
   A logged-out customer clicking "Apply" would get an unauthenticated error and
   could never apply a coupon. Moved `/coupons/validate` to the public route
   section. (Order creation itself already re-validates the coupon server-side
   regardless, so this doesn't weaken anything — it just lets guests see the
   discount before submitting, same as they always could at final checkout.)
2. **Flash-sale countdown was hardcoded to a fixed date (2027-11-09)**, not tied
   to any real setting — so it wasn't a real countdown, just decoration that
   would show "300+ days" forever. Wired it to a new `flash_sale_ends_at` site
   setting (`SiteSetting`) with a sensible 24-hour-from-now fallback if that
   setting isn't configured, so admins can control it via the settings table/API
   and the number actually means something.

3. **Notice ticker's close (×) button did nothing.** The header's scrolling
   notice bar (matching the original site's `NoticeTicker` component) had a
   close button in the HTML and matching CSS (`.notice-ticker.is-hidden`,
   `body.notice-closed`) already prepared in the stylesheet, but nothing in
   `fol-bazar.js` ever wired the click. Added the handler — it now hides the
   ticker and remembers the choice for the browser session.

I also compared this build against your original Next.js source
(`Foll-bazar-website-main`) component by component. Everything with real
functionality there now has a Laravel equivalent: HeroSlider, FeaturesBar,
FlashSaleSection, HotDealSection, PromoSection/PromoPopup, NoticeTicker,
MobileCategoryScroll, MobileBottomNav, ProductCard, ProductDetailsView
(gallery/variants/reviews/share), CartOrderView, VomOrderModal (→ the
"quick order" modal), OrderSuccessModal, OrderTrackView, ComplaintView,
AuthView, SiteHeader/SiteFooter, and GccLiveChat (→ the FAQ chat widget +
WhatsApp button). `SnxPopup` in the original source is itself a disabled
no-op component (`return null`), so there's nothing to port there.
`HomeLoadingSkeleton` has no equivalent because this build renders pages
server-side in Blade — there's no client-side loading gap for it to fill.
