@extends('layouts.users.app-new')
@section('pageTitle', 'Daftar')
@section('description', 'Daftarkan diri Anda dan dapatkan pelatihan sekarang.')

@section('content')
<h4 class="mt-4 mb-3">Daftar Akun</h4>
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
			<form method="POST" action="{{ route('register') }}">
				{{ csrf_field()}}
				<table class="table">
					<tr>								
						<td>Username</td>
						<td>	
							<div class="mb-1">						
								<input type="text" class="form-control" name="username">

							</div>
						</td>
					</tr>
					<tr>								
						<td>Nama Lengkap</td>
						<td>
							<div class="mb-1">			
								<input type="text" class="form-control" name="name">
								@if($errors->has('name'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
								@endif
							</div>
						</td>
					</tr>
					<tr>								
						<td>Email</td>
						<td>
							<div class="mb-1">			
								<input type="email" class="form-control" name="email">
								@if($errors->has('email'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</td>
					</tr>
					<tr>								
						<td>Password</td>
						<td>
							<div class="mb-1">			
								<input type="password" class="form-control" name="password">
								@if($errors->has('password'))
								<span class="invalid-feedback">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</td>
					</tr>
					<tr>								
						<td>Tempat Lahir</td>
						<td>			
							<div class="mb-1">						
								<input type="text" class="form-control" name="place">
							</div>
						</td>
					</tr>
					<tr>								
						<td>Tanggal Lahir</td>
						<td>
							<div class="mb-1">		
								<input type="date" class="form-control" name="date">
							</div>			
						</td>
					</tr>
					<tr>								
						<td>Jenis Kelamin</td>
						<td>
							<div class="mb-1">		
								<select name="gender" class="form-control">
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>								
						<td>Agama</td>
						<td>
							<div class="mb-1">		
								<select class="custom-select d-block w-100" name="religion">
									<option disabled selected="selected">Pilih...</option>
									<option>Islam</option>
									<option>Kristen Protestan</option>
									<option>Katolik</option>
									<option>Hindu</option>
									<option>Buddha</option>
									<option>Konghucu</option>
								</select>
							</div>
						</td>
					</tr>												
					<tr>
						<td>Alamat</td>
						<td>		
							<div class="mb-1">							
								<textarea name="address" class="form-control"></textarea>
							</div>								
						</td>
					</tr>						
					<tr>
						<td>No. Telp (HP)</td>
						<td>							
							<div class="mb-1">		
								<input type="number" class="form-control" name="telp">
							</div>
						</td>
					</tr>				
					<tr>
						<td>Opsi</td>
						<td>
							<div class="mb-1">		
								<button type="submit" class="btn btn-primary">Daftar Sekarang</button>
								<input type="reset" value="Reset" class="btn btn-warning">
							</div>
						</td>
					</tr>
				</table>
			</form>
			<hr>						
		</div>
	</div>
</div>
@endsection
