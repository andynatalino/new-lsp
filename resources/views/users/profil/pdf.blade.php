
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>1110000 - Sakasakti</title>

  
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
          From
          <address>
            <strong>{{ $ss->nama_web}}</strong><br>
            MENARA BIDAKARA 2<br>
            Gedung Bina sentra 1st Floor, Jl. Gatot Subroto Kav. 71-73 Selatan<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
            <strong>{{ $transaksi->user->name }}</strong><br>
            Sensus IIB No.11A<br>
            Bidaracina Jakarta Timur<br>
            Phone: (555) 539-1037<br>
            Email: john.doe@example.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>ID Pembayaran :</b>{{ $transaksi->id }}<br>
          <b>Waktu Konfirmasi :</b>{{ $transaksi->tanggal_konfirmasi }}<br>
          <b>Waktu Transaksi :</b>{{ $transaksi->tanggal_transaksi }}
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Kategori</th>
                <th>Skema</th>
                <th>Alamat</th>
                <th>Tanggal Mulai - Selesai</th>
                <th>Biaya</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $kategori->nama_sp }}</td>
                <td>{{ $transaksi->jadwal->nama_lsp }}</td>
                <td>2 Oktober 2017 - 2 Oktober 2017</td>
                <td>Rp. 100.000,-</td>
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
            Transfer Bank Mandiri<br>
            Atas nama : Andy Natalino<br>
            Sebesar : Rp. 100.000,-
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">      
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>Total Biaya :</th>
                <td>Rp. 100.000,- (LUNAS)</td>
              </tr>
            </table>
            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
             Anda bisa membawa bukti pembayaran ini ke
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
