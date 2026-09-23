@extends('layouts.app')
@section('title','পেজ পাওয়া যায়নি — ফল বাজার')
@section('content')
<div class="container"><div class="fb-empty" style="min-height:55vh;display:flex;flex-direction:column;justify-content:center;align-items:center"><div style="font-size:72px;font-weight:900;color:#df2d4d">404</div><h1>পেজটি পাওয়া যায়নি</h1><p>লিংকটি ভুল হতে পারে অথবা পেজটি সরানো হয়েছে।</p><a class="fb-btn" href="{{ route('home') }}">হোম পেজে ফিরে যান</a></div></div>
@endsection
