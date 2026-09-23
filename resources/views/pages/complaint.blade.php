@extends('layouts.app')
@section('title','কমপ্লেইন — ফল বাজার')
@section('content')
<div class="complaint-page">
  <section class="complaint-hero"><div>🎧</div><h1>কমপ্লেইন করুন</h1><p>হোম / কমপ্লেইন</p></section>
  <main class="complaint-container">
    <div class="complaint-contact-card"><div class="complaint-contact-icon">🎧</div><h2>আমাদের সাথে যোগাযোগ করুন</h2><p>যেকোনো সমস্যায় আমরা আপনার পাশে আছি। আপনার অভিযোগ জমা দিন, আমরা দ্রুত সমাধান দেবো।</p>
      <div class="complaint-contact-list"><a href="tel:01611870674"><span>☎</span><div><small>হটলাইন</small><strong>01611870674</strong></div></a><a href="mailto:scaleuper@gmail.com"><span>✉</span><div><small>ইমেইল</small><strong>scaleuper@gmail.com</strong></div></a><div><span>⌖</span><div><small>ঠিকানা</small><strong>Dhaka, Bangladesh</strong></div></div></div>
      <div class="complaint-trust-row"><span>✓ নিরাপদ ডাটা</span><span>✓ ২৪-৪৮ ঘণ্টার সমাধান</span><span>✓ বিশ্বস্ত সেবা</span></div>
    </div>
    <section class="complaint-form-card"><div class="complaint-form-title"><span>✎</span><div><h2>কমপ্লেইন ফর্ম</h2><p>নিচের ফর্মটি পূরণ করুন।</p></div></div>
      <form id="complaintForm" enctype="multipart/form-data">
        <label>নাম <b>*</b><input name="customer_name" placeholder="আপনার নাম লিখুন"></label>
        <label>মোবাইল <b>*</b><input name="customer_phone" placeholder="01XXXXXXXXX" required></label>
        <label>অর্ডার নম্বর <span>(ঐচ্ছিক)</span><input name="order_number" placeholder="যেমন: FB-54321"></label>
        <label>বিস্তারিত <b>*</b><textarea name="message" required rows="6" placeholder="আপনার সমস্যাটি বিস্তারিত লিখুন..."></textarea></label>
        <label>ছবি <span>(ঐচ্ছিক)</span><div class="complaint-upload"><span>📎 ছবি আপলোড করুন<small>JPG, PNG, WEBP — সর্বোচ্চ 5MB</small></span><input type="file" name="image" id="complaintImage" accept="image/jpeg,image/png,image/webp"></div></label>
        <div id="complaintPreview"></div><div id="complaintMsg"></div><button class="complaint-submit" type="submit">প্রেরণ করুন</button>
      </form>
    </section>
  </main>
</div>
@endsection