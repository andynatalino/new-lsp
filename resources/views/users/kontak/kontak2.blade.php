@extends('layouts.users.app')
@section('pageTitle', 'Kontak Kami')

@section('content')
<div class="grid">
	<center><p>Jika Anda memiliki pertanyaan, komentar, pendapat, atau kritik, tuliskan pada formulir kontak dibawah ini dan kirimkan kepada kami. Kami akan memberikan jawaban atas semua pertanyaan Anda secepat mungkin.</p></center>
	<div class="row cells12">
		<div class="cell colspan8">      
			<div class="cell">
				<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
					<div class="heading">
						<span class="title">Form Kontak</span>
					</div>
					<div class="content padding10">										
						<form action="{{ url('kontak') }}" method="post">
							{{ csrf_field() }}
							<label>Nama</label>
							
							<div class="input-control text full-size">
								<input type="text" name="nama" value="@if(Auth::check()) {{Auth::user()->name }} @endif" required>
							</div>
							<label>Email</label>
							<div class="input-control text full-size">
								<input type="email" name="email" value="@if(Auth::check()) {{Auth::user()->email }} @endif" required>
							</div>
							<label>No. Telp</label>
							<div class="input-control text full-size">
								<input type="number" name="telp" @if(Auth::check()) value="{{Auth::user()->telp }}" @endif required>
							</div>
							<label>Isi Pesan</label>
							<div class="input-control textarea full-size">
								<textarea name="isi" required></textarea>
							</div>
							<div class="g-recaptcha" data-sitekey="6Lff6C0UAAAAADecOFWMqGGpfXWjsf0CFKRSP0NG"></div>
							<button class="button">Kirim</button>
						</form>
					</div>
				</div><br>
			</div>
		</div>   

		<div class="cell colspan4">
			<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
				<div class="heading">
					<span class="title">Kontak</span>
				</div>
				<div class="content" style="padding: 10px 10px 10px 10px;">
					<center><h2>Sakasakti</h2></center>
					<h5>Alamat :</h5>jln sensus IIb<br>
					<h5>Email :</h5>sakasakti@gmail.com<br>
					<h5>Telp :</h5>08782173712<br>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

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
