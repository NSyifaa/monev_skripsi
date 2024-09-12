<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Admin</title>
  <?php
  session_start();
  $konstruktor ='admin_master_mahasiswa';
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
            <h1 class="m-0">Tambah Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin Dashboard</a></li>
              <li class="breadcrumb-item active">Tambah Mahasiswa</li>
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
                <h3 class="card-title"><i class="nav-icon fas fa-chalkboard-teacher"></i> Tambah Mahasiswa</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                   <form action="prosestambah.php" method="post">
                  <a href="../admin_master_mahasiswa" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-chevron-left"></i>Kembali</a>
                  <br>
                  <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" maxlength="10" id="nim" name="nim" onkeypress="return Isnumeric(event);" placeholder="input nim" autofocus required>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" maxlength="150" id="nama" name="nama" placeholder="input nama Mahasiswa" required>
                </div>
                <div class="form-group">
                    <label for="prodi">Prodi</label>
                   <select class="form-control" name="prodi" required>
                    <option value="">--Pilih Prodi--</option>
                    <?php
                    //panggil data pada table prodi
                      $pglprodi = mysqli_query($con, "SELECT * FROM tbl_prodi") or die (mysqli_error($con));

                       //buat variabel untuk menampung return value dari query tbl_prodi
                      $rvprodi = mysqli_num_rows($pglprodi);

                      //kondisi jika tabel prodi memiliki >= 1 data
                      if($rvprodi>0){
                        //melakukan perulangan untuk menampilkan data
                        while($dt_prodi=mysqli_fetch_array($pglprodi)){
                          //tampilkan data pada option di elemen select
                          ?>
                          <option value="<?=$dt_prodi['kode_prodi'];?>">
                          <?=$dt_prodi['kode_prodi'];?> - 
                          <?=$dt_prodi['nama_prodi'];?>
                           </option>
                          <?php

                        }

                      }
                      //kondisi jika tabel prodi kosong
                      else{

                      }

                    ?>

                     

                   </select>
                </div>

                <div class="form-group">
                    <label for="angkatan">Angkatan</label>
                   <select class="form-control" name="angkatan" required>
                    <option value="">--Pilih Angkatan--</option>
                    <?php
                    //panggil data pada table prodi
                      $pglangkatan = mysqli_query($con, "SELECT * FROM tbl_angkatan") or die (mysqli_error($con));

                       //buat variabel untuk menampung return value dari query tbl_prodi
                      $rvangkatan = mysqli_num_rows($pglangkatan);

                      //kondisi jika tabel prodi memiliki >= 1 data
                      if($rvangkatan>0){
                        //melakukan perulangan untuk menampilkan data
                        while($dt_angkatan=mysqli_fetch_array($pglangkatan)){
                          //tampilkan data pada option di elemen select
                          ?>
                          <option value="<?=$dt_angkatan['kode_angkatan'];?>">
                          <?=$dt_angkatan['kode_angkatan'];?> - 
                          <?=$dt_angkatan['keterangan'];?>
                           </option>
                          <?php

                        }

                      }
                      //kondisi jika tabel prodi kosong
                      else{

                      }

                    ?>

                     

                   </select>
                </div>
                <div class="form-group">
                    <label for="kelamin">Jenis Kelamin</label>
                   <select name="kelamin" class="form-control"> 
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                   </select>
                </div>

                <div class="form-group">
                    <label for="kontak">Kontak</label>
                    <input type="text" class="form-control" maxlength="150" id="kontak" name="kontak" onkeypress="return Isnumeric(event);" placeholder="input kontak dosen" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                   <select class="form-control" name="status" required>
                    <option value="">--Pilih Status--</option>
                    <?php
                    //panggil data pada table status
                      $pglstatus= mysqli_query($con, "SELECT * FROM tbl_status") or die (mysqli_error($con));

                       //buat variabel untuk menampung return value dari query tbl_status
                      $rvstatus = mysqli_num_rows($pglstatus);

                      //kondisi jika tabel status memiliki >= 1 data
                      if($rvstatus>0){
                        //melakukan perulangan untuk menampilkan data
                        while($dt_status=mysqli_fetch_array($pglstatus)){
                          //tampilkan data pada option di elemen select
                          ?>
                          <option value="<?=$dt_status['id'];?>">
                          <?=$dt_status['status'];?> 
                           </option>
                          <?php

                        }

                      }
                      //kondisi jika tabel status kosong
                      else{

                      }

                    ?>

                     

                   </select>
                </div>
                 
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="tambah" class="btn btn-primary btn-block"><i class="nav-icon fas fa-download"></i> Tambah Data</button>
                </div>
              </form>
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
