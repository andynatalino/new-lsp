@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
 <style type="text/css">

  img {max-width:100%;
    max-height: 250px;
  }

</style>
<!-- Page Heading/Breadcrumbs -->
<h4 class="mt-4 mb-3">Sertifikasi 
  <small>Kategori </small>
</h4>

<ol class="breadcrumb col-md-12">

  <li class="breadcrumb-item">
    <a href="{{ url('/')}}">Home</a>
  </li>
  <li class="breadcrumb-item active">Sertifikasi</li>
</ol>
<div class="row">
  @foreach($kategori as $key)
  <div class="col-lg-2 col-sm-6 portfolio-item">
    <div class="card" style="height: 300px;">
      <a href="{{ url('sertifikasi/'.$key->slug) }}"><img class="card-img-top" src="{{ url('assets/kategori/'.$key->image) }}" alt=""></a>
      <div class="card-body">
        <h6 class="card-title">
          <a href="{{ url('sertifikasi/'.$key->slug) }}">{{ $key->nama_sp }}</a>
        </h6>
        <p class="card-text">
          {!! \Illuminate\Support\Str::words($key->isi, 5,'')  !!}
         </p>
      </div>
    </div>
  </div>
  @endforeach
</div>

{{ $kategori->links() }}
<br>
@endsection

