<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Mahasiswa</title>
  <?php
  session_start();
  $konstruktor ='mhs_kelas_bimbingan';
  require_once '../database/config.php';
  if($_SESSION['status']!=2){
    $usr = $_SESSION['username'];
    $waktu = date('Y-m-d H:i:s');
    $auth = $_SESSION['status'];
    $nama = $_SESSION['nama_user'];
    if ($auth==0)
    {
      $tersangka = "Administrator";
    }
    if($auth==1)
    {
      $tersangka = "Dosen";
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
        include '../mhs_sidebar.php';
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
              <li class="breadcrumb-item"><a href="#">Mahasiswa</a></li>
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
                <h3 class="card-title"><i class="nav-icon fas fa-chalkboard-teacher"></i> Kelas Bimbingan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Periode Akademik</th>
                    <th>Dosen Pembimbing</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Progres</th>
                    <th>Status</th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  $nim = @$_SESSION['username'];
                  $qrkelasbimbingan = mysqli_query($con, "SELECT * FROM tbl_kelas_bimbingan WHERE nim='$nim'") or die (mysqli_error($con));
                  $rvkelasbimbingan = mysqli_num_rows($qrkelasbimbingan);
                 


                  if($rvkelasbimbingan>0){
                    while($dt_kelasbimbingan = mysqli_fetch_array($qrkelasbimbingan)){
                      ?>
                      <tr>
                      <td><?=$no++;?></td>
                      <td>
                        <?php

                        $pd=$dt_kelasbimbingan['kode_periode'];
                        $ambilperiode = mysqli_query($con, "SELECT periode FROM tbl_periode WHERE kode_periode='$pd'");
                        $arrp = mysqli_fetch_assoc($ambilperiode);
                        $periode = $arrp['periode'];
                        ?>
                       <b><?=$pd;?></b>
                         <br><?=$periode;?>
                      </td>
                      <td>
                        <?php
                        $nidn = $dt_kelasbimbingan['nidn'];
                        $ambilnamadosen = mysqli_query($con, "SELECT nama,kontak FROM tbl_dosen
                         WHERE nidn='$nidn' ") or die (mysqli_error($con));
                        $arr = mysqli_fetch_assoc($ambilnamadosen);
                        $nama_dosen = $arr['nama'];
                        ?>
                        <b><?=$dt_kelasbimbingan['nidn'];?></b>
                        <br><?=$nama_dosen;?>
                         <br> <a href="https://api.whatsapp.com/send?phone=<?=$arr['kontak'];?>&text=Assalamualaikum <?=$arr['nama'];?>" class="btn btn-sm btn-success" target="_blank">
                                <img src="../img/wa.png" height="18px" width="18px"> <?=$arr['kontak'];?>
                              </a>
                       </td>
                       <td>
                        <?php
                        $nim = $dt_kelasbimbingan['nim'];
                        $ambilnamamhs = mysqli_query($con, "SELECT nama,kontak FROM tbl_mahasiswa WHERE nim='$nim'");
                        $arrmhs = mysqli_fetch_assoc($ambilnamamhs);
                        $mhs = $arrmhs['nama'];
                        ?>
                         <b><?=$nim;?></b>
                        <br><?=$mhs;?>
                       
                       </td>
                       <td>Judul Progres</td>
                      
                       <td>
                         <center>
                           <?php 
                           if ($dt_kelasbimbingan['status']==1){
                            ?>
                            <button type="button" class="btn btn-sm btn-primary">Aktif</button>
                            <?php
                           }
                           else
                           {
                            ?>
                             <button type="button" class="btn btn-sm btn-danger">Tidak Selesai</button>
                             <?php
                           }
                           ?>
                         </center>
                       </td>
                        <td>
                          <center>
                        <a href="detail_bimbingan.php?id_kelas=<?=$dt_kelasbimbingan['id_kelas'];?>&keterangan=<?=$dt_kelasbimbingan['progres'];?>" 
                        class= "btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i> Detail </a>
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
                        <td colspan="7">Tidak ditemukan Data Bimbingan pada database</td>
                      </tr>
                      <?php
                    }


                  ?>
                  </tbody>

                </table>
                  
                </div>
                <!-- /.card-body -->

                
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
