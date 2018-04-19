@extends('layouts.users.app')
@section('pageTitle', 'Jadwal')

@section('content')
<ul class="breadcrumbs">
    <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
    <li><a href="{{ url('/sertifikasi') }}">Sertifikasi</a></li>
    <li><a href="#">{{ $kategori->nama_sp }}</a></li>
</ul>

<table id="jadwal" class="table striped hovered border bordered" data-role="datatable" data-searching="true" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Skema</th>
            <th>Tanggal Mulai - Tanggal Selesai</th>
            <th>Waktu</th>
            <th>Lokasi</th>
            <th>Kuota</th>
            <th>Biaya</th>
        </tr>
    </thead>
    <tbody>
      @foreach($jadwal as $key)
      <tr>
       <td><a href="{{ url('sertifikasi/'.$kategori->slug.'/'.$key->slug) }}">{{ $key->nama }}</a></td>
       <td>{{ date('j F Y', strtotime($key->tanggal_mulai)) }} s/d {{ date('j F Y', strtotime($key->tanggal_selesai)) }}</td>
       <td>{{ $key->waktu }}</td>
       <td>{{ str_limit($key->lokasi, 20) }}</td>
       <td>{{ App\Transaksi::where(['id_jadwal' => $key->id, 'status' => 5])->get()->count() }} / {{ $key->kuota }} Orang</td>
       <td>Rp. {{ $key->biaya }},-</td >
   </tr>
   @endforeach
</tbody>
</table>

<script type="text/javascript">
    $("table").dataTable({
        'searching' : true
    });
</script>
@if(sizeof($jadwal)==0)    
<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>

@endif
<br><br><br>
@endsection
