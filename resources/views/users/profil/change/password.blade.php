@extends('layouts.users.app')
@section('pageTitle', 'Profil - Change Password')

@section('content')
<div class="grid">
	<div class="row cells12">		
		<div class="cell colspan4">
			<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
				<div class="heading">				
					<div class="title">Foto</div>
				</div>
				<div class="content">
					<div class="image-container bordered image-format-hd">
						<div class="frame">
							<img src="{{ url('assets/photo/'.$user->photo)}}"
							onerror="this.src='{{ url('assets/images/default-user.png')}}';">
						</div>
					</div>
				</div>
			</div>
			<hr class="thin">
			<div class="listview set-border padding10" data-role="listview">
				<div class="list" onclick="location.href = '{{ url('profil')}}';">
					<img src="{{ url('assets/images/my-profil.png')}}" class="list-icon">
					<span class="list-title">My Profil</span>
				</div>
				<div class="list" onclick="location.href = '{{ url('profil/'.$user->username.'/change-photo')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b3.png')}}" class="list-icon">
					<span class="list-title">Ubah Foto</span>
				</div>
				<div class="list" onclick="location.href = '{{ url('profil/'.$user->username.'/change-email')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b4.png')}}" class="list-icon">
					<span class="list-title">Ubah Email</span>
				</div>
				<div class="list active" onclick="location.href = '{{ url('profil/'.$user->username.'/change-password')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b5.png')}}" class="list-icon">
					<span class="list-title">Ubah Password</span>
				</div>
				<div class="list" onclick="location.href = '{{ url('profil/'.$user->username.'/change-data')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b6.png')}}" class="list-icon">
					<span class="list-title">Ubah Data</span>
				</div>
			</div>
		</div>
		<div class="cell colspan8">
			<div class="row cells8">
				<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
					<div class="heading">
						<span class="title">Password</span>
					</div>
					<div class="content" style="padding: 10px 10px 10px 10px;">
						<div class="cell">
							<form method="post" action="{{ url('profil/'.$user->username.'/change-password')}}">
								{{{ csrf_field()}}}
								<label>Password Lama</label>
								<div class="input-control password full-size" data-role="input">
									<input type="password" required name="oldpw">
									<button class="button helper-button reveal"><span class="mif-shareable"></span></button>
								</div>
								<label>Password Baru</label>
								<div class="input-control password full-size" data-role="input">
									<input type="password" required name="newpw">
									<button class="button helper-button reveal"><span class="mif-shareable"></span></button>
								</div>
								<label>Ulangi Password Baru</label>
								<div class="input-control password full-size" data-role="input">
									<input type="password" required name="confnewpw">
									<button class="button helper-button reveal"><span class="mif-shareable"></span></button>
								</div>
								<button type="submit" class="button"><img src="{{ url('assets/images/check.png')}}"> Ubah Password</button>
								<input type="reset" value="Reset">
							</form>
						</div>
					</div>
				</div>
			</div>		
		</div>
	</div>
</div>

@if(session('sukses'))
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$.Notify({type: 'success', icon: "<span class='mif-checkmark mif-ani-bounce mif-ani-slow'></span>", caption: 'Berhasil', content: "{{ session('sukses')}}"});
		}, 0);
	});
</script>
@endif

@if(session('gagal'))
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$.Notify({type: 'alert', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", caption: 'Gagal', content: "{{ session('gagal')}}"});
		}, 0);
	});
</script>
@endif

@if(count($errors) > 0 )

@foreach($errors->all() as $error)

<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$.Notify({type: 'default', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", keepOpen: true, caption: 'Password minimal <br> 6 karakter!', content: "{{ $error }}"});
		}, 0);
	});
</script>
@endforeach

@endif
@endsection
