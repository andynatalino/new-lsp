<!DOCTYPE html>
<!--Hayoo mau ngapain :v-->
<!-- ======================= -->
<!--cybercyb.blogspot.com-->
<!--facebook.com/andy.jkz-->
<!--line : andynl-->
<!--smkn10jakarta.sch.id-->
<!--THR3E .DoT.-->
<!--Intersoft 6th © 2017-->
<!-- ======================= -->
<html>
<head>  
  <?php
  $meta = App\Setting::first();  
  ?>
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
  <meta name="keywords" content="{{ $meta->keywords }}">
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

  <title>@yield('pageTitle') - Sakasakti</title>
  <?php $s = App\Setting::first(); ?>
<!-- <link href="{{ url('assets/logo/'.$s->favicon)}}" rel="shortcut icon">
  <link href="{{ url('assets/logo/'.$s->favicon)}}" rel="favicon">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-icons.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-responsive.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-schemes.min.css" rel="stylesheet">
  <link href="{{ url('css/login.css')}}" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->


<link href="{{ url('assets/logo/'.$s->favicon)}}" rel="shortcut icon">
  <link href="{{ url('assets/logo/'.$s->favicon)}}" rel="favicon">
  <link href="{{ url('css/metro.min.css')}}" rel="stylesheet">  
  <link href="{{ url('css/metro-icons.min.css')}}" rel="stylesheet">
  <link href="{{ url('css/metro-responsive.min.css')}}" rel="stylesheet">
  <link href="{{ url('css/metro-schemes.min.css')}}" rel="stylesheet">  
  <link href="{{ url('css/login.css')}}" rel="stylesheet" type="text/css">
  <script type="text/javascript" src="{{ url('js/jquery-2.1.3.min.js')}}"></script>

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
</head>
<body>
  @include('layouts.users.menu')
  <div class="container">
    @yield('content')
  </div>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/js/metro.min.js"></script>
  <script type="text/javascript"src='//google.com/recaptcha/api.js'></script>
  <script id="dsq-count-scr" src="//sakasakti.disqus.com/count.js" async></script>
  <!-- <script type="text/javascript" src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script type="text/javascript">
    $(function(){
      $("#carousel").carousel();
    });
    $(function(){
      var form = $(".login-form");

      form.css({
        opacity: 1,
        "-webkit-transform": "scale(1)",
        "transform": "scale(1)",
        "-webkit-transition": ".5s",
        "transition": ".5s"
      });
    });
  </script>  
</body>
<!--   @include('layouts.users.footer') -->
</html>
