<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Admin</title>
  <?php
  session_start();
  $konstruktor ='admin_konfigurasi';
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
<?php
//memanggil semua kolom pada tabel konfigurasi
$pgllogoapp= mysqli_query($con, "SELECT * FROM tbl_konfigurasi WHERE id=1") or die (mysqli_error($con));
$pgllogotitle= mysqli_query($con, "SELECT * FROM tbl_konfigurasi WHERE id=2") or die (mysqli_error($con));

//menampung array dari query
$arrapp = mysqli_fetch_array($pgllogoapp);
$arrtitle = mysqli_fetch_array($pgllogotitle);

//mengambil value kolom lokasi_file
$logoapp = $arrapp['lokasi_file'];
$logotitle = $arrtitle['lokasi_file'];
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konfigurasi Sistem</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Konfigurasi Sistem</li>
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
                <h3 class="card-title"><i class="nav-icon fas fa-cog"></i>Konfigurasi sistem</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title"> <i class="nav-icon fas fa-image"></i> Logo Aplikasi</h3>
                      </div>
                      <div class="card-body">
                          <form action="updatelogoapp.php" method="post" enctype="multipart/form-data">
                     <center>
                      <img src="<?=$logoapp;?>" height="150px" width="150px">
                    </br>
                  <input type="file" name="logoapp" class="form-control" accept="image/*" required>
                </center>
                  (direkomendasikan menggunakan file(xxx.png)
                </br>
              </br>
              
              <button type="submit" class="btn btn-primary btn-sm btn-block" name="updlogoapp"><i class="nav-icon fas fa-upload"></i> Update Logo App </button>
                     </form>
                        </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title"><i class="nav-icon fas fa-image"></i> Logo Tittle </h3> 
                      </div>
                      <div class="card-body">
                          <form action="updatelogotitle.php" method="post" enctype="multipart/form-data">
                     <center>
                      <img src="<?=$logotitle;?>" height="150px" width="150px">
                    </br>

                    <input type="file" name="logotitle" class="form-control" accept="image/*" required>
                    </center> 
                    (direkomendasikan menggunakan file(xxx.png)
                </br>
              </br>
              <button type="submit" class="btn btn-danger btn-sm btn-block" name="updlogotitle"><i class="nav-icon fas fa-upload"></i> Update Logo Title </button>
                     </form>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                       <i class="nav-icon fas fa-cog"></i> Konfigurasi Nama Aplikasi
                      </div> 
                      <div class="card-body">
                        <form action="updatenama.php" method="POST">
                        <div class="row">
                          <div class="col-lg-2">
                            <label for="nama-app"> Nama Aplikasi : </label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="appname" class="form-control" required>
                        </div>
                        <div class="col-lg-2">
                          <button type="submit" name="gantinama" class="btn btn-sm btn-danger btn-block">
                            <i class="nav-icon fas fa-upload"></i> update 
                          </button>
                        </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                    <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                       <i class="nav-icon fas fa-cog"></i> Konfigurasi Copyright Aplikasi
                      </div> 
                      <div class="card-body">
                        <form action="updatecopy.php" method="POST">
                        <div class="row">
                          <div class="col-lg-2">
                            <label for="copyright"> Copyright : </label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="copyright" class="form-control" required>
                        </div>
                        <div class="col-lg-2">
                          <button type="submit" name="updatecopy" class="btn btn-sm btn-danger btn-block">
                            <i class="nav-icon fas fa-upload"></i> update 
                          </button>
                        </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-lg-12">
                    <div class="card card-primary">
                      <div class="card-header">
                       <i class="nav-icon fas fa-cog"></i> Konfigurasi Nama Universitas
                      </div> 
                      <div class="card-body">
                         <form action="updateuniv.php" method="POST">
                        <div class="row">
                          <div class="col-lg-2">
                            <label for="universitas"> Universitas : </label>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" name="universitas" class="form-control" required>
                        </div>
                        <div class="col-lg-2">
                          <button type="submit" name="updateuniv" class="btn btn-sm btn-danger btn-block">
                            <i class="nav-icon fas fa-upload"></i> update 
                          </button>
                        </form>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </div>




                
                


                  
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
