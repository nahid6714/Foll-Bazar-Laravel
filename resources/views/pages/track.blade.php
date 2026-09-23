@extends('layouts.app')
@section('title','অর্ডার ট্র্যাক — ফল বাজার')
@section('content')
<div class="service-page order-track-page">
  <div class="container service-container">
    <div class="service-card">
      <div class="service-icon">📦</div><h1>অর্ডার ট্র্যাক করুন</h1><p>অর্ডার নম্বর অথবা মোবাইল নম্বর দিয়ে খুঁজুন।</p>
      <form id="trackForm"><div class="auth-form-group"><label class="auth-label">অর্ডার নম্বর</label><input class="auth-input" name="order_number" placeholder="FB-..."></div><div class="track-or">অথবা</div><div class="auth-form-group"><label class="auth-label">মোবাইল নম্বর</label><input class="auth-input" name="phone" inputmode="tel" placeholder="01XXXXXXXXX"></div><button class="auth-btn-primary" type="submit">ট্র্যাক করুন</button><div id="trackResult"></div></form>
    </div>
  </div>
</div>
@endsection