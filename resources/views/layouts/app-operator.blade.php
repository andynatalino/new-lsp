<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-icons.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-responsive.min.css" rel="stylesheet">
  <link href="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/css/metro-schemes.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/metro/3.0.17/js/metro.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.15/js/jquery.dataTables.min.js"></script>
  <!-- <script type="text/javascript" src="{{asset('/js/jquery-ui.js')}}"></script> -->

  <style>
  html, body {
    height: 100%;
  }
  body {
  }
  .page-content {
    padding-top: 3.125rem;
    min-height: 100%;
    height: 100%;
  }
  .table .input-control.checkbox {
    line-height: 1;
    min-height: 0;
    height: auto;
  }

  @media screen and (max-width: 800px){
    #cell-sidebar {
      flex-basis: 52px;
    }
    #cell-content {
      flex-basis: calc(100% - 52px);
    }
  }
  </style>

  <script>
  function pushMessage(t){
    var mes = 'Info|Implement independently';
    $.Notify({
      caption: mes.split("|")[0],
      content: mes.split("|")[1],
      type: t
    });
  }

  $(function(){
    $('.sidebar').on('click', 'li', function(){
      if (!$(this).hasClass('active')) {
        $('.sidebar li').removeClass('active');
        $(this).addClass('active');
      }
    })
  })
  </script>
</head>

<body class="bg-steel">
  @include('menu-operator')
  @yield('content')
</body>

</html>
