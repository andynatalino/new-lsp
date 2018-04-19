@extends('layouts.op.app-operator')

@section('pageTitle', 'Kategori')

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
        <a href="{{ url('operator/kategori/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Kategori</button></a>
        <div class="box-tools">
          <form method="get" action="{{ url('operator/kategori/search') }}">                     
            <div class="input-group input-group-xs" style="width: 200px;">
              <input type="text" name="q" class="form-control pull-right" placeholder="Cari Kategori">
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
              <th>No</th>
              <th>Kategori</th>
              <th>Isi</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kategori as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ substr($key->nama_sp, 0, 30) }}</td>
              <td>{{ substr($key->isi, 0, 50) }}...</td>
              <td> <a href="{{ url('assets/kategori/'.$key->image) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/kategori/'.$key->image) }}"></a></td>
              <td>
                <form action="{{ url('operator/kategori/'.$key->id) }}" method="post">
                  <a href="{{ url('operator/kategori/'.$key->id.'/edit')}}" class="btn btn-info"><i class="fa fa-th-list"></i></a>
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
    {{$kategori->links()}}
  </div>
</div>
@endsection
