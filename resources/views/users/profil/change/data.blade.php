@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Change Data')

@section('content')
<h4 class="mt-4 mb-3">Profil</h4>
@if(session('sukses'))

<p></p>
<div class="alert alert-success" role="alert">
	<strong>Notifikasi!</strong>
	{{ session('sukses')}} 
</div>
@endif
<div class="container">
	<div class="row">
		<div class="col-sm">
			<form method="post" action="{{ url('profil/change-data')}}">
				{{ csrf_field()}}
				<table class="table striped">
					<tr>								
						<td>Username</td>
						<td>							
							<input type="text" class="form-control" name="username" value="{{ $user->username}}" required>
						</td>
					</tr>
					<tr>								
						<td>Nama Lengkap</td>
						<td>
							<input type="text" class="form-control" name="name" value="{{ $user->name}}" required>
						</td>
					</tr>
					<tr>								
						<td>Tempat Lahir</td>
						<td>							
							<input type="text" class="form-control" name="place" value="{{ $user->place}}" required>
						</td>
					</tr>
					<tr>								
						<td>Tanggal Lahir</td>
						<td>
							<input type="date" class="form-control" name="date" required 
							value="{{ date_format(date_create(($user->date=='0000-00-00')?date('Y-m-d'):$user->date),'Y-m-d') }}">			</td>
						</tr>
						<tr>								
							<td>Jenis Kelamin</td>
							<td>
								<select name="gender" class="form-control" required value="{{ $user->gender}}">
									<option value="Laki-Laki" {{ ($user->gender=='Laki')?'selected':'' }}>Laki-Laki</option>
									<option value="Perempuan" {{ ($user->gender=='Perempuan')?'selected':'' }}>Perempuan</option>
								</select>
							</td>
						</tr>
						<tr>								
							<td>Agama</td>
							<td>
								<select class="custom-select d-block w-100" name="religion" required value="{{ $user->religion}}">
									<option disabled selected="selected">Pilih...</option>
									<option {{ ($user->religion=='Islam')?'selected':'' }}>Islam</option>
									<option {{ ($user->religion=='Kristen Protestan')?'selected':'' }}>Kristen Protestan</option>
									<option {{ ($user->religion=='Katolik')?'selected':'' }}>Katolik</option>
									<option {{ ($user->religion=='Hindu')?'selected':'' }}>Hindu</option>
									<option {{ ($user->religion=='Buddha')?'selected':'' }}>Buddha</option>
									<option {{ ($user->religion=='Konghucu')?'selected':'' }}>Konghucu</option>
								</select>
							</td>
						</tr>												
						<tr>
							<td>Alamat</td>
							<td>							
								<textarea name="address" class="form-control" required>{{ $user->address}}</textarea>												</td>
							</tr>						
							<tr>
								<td>No. Telp (HP)</td>
								<td>							
									<input type="number" class="form-control" value="{{ $user->telp}}" name="telp" required>													</td>
								</tr>				
								<tr>
									<td>Opsi</td>
									<td>
										<button type="submit" class="btn btn-primary">Ubah Data</button>
										<input type="reset" value="Reset" class="btn btn-warning">
									</td>
								</tr>
							</table>
						</form>
						<hr>
						<div class="text-center">
							<a href="{{ url('profil')}}"><button class="btn btn-primary">Profil</button></a> <a href="{{ url('profil/change-photo')}}"><button class="btn btn-primary">Foto</button></a> <a href="{{ url('profil/change-password')}}"><button class="btn btn-primary">Password</button></a> <a href="{{ url('profil/change-email')}}"><button class="btn btn-primary">Email</button></a>
						</div>
					</div>
				</div>
			</div>

			@if(count($errors) > 0 )

			@foreach($errors->all() as $error)

			<script type="text/javascript">
				$(function(){
					setTimeout(function(){
						$.Notify({type: 'default', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", keepOpen: true, caption: 'Username sudah di gunakan!', content: "{{ $error }}"});
					}, 0);
				});
			</script>
			@endforeach

			@endif

			@endsection
