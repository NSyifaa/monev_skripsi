<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Admin</title>
  <?php
  session_start();
  $konstruktor ='admin_kelasbimbingan';
  require_once '../database/config.php';
  if($_SESSION['status']!=0){
    $usr = $_SESSION['username'];
    $waktu = date('Y-m-d H:i:s');
    $auth = $_SESSION['status'];
    $nama = $_SESSION['nama_user'];
    if ($auth==1)
    {
      $tersangka = "Dosen";
    }
    if($auth==2)
    {
      $tersangka = "Mahasiswa";
    }
    $ket = "Pengguna dengan username ".$usr." , nama: ".$nama." melakukan cross 
    authority dengan akses sebagai".$tersangka;
    $queycrossauth = mysqli_query($con,"INSERT INTO tbl_cross_auth VALUES ('','$usr','$waktu','$ket')") 
    or die (mysqli_error($con));

    echo '<script>window.location= "../login/logout.php"</script>';
  }
  else
  {
  include '../mhs_listlink.php';
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo.png" alt="Monev-Skripsi" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php
    include '../mhs_navbar.php';
    ?>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../img/logo.png" alt="Monev-Skripsi" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Monev Skripsi</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <?php
        include '../admin_sidebar.php';
        ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Kelas Bimbingan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kelas Bimbingan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h5><i class="nav-icon fas fa-chalkboard teacher"></i> Kelas Bimbingan </h5>
                
              </div>

              <div class="card-body">
                <?php 
                  $idbimbingan = @$_GET['id_kelas'];
                  $qweri = mysqli_query($con, "SELECT nidn,kode_periode,nim FROM tbl_kelas_bimbingan WHERE id_kelas='$idbimbingan'") or die (mysqli_error($con));
                  $arrqweri = mysqli_fetch_assoc($qweri);
                  $nidn = $arrqweri['nidn'];
                  $nim = $arrqweri['nim'];
                  $kode_periode = $arrqweri['kode_periode'];

                  //undang periode
                  $qweriprd = mysqli_query($con, "SELECT periode FROM tbl_periode WHERE kode_periode='$kode_periode'") or die (mysqli_error($con));
                  $arrqweriprd = mysqli_fetch_assoc($qweriprd);
                  $periode =  $arrqweriprd['periode'];

                  //undang dosen
                   $qweridsn = mysqli_query($con, "SELECT nama FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));
                  $arrqweridsn = mysqli_fetch_assoc($qweridsn);
                  $nama_dosen =  $arrqweridsn['nama'];

                  //undang mhs
                  $qwerimhs = mysqli_query($con, "SELECT nama,prodi FROM tbl_mahasiswa WHERE nim='$nim'") or die (mysqli_error($con));
                  $arrqwerimhs = mysqli_fetch_assoc($qwerimhs);
                  $nama_mhs =  $arrqwerimhs['nama'];
                  $kode_prodi = $arrqwerimhs['prodi'];

                   $qweriprodi = mysqli_query($con, "SELECT nama_prodi FROM tbl_prodi WHERE kode_prodi='$kode_prodi'") or die (mysqli_error($con));
                  $arrqweriprodi= mysqli_fetch_assoc($qweriprodi);
                  $nama_prodi =  $arrqweriprodi['nama_prodi'];
                  

                ?>
                <div class="row">
                  <div class="col-lg-6">
                    <table class="table table-sm table-borderless table-striped">
                      <tr>
                        <td width="35%">Periode Akademik</td>
                         <td width="2%">:</td>
                          <td>
                            <b><?=$kode_periode;?></b>
                          </td>
                      </tr>

                       <tr>
                        <td width="35%">NIDN</td>
                         <td width="2%">:</td>
                          <td><b><?=$nidn;?></b></td>
                      </tr>

                       <tr>
                        <td width="35%">Dosen Pembimbing</td>
                         <td width="2%">:</td>
                          <td><b><?=$nama_dosen;?></b></td>
                      </tr>
                      
                    </table>
                  </div>
                  <div class="col-lg-6">
                    <table class="table-sm table-borderless table-striped">
                       <tr>
                        <td width="35%">NIM</td>
                         <td width="2%">:</td>
                          <td><b><?=$nim;?></b></td>
                      </tr>

                       <tr>
                        <td width="35%">Nama Mahasiswa</td>
                         <td width="2%">:</td>
                          <td><b><?=$nama_mhs;?></b></td>
                      </tr>

                       <tr>
                        <td width="35%">Program Studi</td>
                         <td width="2%">:</td>
                          <td><b><?=$nama_prodi;?></b></td>
                      </tr>
                      
                    </table>
                    
                  </div>
                </div>
                <!-- /.row -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title"><i class="nav-icon fas fa-chart-line"></i> Progres Bimbingan </h3>
                      </div>
                      <div class="card-body">
                        <center>
                          <b><h4>Monitoring Bimbingan Skripsi Berbasis Web</h4></b>
                        </center>
                        <br>


                        <div class="row">
                          <div class="col-lg-8">

                            <!-- /.judul -->
                            <div class="card card-secondary collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Judul</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                          The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of judul-->

                           <!-- /.bimbingan bab 1-->
                            <div class="card card-danger collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Bab 1</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                           The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of bb 1-->

                           <!-- /.bimbingan bab 2-->
                            <div class="card card-warning collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Bab 2</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                           The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of bb 2-->

                           <!-- /.bimbingan bab 3-->
                            <div class="card card-info collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Bab 3</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                           The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of bb 3-->

                           <!-- /.bimbingan bab 4-->
                            <div class="card card-success collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Bab 4</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                           The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of bb 4-->

                           <!-- /.bimbingan bab 5-->
                            <div class="card card-primary collapsed-card">
                            <div class="card-header">
                              <h3 class="card-title">Bimbingan Bab 5</h3>

                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-chevron-down"></i>
                           </button>
                           </div>
                          <!-- /.card-tools -->
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                           The body of the card
                           </div>
                           <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <!-- /.end of bb 5-->
                          </div>

                          <div class="col-lg-4">
                            <div class="card card-primary" >
                              <div class="card-header">
                                  <h3 class="card-title"><i class="nav-icon fas fa-copy"></i> Status Bimbingan </h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-sm">
                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Judul </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 1 </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 2 </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 3 </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 4 </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>

                                   <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 5 </td>
                                    <td> Tanggal Selesai</td>
                                  </tr>
                                </table>
                              </div>
                              
                            </div>

                            
                          </div>
                          
                        </div>
                        


                      </div>
                    </div> 
                  </div>
                </div>
              </div>
              <!-- /.card body-->

            </div>
            
          </div>
          </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php
  include '../footer.php';
  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
include '../mhs_script.php';
}
?>
</body>
</html>
