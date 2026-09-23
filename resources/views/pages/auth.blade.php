@extends('layouts.app')
@section('title', $mode==='register'?'রেজিস্টার — ফল বাজার':'লগইন — ফল বাজার')
@section('body_class','auth-page')
@section('content')
<div class="auth-page-container">
  <div class="auth-card">
    <div class="auth-heading"><h1>{{ $mode==='register'?'অ্যাকাউন্ট তৈরি করুন':'লগইন করুন' }}</h1><p>আপনার অ্যাকাউন্টে প্রবেশ করতে তথ্য দিন</p></div>
    <form id="authForm">
      @if($mode==='register')<div class="auth-form-group"><label class="auth-label">নাম</label><input class="auth-input" name="name" required></div><div class="auth-form-group"><label class="auth-label">মোবাইল</label><input class="auth-input" name="phone" required></div>@endif
      <div class="auth-form-group"><label class="auth-label">ইমেইল / মোবাইল</label><input class="auth-input" name="identifier" required placeholder="01XXXXXXXXX বা email@example.com"></div>
      <div class="auth-form-group"><label class="auth-label">পাসওয়ার্ড</label><input class="auth-input" name="password" type="password" required minlength="6" placeholder="পাসওয়ার্ড লিখুন"></div>
      @if($mode==='register')<input type="hidden" name="email" value="">@endif
      <div id="authMsg"></div><button class="auth-btn-primary" type="submit">{{ $mode==='register'?'রেজিস্টার করুন':'লগইন করুন' }}</button>
    </form>
    <div class="auth-switch">@if($mode==='register')আগে অ্যাকাউন্ট আছে? <a href="{{ route('login') }}">লগইন করুন</a>@elseঅ্যাকাউন্ট নেই? <a href="{{ route('register') }}">রেজিস্টার করুন</a>@endif</div>
  </div>
</div>
@endsection
@push('scripts')<script>window.FOL_AUTH_MODE='{{ $mode }}';</script>@endpush