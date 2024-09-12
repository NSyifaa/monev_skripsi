<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Proses Master Data Mahasiswa</title>
</head>
<body>
	<?php
	require_once '../database/config.php';
	session_start();

//triger button tambah mhs dari halaman tambahmhs.php
	if(isset($con, $_POST['tambah'])){

		$nim = trim(mysqli_real_escape_string($con, $_POST['nim']));
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
		$prodi = trim(mysqli_real_escape_string($con, $_POST['prodi']));
		$status = trim(mysqli_real_escape_string($con, $_POST['status']));
		$angkatan = trim(mysqli_real_escape_string($con, $_POST['angkatan']));
		$kontak = trim(mysqli_real_escape_string($con, $_POST['kontak']));
		$kelamin = trim(mysqli_real_escape_string($con, $_POST['kelamin']));
		$pass = sha1($nim);
		$st_mhs ="2";

		$querycek = mysqli_query($con, "SELECT nim FROM tbl_mahasiswa WHERE nim= '$nim'") or die (mysqli_error($con));

		$rvmhs = mysqli_num_rows($querycek);

		if($rvmhs>0){
			?>
			 <script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Berhasil", "Data Mahasiswa dengan nim : <?=$nim;?> , Nama Mahasiswa : <?=$nama;?> sudah ada dalam database", "error");

	setTimeout(function(){
	window.location.href = "../admin_master_mahasiswa";

	},2000);
	</script>
    <?php

		}
		else{
			$tambahmhs = mysqli_query($con, "INSERT INTO tbl_mahasiswa VALUES (
				'$nim',
				'$nama',
				'$prodi',
				'$status',
				'$angkatan',
				'$kontak',
				'$kelamin')") or die (mysqli_error($con));

			$tambah_pg = mysqli_query($con, "INSERT INTO tbl_pengguna VALUES (
				'$nim',
				'$pass',
				'$nama',
				'$st_mhs')") or die (mysqli_error($con));
				?>
	<script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Berhasil", "Data Mahasiswa dengan nim : <?=$nim;?> , Nama Mahasiswa : <?=$nama;?> berhasil ditambahkan", "success");

	setTimeout(function(){
	window.location.href = "../admin_master_mahasiswa";

	},2000);
	</script>
    <?php
		}

	}



	?>


</body>
</html>