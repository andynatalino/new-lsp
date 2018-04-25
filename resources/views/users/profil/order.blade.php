@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Order')

@section('content')

<h4 class="mt-4 mb-3">Order
  <small>Transaksi Pending</small></h4>
  @if(session('sukses'))
  <div class="alert alert-success" role="alert">
    <strong>Notifikasi!</strong> {{ session('sukses')}} 
  </div>
  @endif

  <div class="row">
    <table class="table table-striped">
      <thead class="thead-default">
        <tr>
         <th>No Pembayaran</th>     
         <th>Skema</th>
         <th>Pembayaran</th> 
         <th>No Rekening</th>
         <th>Atas Nama</th>
         <th>Total Biaya</th>
         <th>Tanggal</th>
         <th>Opsi</th> 
       </tr>
     </thead>
     <tbody>
       @foreach($transaksi as $key)
       <tr>             
        @if($key->status == 3 && $key->tunai == NULL)     
        <td>{{ $key->id }}</td>
        <td>{{ $key->jadwal->nama }}</td>
        <td>{{ $key->pembayaran->nama_bank }}</td>  
        <td>{{ $key->pembayaran->no_rek }}</td>
        <td>{{ $key->pembayaran->atas_nama }}</td>
        <td>Rp. {{ number_format($key->kode_transfer) }},-</td>
        <td>{{ date('j F Y', strtotime($key->tanggal)) }}</td>
        <td>             
         <div class="dropdown-button">
          <button class="button dropdown-toggle">Donwload Bukti</button>
          <ul class="split-content d-menu" data-role="dropdown">
            <li><a target="_blank" href="{{ url('profil/'.$key->id.'/pdf')}}"><span class="mif-file-pdf"></span> Cetak Bukti</a></li>
            <li><a href="#">Download Skema</a></li>              
          </ul>
        </div>    
      </td>     
      @elseif($key->status == 3 && $key->tunai == 1)
      <td>{{ $key->id }}</td>
      <td>{{ $key->jadwal->nama }}</td>
      <td>TUNAI</td>  
      <td>-</td>
      <td>-</td>
      <td>Rp. {{ number_format($key->kode_transfer) }},-</td>
      <td>{{ date('j F Y', strtotime($key->tanggal)) }}</td>
      <td>LUNAS</td>
      @elseif($key->status == 2 && $key->tunai == NULL)  
      <td>{{ $key->id }}</td>
      <td>{{ $key->jadwal->nama }}</td>
      <td>{{ $key->pembayaran->nama_bank }}</td>  
      <td>{{ $key->pembayaran->no_rek }}</td>
      <td>{{ $key->pembayaran->atas_nama }}</td>
      <td>Rp. {{ number_format($key->kode_transfer) }},-</td>      
      <td>{{ date('j F Y', strtotime($key->tanggal)) }}</td>
      <td>Menunggu Verifikasi</td>
      @elseif($key->tunai == 1)        
      <td>{{ $key->id }}</td>
      <td>{{ $key->jadwal->nama }}</td>
      <td>TUNAI</td>  
      <td>-</td>
      <td>-</td>
      <td>Rp. {{ $key->kode_transfer }},-</td>
      <td>{{ date('j F Y', strtotime($key->tanggal)) }}</td>
      <td>Menunggu Verifikasi</td>
      @endif
    </tr>
    @endforeach   
  </tbody>
</table>
</div>

@endsection
