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
            <h1 class="m-0">Master Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Data Mahasiswa</li>
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
                <h3 class="card-title"><i class="nav-icon fas fa-user-graduate"></i> Data Mahasiswa</h3>
              </div>
                <div class="card-body">

                  <a href="tambahmhs.php" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-download"></i>Tambah Data
                  </a>
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="modal-import"><i class="nav-icon fas fa-file-excel"></i> Import Data
                  </button>

                  <a href="proses.php?reset=reset" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan mereset semua data?')"><i class="nav-icon fas fa-sync"></i> Reset Data</a>

                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>Status</th>
                    <th>Angkatan</th>
                    <th>Kontak</th>
                    <th>Kelamin</th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    //panggil data pada tbl_angkatan
                    $querymhs = mysqli_query($con, "SELECT * FROM tbl_mahasiswa") or die (mysqli_error($con));

                    //jika tabel ada isinya maka tampilkan 
                    if (mysqli_num_rows($querymhs)>0)
                    {
                    while($dt_mhs=mysqli_fetch_array($querymhs)){
                      ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$dt_mhs['nim'];?></td>
                        <td><?=$dt_mhs['nama'];?></td>
                         <td><?=$dt_mhs['prodi'];?></td>
                          <td>
                            <?php 
                             $st_mhs = $dt_mhs['status'];
                             if($st_mhs==1){
                              ?>
                              <center>
                                <button class="btn btn-sm btn-success">Akif
                                </button>
                              </center>
                              <?php
                             }elseif ($st_mhs==2) {
                                ?>
                              <center>
                                <button class="btn btn-sm btn-success">Non Aktif
                                </button>
                              </center>
                              <?php
                             }elseif ($st_mhs==3){
                               ?>
                              <center>
                                <button class="btn btn-sm btn-success">Cuti
                                </button>
                              </center>
                              <?php

                             }elseif ($st_mhs==4){
                               ?>
                              <center>
                                <button class="btn btn-sm btn-success">Dropp out
                                </button>
                              </center>
                              <?php
                             }elseif($st_mhs==5){
                                ?>
                              <center>
                                <button class="btn btn-sm btn-success">Pased Out
                                </button>
                              </center>
                              <?php

                             }
                            



                             ?>
                              
                            </td>
                           <td><?=$dt_mhs['angkatan'];?></td>
                            <td>
                            <center>
                              <a href="https://api.whatsapp.com/send?phone=<?=$dt_mhs['kontak'];?>&text=Hello World" class="btn btn-sm btn-success" target="_blank">
                                <img src="../img/wa.png" height="18px" width="18px"> <?=$dt_mhs['kontak'];?>
                              </a>


                            </center>
    
                          </td>
                             <td><?=$dt_mhs['kelamin'];?></td>
                          
                        <td>
                          <center>
                            <a href="proses.php?kd_mhs=<?=$dt_mhs['nim'];?>&resetpw=resetpw" class="btn btn-sm btn-warning" onclick="return confirm('Anda akan mengreset password akun Mahasiswa dengan NIM [<?=$dt_mhs['nim'];?>] - Mahasiswa: [<?=$dt_mhs['nama'];?>]')"><i class="nav-icon fas fa-trash"></i>Reset Pwd</a>
                           
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit" data-nim="<?= $dt_mhs['nim'];?>" data-nama="<?= $dt_mhs['nama'];?>" data-prodi="<?= $dt_mhs['prodi'];?>" data-status="<?= $dt_mhs['status'];?>" data-angkatan="<?= $dt_mhs['angkatan'];?>" data-kontak="<?= $dt_mhs['kontak'];?>" data-kelamin="<?= $dt_mhs['kelamin'];?>"> <i class="nav-icon fas fa-edit">edit</i>
                            </button>

                          <a href="proses.php?kd_mhs=<?=$dt_mhs['nim'];?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data Mahasiswa dengan nim [<?=$dt_mhs['nim'];?>] - Mahasiswa : [<?=$dt_mhs['nama'];?>]')"><i class="nav-icon fas fa-trash"></i></a>
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
                        <td colspan="7">Tidak ditemukan Data Mahasiswa pada database</td>
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
<div class="modal fade" id="modal-edit">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #0000FF">
              <h4 class="modal-title"><font color="#ffffff"> Edit Data </font></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <form class="form-horizontal" action="edit.php" method="POST" id="editdata">
           
            <div class="modal-body">
              <table>
                <thead>
                </thead>
                  <tbody>
                    <tr>
                      <td width="30%">NIM</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_nimterpilih" class="form-control" hidden>
                        <input type="text" name="ed_nimterpilih2" class="form-control" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Nama</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_namaterpilih" class="form-control" ></td>
                    </tr>
                    <tr>
                      <td width="30%">Prodi</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_proditerpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Status</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_statusterpilih" class="form-control"></td>
                    </tr>
                     <tr>
                      <td width="30%">Angkatan</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_angkatanterpilih" class="form-control"></td>
                    </tr>
                     <tr>
                      <td width="30%">Kontak</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_kontakterpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Kelamin</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_kelaminterpilih" class="form-control"></td>
                    </tr>
                  </tbody>
              </table>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" name="edit" class="btn btn-danger"><i class="nav-icon fas fa-edit"></i>Edit Data
              </button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
<?php
include '../mhs_script.php';
}
?>
<script type="text/javascript">
  $('#modal-edit').on ('show.bs.modal', function(e){

    var ed_nim  = $(e.relatedTarget).data('nim');
    var ed_nama = $(e.relatedTarget).data('nama');
    var ed_prodi = $(e.relatedTarget).data('prodi');
    var ed_status = $(e.relatedTarget).data('status');
    var ed_angkatan = $(e.relatedTarget).data('angkatan');
    var ed_kontak = $(e.relatedTarget).data('kontak');
    var ed_kelamin= $(e.relatedTarget).data('kelamin');



    $(e.currentTarget).find('input[name= "ed_nimterpilih"]').val(ed_nim);
     $(e.currentTarget).find('input[name= "ed_nimterpilih2"]').val(ed_nim);
    $(e.currentTarget).find('input[name= "ed_namaterpilih"]').val(ed_nama);
     $(e.currentTarget).find('input[name= "ed_proditerpilih"]').val(ed_prodi);
    $(e.currentTarget).find('input[name= "ed_statusterpilih"]').val(ed_status);
    $(e.currentTarget).find('input[name= "ed_angkatanterpilih"]').val(ed_angkatan);
     $(e.currentTarget).find('input[name= "ed_kontakterpilih"]').val(ed_kontak);
     $(e.currentTarget).find('input[name= "ed_kelaminterpilih"]').val(ed_kelamin);

  });
</script>
</body>
</html>
