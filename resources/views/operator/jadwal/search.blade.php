@extends('layouts.op.app-operator')

@section('pageTitle', 'Jadwal')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/jadwal/buat')}}"><button type="button" class="btn btn-primary btn-sm pull-left">Tambah Jadwal</button></a>
        <div class="box-tools">
          <form method="get" action="{{ url('operator/jadwal/search') }}">                     
            <div class="input-group input-group-xs" style="width: 200px;">
              <input type="text" name="q" class="form-control pull-right" placeholder="Cari Skema">
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
              <th>Skema</th>
              <th>Kategori</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Waktu</th>
              <th>Kuota</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($jadwal as $key)
            <tr>
              <td>{{ $key->id }}</td>
              <td> {{ str_limit($key->nama_lsp, 20) }}</td>           
              <td>{{ App\Kategori::where('id',$key->id_kategori)->first()['nama_sp'] }}</td>
              <td>{{ date('j F Y', strtotime($key->tanggal_mulai)) }}</td>
              <td>{{ date('j F Y', strtotime($key->tanggal_selesai)) }}</td>
              <td>{{ $key->waktu }}</td>
              <td>{{ $key->kuota }}</td>
              <td>@if($key->status == 1)<span class="label label-success"> Open </span> @elseif($key->status == 2) <span class="label label-danger"> Close </span> @endif</td>
              <td>
                <form action="{{ url('operator/jadwal/'.$key->id)}}" method="post">
                  <a href="{{ url('operator/jadwal/'.$key->id.'/edit')}}" class="btn btn-primary"><i class="fa fa-th-list"></i> Edit</a>
                  <button type="submit" id="btn-delete" class="btn btn-danger"><i class="fa fa-trash"></i></button>
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
  </div>
</div>
{{ $jadwal->links() }}
@section('js')
<script type="text/javascript">
 $('#btn-delete').on('click',function(e){
  e.preventDefault();
  var form = $(this).parents('form');
  swal({
    title: "Apa anda yakin?",
    text: "Anda akan menghapus data?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Ya, Hapus!",
    closeOnConfirm: false
  }, function(isConfirm){
    if (isConfirm) {
      form.submit();
      swal("Berhasil!", "Berhasil dihapus!", "success");
      setTimeout(function () {
       window.location.href = "{{ url('operator/konfirmasi')}}";
     }, 1500);
    }
  });
});
</script>
@endsection

@endsection
