@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Transaksi')

@section('content')
<h4 class="mt-4 mb-3">Transaksi</h4>
<div class="container">
	<div class="row">
		<div class="col-sm">
    <table class="table table-striped">
      <thead>
        <tr>           
          <th>No Pembayaran</th>     
          <th>Skema</th>
          <th>Pembayaran</th> 
          <th>Atas Nama</th>
          <th>Total Biaya</th>
          <th>Tanggal</th>
          <th colspan="2">Opsi</th>            
        </tr>     
      </thead>
      <tbody>
      @foreach($trans as $key)
      <tr>             
        <td>{{ $key->id_transaksi }}</td>
        <td>{{ $key->jadwal }}</td>
        @if($key->tunai == 1)
        <td>Tunai</td>  
        <td>-</td>
        <td>Rp{{ $key->kode_transfer }}</td>
        <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
        <td>
        <form method="post" action="{{ url('pdf')}}" target="_blank">
					{{csrf_field()}}
					<input type="hidden" value="{{$key->id_transaksi}}" name="id">
					<button class="btn btn-primary btn-sm">Cetak Bukti</button>
				</form>        
        </td>
        <td></td>
        @else
        <td>{{ $key->pembayaran }}</td>  
        <td>{{ $key->nama_pengirim }}</td>
        <td>Rp{{ $key->kode_transfer }}</td>
        <td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
        <td>                       
        <form method="post" action="{{ url('pdf')}}" target="_blank">
        {{csrf_field()}}
        <input type="hidden" value="{{$key->id_transaksi}}" name="id">
           <button type="submit" class="btn btn-primary btn-sm">Cetak Bukti</button>
            </form>
      </td>     
      <td>  <button type="submit" class="btn btn-primary btn-sm">Download Skema</button></td>
        @endif
       
    </tr>
    @endforeach   
    </tbody>
  </table>
</div>
</div>
</div>
{{$trans->links()}}
@endsection
