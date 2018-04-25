@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
<?php $ss = App\setting::first(); ?>
<h4 class="mt-4 mb-3">Kontak</h4>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="index.html">Home</a>
	</li>
	<li class="breadcrumb-item active">Kontak</li>
</ol>


<div class="row">

	<div class="col-lg-8 mb-4">

		<iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1667.5567757897222!2d106.83347658962929!3d-6.245173554864752!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc1c451210ac22cf0!2sSAKASAKTI!5e0!3m2!1sid!2sid!4v1523286322936"></iframe>
	</div>

	<div class="col-lg-4 mb-4">
		<h3>Detail Kontak</h3>
		<p>
			{{ $ss->alamat }}
			<br>
		</p>
		<p>
			No. Telp: {{ $ss->no_telp }}
		</p>
		<p>
			Email:
			<a href="mailto:name@example.com">{{ $ss->email }}
			</a>
		</p>
		<p>
			Jam Buka: {{ $ss->jam_buka }}
		</p>
	</div>
</div>

<div class="row">
	<div class="col-lg-8 mb-4">
		<h3>Send us a Message</h3>
		<form id="contactForm" action="{{ url('kontak') }}" method="post">
			{{ csrf_field() }}
			<div class="control-group form-group">
				<div class="controls">
					<label>Nama Lengkap:</label>
					<input type="text" class="form-control" name="nama">
					@if ($errors->has('nama'))
					<span class="text-danger">
						<strong>Nama Lengkap harus diisi</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>No. Telp:</label>
					<input type="tel" class="form-control" name="telp">
					@if ($errors->has('telp'))
					<span class="text-danger">
						<strong>No. Telp harus diisi</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>Email:</label>
					<input type="email" class="form-control" name="email">
					@if ($errors->has('email'))
					<span class="text-danger">
						<strong>Email harus diisi</strong>
					</span>
					@endif
				</div>
			</div>
			<div class="control-group form-group">
				<div class="controls">
					<label>Isi Pesan:</label>
					<textarea rows="10" cols="100" class="form-control" name="isi" style="resize:none"></textarea>
					@if ($errors->has('isi'))
					<span class="text-danger">
						<strong>Isi Pesan harus diisi</strong>
					</span>
					@endif

				</div>
			</div>
			<div id="success"></div>

			<button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
		</form>
	</div>

</div>
@endsection