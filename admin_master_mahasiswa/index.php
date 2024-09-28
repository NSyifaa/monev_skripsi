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
      $tersangka = "mhs";
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
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
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
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import"><i class="nav-icon fas fa-file-excel"></i> Import Data
                  </button>

                  <a href="prosesresetdata.php?reset=reset" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan mereset semua data?')"><i class="nav-icon fas fa-sync"></i> Reset Data</a>
                  <a href="eksporpdf.php" class="btn btn-primary btn-sm" target="_blank">
                    <i class="nav-icon fas fa-file"></i> Ekspor Data</a>

                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>Kontak</th>
                    <th>Kelamin</th>
                    <th>Foto</th>
                    <th>Status</th>
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
                        <td><b><?=$dt_mhs['nim'];?></b>
                          <br><?=$dt_mhs['nama'];?>
                        </td>
                        <td>
                          <?php
                          $kode_prodi = $dt_mhs['prodi'];

                          $ambilnamaprodi = mysqli_query($con, "SELECT nama_prodi FROM tbl_prodi WHERE kode_prodi='$kode_prodi'") or die (mysqli_error($con));

                          $data_prodi = mysqli_fetch_assoc($ambilnamaprodi);
                          $nama_prodi = $data_prodi['nama_prodi'];
                          ?>

                          <?=$nama_prodi;?>
                        </td>

                         <td>
                            <?php
                          $kode_akt = $dt_mhs['angkatan'];

                          $ambilakt = mysqli_query($con, "SELECT keterangan FROM tbl_angkatan WHERE kode_angkatan='$kode_akt'") or die (mysqli_error($con));

                          $data_akt= mysqli_fetch_assoc($ambilakt);
                          $angkatan = $data_akt['keterangan'];
                          ?>

                          <?=$angkatan;?>
                         </td>

                          <td>
                            <center>
                              <a href="https://api.whatsapp.com/send?phone=<?=$dt_mhs['kontak'];?>&<?=$dt_mhs['nama'];?>&text=Hello World" class="btn btn-sm btn-success" target="_blank">
                                <img src="../img/wa.png" height="18px" width="18px"> <?=$dt_mhs['kontak'];?>
                              </a>

                            </center>
    
                          </td>
                           <td>
                             <?php 
                             $st_mhs = $dt_mhs['kelamin'];
                             if($st_mhs=='L'){
                              ?>
                              <center>
                                <button class="btn btn-sm btn-success">Laki-Laki
                                </button>
                              </center>
                              <?php
                             }
                             else{
                              ?>
                              <center>
                                <button class="btn btn-sm btn-danger">Perempuan</button>
                              </center>
                              <?php

                             }


                             ?>

                           </td>
                           <td>
                            <?php
                            if ($dt_mhs['foto']=='') {
                              ?>
                              <center>
                              <button type="button" class="btn btn-sm btn-info" style="background-color: transparent;" data-toggle="modal" data-target="#modal-foto"
                              data-nim="<?=$dt_mhs['nim'];?>"
                              data-foto="../img/mhs/default.png"
                              > 
                              <img src="../img/mhs/default.png" height="50px" width="50px">
                              </button>
                            </center>
                            <?php
                            } else{
                              ?>
                               <center>
                              <button type="button" class="btn btn-sm btn-info" style="background-color: transparent;" data-toggle="modal" data-target="#modal-foto" 
                              data-nim="<?=$dt_mhs['nim'];?>"
                              data-foto="<?=$dt_mhs['foto'];?>"
                              > 
                              <img src="<?=$dt_mhs['foto'];?>" height="50px" width="50px">
                              </button>
                             </center>
                              <?php
                            }
                            ?>
                           
                          </td>
                           
                           <td>
                             <?php
                          $kode_stt = $dt_mhs['status'];

                          $ambilstt = mysqli_query($con, "SELECT status FROM tbl_status WHERE id='$kode_stt'") or die (mysqli_error($con));

                          $data_stt = mysqli_fetch_assoc($ambilstt);
                          $stt_mhs = $data_stt['status'];
                          ?>

                          <?=$stt_mhs;?>
                            </td>
                        <td>
                          <center>
                            <a href="prosesresetpw.php?kd_mhs=<?=$dt_mhs['nim'];?>" class="btn btn-sm btn-warning" onclick="return confirm('Anda akan mengreset password akun mahasiswa dengan NIM [<?=$dt_mhs['nim'];?>] - mhs : [<?=$dt_mhs['nama'];?>]')"><i class="nav-icon fas fa-trash"></i>Reset Pwd</a>
                           
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit" data-nim="<?= $dt_mhs['nim'];?>" data-nama="<?= $dt_mhs['nama'];?>" data-prodi="<?= $dt_mhs['prodi'];?>" data-angkatan="<?= $dt_mhs['angkatan'];?>" data-kelamin="<?= $dt_mhs['kelamin'];?>" data-kontak="<?= $dt_mhs['kontak'];?>" data-status="<?= $dt_mhs['status'];?>" > <i class="nav-icon fas fa-edit">edit</i>
                            </button>

                          <a href="proseshapus.php?kd_mhs=<?=$dt_mhs['nim'];?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data mhs dengan nim [<?=$dt_mhs['nim'];?>] - mahasiswa : [<?=$dt_mhs['nama'];?>]')"><i class="nav-icon fas fa-trash"></i></a>

                          <a href="invoice.php" target="_blank" class="btn btn-sm btn-info"> Print</a>
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
                        <td colspan="8">Tidak ditemukan Data mhs pada database</td>
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
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" action="edit.php" method="POST" id="editdata">
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
                      <td><input type="text" name="ed_namaterpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Prodi</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_proditerpilih" class="form-control"></td>
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
                    <tr>
                      <td width="30%">Status</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_statusterpilih" class="form-control"></td>
                    </tr>
                    
                  </tbody>
              </table>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" class="btn btn-primary"  name="edit"><i class="nav-icon fas fa-edit"></i> Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-foto">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Foto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form class="form-horizontal" action="editfoto.php" method="POST" enctype="multipart/form-data" id="editfoto">
          <center>
            <img src="" id="fotomhs" height="150px" width="150px">
             <br>
             <br>
              <input type="file" name="fotomhs" class="form-control" accept="image/*" required>
              </center> 
              (direkomendasikan menggunakan file(xxx.png)
              <input type="text" name="nim" class="form-control" hidden>
            </div>
            <div class="modal-footer pull-right">
              <button type="submit" class="btn btn-primary"  name="editfoto"><i class="nav-icon fas fa-edit"></i> Edit</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-import">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modal Import</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <a href="download.php?filename=template_mhs.xls" class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-file"></i> Download Template Import Excel </a>
              <br>
              <br>
              <form action="import.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="import"> Import File Excel </label>
                  <input type="file" id="import" name="file" placeholder="Ambil file excel" accept="application/vnd.ms.excel" class="form-control">
              
            </div>
            <div class="modal-footer pull-right">
              
              <button type="submit" class="btn btn-success" name="importmhs"><i class="nav-icon fas fa-download"></i>Import file mhs</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
        
<?php
include '../mhs_script.php';
}
?>
<script type="text/javascript">
  $('#modal-edit').on ('show.bs.modal', function(e){

    var ed_nim  = $(e.relatedTarget).data('nim');
    var ed_nama = $(e.relatedTarget).data('nama');
    var ed_prodi = $(e.relatedTarget).data('prodi');
    var ed_angkatan = $(e.relatedTarget).data('angkatan');
    var ed_kontak = $(e.relatedTarget).data('kontak');
    var ed_kelamin = $(e.relatedTarget).data('kelamin');
    var ed_status = $(e.relatedTarget).data('status');

    $(e.currentTarget).find('input[name= "ed_nimterpilih"]').val(ed_nim);
    $(e.currentTarget).find('input[name= "ed_nimterpilih2"]').val(ed_nim);
    $(e.currentTarget).find('input[name= "ed_namaterpilih"]').val(ed_nama);
    $(e.currentTarget).find('input[name= "ed_proditerpilih"]').val(ed_prodi);
    $(e.currentTarget).find('input[name= "ed_angkatanterpilih"]').val(ed_angkatan);
     $(e.currentTarget).find('input[name= "ed_kontakterpilih"]').val(ed_kontak);
    $(e.currentTarget).find('input[name= "ed_kelaminterpilih"]').val(ed_kelamin);
    $(e.currentTarget).find('input[name= "ed_statusterpilih"]').val(ed_status);

  });
</script>
<script type="text/javascript">
  $('#modal-foto').on ('show.bs.modal', function(e){

    var nim  = $(e.relatedTarget).data('nim');
    var foto = $(e.relatedTarget).data('foto');

    $(e.currentTarget).find('input[name="nim"]').val(nim);
    document.getElementById('fotomhs').src= foto;

  });
</script>
</body>
</html>
