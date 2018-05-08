	@extends('layouts.users.app-new')
	@section('pageTitle', 'Checkout - Konfirmasi')

	@section('content')
	<?php $aa = App\Setting::get();
	$pembayaran = App\Pembayaran::get();  ?>

	@if($transaksi->tunai == 1)
	<h1 class="mt-4 mb-3"><small>Pembayaran via Tunai</small></h1>
	@if(session('status'))
	<div class="alert alert-warning" role="alert">
		<strong>Notifikasi!</strong> {{ session('status')}} 
	</div>
	@endif
	<div class="jumbotron jumbotron-fluid">
		<div class="container">									
			<p class="text-center">					
				<div class="form-group text-center">
					<h2>Tunai</h2>
					Ketentuan Pembayaran Tunai Setelah Anda memilih Pembayaran Tunai maka Anda akan mendapatkan bukti pemesanan, Anda bisa membawanya ke Kantor kami.
				</div>
				<div class="form-group text-center">
				<form method="post" action="{{ url('pdf-tunai')}}" target="_blank">
					{{csrf_field()}}
					<input type="hidden" value="{{$transaksi->id}}" name="id">
					<button class="btn btn-primary">Cetak Bukti</button>
				</form>
				<hr>
					<form action="{{ url('checkout/delete/'.$transaksi->id)}}" method="post">											
						<button type="submit" onclick="return confirm('Apa Anda yakin membatalkan transaksi?')" class="btn btn-danger">Batalkan Transaksi</button>
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}
					</form>
				</div>
			</p>
		</div>
	</div>

	@else

	<h1 class="mt-4 mb-3"><small>Pembayaran via Transfer Bank </small></h1>
	@if(session('status'))
	<div class="alert alert-warning" role="alert">
		<strong>Notifikasi!</strong> {{ session('status')}} 
	</div>
	@endif
	<div class="jumbotron jumbotron-fluid">
		<div class="container">									
			<p class="text-center">					
				Silahkan melakukan pembayaran ke rekening berikut:<br>
				<div class="form-group text-center">
					<img class="rounded" width="200" src="{{ url('assets/logo/'.$transaksi->pembayaran->logo) }}" alt="Logo {{ $transaksi->pembayaran->nama_bank }}"><br>					
					<b>{{ $transaksi->pembayaran->nama_bank }}</b><br>
					Nomor Rekening:	<br><h2>{{ $transaksi->pembayaran->no_rek }}</h2>
					a.n <p><b>{{ $transaksi->pembayaran->atas_nama }}</b></p>
					Jumlah Transfer : <h3> Rp. {{ number_format($transaksi->kode_transfer) }},-</h3>
					
				</div>
				<div class="form-group text-center">
					Setelah melakukan transfer, segera lakukan Konfirmasi Pembayaran. Pembayaran tanpa melakukan konfirmasi tidak dapat kami proses lebih lanjut. Pastikan Anda mengisi data dengan tepat dan mentransfer sesuai jumlah nominal di atas pada saat melakukan konfirmasi pembayaran.
				</div>
				<form action="{{ url('checkout/delete/'.$transaksi->id)}}" method="post">
					<div class="form-group text-center">
						<a href="{{ url('profil/konfirmasi') }}" class="btn btn-primary">Konfirmasi</a>
						<button type="submit" onclick="return confirm('Apa Anda yakin membatalkan transaksi?')" class="btn btn-danger">Batalkan</button>
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}
					</form>
				</div>	
				
			@endif</p>
		</div>
	</div>
                      
	@endsection
