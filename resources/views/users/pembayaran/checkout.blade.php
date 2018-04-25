@extends('layouts.users.app-new')
@section('pageTitle', 'Checkout')

@section('content')
<?php 
$pembayaran = App\Pembayaran::get();
?>
<div class="container">
  <div class="py-3 text-center"></div>

  <div class="row">

    <div class="col-md-4 order-md-2 mb-4">
      <div class="card mb-4">
       <h5 class="card-header">Keterangan</h5>

       <div class="card-body">     

    <div class="form-group">
          <h6 class="my-0">Skema</h6>
          <small class="text-muted">{{ $jadwal->nama }}</small>
        </div>

        <div class="form-group">
          <h6 class="my-0">Tanggal</h6>
          <small class="text-muted">{{ date('j F Y', strtotime($jadwal->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($jadwal->tanggal_selesai)) }}</small>
        </div>

        <div class="form-group">
          <h6 class="my-0">Waktu</h6>
          <small class="text-muted">{{ $jadwal->waktu }}</small>
        </div>

        <div class="form-group">
          <h6 class="my-0">Lokasi</h6>
          <small class="text-muted">{{ $jadwal->lokasi }}</small>
        </div>

        <div class="form-group">
          <h6 class="my-0">Isi</h6>
          <small class="text-muted">{{ $jadwal->isi }}</small>
        </div>
      </div>

    </div>      
  </div>

  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Isi Data Pendaftaran</h4>
    <form method="POST" action="{{ url('sertifikasi/save') }}" class="needs-validation">

      <div class="mb-3">
        <label for="nomoridentitas">No. Identitas (KTP/SIM)</label>
        <input type="text" class="form-control" id="nomoridentitas" name="nomoridentitas" value="{{ old('nomoridentitas') }}">
        @if ($errors->has('nomoridentitas'))
        <span class="text-danger">
          <strong>Nomor Identitas harus diisi</strong>
        </span>
        @endif
      </div>

      <div class="mb-3">
        <label for="namalengkap">Nama Lengkap</label>                    
        <input type="text" class="form-control" id="namalengkap" name="namalengkap" value="{{ old('namalengkap') }}">
        @if ($errors->has('namalengkap'))
        <span class="text-danger">
          <strong>Nama Lengkap harus diisi</strong>
        </span>
        @endif     
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tempatlahir">Tempat Lahir</label>
          <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="{{ old('tempatlahir') }}">
          @if ($errors->has('tempatlahir'))
          <span class="text-danger">
            <strong>Tempat Lahir harus diisi</strong>
          </span>
          @endif   
        </div>
        <div class="col-md-6 mb-3">
          <label for="tanggallahir">Tanggal Lahir</label>
          <input type="date" class="form-control" id="tanggallahir" name="tanggallahir" value="{{ old('tanggallahir') }}">
          @if ($errors->has('tanggallahir'))
          <span class="text-danger">
            <strong>Tanggal Lahir harus diisi</strong>
          </span>
          @endif   
        </div>
      </div>

      <div class="mb-3">
        <label for="jeniskelamin">Jenis Kelamin</label>
        <select class="custom-select d-block w-100" id="jeniskelamin" name="jeniskelamin" value="{{ old('jeniskelamin') }}">
          <option value="">Pilih...</option>
          <option>Laki - Laki</option>                
          <option>Perempuan</option>                
        </select>
        @if ($errors->has('jeniskelamin'))
        <span class="text-danger">
          <strong>Jenis Kelamin harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="instansi">Instansi</label>
        <input type="text" class="form-control" id="instansi" name="instansi" value="{{ old('instansi') }}">
        @if ($errors->has('instansi'))
        <span class="text-danger">
          <strong>Instansi harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="agama">Agama</label>
        <select class="custom-select d-block w-100" id="agama" name="agama" value="{{ old('agama') }}">
          <option value="">Pilih...</option>
          <option>Islam</option>
          <option>Kristen Protestant</option>
          <option>Katolik</option>
          <option>Hindu</option>
          <option>Buddha</option>
          <option>Konghucu</option>
        </select>
        @if ($errors->has('agama'))
        <span class="text-danger">
          <strong>Agama harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="notelp">No. Telp (HP)</label>
        <input type="number" class="form-control" id="notelp" name="notelp" value="{{ old('notelp') }}">
        @if ($errors->has('notelp'))
        <span class="text-danger">
          <strong>Nomor Telp harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="kewarganegaraan">Kewarganegaraan</label>
        <select class="custom-select d-block w-100" id="kewarganegaraan" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}">
          <option value="">Pilih...</option>
          <option>WNI</option>                
          <option>WNA</option>                
        </select>
        @if ($errors->has('kewarganegaraan'))
        <span class="text-danger">
          <strong>Kewarganegaraan harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">
        @if ($errors->has('alamat'))
        <span class="text-danger">
          <strong>Alamat harus diisi</strong>
        </span>
        @endif   
      </div>

      <div class="mb-3">
        <label for="pendidikan">Pendidikan Terakhir</label>                    
        <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ old('pendidikan') }}">
       @if ($errors->has('pendidikan'))
        <span class="text-danger">
          <strong>Pendidikan Terakhir harus diisi</strong>
        </span>
        @endif         
      </div>

      <div class="mb-3">
        <label for="namainstansi">Nama Sekolah / Perguruan Tinggi</label>                    
        <input type="text" class="form-control" id="namainstansi" name="namainstansi" value="{{ old('namainstansi') }}">
         @if ($errors->has('namainstansi'))
        <span class="text-danger">
          <strong>Nama Sekolah / Perguruan Tinggi harus diisi</strong>
        </span>
        @endif        
      </div>

      <div class="mb-3">
        <label for="jurusan">Jurusan</label>                    
        <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan') }}">
        @if ($errors->has('jurusan'))
        <span class="text-danger">
          <strong>Jurusan harus diisi</strong>
        </span>
        @endif       
      </div>

      <div class="mb-3">
        <label for="namaperusahaan">Nama Perusahaan</label>                    
        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" value="{{ old('namaperusahaan') }}">
        @if ($errors->has('namaperusahaan'))
        <span class="text-danger">
          <strong>Nama Perusahaan harus diisi</strong>
        </span>
        @endif          
      </div>

      <div class="mb-3">
        <label for="alamatperusahaan">Alamat Perusahaan</label>                    
        <input type="text" class="form-control" id="alamatperusahaan" name="alamatperusahaan" value="{{ old('alamatperusahaan') }}">
        @if ($errors->has('alamatperusahaan'))
        <span class="text-danger">
          <strong>Alamat Perusahaan harus diisi</strong>
        </span>
        @endif       
      </div>

      <div class="mb-3">
        <label for="emailperusahaan">Email Perusahaan</label>                    
        <input type="email" class="form-control" id="emailperusahaan" name="emailperusahaan" value="{{ old('emailperusahaan') }}">
        @if ($errors->has('emailperusahaan'))
        <span class="text-danger">
          <strong>Email Perusahaan harus diisi</strong>
        </span>
        @endif          
      </div>

      <hr class="mb-4">

      <h4 class="mb-3">Pembayaran</h4>
        @if ($errors->has('bank'))
        <span class="text-danger">
          <strong>Bank atau Tunai harus diisi</strong>
        </span>
        @endif   
      <div class="d-block my-3">
        @foreach($pembayaran as $key)
        <div class="custom-control custom-radio">
          <input id="pembayaran{{$key->id}}" name="pembayaran" type="radio" value="{{ $key->id }}" class="custom-control-input">
          <label class="custom-control-label" for="pembayaran{{$key->id}}"></label>
          <img width="100" src="{{ url('assets/logo/'.$key->logo)}}">
        </div>
        <br>
        @endforeach 

        <div class="custom-control custom-radio">
          <input id="tunai" name="pembayaran" type="radio" value="tunai" class="custom-control-input">
          <label class="custom-control-label" for="tunai"><b>TUNAI</b></label>
        </div>
      </div>

      <hr class="mb-4">
      {{ csrf_field() }}   
      <input type="hidden" name="id_jadwal" value="{{ $jadwal->id }}">
      <button class="btn btn-primary btn-lg btn-block" type="submit">Lanjutkan</button>
    </form>
  </div>
</div>
</div><br>
@endsection
