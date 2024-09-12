<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php
	session_start();
	require_once '../database/config.php';

	if(isset($_POST['tambah']))
	{
		$kode_angkatan = trim(mysqli_real_escape_string($con, $_POST['kodeangkatan']));
		$keterangan = trim(mysqli_real_escape_string($con, $_POST['Keterangan']));

		$querycek = mysqli_query($con, "SELECT * FROM tbl_angkatan WHERE kode_angkatan= '$kode_angkatan' or keterangan= '$keterangan'") or die (mysqli_error($con));

		$returnvalue = mysqli_num_rows($querycek);

		if ($returnvalue==0){
			mysqli_query($con, "INSERT INTO tbl_angkatan VALUES ('$kode_angkatan', '$keterangan')") or die (mysqli_error($con));
			 echo '<script>alert("Tambah data angkatan telah berhasil")</script>';
		 echo '<script>window.location="../admin_master_angkatan"</script>';
		
		}
		else{
			 	echo '<script>alert("Kode angkatan sudah ada")</script>';
		 echo '<script>window.location="../admin_master_angkatan/tambahangkatan.php"</script>';

		}
	}
	else
	{
	}
		$kd_angkatan = $_GET['kd_angkatan'];

	if ($kd_angkatan!=1){

		echo '<script>alert("Data Angkatan dengan kode angkatan ['.$kd_angkatan.'] berhasil dihapus")</script>';

		$qrdelangkatan = mysqli_query($con, "DELETE FROM tbl_angkatan WHERE kode_angkatan='$kd_angkatan'") or die (mysqli_error($con));
		
		echo '<script>window.location="../admin_master_angkatan"</script>';
	}
	$reset = $_GET['reset'];

	if($reset=="reset_data"){
		$queryresetangkatan = mysqli_query($con, "TRUNCATE TABLE tbl_angkatan") or die (mysqli_error($con));
		echo '<script>alert("Semua data yang berhasil direset") </script>';
		echo '<script>window.location="../admin_master_angkatan"</script>';
	}

	
	
	?>

</body>
</html>