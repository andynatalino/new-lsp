<?php
$ss = App\Setting::first();
?>
<aside class="main-sidebar">
    <section class="sidebar">
     <div class="user-panel">
        <div class="pull-left">                                
            @if($ss->color_operator == 'skin-red-light') 
            <h4>{{ Auth::user()->name }}</h4>
            @elseif($ss->color_operator == 'skin-blue-light') 
            <h4>{{ Auth::user()->name }}</h4>
            @elseif($ss->color_operator == 'skin-yellow-light')
            <h4>{{ Auth::user()->name }}</h4>
            @elseif($ss->color_operator == 'skin-green-light')
            <h4>{{ Auth::user()->name }}</h4>
            @elseif($ss->color_operator == 'skin-purple-light')
            <h4>{{ Auth::user()->name }}</h4>
            @elseif($ss->color_operator == 'skin-black-light')
            <h4>{{ Auth::user()->name }}</h4>
            @else
            <h4 style="color: white;">{{ Auth::user()->name }}</h4>
            @endif
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>    
    </div>
    <ul class="sidebar-menu">
        <li class="active"><a href="{{ url('operator') }}"><i class="fa fa-circle-o"></i>Dashboard</a></li>
        <li><a href="{{ url('operator/konfirmasi') }}"><i class="fa fa-check-circle"></i>Konfirmasi</a></li>
        <li><a href="{{ url('operator/transaksi') }}"><i class="fa fa-handshake-o"></i>Transaksi</a></li>
        <li><a href="{{ url('operator/sertifikat') }}"><i class="fa fa-credit-card"></i>Sertifikat</a></li>
        <li><a href="{{ url('operator/jadwal') }}"><i class="fa fa-calendar"></i>Jadwal</a></li>
        <li><a href="{{ url('operator/kategori') }}"><i class="fa fa-wpforms"></i>Kategori</a></li>
        <li><a href="{{ url('operator/berita') }}"><i class="fa fa-newspaper-o"></i>Berita</a></li>
        <li><a href="{{ url('operator/pembayaran') }}"><i class="fa fa-credit-card"></i>Bank</a></li>
        <li><a href="{{ url('operator/halaman') }}"><i class="fa fa-file-code-o"></i>Halaman Kolum</a></li>
       <!--  <li class="treeview">
            <a href="{{ url('operator/pembayaran') }}"><i class="fa fa-credit-card"></i><span>Tipe pembayaran</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
                <li><a href="{{ url('operator/pembayaran/') }}">Bank</a></li>
                <li><a href="{{ url('operator/pembayaran/tunai') }}">Tunai</a></li>
            </ul>
        </li> -->
        <li><a href="{{ url('operator/slider') }}"><i class="fa fa-television"></i>Slider</a></li>
    </ul>
</section>
</aside>
