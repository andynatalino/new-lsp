@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
<?php 
$transaksi = App\Transaksi::where(['id_jadwal' => $jadwal->id])->first();
$con = App\Transaksi::where(['id_jadwal' => $jadwal->id, 'status' => 2])->get()->count();  
$kuota = $jadwal->kuota;
?>
<h4 class="mt-4 mb-3">{{ $jadwal->nama }}</h4>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{ url('/')}}">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/sertifikasi') }}">Sertifikasi</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('/sertifikasi/'.$kategori->slug) }}">{{ $kategori->nama_sp }}</a>
	</li>	
	<li class="breadcrumb-item active">{{ $jadwal->nama }}</li>
</ol>  

<div class="row">
	<div class="col-lg-8">
		<div id="accordion">
			<div class="card">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							Info
						</a>
					</h5>
				</div>

				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
						{!! $jadwal->info !!}
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingTwo">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							Skema
						</a>

					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body">
						{!! $jadwal->skema !!}
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header" id="headingThree">
					<h5 class="mb-0">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
							Biaya
						</a>
					</h5>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
					<div class="card-body">					
						@if(Auth::check())              
						<input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
						@if($con < $kuota)						
						<div class="form-group">				
							<h3>Rp. {{ $jadwal->biaya }},-</h3>
							<span class="text-success">Tersedia!</span><br><br>
							<a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$jadwal->slug.'/checkout')}}"><button class="btn btn-primary">Pilih Pelatihan Sekarang!</button></a>
						</div>

						@else
						<div class="form-group">
							<h3>Rp. {{ $jadwal->biaya }},-</h3>
							<span class="text-danger">Mohon maaf Jadwal sudah penuh!</span><br><br>
							<a href="{{ url('sertifikasi')}}"><button class="btn btn-warning">Cari pelatihan yang lain yuk!</button></a>
						</div>
						@endif
						@else
						@if($con < $kuota)
						<div class="form-group">
							<h3>Rp. {{ $jadwal->biaya }},-</h3>
							<span class="text-success">Tersedia!</span><br><br>
							<a href="{{ url('login')}}"><button class="btn btn-primary">Pilih Pelatihan Sekarang!</button></a>
						</div>											
						@else
						<div class="form-group">
							<h3>Rp. {{ $jadwal->biaya }},-</h3>
							<span class="text-danger">Mohon maaf Jadwal sudah penuh!</span><br><br>
							<a href="{{ url('sertifikasi')}}"><button class="btn btn-primary">Cari pelatihan yang lain yuk!</button></a>
						</div>						
						@endif
						@endif 
					</div>
				</div>
			</div>
		</div>

	</div>
	<div class="col-md-4">
		<div class="card mb-4">
			<h5 class="card-header">Keterangan</h5>
			<div class="card-body">     

				<div class="form-group">
					<h6 class="my-0">Kategori</h6>
					<small class="text-muted">{{ $kategori->nama_sp }}</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Terdaftar</h6>
					<small class="text-muted">{{ $con }} / {{ $jadwal->kuota }} Orang</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Skema</h6>
					<small class="text-muted">{{ $jadwal->nama }}</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Tanggal</h6>
					<small class="text-muted">{{ date('j F Y', strtotime($jadwal->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($jadwal->tanggal_selesai)) }}</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Waktu</h6>
					<small class="text-muted">{{ $jadwal->waktu }}</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Lokasi</h6>
					<small class="text-muted">{{ $jadwal->lokasi }}</small>
				</div>

				<div class="form-group">
					<h6 class="my-0">Isi</h6>
					<small class="text-muted">{{ $jadwal->isi }}</small>
				</div>

			</div>
		</div>      


	</div>

</div>
<br>
@endsection