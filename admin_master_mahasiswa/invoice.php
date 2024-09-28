<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice Pembayaran</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets_adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminLTE/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
         <img src="../img/dosen/fotoaja.png" height="50px" width="50px"> SIM Pendaftaran Santri Baru
          <small class="float-right">Tanggal: <?=date('d-F-Y')?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>SIM Pendaftaran Santri Baru</strong><br>
         
          Penggarutan, Bumiayu, Kode Pos 52272<br>
          Phone: 0823-2293-0020<br>
          Email: ribathmusyarraf@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>Naylu Syifa</strong><br>
         
          Bantarkawung<br>
          Phone: 083861228265<br>
          Email: naylusyifa16@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Pembayaran</b><br>
        <br>
        <b>Kode Pembayaran:</b> 4F3S8J<br>
        <b>Tanggal Pembayaran:</b> 2/22/2014<br>
      
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama Pembeli</th>
            <th>Layanan</th>
            <th>Tanggal Pesanan</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <tr>
            <td>1</td>
            <td>Naylu Syifa</td>
            <td>Pembelian Kode Formulir</td>
            <td>25 September 2024</td>
            <td>Rp.50.000,-</td>
          </tr>
          
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
       
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Total Pembayaran</p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td>Rp. 50.000,-</td>
            </tr>
            <tr>
              <th>Jumlah Bayar</th>
              <td>$Rp.50.000</td>
            </tr>
            <tr>
              <th>Kembali</th>
              <td>Rp. 0 ,-</td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
