@extends('layouts.users.app')
@section('pageTitle', $jadwal->nama)

@section('content') 
<?php 
$transaksi = App\Transaksi::where(['id_jadwal' => $jadwal->id])->first();
$con = App\Transaksi::where(['id_jadwal' => $jadwal->id, 'status' => 5])->get()->count();  
$kuota = $jadwal->kuota;
?>
<div class="grid">
  <ul class="breadcrumbs">
    <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
    <li><a href="{{ url('/sertifikasi') }}">Sertifikasi</a></li>
    <li><a href="{{ url('/sertifikasi/'.$kategori->slug) }}">{{ $kategori->nama_sp }}</a></li>
    <li><a href="#">{{ $jadwal->nama }}</a></li>
  </ul>
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="tabcontrol2" data-role="tabcontrol" data-open-target="#tab1">
        <ul class="tabs">
          <li><a href="#tab1">Info</a></li>
          <li><a href="#tab2">Skema</a></li>
          <li><a href="#tab3">Biaya</a></li>
        </ul>
        <div class="frames">
          <div class="frame" id="tab1">
            {!! $jadwal->info !!}
          </div>
          <div class="frame" id="tab2">
            {!! $jadwal->skema !!}
          </div>
          <div class="frame" id="tab3">

            @if(Auth::check())              
              <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
              @if($con < $kuota)
              <h3>Rp. {{ $jadwal->biaya }},-</h3>
              <span class="mif-ani-flash fg-green"><h5>Tersedia!</h5></span><br>
             <a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$jadwal->slug.'/checkout')}}"><button class="button loading-pulse">Pilih Pelatihan Sekarang!</button></a>
            </form>
            @else
          
          <h3>Rp. {{ $jadwal->biaya }},-</h3>
          <span class="mif-ani-horizontal fg-red"><h5>Mohon maaf Jadwal sudah penuh!</h5></span><br>
          <a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
          @endif
          @else
          @if($con < $kuota)
          <h3>Rp. {{ $jadwal->biaya }},-</h3>
          <span class="mif-ani-flash fg-green"><h5>Tersedia!</h5></span><br>
          <a href="{{ url('login')}}"><button class="button loading-pulse">Pilih Pelatihan Sekarang!</button></a>
            @else
            <h3>Rp. {{ $jadwal->biaya }},-</h3>
            <span class="mif-ani-horizontal fg-red"><h5>Mohon maaf Jadwal sudah penuh!</h5></span><br>
            <a href="{{ url('sertifikasi')}}"><button class="button loading-cube">Cari pelatihan yang lain yuk!</button></a>
            @endif
            @endif 


          </div>
        </div>
      </div>
    </div>


    <div class="cell colspan4">
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title">Keterangan</span>
        </div>
        <div class="content" style="padding: 10px 10px 10px 10px;">
         <table>
          <tr>
            <td><h5>Kategori</h5></td>
            <td>: {{ $kategori->nama_sp }}</td>
          </tr>
          <tr>
            <td><h5>Terdaftar</h5></td> 
            <td>: {{ $con }} / {{ $jadwal->kuota }} Orang</td>
          </tr>
          <tr>
            <td><h5>Skema</h5></td>
            <td>: {{ $jadwal->nama }}</td>
          </tr>
          <tr>
            <td><h5>Tanggal</h5></td>
            <td><br>: {{ date('j F Y', strtotime($jadwal->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($jadwal->tanggal_selesai)) }}</td>
          </tr>
          <tr>
            <td><h5>Waktu</h5></td>
            <td>: {{ $jadwal->waktu }}</td>
          </tr>
          <tr>
            <td><h5>Lokasi</h5></td>
            <td>: {{ $jadwal->lokasi }}</td>
          </tr>
          <tr>  
            <td><h5>Isi</h5></td>          
            <td><p>: {{ $jadwal->isi }}</p></td>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>
</div>
@endsection