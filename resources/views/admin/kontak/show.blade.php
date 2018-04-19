@extends('layouts.admin.app-admin')

@section('pageTitle', 'Lihat Pesan')

@section('content')
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-body table-responsive">
				<table class="table table-bordered table-striped">
					<tbody>
						<tr>
							<td>Nama</td>
							<td style="width: 800px;">{{$kontak->nama}}</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>{{$kontak->email}}</td>
						</tr>
						<tr>
							<td>Telp</td>
							<td>{{$kontak->telp}}</td>
						</tr>
						<tr>
							<td>Isi</td>
							<td>{{$kontak->isi}}</td>
						</tr>
						<tr>
							<td>Tanggal</td>
							<td>{{ date('j F Y h:i', strtotime($kontak->created_at)) }}</td>							
						</tr>
					</tbody>
				</table>			
				<div class="box-footer">					
					<form action="{{ url('admin/kontak/'.$kontak->id)}}" method="post">						
						<button id="btn-delete"onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
						<a href="{{ url('admin/kontak')}}" class="btn btn-primary">Kembali</a>
						<input type="hidden" name="_method" value="DELETE">
						{{ csrf_field() }}
					</form>
				</div>	
			</div>
		</div>
	</div>
</div>
@endsection