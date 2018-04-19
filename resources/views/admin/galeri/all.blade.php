@extends('layouts.admin.app-admin')

@section('pageTitle', 'Galeri')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('admin/galeri/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Slider</button></a>
      </div>
      <div class="box-body table-responsive no-padding">
        <?php $i = 1; ?>
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Action</th>
          </tr>
          @foreach($galeri as $key)
          <tr>
            <td>{{ $i++ }}</td>
            <td>{{ $key->judul }}</td>
            <td> <a href="{{ url('assets/galeri/'.$key->photo) }}" target="_blank"><img style="width:50px; height:50px;" src="{{ url('assets/galeri/'.$key->photo) }}"></a></td>
            <td>
              <form action="{{ url('operator/slider/'.$key->id) }}" method="post">
                <a href="{{ url('operator/slider/'.$key->id.'/edit')}}"><button type="button" class="btn btn-info"><i class="fa fa-th-list"></i></button></a>
                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
