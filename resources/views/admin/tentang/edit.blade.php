@extends('layouts.admin.app-admin')

@section('pageTitle', 'Edit Tentang')

@section('content')

@if(session('gagal'))
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-warning"></i>Peringatan</h4>
  {{ session('gagal')}}
</div>
@endif

<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('admin/tentang/'.$tentang->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Judul</label>
            <input type="text" required class="form-control" name="judul" value="{{ $tentang->judul }}">
          </div>
          <div class="form-group">
            <label>Isi</label>
            <textarea id="content" name="isi" class="form-control">{{ $tentang->tentang }}</textarea>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Tentang</button>
          <a href="{{ url('admin/tentang')}}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){    
  setTimeout(function(){
    CKEDITOR.replace('content', {
    width : '99%',height : '300px',    
    filebrowserUploadUrl: '{{ url('operator/berita/gambar') }}',
    });
  },1000);
  });
</script>
@endsection
