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
	$ambilnimmhs = mysqli_query($con, "SELECT nim FROM tbl_mahasiswa") or die (mysqli_error($con));
	$rvambilnimmhs = mysqli_num_rows($ambilnimmhs);
	if($rvambilnimmhs==0){
		?>
		<script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Data", "Data Mahasiswa Kosong", "info");
	setTimeout(function(){
	window.location.href = "../admin_master_mahasiswa";
	},1500);
	</script>
	<?php
	}
	else{
		while($data=mysqli_fetch_assoc($ambilnimmhs)){
			$nim = $data['nim'];
			$queryhapus_pg_mhs = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$nim'") or die (mysqli_error($con));
		}
		$queryhapus_mhs = mysqli_query($con, "TRUNCATE TABLE tbl_mahasiswa") or die (mysqli_error($con));
	}
	?>
	<script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Berhasil", "Data Mahasiswa sudah Berhasil di reset", "success");

	setTimeout(function(){
	window.location.href = "../admin_master_mahasiswa";

	},2000);
	</script>

</body>
</html>