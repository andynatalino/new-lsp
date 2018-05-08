
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Cetak Bukti - Sakasakti</title>

  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style type="text/css" media="print">
@page { size: landscape; }
</style>
</head>
<body onload="setTimeout(function(){window.print();},1000);">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <img src="http://110.232.89.67/lsp/public/assets/logo/2017102321231959edfb57a35ad.png" style="height: 50px; width: 220px;"></a>
            <small class="pull-right">Tanggal: 2 Oktober 2017</small>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>{{ $ss->nama_web}}</strong><br>
           <p>
            {{ $ss->alamat }}
           </p>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <address>
            <strong>Bukti Pendaftaran Tunai</strong><br>
           
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">                   
          <b>Kode :</b> {{ $trans->kode_transfer }}<br>
          <b>ID Userdata :</b> {{ $userdata->id }}<br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<p></p>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Kategori</th>
                <th>Skema</th>
                <th>Biaya</th>
                <th>Nama Pendaftar</th>
              </tr>
            </thead>
            <tbody>
              <tr>
              <td>{{ $kategori->nama_sp }}</td>
                <td>{{ $trans->jadwal->nama }}</td>
                <td>Rp{{ $trans->kode_transfer }}</td>
                <td>{{ $trans->user->name }}</td>
              </tr>         
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Tipe Pembayaran : </p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
           <b>TUNAI</b>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">      
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total Biaya :</th>
                <td>Rp{{ $trans->kode_transfer }} (PENDING)</td>
              </tr>
            </table>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
             Hubungi kontak kami {{ $ss->telp }}
           </p>
         </div>
       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </section>
   <!-- /.content -->
 </div>
 <!-- ./wrapper -->
</body>
</html>
