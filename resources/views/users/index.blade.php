@extends('layouts.users.app-new')
@section('pageTitle', 'Home')
@section('slider')
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">


      @foreach($slider as $key)
      <div class="carousel-item @if ($slider->first() == $key) active @endif" style="background-image: url('{{ url('assets/slider/'.$key->gambar) }}')" alt="{{ $key->nama_slider }}">
        <div class="carousel-caption d-none d-md-block">
          <h3>{{ $key->nama_slider }}</h3>
          <p>{{ $key->deksripsi }}</p>
        </div>
      </div>
      @endforeach


<!--       <div class="carousel-item" style="background-image: url('https://images7.alphacoders.com/331/thumb-1920-331785.jpg')">
        <div class="carousel-caption d-none d-md-block">
          <h3>Third Slide</h3>
          <p>This is a description for the third slide.</p>
        </div>
      </div> -->

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</header>
@endsection

@section('content')
<br>
<hr>
<!-- Three columns of text below the carousel -->
<div class="row">
  <div class="col-lg-4">

    <h2>Teknologi Informasi</h2>
    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>

  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">

    <h2>Akuntansi</h2>
    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>

  </div><!-- /.col-lg-4 -->
  <div class="col-lg-4">

    <h2>Pemasaran</h2>
    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>

  </div><!-- /.col-lg-4 -->
</div><!-- /.row -->
<hr>
<!-- berita -->
<div class="row">
  @foreach($berita as $key)
  <style type="text/css">

  img {max-width:300px;
    max-height: 300px;
  }

</style>
<div class="col-lg-4 col-sm-6 portfolio-item">
  <div class="card">
    <!--   <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a> -->
    <div class="card-body">
      <h4 class="card-title">
        <a href="{{ url('berita/'.$key->slug) }}">{{ $key->judul }}</a>
      </h4>
      <p class="card-text">{!! \Illuminate\Support\Str::words($key->isi, 50,'....')  !!}</p>
    </div>
  </div>
</div>
<br>
{{ $berita->links() }}
@endforeach

</div>
<!-- end berita -->
<hr>
@endsection
