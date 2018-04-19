<?php $tentang = App\tentang::all(); ?>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-danger fixed-top">
  <div class="container">     
    <a href="{{ url('/')}}"><img src="http://localhost:8000/assets/logo/201802211206105a8cfe42d8658.png" style="height: 39px; display: inline-block; margin-right: 10px; margin-bottom: 1px"></a>          
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('sertifikasi')}}">Sertifikasi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('berita')}}">Berita</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('kontak')}}">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('galeri')}}">Galeri</a>
        </li>        
        <li class="nav-item active dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tentang
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            @foreach($tentang as $key)
            <a class="dropdown-item" href="{{ url('tentang/'.$key->slug)}}">{{ $key->judul }}</a>    
            @endforeach      
          </div>
        </li>
      </ul>
    </div>

    @guest
    <ul class="navbar-nav mr-sm-2">
      <li class="nav-item">
        <a class="nav-link text-white" href="{{ url('login')}}">Login</a>
      </li>
    </ul>
    @else
    <ul class="navbar-nav mr-sm-2">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Andy Natalino
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
          <a class="dropdown-item" href="{{ url('profil')}}">Profil</a>
          <a class="dropdown-item" href="{{ url('profil/konfirmasi')}}">Konfirmasi</a>
          <a class="dropdown-item" href="{{ url('profil/order')}}">Order</a>
          <a class="dropdown-item" href="{{ url('profil/transaksi')}}">Transaksi</a>
          <a class="dropdown-item" href="{{ url('profil/sertifikat')}}">Sertifikat Saya</a>
          <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
    @endguest
    
  </div>
</nav>