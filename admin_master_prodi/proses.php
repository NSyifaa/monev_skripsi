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
		$kode_prodi = trim(mysqli_real_escape_string($con, $_POST['kodeprodi']));
		$nama_prodi = trim(mysqli_real_escape_string($con, $_POST['namaprodi']));

		$querycek = mysqli_query($con, "SELECT * FROM tbl_prodi WHERE kode_prodi= '$kode_prodi' or nama_prodi= '$nama_prodi'") or die (mysqli_error($con));

		$returnvalue = mysqli_num_rows($querycek);

		if ($returnvalue==0){
			mysqli_query($con, "INSERT INTO tbl_prodi VALUES ('$kode_prodi', '$nama_prodi')") or die (mysqli_error($con));
			 echo '<script>alert("Tambah data prodi telah berhasil")</script>';
		 echo '<script>window.location="../admin_master_prodi"</script>';
		
		}
		else{
			 	echo '<script>alert("Kode prodi sudah ada")</script>';
		 echo '<script>window.location="../admin_master_prodi/tambahprodi.php"</script>';

		}
	}
	else
	{
	}
		$kd_prodi = @$_GET['kd_prodi'];

		
	if ($kd_prodi!=1){

		echo '<script>alert("Data prodi dengan kode prodi ['.$kd_prodi.'] berhasil dihapus")</script>';

		$qrdelprodi = mysqli_query($con, "DELETE FROM tbl_prodi WHERE kode_prodi='$kd_prodi'") or die (mysqli_error($con));
		
		echo '<script>window.location="../admin_master_prodi"</script>';
	}
	
	$reset = @$_GET['reset'];

	if($reset=="reset_data"){
		$queryresetprodi = mysqli_query($con, "TRUNCATE TABLE tbl_prodi") or die (mysqli_error($con));
		echo '<script>alert("Semua data yang berhasil direset") </script>';
		echo '<script>window.location="../admin_master_prodi"</script>';
	}
	
	
	
	?>

</body>
</html>