@extends('layouts.users.app')
@section('pageTitle', 'Profil')

@section('content')
<style type="text/css">
.pagination{
	float: right;
}
</style>
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
							@if(Auth::user()->photo=="")<img src="{{ url('assets/images/default-user.png')}}">@else<img src="{{ url('assets/photo/'.$user->photo)}}" onerror="this.src='{{ url('assets/images/default-user.png')}}';">@endif

						</div>
					</div>
				</div>
			</div>
			<hr class="thin">
			<div class="listview set-border padding10" data-role="listview">
				<div class="list active" onclick="location.href = '{{ url('profil/'.$user->username.'/change-photo')}}';">
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
				<div class="list" onclick="location.href = '{{ url('profil/'.$user->username.'/change-password')}}';">
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
						<span class="title">Profil</span>
					</div>
					<table class="table striped">
						<tr>								
							<td width="30%">No. Identitas (KTP/SIM)</td>
							<td>: {{ $user->number }}</td>
						</tr>
						<tr>								
							<td>Username</td>
							<td>: {{ $user->username }}</td>
						</tr>
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
						<tr>
							<td>Instansi</td>
							<td>: {{ $user->instansi }}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row cells8">
				<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
					<div class="heading">
						<span class="title">Transaksi Saya</span>
					</div>
					<table class="table striped hovered border bordered">
						<?php $i = 1; ?>
						<tr>								
							<td>No</td>
							<td>Skema</td>
							<td>Tanggal Konfirmasi</td>
							<td>Status</td>
							<td>Opsi</td>
						</tr>
						@foreach($transaksi as $key)				
						<tr>			
							@if($key->status == 5)	
							<td>{{ $key->id }}</td>
							<td>{{ $key->jadwal->nama_lsp}}</td>
							<td> {{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
							<td><img style="width: 15px; height:15px;" src="{{ url('assets/images/lunas.png')}}"> Lunas</td>
							<td>
								<a target="_blank" href="{{ url('profil/'.$key->id.'/pdf')}}"><button type="submit" class="button"><span class="mif-file-pdf"></span> Cetak Bukti</button></a>
							</td>
							@elseif($key->status == 4)

							<td>{{ $i++ }}</td>
							<td>{{ $key->jadwal->nama_lsp}}</td>
							<td>{{ date('j F Y', strtotime($key->tanggal_konfirmasi)) }}</td>
							<td>Pending</td>
							<td>
								Menunggu Verifikasi
							</td>
							@endif

						</tr>
						@endforeach						
					</table>
				</div>

				{{$transaksi->links() }}
			</div>
		</div>
	</div>
</div>
@endsection
