@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Change Email')

@section('content')
<h4 class="mt-4 mb-3">Profil</h4>

<div class="container">
	<div class="row">
		<div class="col-sm">			
			<form method="post" action="{{ url('profil/'.$user->username.'/change-email')}}">
				{{ csrf_field()}}
				<div class="input-control text full-size">					
					<input type="email" class="form-control" name="email" placeholder="Enter email" required>
				</div>
				<br>
				<div class="text-center">
					<button type="submit" class="btn btn-primary">Ubah Email</button>
				</div>
			</form>
			<hr>
			<div class="text-center">
				<a href="{{ url('profil')}}"><button class="btn btn-primary">Profil</button></a> 	<a href="{{ url('profil/change-photo')}}"><button class="btn btn-primary">Foto</button></a> <a href="{{ url('profil/change-data')}}"><button class="btn btn-primary">Data</button></a> <a href="{{ url('profil/change-password')}}"><button class="btn btn-primary">Password</button></a> <a href="{{ url('profil/change-email')}}">
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

@if(count($errors) > 0 )

@foreach($errors->all() as $error)

<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$.Notify({type: 'default', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", keepOpen: true, caption: 'Email sudah di gunakan!', content: "{{ $error }}"});
		}, 0);
	});
</script>
@endforeach

@endif

@endsection
