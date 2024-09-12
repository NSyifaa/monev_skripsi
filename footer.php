<?php
 $pglnama = mysqli_query($con,"SELECT * FROM tbl_konfigurasi WHERE id=3") or die (mysqli_error($con));
      $arrnama = mysqli_fetch_assoc($pglnama);
      $namapp = $arrnama['elemen'];

      //membuat query nama_app
      $pglcopy = mysqli_query($con,"SELECT * FROM tbl_konfigurasi WHERE id=4") or die (mysqli_error($con));
      $arrcopy = mysqli_fetch_assoc($pglcopy);
      $copyapp = $arrcopy['elemen'];
?>

<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <?=$copyapp;?> <a href="#"> <?=$namapp;?> </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>