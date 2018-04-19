@extends('layouts.users.app')
@section('pageTitle', 'Pembayaran')

@section('content')
<div class="grid">
	<div class="row cells12">
		<h4>Pelatihan yang Anda Pilih</h4>
		<div class="cell"></div>

		@if(sizeof($transaksi)==0)    
		<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
		@endif

		<table class="table striped hovered border bordered">
			<?php $i = 1; ?>
			<tr>								
				<td>No</td>
				<td>Atas Nama</td>	
				<td>Skema</td>
				<td>Waktu</td>
				<td>Opsi</td>
			</tr>
			@foreach($transaksi as $key)
			@if($key->status == 1)
			<tr>								
				<td>{{ $i++ }}</td>
				<td>{{ Auth::user()->name }}</td>	
				<td>{{ $key->jadwal->nama_lsp }}</td>
				<td>{{ date('j F Y', strtotime($key->jadwal->tanggal_mulai)) }} / {{ date('j F Y', strtotime($key->jadwal->tanggal_selesai)) }}</td>
				<td>
					<form action="{{ url('pembayaran') }}" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{ $key->id }}">

						<button class="button"><span class="mif-money"></span> Bayar</button>

					</form>
					<form action="{{ url('pembayaran/'.$key->id) }}" method="post">               
						<button class="button"><span class="mif-cancel"></span> Hapus</button>
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}
					</form>
				</td>
			</tr>	
			@endif
			@endforeach		
		</table>
		<hr class="thin">	
		<h6>N.b Pilih salah satu pelatihan dan klik bayar untuk melakukan pembayaran</h6>
		<a href="{{ url('sertifikasi')}}"><button class="button">Kembali ke halaman Sertifikasi</button></a>
	</div>
</div>
@endsection
