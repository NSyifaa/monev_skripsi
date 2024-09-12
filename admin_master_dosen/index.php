<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monev Skripsi | Dashboard Admin</title>
  <?php
  session_start();
  $konstruktor ='admin_master_dosen';
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
            <h1 class="m-0">Master Data Dosen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Master Data Dosen</li>
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
                <h3 class="card-title"><i class="nav-icon fas fa-chalkboard-teacher"></i> Data Dosen</h3>
              </div>
                <div class="card-body">

                  <a href="tambahdosen.php" class="btn btn-primary btn-sm"><i class="nav-icon fas fa-download"></i>Tambah Data
                  </a>
                  <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-import"><i class="nav-icon fas fa-file-excel"></i> Import Data
                  </button>

                  <a href="proses.php?reset=reset" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin akan mereset semua data?')"><i class="nav-icon fas fa-sync"></i> Reset Data</a>
                  <a href="eksporpdf.php" class="btn btn-danger btn-sm" target="_blank">
                    <i class="nav-icon fas fa-file"></i> Ekspor Data</a>
                  <br>
                  <br>
                  <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th width="5%">No</th>
                    <th>NIDN</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Kontak</th>
                    <th>Foto</th>
                    <th>Status</th>
                    <th><center>Aksi</center></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    //panggil data pada tbl_angkatan
                    $querydosen = mysqli_query($con, "SELECT * FROM tbl_dosen") or die (mysqli_error($con));

                    //jika tabel ada isinya maka tampilkan 
                    if (mysqli_num_rows($querydosen)>0)
                    {
                    while($dt_dosen=mysqli_fetch_array($querydosen)){
                      ?>
                      <tr>
                        <td><?=$no++;?></td>
                        <td><?=$dt_dosen['nidn'];?></td>
                        <td><?=$dt_dosen['nama'];?></td>
                         <td><?=$dt_dosen['email'];?></td>
                          <td>
                            <center>
                              <a href="https://api.whatsapp.com/send?phone=<?=$dt_dosen['kontak'];?>&text=Hello World" class="btn btn-sm btn-success" target="_blank">
                                <img src="../img/wa.png" height="18px" width="18px"> <?=$dt_dosen['kontak'];?>
                              </a>


                            </center>
    
                          </td>
                          <td>
                            <?php
                            if ($dt_dosen['foto']=='') {
                              ?>
                              <center>
                              <button type="button" class="btn btn-sm btn-info" style="background-color: transparent;" data-toggle="modal" data-target="#modal-foto"
                              data-nidn="<?=$dt_dosen['nidn'];?>"
                              data-foto="../img/dosen/default.png"
                              > 
                              <img src="../img/dosen/default.png" height="50px" width="50px">
                              </button>
                            </center>
                            <?php
                            } else{
                              ?>
                               <center>
                              <button type="button" class="btn btn-sm btn-info" style="background-color: transparent;" data-toggle="modal" data-target="#modal-foto" 
                              data-nidn="<?=$dt_dosen['nidn'];?>"
                              data-foto="<?=$dt_dosen['foto'];?>"
                              > 
                              <img src="<?=$dt_dosen['foto'];?>" height="50px" width="50px">
                              </button>
                             </center>
                              <?php
                            }
                            ?>
                           
                          </td>
                           <td>
                             <?php 
                             $st_dosen = $dt_dosen['status'];
                             if($st_dosen==1){
                              ?>
                              <center>
                                <button class="btn btn-sm btn-success">Akif
                                </button>
                              </center>
                              <?php
                             }
                             else{
                              ?>
                              <center>
                                <button class="btn btn-sm btn-danger">Nonaktif</button>
                              </center>
                              <?php

                             }


                             ?>

                           </td>
                        <td>
                          <center>
                            <a href="proses.php?kd_dosen=<?=$dt_dosen['nidn'];?>&resetpw=resetpw" class="btn btn-sm btn-warning" onclick="return confirm('Anda akan mengreset password akun dosen dengan NIDN [<?=$dt_dosen['nidn'];?>] - dosen : [<?=$dt_dosen['nama'];?>]')"><i class="nav-icon fas fa-trash"></i>Reset Pwd</a>
                           
                            <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-edit" data-nidn="<?= $dt_dosen['nidn'];?>" data-nama="<?= $dt_dosen['nama'];?>" data-email="<?= $dt_dosen['email'];?>" data-kontak="<?= $dt_dosen['kontak'];?>" data-status="<?= $dt_dosen['status'];?>" > <i class="nav-icon fas fa-edit">edit</i>
                            </button>

                          <a href="proses.php?kd_dosen=<?=$dt_dosen['nidn'];?>&hapus=hapus" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data dosen dengan kode [<?=$dt_dosen['nidn'];?>] - dosen : [<?=$dt_dosen['nama'];?>]')"><i class="nav-icon fas fa-trash"></i></a>
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
                        <td colspan="7">Tidak ditemukan Data dosen pada database</td>
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
                      <td width="30%">NIDN</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_nidnuserterpilih" class="form-control" hidden>
                        <input type="text" name="ed_nidnuserterpilih2" class="form-control" disabled>
                      </td>
                    </tr>
                    <tr>
                      <td width="30%">Nama</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_namaterpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Email</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_emailterpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Kontak</td>
                      <td width="5%">:</td>
                      <td><input type="text" name="ed_kontakterpilih" class="form-control"></td>
                    </tr>
                    <tr>
                      <td width="30%">Status</td>
                      <td width="5%">:</td>
                      <td>
                        <select name="ed_statusterpilih" class="form-control" > 

                        <option value="1"> Aktif</option>
                        <option value="2">Nonaktif</option>
                       </select>
                     </td>
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
            <img src="" id="fotodosen" height="150px" width="150px">
             <br>
             <br>
              <input type="file" name="fotodosen" class="form-control" accept="image/*" required>
              </center> 
              (direkomendasikan menggunakan file(xxx.png)
              <input type="text" name="nidn" class="form-control" hidden>
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
              <a href="download.php?filename=template_dosen.xls" class="btn btn-sm btn-secondary"><i class="nav-icon fas fa-file"></i> Download Template Import Excel </a>
              <br>
              <br>
              <form action="import.php" method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label for="import"> Import File Excel </label>
                  <input type="file" id="import" name="file" placeholder="Ambil file excel" accept="application/vnd.ms.excel" class="form-control">
              
            </div>
            <div class="modal-footer pull-right">
              
              <button type="submit" class="btn btn-success" name="importdosen"><i class="nav-icon fas fa-download"></i>Import file dosen</button>
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

    var ed_nidn  = $(e.relatedTarget).data('nidn');
    var ed_nama = $(e.relatedTarget).data('nama');
    var ed_email = $(e.relatedTarget).data('email');
    var ed_kontak = $(e.relatedTarget).data('kontak');
    var ed_status = $(e.relatedTarget).data('status');

    $(e.currentTarget).find('input[name= "ed_nidnuserterpilih"]').val(ed_nidn);
    $(e.currentTarget).find('input[name= "ed_nidnuserterpilih2"]').val(ed_nidn);
    $(e.currentTarget).find('input[name= "ed_namaterpilih"]').val(ed_nama);
    $(e.currentTarget).find('input[name= "ed_emailterpilih"]').val(ed_email);
    $(e.currentTarget).find('input[name= "ed_kontakterpilih"]').val(ed_kontak);
    $(e.currentTarget).find('input[name= "ed_statusterpilih"]').val(ed_status);

  });
</script>
<script type="text/javascript">
  $('#modal-foto').on ('show.bs.modal', function(e){

    var nidn  = $(e.relatedTarget).data('nidn');
    var foto = $(e.relatedTarget).data('foto');

    $(e.currentTarget).find('input[name="nidn"]').val(nidn);
    document.getElementById('fotodosen').src= foto;

  });
</script>
</body>
</html>
