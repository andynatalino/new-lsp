<?php
$s = App\Setting::first(); 
$tentang = App\tentang::all(); 
?>
<div class="app-bar fixed {{ $s->color_web }}" data-role="appbar">
  <div class="container">
    <a class="app-bar-element branding" href="{{ url('/') }}"> 
      <img src="@if(!$s->logo) {{ url('assets/logo/logo.png') }} @else {{ url('assets/logo/'.$s->logo) }} @endif" style="height: 38px; display: inline-block; margin-right: 10px; margin-bottom: 5px"></a>
      <ul class="app-bar-menu">
        <li><a href="{{ url('sertifikasi') }}">Sertifikasi</a></li>
        <li><a href="{{ url('berita') }}">Berita</a></li>
        <li><a href="{{ url('kontak') }}">Kontak</a></li>
        <li><a href="{{ url('galeri') }}">Galeri</a></li>
      </ul>
      <div class="app-bar-element">
        <a class="dropdown-toggle fg-white">Tentang</a>
        <ul class="d-menu" data-role="dropdown">         
          @foreach($tentang as $key) 
          <li><a href="{{ url('/tentang/'.$key->slug)}}">{{ $key->judul }}</a></li>      
          @endforeach
        </div>
        @if(Auth::check())
        <div class="app-bar-element place-right">
          <a class="dropdown-toggle fg-white"><span class="mif-user"></span> {{ Auth::user()->name }}</a>
          <ul class="d-menu" data-role="dropdown">
            <li><a href="{{ url('profil/'.Auth::user()->username)}}"><span class="mif-user"></span> Profil</a></li>             
            <li><a href="{{ url('pembayaran')}}"><span class="mif-money"></span> Pembayaran</a></li>
            <li><a href="{{ url('profil/konfirmasi')}}"><span class="mif-user-check"></span> Konfirmasi</a></li>
            <li><a href="{{ url('profil/transaksisaya')}}"><span class="mif-list"></span> Transaksi Saya</a></li>
            <li><a href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="mif-exit"></span> Logout</a></li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
          </div>
        </ul>
      </div>
      @endif
    </div>
  </div>