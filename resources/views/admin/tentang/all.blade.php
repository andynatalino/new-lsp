@extends('layouts.admin.app-admin')

@section('pageTitle', 'Tentang')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('admin/tentang/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Tentang</button></a>
      </div>   
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table id="datab" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>No</td>
              <td>Judul</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($tentang as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ substr($key->judul, 0, 30) }}</td>
              <td>
               <div class="form-group">
                 <form action="{{ url('admin/tentang/'.$key->id)}}" method="post">
                  <a href="{{ url('admin/tentang/'.$key->id.'/edit')}}" class="btn btn-info">Edit</a>
                  <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger">Hapus</button>
                  <input type="hidden" name="_method" value="DELETE">
                  {{ csrf_field() }}
                </form>
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
@endsection
