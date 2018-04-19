@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Konfirmasi')

@section('content')
<h5 class="mt-4 mb-3">Konfirmasi pembayaran pendaftaran skema</h5>
<form method="post" action="{{url('profil/konfirmasi')}}" enctype="multipart/form-data">
	<div class="form-group row">
		<label class="col-2 col-form-label" for="pembayaran_via">Pembayaran via:</label>
		<div class="col-10">
			<input type="text" class="form-control" id="pembayaran_via" value="{{ $transaksi->pembayaran->nama_bank }}" readonly>
		</div>
	</div>	
	<div class="form-group row">
		<label class="col-2 col-form-label" for="asal_bank">Asal Bank:</label>
		<div class="col-10">
			<input type="text" class="form-control" id="asal_bank" name="asal_bank" placeholder="Asal Bank" value="{{ old('asal_bank') }}">
			@if ($errors->has('asal_bank'))
			<span class="text-danger">
				<strong>Asal Bank harus diisi</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group row">
		<label class="col-2 col-form-label" for="nama_pengirim">Nama Pengirim:</label>
		<div class="col-10">
			<input type="text" class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Pengirim" value="{{ old('nama_pengirim') }}">
			@if ($errors->has('nama_pengirim'))
			<span class="text-danger">
				<strong>Nama Pengirim harus diisi</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group row">
		<label class="col-2 col-form-label" for="jumlah_transfer">Jumlah Transfer:</label>
		<div class="col-10">
			<input type="number" class="form-control" id="jumlah_transfer" name="jumlah_transfer" placeholder="Jumlah Transfer" value="{{ old('jumlah_transfer') }}">
			@if ($errors->has('jumlah_transfer'))
			<span class="text-danger">
				<strong>Jumlah Transfer harus diisi</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group row">
		<label class="col-2 col-form-label" for="waktu_pembayaran">Waktu Pembayaran:</label>
		<div class="col-10">
			<input type="date" class="form-control" id="waktu_pembayaran" name="waktu_pembayaran" placeholder="Waktu Pembayaran" value="{{ old('waktu_pembayaran') }}">
			@if ($errors->has('waktu_pembayaran'))
			<span class="text-danger">
				<strong>Waktu Pembayaran harus diisi</strong>
			</span>
			@endif
		</div>

	</div>
	<div class="form-group row">
		<label class="col-2 col-form-label" for="photo_bukti">Bukti Foto:</label>
		<div class="col-10">
			<input type="file" class="form-control" id="photo_bukti" enctype="multipart/form-data" name="photo_bukti" accept="image/x-png,image/jpeg,image/jpg">
			@if ($errors->has('photo_bukti'))
			<span class="text-danger">
				<strong>{{ $errors->first('photo_bukti') }}</strong>
			</span>
			@endif
		</div>
	</div>
	<div class="form-group row col-2">
		<input type="hidden" name="id" value="{{ $transaksi->id }}">
		{{ csrf_field()}}
		<button type="submit" class="btn btn-primary ">Konfirmasi Pembayaran</button>
	</div>
</form>
@endsection