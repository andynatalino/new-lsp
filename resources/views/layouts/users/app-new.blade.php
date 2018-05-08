<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $meta = App\Setting::first();  
  ?>
 @if(Request::is('/')) <title>Sakasakti - Lembaga Sertifikasi Profesi</title> 
@else <title>@yield('pageTitle') - Sakasakti</title> 
@endif
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="{{ $meta->nama_web }}">
 @if(Request::is('/')) <meta name="description" content="{{$meta->meta_description }}"> 
@else <meta name="description" content="@yield('description')">
@endif

  <meta property="og:url" content="{{ Request::url() }}">
  <meta property="og:title" content="{{ $meta->meta_title }}">
 @if(Request::is('/')) <meta property="og:description" content="{{ $meta->meta_description }}"> 
@else <meta property="og:description" content="@yield('description')">
@endif
  <meta name="keywords" content="{{ $meta->meta_keywords }}">
  <meta property="og:image" content="{{ url('assets/logo/'.$meta->logo) }}">
  <meta name='google-site-verification' content="{{ $meta->google_site_verification }}">
  <meta name='msvalidate.01' content="{{ $meta->bing }}">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:site" content="{{ $meta->twitter }}">
  <meta name="twitter:creator" content="{{ $meta->twitter }}">
  <meta name="twitter:title" content="{{ $meta->meta_title }}">
  <meta name="twitter:url" content="{{ Request::url() }}">
 @if(Request::is('/')) <meta name="twitter:description" content="{{$meta->meta_description }}"> 
@else <meta name="twitter:description" content="@yield('description')">
@endif
  <meta name="twitter:image:src" content="{{ url('assets/logo/'.$meta->logo) }}">

  <link href="{{ url('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ url('vendor/modern-business.min.css')}}" rel="stylesheet">
  @yield('css')
</head>

<body>

  @include('layouts.users.navbar')

  @yield('slider')
  
  <div class="container">
    @yield('content')    
  </div>  <!-- end container -->
  @if(Request::is('login')) @else @include('layouts.users.footer-new') @endif

  
  @if(Auth::check())
  <?php 
  $trans = App\trans::where('user_id', Auth::user()->id)->where('notifikasi','1')->orderBy('created_at', 'desc')->first();  
  $pembayaran = App\trans::where('user_id', Auth::user()->id)->orderBy('status','0')->orderBy('created_at', 'desc')->first();
  ?>

  @if($trans)
  @if($trans->notifikasi == "1")
  <!-- Modal -->

  <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">⚠️ Notifikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p class="text-center">
            Yth. Bapak/Ibu <b>{{ Auth::user()->name }}</b><br>
            Anda telah mengikuti Skema {{ $trans->jadwal }} dan Anda dinyatakan
            @if($trans->status == "1")
            <b>"KOMPETEN"</b>
            <br>
            Segera ambil sertifikat Anda di kantor kami
            @elseif($trans->status == "2")
             <b>"TIDAK KOMPETEN"</b>
            <br>
            Pilih Sertifikasi? <a href="{{ url('sertifikasi')}}">Klik Disini</a>
             @endif
          </p>
        </div>
        <form method="post" action="{{ url('notifikasi')}}">
          {{csrf_field()}}          
          <div class="modal-footer">          
            <input type="hidden" name="id" value="{{ $trans->id }}">            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">OK</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @else

  @endif
  @endif

  @if($pembayaran)
  @if($pembayaran->status == "0")
  <!-- Modal -->

  <div class="modal fade" id="overlay" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">⚠️ Notifikasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>
            Yth. Bapak/Ibu <b>{{ Auth::user()->name }}</b>,
           Pembayaran Anda telah kami konfirmasi dipersilahkan untuk cetak bukti Anda.
        </div>
        <form method="post" action="{{ url('statuspembayaran')}}">
          {{csrf_field()}}          
          <div class="modal-footer">          
            <input type="hidden" name="id" value="{{ $trans->id }}">            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">CETAK BUKTI</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @else

  @endif
  @endif
  
  @endif

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="http://getbootstrap.com/assets/js/vendor/popper.min.js"></script>
  <script src="{{ url('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script type="text/javascript">
    $('#overlay').modal('show');

  // setTimeout(function() {
  //   $('#overlay').modal('hide');
  // }, 5000);
</script>
</body>

</html>
