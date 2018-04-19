@extends('layouts.op.app-operator')

@section('pageTitle', 'Konfirmasi')

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
        <br>        
        <div class="box-tools">
          <form method="get" action="{{ url('operator/konfirmasi/search') }}">              <div class="input-group input-group-xs" style="width: 400px;">
            <input type="text" name="q" class="form-control pull-right" placeholder="No. Pembayaran / Biaya Kode Transfer">
            <div class="input-group-btn">
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive">
      <?php $i = 1; ?>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No. Pembayaran</th>
            <th>User</th>
            <th>Jadwal</th>
            <th>Tipe Pembayaran</th>
            <th>Tanggal Konfirmasi</th>
            <th>Photo Bukti</th>
            <th>Kode Transfer</th>
            <th>Action</th>
          </tr>
        </thead>
        <?php $no = 1;?>
        <tbody>
          @foreach($transaksi as $key)
          <tr>
            <td>{{ $key->id }}</td>
            <td>{{ $key->user->name }}</td>
            <td>{{ $key->jadwal->nama }}</td>
            @if($key->tunai == 1)
            <td>Tunai</td>
            @else
            <td>{{ $key->pembayaran->nama_bank }}</td>
            @endif
            <td>{{ date('D, F jS Y \a\t h:i a', strtotime($key->tanggal)) }}</td>
            @if($key->tunai == 1)
            <td>-</td>
            <td>-</td>
            @else
            <td><img src="{{ url('assets/bukti/'.$key->photo_bukti) }}" style="width: 50px; height: 50px;"></td>
            <td>Rp. {{ number_format($key->kode_transfer) }},-</td>
            @endif           
            <td>
             <!-- Button trigger modal -->
             <form action="{{ url('operator/konfirmasi/'.$key->id) }}" method="post">
               <input type="hidden" name="batalkan">
               <input type="hidden" name="_method" value="DELETE">
               {{ csrf_field() }}
               <button 
               type="button" 
               class="btn btn-primary btn-sm" 
               data-toggle="modal"
               data-id="{{ $key->id }}"       
               data-target="#favoritesModal_{{$no}}"><i class="fa fa-check-square-o"></i> Cek
             </button>                         
             <button onclick="return confirm('Are you sure to delete?')" type="submit" class="btn btn-danger btn-sm"><i class="fa fa-window-close"></i></button>
           </form>

           <div class="modal fade" id="favoritesModal_{{$no}}" 
           tabindex="-1" role="dialog" 
           aria-labelledby="favoritesModalLabel">
           <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" 
                data-dismiss="modal" 
                aria-label="Close">
                <span aria-hidden="true">&times;</span></button>

                @if($key->tunai == 1)
                <h4 class="modal-title" 
                id="favoritesModalLabel">{{ $key->user->name }} - TUNAI</h4>
              </div>
              <div class="modal-body"><center>
              -</center>
            </div>
            @else
            <h4 class="modal-title" 
            id="favoritesModalLabel">{{ $key->user->name }} - {{ $key->pembayaran->nama_bank }}</h4>
          </div>
          <div class="modal-body"><center>
           <img src="{{ url('assets/bukti/'.$key->photo_bukti) }}" style="width: 100%;"></center>
         </div>
         @endif

         <div class="modal-footer">
           <span class="pull-left">
            <button type="button" class="btn btn-default" 
            data-dismiss="modal">Close</button>
          </span>                 
          <span class="pull-right">
           <form action="{{ url('operator/konfirmasi/'.$key->id) }}" method="post">
            {{ csrf_field() }}
            <button onclick="return confirm('Apa data sudah benar?')" type="submit" class="btn btn-primary">
              Konfirmasi
            </button>
          </form>
        </span>
      </div>
    </div>
  </div>
</div>
</td>
</tr>
<?php $no++;?>
@endforeach
</tbody>
</table>
</div>
</div>
{{$transaksi->links()}}
</div>
</div>

@section('js')
<script type="text/javascript">
 $(function() {
  $('#favoritesModal').on("show.bs.modal", function (e) {
   $("#favoritesModalLabel").html($(e.relatedTarget).data('title'));
   $("#fav-title").html($(e.relatedTarget).data('title'));
 });
});
</script>
@endsection

@endsection