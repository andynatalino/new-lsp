@extends('layouts.op.app-operator')

@section('pageTitle', 'Pembayaran Bank')

@section('content')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <a href="{{ url('operator/pembayaran/buat')}}"><button type="button" class="btn btn-primary btn-sm">Tambah Bank</button></a>

      </div>
      <div class="box-body table-responsive no-padding">
        <?php $i = 1; ?>
        <table class="table table-hover">
          <tr>
            <th>No</th>
            <th>Nama Bank</th>
            <th>No Rekening</th>
            <th>Atas Nama</th>     
            <th>Logo</th>           
            <th>Action</th>
          </tr>
          @foreach($tipe as $key)
          <tr>

            <td>{{ $i++ }}</td>
            <td>{{ $key->nama_bank }}</td>
            <td>{{ $key->no_rek }}</td>
            <td>{{ $key->atas_nama }}</td>
            <td><img src="{{ url('assets/logo/'.$key->logo) }}" width="50"></td>
            <td>
              <form action="{{ url('operator/pembayaran/'.$key->id) }}" method="post">
                <a href="{{ url('operator/pembayaran/'.$key->id.'/edit')}}" class="btn btn-info"><i class="fa fa-th-list"></i></a>
                <button type="submit" onclick="return confirm('Are you sure to delete?')"  class="btn btn-danger"><i class="fa fa-trash"></i></button>
                <input type="hidden" name="_method" value="DELETE">
                {{ csrf_field() }}
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
