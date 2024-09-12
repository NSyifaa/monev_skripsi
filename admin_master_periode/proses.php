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
		$kode_periode = trim(mysqli_real_escape_string($con, $_POST['kodeperiode']));
		$periode = trim(mysqli_real_escape_string($con, $_POST['periode']));

		$querycek = mysqli_query($con, "SELECT * FROM tbl_periode WHERE kode_periode= '$kode_periode' or periode= '$periode'") or die (mysqli_error($con));

		$returnvalue = mysqli_num_rows($querycek);

		if ($returnvalue==0){
			mysqli_query($con, "INSERT INTO tbl_periode VALUES ('$kode_periode', '$periode')") or die (mysqli_error($con));
			 echo '<script>alert("Tambah data periode telah berhasil")</script>';
		 echo '<script>window.location="../admin_master_periode"</script>';
		
		}
		else{
			 	echo '<script>alert("Kode periode sudah ada")</script>';
		 echo '<script>window.location="../admin_master_periode/tambahperiode.php"</script>';

		}
	}
	else
	{
	}
		$kd_periode = $_GET['kd_periode'];

	if ($kd_periode!=1){

		echo '<script>alert("Data periode dengan kode periode ['.$kd_periode.'] berhasil dihapus")</script>';

		$qrdelperiode = mysqli_query($con, "DELETE FROM tbl_periode WHERE kode_periode='$kd_periode'") or die (mysqli_error($con));
		
		echo '<script>window.location="../admin_master_periode"</script>';
	}
	$reset = $_GET['reset'];

	if($reset=="reset_data"){
		$queryresetperiode = mysqli_query($con, "TRUNCATE TABLE tbl_periode") or die (mysqli_error($con));
		echo '<script>alert("Semua data yang berhasil direset") </script>';
		echo '<script>window.location="../admin_master_periode"</script>';
	}

	
	
	?>

</body>
</html>