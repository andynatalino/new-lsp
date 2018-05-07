@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Change Password')

@section('content')
<h4 class="mt-4 mb-3">Profil</h4>

<div class="container">
	<div class="row">
		<div class="col-sm">
			<form method="post" action="{{ url('profil/'.$user->username.'/change-password')}}">
				{{{ csrf_field()}}}
				<label>Password Lama</label>
				<div>
					<input class="form-control" type="password" required name="oldpw">
					
				</div>
				<label>Password Baru</label>
				<div>
					<input class="form-control" type="password" required name="newpw">
					
				</div>
				<label>Ulangi Password Baru</label>
				<div>
					<input class="form-control" type="password" required name="confnewpw">
					
				</div>
				<br><br>
				<button type="submit" class="btn btn-primary">Ubah Password</button>
				<input class="btn btn-warning" type="reset" value="Reset">
			</form>
			<hr>
			<div class="text-center">
				<a href="{{ url('profil')}}"><button class="btn btn-primary">Profil</button></a> <a href="{{ url('profil/change-photo')}}"><button class="btn btn-primary">Foto</button></a> <a href="{{ url('profil/change-data')}}"><button class="btn btn-primary">Data</button></a> <a href="{{ url('profil/change-email')}}"><button class="btn btn-primary">Email</button></a>
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
