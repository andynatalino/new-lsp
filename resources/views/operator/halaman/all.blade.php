@extends('layouts.op.app-operator')

@section('pageTitle', '3 Kolum Halaman Utama')

@section('content')
<style type="text/css">
.pagination{
  float: right;
}
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">       
        <div class="box-tools">
          <form method="get" action="{{ url('operator/berita/search') }}">                               
          </form>
        </div>
      </div>      
      <div class="box-body table-responsive">
       <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Judul</th>
            <th>Isi</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kolum as $key)
          <tr>
           <td>{{ $key->judul }}</td>
           <td>{!! \Illuminate\Support\Str::words($key->isi, 15,'')  !!}</td>
           <td><a href="{{ url('operator/halaman/'.$key->id)}}"><button type="button" class="btn btn-primary btn-sm">Lihat</button></a></td>
         </tr>
        @endforeach
       </tbody>
     </table>
   </div>     
 </div>   
</div>
</div>
@endsection
