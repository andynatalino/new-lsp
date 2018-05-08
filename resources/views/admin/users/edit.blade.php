@extends('layouts.admin.app-admin')

@section('pageTitle', 'Edit Users')

@section('content')
@if(count($errors) > 0 )

@foreach($errors->all() as $error)
<div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-warning"></i>Peringatan</h4>
  {{ $error }}
</div>
@endforeach

@endif
<div class="box box-default">
  <div class="box-body">
    <div class="row">
      <div class="col-md-6">
        <form method="POST" action="{{ url('admin/user') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Username</label>
            <input type="text" required class="form-control" name="username" value="{{ $users->username }}" disabled placeholder="Username">
          </div>
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" required class="form-control"  name="name" value="{{ $users->name }}" placeholder="Nama Lengkap">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" required class="form-control" name="email" value="{{ $users->email }}" placeholder="Email">
          </div>         
          <div class="form-group">
            <label>Password</label>
            @if(session('gagal'))
            <span class="help-block">{{ session('gagal')}} </span>
            @endif
            <input type="password" required class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Ulangi Password</label>
            <input type="password" required class="form-control" name="repassword" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control" name="gender" value="{{ $users->gender }}" style="width: 100%;">
              <option value="Laki - Laki">Laki - Laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Tempat Lahir</label>
            <input type="text" required class="form-control" name="place" value="{{ $users->place }}" placeholder="Tempat Lahir">
          </div>
          <div class="form-group">
            <label>Tanggal Lahir</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" name="date" value="{{ $users->date }}" class="form-control pull-right" id="datepicker">
            </div>
          </div>
          <div class="form-group">
            <label>Agama</label>
            <input type="text" required class="form-control" name="religion" value="{{ $users->religion }}" placeholder="Agama">
          </div>
          <div class="form-group">
            <label>Telp</label>
            <input type="number" required class="form-control" name="telp" value="{{ $users->telp }}" placeholder="Telp">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="address" rows="3" placeholder="Alamat">{{ $users->address }}</textarea>
          </div>
          <div class="form-group">
            <label>Status</label>
            <select class="form-control" name="role" value="{{ $users->role }}" style="width: 100%;">
              <option value="1">User</option>
              <option value="2">Admin</option>
              <option value="3">Operator</option>
            </select>
          </div>
          <div class="form-group">
            <label>Photo</label>
            <input name="photo" required type="file">
            <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Edit User</button>
        </form>
        <a href="{{ url('admin/user')}}"><button class="btn btn-warning">Cancel</button></a>
      </div>
  </div>
</div>


@section('js')
<script type="text/javascript">
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>
@endsection
@endsection
