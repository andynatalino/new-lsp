@extends('layouts.op.app-operator')

@section('pageTitle', 'Berita')

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
        <a href="{{ url('operator/berita/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Berita</button></a>
        <div class="box-tools">
          <form method="get" action="{{ url('operator/berita/search') }}">                     
            <div class="input-group input-group-xs" style="width: 200px;">
              <input type="text" name="q" class="form-control pull-right" placeholder="Cari Berita">
              <div class="input-group-btn">
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </form>
        </div>
      </div>      
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Judul</th>
              <th>Dibuat</th>
              <th>Diperbarui</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($berita as $key)
            <tr>
              <td>{{ substr($key->judul, 0, 30) }}</td>
              <td>{{ date('j F Y h:i:s', strtotime($key->created_at)) }}</td>
              <td>{{ date('j F Y h:i:s', strtotime($key->updated_at)) }}</td>
              <td>
                <form action="{{ url('operator/berita/'.$key->id)}}" method="post">
                 <a href="{{ url('operator/berita/'.$key->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-th-list"></i> Edit</a>
                 <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                 <input type="hidden" name="_method" value="DELETE">
                 {{ csrf_field() }}
               </form>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>     
   </div>   
   {{ $berita->links() }}
 </div>
</div>
@endsection
