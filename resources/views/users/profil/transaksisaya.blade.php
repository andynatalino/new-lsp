@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Transaksi Saya')

@section('content')
<style type="text/css">
.pagination{
  float: right;
}
</style>
<h4>Transaksi Pending</h4>
<div class="grid">
  <div class="row cells12">
    <div class="cell12">
      <table class="table striped hovered border bordered">
        <thead>
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
        @foreach($transaksi as $key)
        <tr>             
          @if($key->status == 3 && $key->tunai == NULL)     
          <td>{{ $key->id }}</td>
          <td>{{ $key->jadwal->nama }}</td>
          <td>{{ $key->pembayaran->nama_bank }}</td>  
          <td>{{ $key->pembayaran->no_rek }}</td>
          <td>{{ $key->pembayaran->atas_nama }}</td>
          <td>Rp. {{ $key->jadwal->biaya }},-</td>
          <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
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
        <td>Rp. {{ $key->kode_transfer }},-</td>
        <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
        <td>LUNAS</td>
        @elseif($key->status == 2 && $key->tunai == NULL)  
        <td>{{ $key->id }}</td>
        <td>{{ $key->jadwal->nama }}</td>
        <td>{{ $key->pembayaran->nama_bank }}</td>  
        <td>{{ $key->pembayaran->no_rek }}</td>
        <td>{{ $key->pembayaran->atas_nama }}</td>
        <td>Rp. {{ $key->kode_transfer }},-</td>
        <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
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
    </table>
<hr>
<h4>Transaksi Success</h4>
    <table class="table striped hovered border bordered">
      <thead>
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
      @foreach($trans as $key)
      <tr>             

        <td>{{ $key->id_transaksi }}</td>
        <td>{{ $key->jadwal }}</td>
        @if($key->tunai == 1)
        <td>Tunai</td>  
        <td>-</td>
        <td>-</td>
        <td>Rp. -</td>
        @else
        <td>{{ $key->pembayaran }}</td>  
        <td>-</td>
        <td>-</td>
        <td>Rp. -</td>
        @endif
        <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
        <td>             
         <div class="dropdown-button">
          <button class="button dropdown-toggle">Donwload Bukti</button>
          <ul class="split-content d-menu" data-role="dropdown">
            <li><a target="_blank" href="{{ url('profil/'.$key->id.'/pdf')}}"><span class="mif-file-pdf"></span> Cetak Bukti</a></li>
            <li><a href="#">Download Skema</a></li>              
          </ul>
        </div>    
      </td>     
    </tr>
    @endforeach   
  </table>

</div>
{{$transaksi->links()}}
</div>
</div>
<h5>Jika 1x24 Jam Transaksi Anda tidak di proses hubungi kontak<a href="{{ url('kontak')}}"> disini</a></h5>
<h5>Setelah Pendaftaran sukses anda bisa mengikuti sertifikasi sesuai jadwal<a href="{{ url('kontak')}}"> disini</a></h5>
<h5>Hubungi Call Center jika ada pertanyaan<a href="{{ url('kontak')}}"> disini</a></h5>
@if(session('sukses'))
<script type="text/javascript">
  $(function(){
    setTimeout(function(){
      $.Notify({type: 'success', icon: "<span class='mif-checkmark mif-ani-bounce mif-ani-slow'></span>", keepOpen: true, caption: 'Berhasil', content: "{{ session('sukses')}}"});
    }, 0);
  });
</script>
@endif
@endsection
