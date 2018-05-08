@extends('layouts.op.app-operator')
@section('pageTitle', 'Buat Klien Kami')
@section('content')
<div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/klienkami') }}" enctype="multipart/form-data" role="form">
       {{csrf_field()}}
       <div class="box-body">
      <div class="form-group">
        <label>Judul</label>
        <input type="text" required class="form-control" name="judul" placeholder="Judul">
      </div>
      <div class="form-group">
        <label>Url</label>
        <input type="text" required class="form-control" name="url" placeholder="Url">
      </div>
      <div class="form-group">
        <label>Photo</label>
        <input type="file" required class="form-control" name="photo">
      </div>
     <div class="box-footer">
      <button type="submit" class="btn btn-primary">Tambah Klien Kami</button>
      <a href="{{ url('operator/klienkami') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
    </div>
    </form>
  </div>
  </div>
</div>  
@endsection