@extends('layouts.users.app')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
<style type="text/css">
.heading{
 border-top-left-radius:4px;
 border-top-right-radius:4px;
}
.content{ 
 border-bottom-left-radius:4px;
 border-bottom-right-radius:4px;
}
.frame{
  border-radius: 4px;
}
</style>
<ul class="breadcrumbs">
 <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
 <li><a href="#">Sertifikasi</a></li>       
</ul>
<div class="grid">
  <div class="row cells3">
    <?php $i=1;?>
    @foreach($kategori as $key)
    <div class="cell">
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title"><a href="{{ url('sertifikasi/'.$key->slug) }}" style="color:white; padding: 10px 10px 10px 10px;" onclick="document.getElementById('my_form').submit(); return false;">{{ $key->nama_sp }}</a></span>
        </div>
        <div class="content padding10">
          <div class="panel image-container">
            <div class="frame"><a href="{{ url('sertifikasi/'.$key->slug) }}"><img src="{{ url('assets/kategori/'.$key->image) }}"></a></div>
          </div>
          {{ $key->isi }}
        </div>
        <hr>
      </div>
    </div>
    @if($i%3==0)
  </div>
  <div class="row cells3">
    @endif
    <?php $i++;?>
    @endforeach
    <div class="row cells1">
      <div class="cell">
        {{ $kategori->links() }}
      </div>
    </div>
  </div>
</div>
@if(sizeof($kategori)==0)    
<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
@endif
@endsection
