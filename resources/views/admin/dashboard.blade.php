@extends('layouts.admin.app-admin')

@section('pageTitle', 'Dashboard')

@section('content')
<?php 
use Carbon\Carbon;
$usr = App\User::get()->count();  
$cat = App\Kategori::get()->count();  
$jad = App\Jadwal::get()->count();  
$tra = App\Transaksi::where(['status' => 5])->get()->count();  
$kon = App\Transaksi::where(['status' => 4])->get()->count();  
$gal = App\galeri::get()->count();  
$tipe = App\Pembayaran::get()->count();  
$sli = App\Slider::get()->count();  
$date = Carbon::today();
$transaksi = App\Transaksi::whereDate('tanggal', '=', Carbon::today()->toDateString())->get();
?>
<div class='row'>
  <div class='col-md-12'>   
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number">{{ $usr }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-grey"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Admin</span>
          <span class="info-box-number">{{ $sli }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-grey"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Operator</span>
          <span class="info-box-number">{{ $sli }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-bars"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Kategori</span>
          <span class="info-box-number">{{ $cat }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-tasks"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Jadwal</span>
          <span class="info-box-number">{{ $jad }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-money"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Transaksi Lunas</span>
          <span class="info-box-number">{{ $tra }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-ticket"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Konfirmasi Tunai</span>
          <span class="info-box-number">{{ $kon }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="fa fa-photo"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Galeri</span>
          <span class="info-box-number">{{ $gal }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-navy"><i class="fa fa-credit-card"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Tipe Pembayaran</span>
          <span class="info-box-number">{{ $tipe }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-grey"><i class="fa fa-tv"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Slider</span>
          <span class="info-box-number">{{ $sli }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-grey"><i class="fa fa-tv"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Konfirmasi Bank</span>
          <span class="info-box-number">{{ $sli }}</span>
        </div>
      </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-grey"><i class="fa fa-tv"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Berita</span>
          <span class="info-box-number">{{ $sli }}</span>
        </div>
      </div>
    </div>
  </div>  
</div>
<div class='col-md-12'>  
  <div class="box">
  <div class="box-header with-border">
    {!! $chart->html() !!}
  </div>    
</div>
</div>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Transaksi Hari ini</h3>
        <div class="box-tools"></div>
      </div>
      <div class="box-body table-responsive no-padding">
        <table class="table table-hover">
          <tr>
            <th>ID Transaksi</th>
            <th>User</th>
            <th>Tanggal Konfirmasi</th>
            <th>Jadwal</th>
            <th>Biaya</th>
            <th>Status</th>
          </tr>
          @foreach($transaksi as $key)
          <tr>
            <td>{{ $key->id }}</td>
            <td>{{ $key->user->name }}</td>
            <td>{{ date('j F Y h:i:s', strtotime($key->tanggal)) }}</td>
            <td>{{ $key->jadwal->nama_lsp }}</td>
            <td>Rp. {{ $key->jadwal->biaya }},-</td>
            <td>              
              @if($key->status == 4) <span class="label label-warning">Pending</span> @elseif($key->status == 5) <span class="label label-success">Lunas</span> @endif
            </td>          
          </tr>         
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
</section>

@section('js')

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">google.charts.load('current', {'packages':['corechart', 'gauge', 'geochart', 'bar', 'line']})</script>
{!! $chart->script() !!}

@endsection
@endsection
