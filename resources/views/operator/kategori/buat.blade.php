@extends('layouts.op.app-operator')

@section('pageTitle', 'Buat Kategori')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/kategori') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama Kategori">
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea required placeholder="Isi Keterangan" name="isi" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input name="image" type="file" required>
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Kategori</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
