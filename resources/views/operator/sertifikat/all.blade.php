@extends('layouts.op.app-operator')

@section('pageTitle', 'Sertifikat')

@section('content')
<style type="text/css">
.pagination{
  float: right;
}
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">     
      <div class="box-body table-responsive">
        <?php $i = 1; ?>
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No. Transaksi</th>
              <th>User</th>
              <th>Jadwal</th>
              <th>Tanggal Konfirmasi</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($trans as $key)
            <tr>
              <td>{{ $key->id_transaksi }}</td>
              <td>{{ $key->user }}</td>
              <td>{{ $key->jadwal }}</td>
              <td>{{ date('j F Y h:i:s', strtotime($key->tanggal_konfirmasi)) }}</td>
              <td>                
                <a href="{{ url('operator/sertifikat/'.$key->id)}}" class="btn btn-primary">Lihat</a>
             </td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>     
   </div>   
   {{ $trans->links() }}
 </div>
</div>

@endsection