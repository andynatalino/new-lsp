@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Tipe Pembayaran')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/pembayaran/'.$tipe->id) }}" enctype="multipart/form-data" role="form">          
        {{ csrf_field() }}
        <div class="box-body">      
          <div class="form-group">
            <label>Nama Bank (contoh: BANK BCA)</label>
            <input type="text" class="form-control" name="nama_bank" value="{{ $tipe->nama_bank }}">
          </div>
          <div class="form-group">
            <label>No Rekening</label>
            <input type="text" class="form-control" name="no_rek" value="{{ $tipe->no_rek }}">
          </div>                
          <div class="form-group">
            <label>Atas Nama</label>
            <input type="text" class="form-control" name="atas_nama" value="{{ $tipe->atas_nama }}">
          </div>        
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Buat Bank</button>
          <a href="{{ url('operator/pembayaran') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
