@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Kategori')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/kategori/'.$kategori->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" required class="form-control" name="nama" value="{{ $kategori->nama_sp }}">
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea required placeholder="Isi Keterangan" name="isi" class="form-control">{{ $kategori->isi }}</textarea>
          </div>
          <div class="form-group">
            <label>Image</label>
            <a href="{{ url('assets/kategori/'.$kategori->image) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/kategori/'.$kategori->image) }}"></a><br><br>
            <input name="image" type="file">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Kategori</button>
          <a href="{{ url('operator/kategori') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
