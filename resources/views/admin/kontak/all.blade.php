@extends('layouts.admin.app-admin')

@section('pageTitle', 'Kontak')

@section('content')
@if(session('sukses'))
<div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-check"></i>Berhasil</h4>
  {{ session('sukses')}}
</div>
@endif
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">

      </div>   
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table id="datab" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>No</td>
              <td>Nama</td>
              <td>Email</td>
              <td>Telp</td>
              <td>Isi</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($kontak as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ substr($key->nama, 0, 30) }}</td>
              <td>{{ substr($key->email, 0, 30) }}</td>
              <td>{{ substr($key->telp, 0, 30) }}</td>
              <td>{{ substr($key->isi, 0, 30) }}</td>
              <td>
               <div class="form-group">          
                 <form action="{{ url('admin/kontak/'.$key->id)}}" method="post">
                  <a href="{{ url('admin/kontak/'.$key->id)}}" class="btn btn-info">Lihat</a>
                  <button id="btn-delete" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                  <input type="hidden" name="_method" value="DELETE">
                  {{ csrf_field() }}
                </form>
              </td>
            </div>  
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>      
</div>
</div>
</div>
{{ $kontak->links() }}
@endsection
