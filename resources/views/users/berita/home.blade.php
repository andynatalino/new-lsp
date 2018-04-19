@extends('layouts.users.app')
@section('pageTitle', 'Berita')

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
</style>

<ul class="breadcrumbs">
  <li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
  <li><a href="{{ url('/berita') }}">Berita</a></li>
</ul>
<div class="grid">
  <div class="row">
    <?php $i=1;?>
    @foreach($berita as $key)
    <div class="cell">
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
        <div class="heading">
          <span class="title"><a href="{{ url('berita/'.$key->slug) }}" style="color:white; padding: 10px 10px 10px 10px;" onclick="document.getElementById('my_form').submit(); return false;">{{ $key->judul }}</a></span>
        </div>
        <div class="content padding10">
          <div class="frame">          
            {!! \Illuminate\Support\Str::words($key->isi, 100,'....')  !!}
            <br>
            <br>
            <span class="place-right"><a href="{{ url('/berita/'.$key->slug) }}">Lanjutkan Membaca</a></span><br>
          </div>
          <hr>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{ $berita->links() }}
@if(sizeof($berita)==0)    
<span class="mif-warning mif-ani-horizontal mif-ani-slow fg-red"> Data Kosong!</span>
@endif
@endsection
