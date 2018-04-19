@extends('layouts.users.app')
@section('pageTitle', 'Profil - Change Data')

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
				<div class="list" onclick="location.href = '{{ url('profil/'.$user->username.'/change-password')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b5.png')}}" class="list-icon">
					<span class="list-title">Ubah Password</span>
				</div>
				<div class="list active" onclick="location.href = '{{ url('profil/'.$user->username.'/change-data')}}';">
					<img src="{{ url('assets/images/2017092714005059cbaf12b54b6.png')}}" class="list-icon">
					<span class="list-title">Ubah Data</span>
				</div>
			</div>
		</div>
		<div class="cell colspan8">
			<div class="row cells8">
				<div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
					<div class="heading">
						<span class="title">Data</span>
					</div>
					<form method="post" action="{{ url('profil/'.$user->username.'/change-data')}}">
						{{ csrf_field()}}
						<table class="table striped">
							<tr>								
								<td width="30%">No. Identitas (KTP/SIM)</td>
								<td>
									<div class="input-control number full-size">
										<input type="number" name="number" value="{{ $user->number}}" required>
									</div>
								</td>						
							</tr>
							<tr>								
								<td>Username</td>
								<td>
									<div class="input-control text full-size">
										<input type="text" name="username" value="{{ $user->username}}" required>
									</div>
								</td>
							</tr>
							<tr>								
								<td>Nama Lengkap</td>
								<td>
									<div class="input-control text full-size">
										<input type="text" name="name" value="{{ $user->name}}" required>
									</div>
								</td>
							</tr>
							<tr>								
								<td>Tempat Lahir</td>
								<td>
									<div class="input-control text full-size">
										<input type="text" name="place" value="{{ $user->place}}" required>
									</div>
								</td>
							</tr>
							<tr>								
								<td>Tanggal Lahir</td>
								<td>
									<div class="input-control text full-size" data-role="datepicker" data-format="dd mmmm yyyy">
										<input type="text" name="date" required value="{{ date_format(date_create(($user->date=='0000-00-00')?date('d F Y'):$user->date),'d F Y') }}">
										<button class="button"><span class="mif-calendar"></span></button>
									</div>
								</td>
							</tr>
							<tr>								
								<td>Jenis Kelamin</td>
								<td>
									<div class="input-control select full-size">
										<select name="gender" required value="{{ $user->gender}}">
											<option value="Laki-Laki" {{ ($user->gender=='Laki')?'selected':'' }}>Laki-Laki</option>
											<option value="Perempuan" {{ ($user->gender=='Perempuan')?'selected':'' }}>Perempuan</option>
										</select>
									</div>
								</td>
							</tr>
							<tr>								
								<td>Agama</td>
								<td>
									<div class="input-control text full-size">
										<input type="text" name="religion" value="{{ $user->religion}}" required>
									</div>
								</td>
							</tr>												
							<tr>
								<td>Alamat</td>
								<td>
									<div class="input-control textarea full-size">
										<textarea name="address" required>{{ $user->address}}</textarea>
									</div>
								</td>
							</tr>						
							<tr>
								<td>No. Telp (HP)</td>
								<td>
									<div class="input-control number full-size">
										<input type="number" value="{{ $user->telp}}" name="telp" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>Instansi</td>
								<td>
									<div class="input-control text full-size">
										<input type="text" value="{{ $user->instansi}}" name="instansi" required>
									</div>
								</td>
							</tr>
							<tr>
								<td>Opsi</td>
								<td>
									<button type="submit" class="button"><img src="{{ url('assets/images/check.png')}}"> Ubah Data</button>
									<input type="reset" value="Reset">
								</td>
							</tr>
						</table>
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
			$.Notify({type: 'default', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", keepOpen: true, caption: 'Username sudah di gunakan!', content: "{{ $error }}"});
		}, 0);
	});
</script>
@endforeach

@endif

@endsection
