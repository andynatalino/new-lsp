@extends('layouts.admin.app-admin')

@section('pageTitle', 'Users')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('admin/user/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah User</button></a>
      </div>   
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table id="datab" class="table table-bordered table-striped">
          <thead>
            <tr>
              <td>No</td>
              <td>No Indentitas</td>
              <td>Nama</td>
              <td>Email</td>
              <td>Status</td>
              <td>Action</td>
            </tr>
          </thead>
          <tbody>
            @foreach($users as $key)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ substr($key->number, 0, 30) }}</td>
              <td>{{ substr($key->name, 0, 30) }}</td>
              <td>{{ substr($key->email, 0, 50) }}</td>
              <td>
                @if($key->role == 3) <p class="text-primary"> Operator </p> @elseif($key->role == 2)<p class="text-success"> Admin </p>@elseif($key->role == 1) <p class="text-warning"> User </p> @endif
              </td>
              <td>
               <div class="form-group">
                <button type="button" class="btn btn-info">Edit</button>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">
                  Delete
                </button>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
                 Ganti Password
               </button>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Ganti Password</h4>
        </div>
        <div class="modal-body">
         <div class="form-group">
          <label>Password Lama</label>
          <input type="password" required class="form-control" name="repassword" placeholder="Password Lama">
        </div>
        <div class="form-group">
          <label>Password Baru</label>
          <input type="password" required class="form-control" name="repassword" placeholder="Password Baru">
        </div>
        <div class="form-group">
          <label>Ulangi Password Baru</label>
          <input type="password" required class="form-control" name="repassword" placeholder="Ulangi Password Baru">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Ganti Password</button>
      </div>
    </div>
  </div>
</div>
@endsection
