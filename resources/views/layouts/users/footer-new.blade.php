<?php
$ss = App\Setting::first();
?>
<hr>
<footer class="container py-5">
	<div class="row">
		<div class="col-12 col-md">
			<a href="#"><img src="{{ url('assets/logo/logo-merah.png')}}" style="height: 39px; display: inline-block; margin-right: 10px; margin-bottom: 1px"></a>          
			<small class="d-block mb-3 text-muted">{{$ss->alamat}}</small>
			<small class="d-block mb-3 text-muted">&copy; 2018 Sakasakti</small>
		</div>
		<div class="col-6 col-md">
			<h5>Sakasakti</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="{{ url('sertifikasi')}}">Sertifikasi</a></li>
				<li><a class="text-muted" href="{{ url('klienkami')}}">Klien Kami</a></li>
			
			</ul>
		</div>
		<!-- <div class="col-6 col-md">
			<h5>Produk</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" href="#">FAQs</a></li>
				<li><a class="text-muted" href="#">Privasi</a></li>
				<li><a class="text-muted" href="#">Ketentuan</a></li>				
			</ul>
		</div> -->
		<!-- <div class="col-6 col-md">
			<h5>and more</h5>
			<ul class="list-unstyled text-small">				
				<li><a class="text-muted" href="#">Karir</a></li>
				<li><a class="text-muted" href="#">Blog</a></li>				
			</ul>
		</div> -->
		<div class="col-6 col-md">
			<h5>Social Media</h5>
			<ul class="list-unstyled text-small">
				<li><a class="text-muted" target="_blank" href="{{$ss->facebook}}">Facebook</a></li>
				<li><a class="text-muted" target="_blank" href="{{$ss->twitter}}">Twitter</a></li>
				<li><a class="text-muted" target="_blank" href="{{$ss->instagram}}">Instagram</a></li>
				<li><a class="text-muted" target="_blank" href="{{$ss->youtube}}">YouTube</a></li>
			</ul>
		</div>
	</div>
	<p class="float-right"><a href="#">Back to top ☝️</a></p>
</footer>