@extends('layouts.users.app-new')
@section('pageTitle', 'Profil')
@section('content')
<h4 class="mt-4 mb-3">Profil</h4>

<div class="container">
	<div class="row">
		<div class="col-sm">
			<div class="text-center">				
				@if(Auth::user()->photo=="")<img src="{{ url('assets/images/default-user.png')}}" class="img-fluid">@else<img src="{{ url('assets/photo/'.$user->photo)}}" style="max-width: 300px; max-height: 300px;" onerror="this.src='{{ url('assets/images/default-user.png')}}';">@endif
				<br><br>
			</div>

			<table class="table">		
				<tr>								
					<td>Nama Lengkap</td>
					<td>: {{ $user->name }}</td>
				</tr>
				<tr>								
					<td>Tempat / Tanggal Lahir</td>
					<td>: {{ $user->place }} / {{ $user->date }}</td>
				</tr>
				<tr>								
					<td>Jenis Kelamin</td>
					<td>: {{ $user->gender }}</td>
				</tr>	
				<tr>								
					<td>Agama</td>
					<td>: {{ $user->religion }}</td>
				</tr>						
				<tr>								
					<td>Email</td>
					<td>: {{ $user->email }}</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>: {{ $user->address }}</td>
				</tr>						
				<tr>
					<td>No. Telp (HP)</td>
					<td>: {{ $user->telp }}</td>
				</tr>				
			</table>
			<div class="text-center">
				<a href="{{ url('profil/change-photo')}}"><button class="btn btn-primary">Foto</button></a> <a href="{{ url('profil/change-data')}}"><button class="btn btn-primary">Data</button></a> <a href="{{ url('profil/change-password')}}"><button class="btn btn-primary">Password</button></a> <a href="{{ url('profil/change-email')}}"><button class="btn btn-primary">Email</button></a>
			</div>
		</div>
	</div>
</div>

@endsection
