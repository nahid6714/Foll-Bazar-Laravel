<section class="features-bar">
  <div class="container features-grid">
    <div class="feature-item"><div class="feature-icon"><i class="fas fa-leaf"></i></div><div class="feature-text"><h4>খাঁটি অর্গানিক ফল</h4><p>প্রাকৃতিক ও নিরাপদ উপাদান।</p></div></div>
    <div class="feature-item"><div class="feature-icon"><i class="fas fa-truck-fast"></i></div><div class="feature-text"><h4>দ্রুত ডেলিভারি</h4><p>সারা দেশে দ্রুত পৌঁছে যায়।</p></div></div>
    <div class="feature-item"><div class="feature-icon"><i class="fas fa-shield-halved"></i></div><div class="feature-text"><h4>নিরাপদ পেমেন্ট</h4><p>সুরক্ষিত লেনদেন ব্যবস্থা।</p></div></div>
    <div class="feature-item"><div class="feature-icon"><i class="fas fa-headset"></i></div><div class="feature-text"><h4>সহজ সাপোর্ট</h4><p>দ্রুত সহায়তা সবসময় প্রস্তুত।</p></div></div>
  </div>
</section>
<footer class="site-footer">
  <div class="container footer-grid">
    <div class="footer-col">
      <div class="footer-logo"><a href="{{ route('home') }}"><img src="https://demo.scaleuper.com/public/uploads/settings/1783100466-footer.webp" alt="ফল বাজার"></a></div>
      <p class="footer-about">ফল বাজার হলো তাজা ও মানসম্মত ফল কেনার একটি অনলাইন প্ল্যাটফর্ম। আমরা মানসম্মত পণ্য দ্রুত ও নিরাপদ ডেলিভারির মাধ্যমে পৌঁছে দিই।</p>
      <div class="footer-social">
        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
      </div>
    </div>
    <div class="footer-col"><h3 class="footer-col-title">প্রয়োজনীয় লিঙ্ক</h3><ul class="footer-links">
      <li><a href="{{ route('track') }}">অর্ডার ট্র্যাক করুন</a></li><li><a href="{{ route('complaint') }}">কমপ্লেইন করুন</a></li><li><a href="{{ route('shop') }}">শপ</a></li><li><a href="{{ route('home') }}">হোম</a></li>
    </ul></div>
    <div class="footer-col"><h3 class="footer-col-title">আমাদের গ্রাহক সেবা</h3><ul class="footer-links">
      <li><a href="{{ route('login') }}">আমার অ্যাকাউন্ট</a></li><li><a href="{{ route('cart') }}">কার্ট</a></li><li><a href="{{ route('checkout') }}">চেকআউট</a></li><li><a href="{{ route('wishlist') }}">আমার পছন্দ</a></li>
    </ul></div>
    <div class="footer-col"><h3 class="footer-col-title">নিউজলেটার</h3><p class="footer-news-text">আমাদের সবশেষ অফার ও ডিসকাউন্টের আপডেট পেতে সাবস্ক্রাইব করুন।</p>
      <form class="footer-newsletter"><input type="email" placeholder="আপনার ইমেইল দিন..." required><button type="submit" aria-label="সাবস্ক্রাইব"><i class="fas fa-paper-plane"></i></button></form>
    </div>
  </div>
  <div class="footer-bottom"><div class="container footer-bottom-inner"><p class="copyright-text">© {{ date('Y') }} সকল স্বত্বাধিকারঃ <a href="{{ route('home') }}">ফল বাজার</a></p></div></div>
</footer>
<nav class="mobile-bottom-nav" aria-label="মোবাইল নেভিগেশন">
  <a href="{{ route('home') }}"><i class="fas fa-home"></i><span>হোম</span></a>
  <a href="{{ route('shop') }}"><i class="fas fa-bag-shopping"></i><span>শপ</span></a>
  <a href="{{ route('wishlist') }}"><i class="fas fa-heart"></i><span>পছন্দ</span></a>
  <a href="{{ route('cart') }}"><i class="fas fa-cart-shopping"></i><span>কার্ট</span></a>
  <a href="{{ route('login') }}"><i class="fas fa-user"></i><span>লগইন</span></a>
</nav>
