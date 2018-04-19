@extends('layouts.op.app-operator')

@section('pageTitle', 'Buat Slider')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/slider') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Nama slider</label>
            <input type="text" required class="form-control" name="nama" placeholder="Nama slider">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">Gambar</label>
            <input name="gambar" type="file">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Slider</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
