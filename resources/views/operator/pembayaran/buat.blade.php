@extends('layouts.op.app-operator')

@section('pageTitle', 'Buat Bank')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/pembayaran') }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">      
          <div class="form-group">
            <label>Nama Bank (contoh: Bank BCA)</label>
            <input type="text" class="form-control" name="nama_bank">
          </div>
          <div class="form-group">
            <label>No Rekening</label>
            <input type="text" class="form-control" name="no_rek">
          </div>                
          <div class="form-group">
            <label>Atas Nama</label>
            <input type="text" class="form-control" name="atas_nama">
          </div>    
          <div class="form-group">
            <label>Logo <small>HD</small></label>
            <input type="file" required class="form-control" enctype="multipart/form-data" name="logo" accept="image/x-png,image/jpeg,image/jpg" required>
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
