@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Change Photo')

@section('content')
<h4 class="mt-4 mb-3">Profil</h4>

<div class="container">
	<div class="row">
		<div class="col-sm">
			<div class="text-center">				
				@if(Auth::user()->photo=="")<img src="{{ url('assets/images/default-user.png')}}" class="img-fluid">@else<img src="{{ url('assets/photo/'.$user->photo)}}" style="max-width: 300px; max-height: 300px;" onerror="this.src='{{ url('assets/images/default-user.png')}}';">@endif
				<br><br>
			</div>
			<form method="post" action="{{ url('profil/change-photo')}}" enctype="multipart/form-data">
				{{ csrf_field()}}
				<div class="input-control file full-size" data-role="input">
					<input type="file" required class="form-control" enctype="multipart/form-data" name="photo">

				</div><div class="text-center">
					<br>
					<button type="submit" class="btn btn-primary">Ubah Foto</button>
				</div>
			</form>
			<hr>
			<div class="text-center">
				<a href="{{ url('profil')}}"><button class="btn btn-primary">Profil</button></a> <a href="{{ url('profil/change-data')}}"><button class="btn btn-primary">Data</button></a> <a href="{{ url('profil/change-password')}}"><button class="btn btn-primary">Password</button></a> <a href="{{ url('profil/change-email')}}"><button class="btn btn-primary">Email</button></a>
			</div>
		</div>
	</div>
</div>

@if(session('sukses'))
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$.Notify({type: 'success', icon: "<span class='mif-checkmark mif-ani-bounce mif-ani-slow'></span>", caption: 'Berhasil mengganti Foto', content: "{{ session('sukses')}}"});
		}, 0);
	});
</script>
@endif
@endsection
