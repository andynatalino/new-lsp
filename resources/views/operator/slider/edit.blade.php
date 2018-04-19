@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Slider')

@section('content')
<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <!-- /.box-header -->
      <!-- form start -->
      <form method="POST"action="{{ url('operator/slider/'.$slider->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Nama slider</label>
            <input type="text" required class="form-control" name="nama" value="{{ $slider->nama_slider }}">
          </div>
          <div class="form-group">
            <label>Gambar</label>
            <a href="{{ url('assets/slider/'.$slider->gambar) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/slider/'.$slider->gambar) }}"></a><br><br>
            <input name="gambar" type="file">
            <p class="help-block">Usahakan Gambar berkualitas HD</p>
          </div>
          <!-- /.box-body -->
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Slider</button>
          <a href="{{ url('operator/slider') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
