@extends('layouts.op.app-operator')
@section('pageTitle', 'Buat Berita')
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
      <form method="POST" action="{{ url('operator/berita') }}" enctype="multipart/form-data" role="form">
       {{csrf_field()}}
       <div class="box-body">
      <div class="form-group">
        <label>Judul Berita</label> *
        <input type="text" required class="form-control" name="judul" placeholder="Judul Berita">
      </div>
      <div class="form-group">
        <label>Isi Berita</label> *
        <textarea required placeholder="Isi Berita" id="content" name="isi" class="form-control"></textarea>
      </div>
      <div class="form-group">
       <label>Label</label> * (ex: pelatihan, online, internet)
       <input type="text" required class="form-control" name="label">
       </div>   
       * Wajib diisi
     </div>
     <div class="box-footer">
      <button type="submit" class="btn btn-primary">Tambah Berita</button>
      <a href="{{ url('operator/berita') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
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