@extends('layouts.app-admin')
@section('title')
Show Data User &raquo Admin
@endsection

@section('content')
<script type="text/javascript">
function validation(){
  swal({
    title: "Terima atau Tidak",
    text: "Apakah data user sudah benar?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Terima, Konfrimasi",
    cancelButtonText: "Tidak, Belum benar",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Berhasil!", "Anda berhasil mengkonfirmasi data user!", "success");
    } else {
      swal("Batal", "Mohon koreksi data dengan benar!", "error");
    }
  });
}
</script>

<div class="page-content">
  <div class="flex-grid no-responsive-future" style="height: 120%;">
    <div class="row" style="height: 100%">
      <div class="cell size-x200" id="cell-sidebar" style="background-color: #0072c6; height: 100%">
        <ul class="sidebar navy" style="background-color: #0072c6;">
          <li><a href="{{ url('admin') }}">
            <span class="mif-apps icon"></span>
            <span class="title">dashboard</span>
            <span class="counter">123</span>
          </a></li>
          <li class="active"><a href="{{ url('admin/user') }}">
            <span class="mif-users icon"></span>
            <span class="title">Users</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="#">
            <span class="mif-drive-eta icon"></span>
            <span class="title">Virtual machines</span>
            <span class="counter">2</span>
          </a></li>
          <li><a href="#">
            <span class="mif-cloud icon"></span>
            <span class="title">Cloud services</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="#">
            <span class="mif-database icon"></span>
            <span class="title">SQL Databases</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="#">
            <span class="mif-cogs icon"></span>
            <span class="title">Automation</span>
            <span class="counter">0</span>
          </a></li>
          <li><a href="#">
            <span class="mif-apps icon"></span>
            <span class="title">all items</span>
            <span class="counter">0</span>
          </a></li>
        </ul>
      </div>
    
      <div class="cell auto-size padding20 bg-white" id="cell-content">
        <h1 class="text-light">Show Data User <span class="mif-drive-eta place-right"></span></h1>
        <hr class="thin bg-grayLighter">

        <div class="content">
       <div class="content padding10">
         <form class="" action="index.html" method="post">
           NISN / NIK :
           <div>
             <h4>{{ $user->number }}</h4>
           </div>
           Nama Lengkap:
           <div>
              <h4>{{ $user->name }}</h4>
           </div>
           Kota Tujuan :
           <div>
              <h4>{{ $user->email }}</h4>
           </div>
           Jenis Kelamin :
           <div>
             <h4>{{ $user->gender }}</h4>
           </div>
           Tempat, Tanggal Lahir :
           <div>
                <h4>{{ $user->place.", ".$user->date }}</h4>
           </div>
           Agama :
           <div>
                <h4>{{ $user->religion }}</h4>
           </div>
           Nomor Telepon :
           <div>
            <h4>{{ $user->telp }}</h4>
           </div>
           Institusi :
           <div>
               <h4>{{ $user->ins }}</h4>
           </div>
           Status :
           <div>
               <h4>@if($user->role == 3)<span class="fg-yellow">Operator @elseif($user->role == 2)<span class="fg-green"> Admin @else <span class="fg-blue"> User @endif</h4>
           </div>
           Pendaftaran :
           <div>
               <h4>{{ $user->created_at }}</h4>
           </div>
         </form>
       </div>
       <div>
         <button class="button" onclick="validation();">Terima</button>
         <button class="button">Tolak</button>
       </div>
      </div>
    </div>
  </div>
</div>
@endsection
