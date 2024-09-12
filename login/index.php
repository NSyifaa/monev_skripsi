<?php
  session_start();
  require_once '../database/config.php';
  
   $pgllogotitle = mysqli_query($con, "SELECT lokasi_file FROM tbl_konfigurasi WHERE id=2") or die (mysqli_error($con));

      $arrtitle = mysqli_fetch_array($pgllogotitle);
      $logotitle = $arrtitle['lokasi_file'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Skripsi | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets_adminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../assets_adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets_adminLTE/dist/css/adminlte.min.css">
  <link rel="shortcut icon" href="<?=$logotitle;?>">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <center>
      <?php
      $pgllogoapp = mysqli_query($con, "SELECT lokasi_file FROM tbl_konfigurasi WHERE id=1") or die (mysqli_error($con));
      $arrlogo = mysqli_fetch_array($pgllogoapp);
      $logoapp = $arrlogo['lokasi_file'];

      //membuat query nama_app
      $pglnama = mysqli_query($con,"SELECT * FROM tbl_konfigurasi WHERE id=3") or die (mysqli_error($con));
      $arrnama = mysqli_fetch_assoc($pglnama);
      $namapp = $arrnama['elemen'];

      //membuat query nama_app
      $pglcopy = mysqli_query($con,"SELECT * FROM tbl_konfigurasi WHERE id=4") or die (mysqli_error($con));
      $arrcopy = mysqli_fetch_assoc($pglcopy);
      $copyapp = $arrcopy['elemen'];

       //membuat query nama_app
      $pgluniv = mysqli_query($con,"SELECT * FROM tbl_konfigurasi WHERE id=5") or die (mysqli_error($con));
      $arruniv = mysqli_fetch_assoc($pgluniv);
      $univapp = $arruniv['elemen'];
      ?>
    <img src="<?=$logoapp;?>" height="150px" width="150px">
  </center>
    <a href="../../login"><b> <?=$namapp;?> </b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="NIM / NIDN" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user-circle"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="pass">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <a href="#" class="btn btn-block btn-danger">
          <i class="nav-icon fas fa-question-circle"></i> Lupa Password
        </a>
            
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block" name="login">Log In <i class="nav-icon fas fa-sign-out-alt"></i></button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <?php
        // tangkap trigger button login
        if(isset($con, $_POST['login'])){

          //menyimpan value pada elemen username dan pass ke dalam variabel $user dan $pass
          $user = trim(mysqli_real_escape_string($con,$_POST['username']));
          $pwd = SHA1(trim(mysqli_real_escape_string($con, $_POST['pass'])));

          //cek user pada database
          $querycek = mysqli_query($con, "SELECT * FROM tbl_pengguna WHERE username='$user' AND password= '$pwd'") 
          or die (mysqli_error($con));

          //cek apakah ada value yang dikembalikan oleh query, jika value = 1 maka terdapat user seperti value elemen yang diinput user, jika 0 sebaliknya
          $rv = mysqli_num_rows($querycek);


        //buat percabangan dari hasil return value
          if($rv==1){
            //jika hasil $rv = 1 (ada user yg dimaksud)

            //buat variabel untuk menampung array value dari querycek
            $array = mysqli_fetch_assoc($querycek);

            //buat variabel untuk menampung nilai tertentu dari array yang diambil lewat query
            $st_user = $array['status'];

            //buat nested if ( percabangan dalam percabngan)
            if($st_user==0){
              $_SESSION['username']  = $user;
              $_SESSION['nama_user'] = $array['nama_user'];
              $_SESSION['status']    = $st_user;

              echo '<script>
              window.location="../admin_dashboard"</script>';
            }
            elseif($st_user==1){
              $_SESSION['username']  = $user;
              $_SESSION['nama_user'] = $array['nama_user'];
              $_SESSION['status']    = $st_user;

              echo '<script>
              window.location="../dosen_dashboard"</script>';
            }
            elseif($st_user==2){
              $_SESSION['username']  = $user;
              $_SESSION['nama_user'] = $array['nama_user'];
              $_SESSION['status']    = $st_user;

              echo '<script>
              window.location="../mhs_dashboard"</script>';

            }
          }

          else{
            //jika hasil $rv = 0 ( tidak ada user yang dimaksud)
            session_destroy();
            echo '<script>
              window.location="../gagal_login"</script>';


          }
        }

      ?>

      <div>
        <br>
        <center>
          Copyright &copy; <?= $copyapp;?>
          <br> <b> <?=$univapp;?> </b>
          <br> <?php echo date('Y');?>
        </center>
      </div>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../assets_adminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets_adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets_adminLTE/dist/js/adminlte.min.js"></script>
</body>
</html>
