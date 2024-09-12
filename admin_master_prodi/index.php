<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Admin</title>
  <?php
  session_start();
  $konstruktor ='admin_master_prodi';
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
            <h1 class="m-0">Master Data Prodi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Data Prodi</li>
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
          <div class="col-lg-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="nav-icon fas fa-book"></i> Data Prodi</h3>
              </div>
                <div class="card-body">

                  <a href="tambahprodi.php" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-download"></i>Tambah Data</a>

                  <a href="proses.php?reset=reset_data&kd_prodi=1" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan mereset semua data?')"><i class="nav-icon fas fa-sync"></i> Reset Data</a>

                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Kode Prodi</th>
                    <th>Nama Prodi</th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    //panggil data pada tbl_angkatan
                    $queryprodi = mysqli_query($con, "SELECT * FROM tbl_prodi") or die (mysqli_error($con));

                    //jika tabel ada isinya maka tampilkan 
                    if (mysqli_num_rows($queryprodi)>0)
                    {
                    while($dt_prodi=mysqli_fetch_array($queryprodi)){
                      ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$dt_prodi['kode_prodi'];?></td>
                        <td><?=$dt_prodi['nama_prodi'];?></td>
                        <td>
                          <center>
                          <a href="proses.php?kd_prodi=<?=$dt_prodi['kode_prodi'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data prodi dengan kode [<?=$dt_prodi['kode_prodi'];?>] - Prodi : [<?=$dt_prodi['nama_prodi'];?>]')"><i class="nav-icon fas fa-trash"></i></a>
                        </center>
                        </td>
                      </tr>
                        <?php
                    }

                    }
                    else
                    {
                      ?>
                      <tr>
                        <td colspan="4">Tidak ditemukan Data prodi pada database</td>
                      </tr>
                      <?php
                    }
                  ?>
                  </tbody>
                </table>
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
