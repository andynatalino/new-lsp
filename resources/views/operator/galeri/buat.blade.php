@extends('layouts.admin.app-admin')

@section('pageTitle', 'Buat Galeri')

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('admin/galeri') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul" required>
          </div>
          <div class="form-group">
            <label>Isi</label>
             <input type="file" class="form-control" name="sampul[]" multiple="true" required>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Tentang</button>
          <a href="{{ url('admin/tentang')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>    
    </div>
  </div>
</div>
@endsection
