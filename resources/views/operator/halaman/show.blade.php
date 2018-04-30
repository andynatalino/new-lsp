@extends('layouts.op.app-operator')

@section('pageTitle', 'Halaman Kolum')

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border"></div>
			<form method="POST" action="{{ url('operator/halaman') }}" enctype="multipart/form-data" role="form">
				{{csrf_field()}}
				<div class="box-body">
					<div class="form-group">
						<label>Judul Kolum</label> *
						<input type="text" required class="form-control" name="judul" placeholder="Judul Kolum" value="{{ $kolum->judul }}">
					</div>
					<div class="form-group">
						<label>Isi Kolum</label> * (max. 200 karakter)
						<textarea maxlength="200" required placeholder="Isi Kolum" id="content" name="isi" class="form-control">{{ $kolum->isi }}</textarea>
					</div>  
					* Wajib diisi
				</div>
				<div class="box-footer">
					<input type="hidden" name="id" value="{{ $kolum->id }}">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ url('operator/halaman') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
				</div>
			</form>
		</div>
	</div>
</div>  
@endsection