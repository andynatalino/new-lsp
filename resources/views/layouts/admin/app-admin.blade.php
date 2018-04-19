<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>@yield('pageTitle') - Admin</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <meta name="robots" content="noindex,nofollow">
  <link href="{{ url('//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ url('dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
  <link href="{{ url('dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.min.css">
  <link href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/morris.js/morris.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="{{ url('assets/plugins/ckeditor/ckeditor.js') }}"></script>  
  {!! Charts::styles() !!}

</head>
<?php
$ss = App\Setting::first();
?>
<body class="{{ $ss->color_admin }}">
  <div class="wrapper">

    @include('layouts.admin.header-admin')

    @include('layouts.admin.sidebar-admin')

    <div class="content-wrapper">
      <section class="content-header">
        <h1>@yield('pageTitle')</h1>
        <ol class="breadcrumb">
          <li><a href="{{ url('/admin')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
          <li class="active">@yield('pageTitle')</li>
        </ol>
      </section>
      <section class="content">
        @yield('content')
      </section>
    </div>
    @include('layouts.admin.footer-admin')
  </div>
  <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/morris.js/morris.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script src="{{ url ('bower_components/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ url ('//cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.11/js/app.min.js') }}" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  @yield('js')
</body>
</html>
