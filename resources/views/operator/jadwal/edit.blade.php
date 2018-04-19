@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Jadwal')

@section('content')
<script type="text/javascript">
$(function () {
  $('#datetimepicker1').datetimepicker();
});
</script>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border"></div>
      <form method="POST" action="{{ url('operator/jadwal/'.$jadwal->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="box-body">
          <div class="form-group">
            <label>Kategori</label><br>
            <select class="selectpicker" name="id_kategori" required data-live-search="true">
               <option disabled selected value> -- pilih salah satu kategori -- </option>
               @foreach($kategori as $key)
               <option value="{{ $key->id }}" data-tokens="{{ $key->nama_sp }}">{{ $key->nama_sp }}</option>
               @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nama LSP</label>
            <input type="text" required class="form-control" value="{{ $jadwal->nama_lsp }}" name="nama_lsp" placeholder="Nama LSP">
          </div>
          <div class="form-group">
            <label>Tanggal Mulai</label>
            <div class="input-group date" data-provide="datepicker">
              <input type="text" name="tanggal_mulai" required value="{{ $jadwal->tanggal_mulai }}" class="form-control">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <div class="input-group date" data-provide="datepicker">
              <input type="text" name="tanggal_selesai" required value="{{ $jadwal->tanggal_selesai }}" class="form-control">
              <div class="input-group-addon">
                <span class="glyphicon glyphicon-th"></span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Waktu</label>
            <div class="input-group bootstrap-timepicker timepicker">
              <input id="timepicker1" name="waktu" required type="text" value="{{ $jadwal->waktu }}" class="form-control input-small">
              <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
            </div>
          </div>
          <div class="form-group">
            <label>Lokasi</label>
            <textarea required placeholder="Lokasi" name="lokasi" class="form-control">{{ $jadwal->lokasi }}</textarea>
          </div>
          <div class="form-group">
            <label>Kuota (contoh: 30)</label>
            <input type="text" required class="form-control" value="{{ $jadwal->kuota }}" name="kuota" placeholder="Kuota">
          </div>
          <div class="form-group">
            <label>Biaya</label>
            <input type="text" required class="form-control" name="biaya" value="{{ $jadwal->biaya }}" placeholder="Biaya">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea required placeholder="Isi Deskripsi" name="isi" class="form-control">{{ $jadwal->isi }}</textarea>
          </div>
          <div class="form-group">
            <label>Status</label><br>
            <select name="status" required class="selectpicker">
              <option value="1">Pendaftaran dibuka</option>
              <option value="2">Pendaftaran ditutup</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Edit Jadwal</button>
          <a href="{{ url('operator/jadwal') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
