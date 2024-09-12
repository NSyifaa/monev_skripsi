<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proses Hapus Mahasiswa</title>
</head>
<body>
	<?php
	require_once '../database/config.php';
	session_start();

	$nim = @$_GET['kd_mhs'];

	$queryhapusmhs = mysqli_query($con, "DELETE FROM tbl_mahasiswa WHERE nim='$nim'") or die (mysqli_error($con));

	$queryhapus_pg_mhs = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$nim'") or die (mysqli_error($con));
	?>
	<script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Berhasil", "Data Pengguna sudah Berhasil di hapus", "success");

	setTimeout(function(){
	window.location.href = "../admin_master_mahasiswa";

	},2000);
	</script>

</body>
</html>