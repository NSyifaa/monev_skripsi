<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Dosen</title>
  <?php
  session_start();
  $konstruktor ='dosen_kelas_bimbingan';
  require_once '../database/config.php';
  if($_SESSION['status']!=1){
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
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../img/logo.png" alt="Monev-Skripsi" height="60" width="60">
  </div> -->

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
        include '../dosen_sidebar.php';
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
              <li class="breadcrumb-item"><a href="#">Dosen</a></li>
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
                   $qweridsn = mysqli_query($con, "SELECT nama,foto FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));
                  $arrqweridsn = mysqli_fetch_assoc($qweridsn);
                  $nama_dosen =  $arrqweridsn['nama'];
                  $foto_dosen =  $arrqweridsn['foto'];

                  //undang mhs
                  $qwerimhs = mysqli_query($con, "SELECT nama,prodi,foto FROM tbl_mahasiswa WHERE nim='$nim'") or die (mysqli_error($con));
                  $arrqwerimhs = mysqli_fetch_assoc($qwerimhs);
                  $nama_mhs =  $arrqwerimhs['nama'];
                  $kode_prodi = $arrqwerimhs['prodi'];
                  $foto_mhs =  $arrqwerimhs['foto'];

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
                             <!-- judul -->

                                               <!-- DIRECT CHAT PRIMARY -->
                              <div class="card card-primary card-outline direct-chat direct-chat-primary shadow-none">
                                <div class="card-header">
                                  <h3 class="card-title">Percakapan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                  <!-- Conversations are loaded here -->
                                  <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <?php 
                                    $prg = @$_GET['keterangan'];
                                    $querychat = mysqli_query($con, "SELECT * FROM tb_detail_bimbingan WHERE id_kelas='$idbimbingan' AND keterangan='$prg' ORDER BY id DESC") or die (mysqli_error($con));

                                    $rvchat = mysqli_num_rows($querychat);

                                    if($rvchat>0) {
                                      while($data_chat=mysqli_fetch_array($querychat)){
                                        $tgl = strtotime($data_chat['tgl']);
                                        $fr_Waktu = date('d F Y H:i', $tgl);
                                        if($data_chat['nim']==null){
                                          //chat dari dosen (dari kiri)
                                          ?>

                                               <!-- Chat dari Kiri -->
                                        <div class="direct-chat-msg">
                                          <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left"><?=$nama_dosen;?></span>
                                            <span class="direct-chat-timestamp float-right"><?=$fr_Waktu;?></span>
                                          </div>
                                          <!-- /.direct-chat-infos -->
                                          <img class="direct-chat-img" src="<?=$foto_dosen;?>" alt="Message User Image">
                                          <!-- /.direct-chat-img -->
                                          <div class="direct-chat-text">
                                            <?=$data_chat['percakapan'];?>
                                          </div>
                                          <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                          <!-- end of chat kiri -->
                                      <?php

                                        }
                                        else{
                                          ?>
                                            <!-- Message to the right -->
                                      <!-- chat dari kanan-->
                                    <div class="direct-chat-msg right">
                                      <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right"><?=$nama_mhs;?></span>
                                        <span class="direct-chat-timestamp float-left"><?=$fr_Waktu;?></span>
                                      </div>
                                      <!-- /.direct-chat-infos -->
                                      <img class="direct-chat-img" src="<?=$foto_mhs;?>" alt="Message User Image">
                                      <!-- /.direct-chat-img -->
                                      <div class="direct-chat-text">
                                        <?=$data_chat['percakapan'];?>
                                      </div>
                                      <!-- /.direct-chat-text -->
                                    </div>
                                      <!-- end of chat dari kanan -->
                                    <!-- /.direct-chat-msg -->
                                          <?php

                                        }
                                      }

                                    }
                                    else
                                    {
                                      ?>
                                      <center>
                                        Belum ada percakapan diantara kalian
                                      </center>
                                      <?php
                                    }



                                    ?>
                                  </div>
                                  <!--/.direct-chat-messages-->
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                  <form action="chat_dosen.php?id=<?=$idbimbingan;?>&keterangan=<?=$prg;?>&nidn=<?=$nidn;?>" method="post">
                                    <div class="input-group">
                                      <input type="text" name="pesan" placeholder="Tulis pesan" class="form-control" required>
                                      <span class="input-group-append">
                                        <button type="submit" class="btn btn-primary"><i class="nav-icon fas fa-paper-plane"></i> Kirim</button>
                                           </form>
                                      </span>
                                    </div>
                                    <br>
                                    <?php
                                    if ($prg==1){

                                    ?>
                                    <form action="" method="post">
                                    <div class="input-group">
                                      <button type="submit" name="btnjudul"  class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Judul 
                                      </button>
                                    </div>
                                  </form>
                                    <?php 
                                    if(isset($con, $_POST['btnjudul'])){
                                      $pro_judul = "2";
                                      $updateprogresjudul = mysqli_query($con, "UPDATE tbl_kelas_bimbingan SET progres='$pro_judul' WHERE nidn='$nidn' AND nim='$nim'") or die (mysqli_error($con));
                                      echo '<script>alert("Judul disetujui")</script>';
                                     echo '<script>window.location="detail_bimbingan.php?id_kelas='.$idbimbingan.'&keterangan='.$pro_judul.'"</script>';
                                    }
                                  }
                                   if ($prg==2){

                                    ?>
                                    <form action="" method="post">
                                    <div class="input-group">
                                      <button type="submit" name="btnbab1" class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 1
                                      </button>
                                    </div>
                                  </form>
                                    <?php 
                                    if(isset($con, $_POST['btnbab1'])){
                                      $pro_satu = "3";
                                      $updateprogressatu = mysqli_query($con, "UPDATE tbl_kelas_bimbingan SET progres='$pro_satu' WHERE nidn='$nidn' AND nim='$nim'") or die (mysqli_error($con));
                                      echo '<script>alert("Bab 1 disetujui")</script>';
                                     echo '<script>window.location="detail_bimbingan.php?id_kelas='.$idbimbingan.'&keterangan='.$pro_satu.'"</script>';
                                    }
                                  }
                                  if ($prg==3){

                                    ?>
                                    <div class="input-group">
                                      <button class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 2
                                      </button>
                                    </div>
                                    <?php 
                                  }
                                  if ($prg==4){

                                    ?>
                                    <div class="input-group">
                                      <button class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 3
                                      </button>
                                    </div>
                                    <?php 
                                  }
                                   if ($prg==5){

                                    ?>
                                    <div class="input-group">
                                      <button class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 4
                                      </button>
                                    </div>
                                    <?php 
                                  }
                                  if ($prg==6){

                                    ?>
                                    <div class="input-group">
                                      <button class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 5
                                      </button>
                                    </div>
                                    <?php 
                                  }
                                  if ($prg==7){

                                    ?>
                                    <div class="input-group">
                                      <button class="btn btn-sm btn-success btn-block"><i class="nav-icon fas fa-check"></i> Setujui Bab 5
                                      </button>
                                    </div>
                                    <?php 
                                  }
                                  ?>


                               
                                </div>
                                <!-- /.card-footer-->
                              </div>
                              <!--/.direct-chat -->

                             <!-- end of judul -->
                          </div>

                          <div class="col-lg-4">
                            <div class="card card-primary" >
                              <div class="card-header">
                                  <h3 class="card-title"><i class="nav-icon fas fa-copy"></i> Status Bimbingan </h3>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-sm">

                                  <tr>
                                    <td width="15%">
                                      <?php
                                      $progres = @$_GET['keterangan'];
                                      if($progres==1)
                                      {
                                        ?>
                                        <center>
                                          <img src="../img/progres2.png" height="20px" width="20px">
                                        </center>
                                        <?php

                                      }
                                      if($progres==2)
                                      {
                                        ?>
                                         <center>
                                          <img src="../img/ceklis.png/" height="20px" width="20px">
                                        </center>
                                        <?php
                                       
                                      }
                                      if($progres==0)
                                      {
                                        ?>
                                        <center>
                                          <img src="../img/not.png" height="20px" width="20px">
                                        </center>
                                        <?php
                                      }
                                      ?>
                                      
                                    </td>
                                    
                                    <td> 
                                      <?php 
                                      if ($prg>=1){
                                        ?>
                                        <a href="detail_bimbingan.php?id_kelas=<?=$idbimbingan;?>&keterangan=1" class="btn btn-sm btn-primary"> Judul</a>
                                        <?php 
                                      }

                                      ?>

                                     </td>
                                    <td> --</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> <?php 
                                      if ($prg>=2){
                                        ?>
                                        <a href="detail_bimbingan.php?id_kelas=<?=$idbimbingan;?>&keterangan=2" class="btn btn-sm btn-primary"> Bab 1</a>
                                        <?php 
                                      }

                                      ?>
                                    </td>
                                    <td> --</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 2 </td>
                                    <td> --</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 3 </td>
                                    <td> --</td>
                                  </tr>

                                  <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 4 </td>
                                    <td> --</td>
                                  </tr>

                                   <tr>
                                    <td width="10%">
                                      <center>
                                      <img src="../img/not.png" height="15px" width="15px">
                                      </center>
                                    </td>
                                    <td> Bab 5 </td>
                                    <td> --</td>
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

