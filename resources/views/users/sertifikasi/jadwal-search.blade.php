@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
<h1 class="mt-4 mb-3">Jadwal</h1>
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/')}}">Home</a>
  </li>
  <li class="breadcrumb-item">
    <a href="{{ url('/sertifikasi') }}">Sertifikasi</a>
  </li>
  <li class="breadcrumb-item active">{{ $kategori->nama_sp }}</li>
</ol>  

<div class="form-group pull-right">
  <form method="get" action="{{ url('sertifikasi/'.$kategori->slug.'/search')}}">
    <input type="text" name="q" class="search form-control" placeholder="Cari jadwal?">
  </form>
</div>
<span class="counter pull-right"></span>
<div class="row">
  <table class="table table-striped">
    <thead class="thead-default">
      <tr>
       <th>Skema</th>
       <th>Tanggal</th>
       <th>Waktu</th>
       <th>Lokasi</th>
       <th>Kuota</th>
       <th>Biaya</th>
       <th>Opsi</th>
     </tr>
   </thead>
   <tbody>
    @foreach($jadwal as $key)
    <tr>
      <th scope="row">{{ $key->nama }}</th>
      <td>{{ date('j F Y', strtotime($key->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($key->tanggal_selesai)) }}</td>
      <td>{{ $key->waktu }}</td>
      <td>{{ str_limit($key->lokasi, 20) }}</td>
      <td>{{ App\Transaksi::where(['id_jadwal' => $key->id, 'status' => 5])->get()->count() }} / {{ $key->kuota }} Orang</td>
      <td>Rp. {{ $key->biaya }},-</td>
      <td><a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$key->slug) }}"><button type="button" class="btn btn-primary">Lihat</button></a></td>
    </tr>   
    @endforeach
  </tbody>
</table>
</div>
<br>
@endsection