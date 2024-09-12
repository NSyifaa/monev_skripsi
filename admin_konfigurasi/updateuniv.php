<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Nama Aplikasi </title>
</head>
<body>
<?php
require_once '../database/config.php';
session_start();
error_reporting(1);

if(isset($con, $_POST['updateuniv'])){
	$nama_univ = trim(mysqli_real_escape_string($con, $_POST['universitas']));

	 $id = "5";
	 $update_univ = mysqli_query($con, "UPDATE tbl_konfigurasi SET elemen='$nama_univ' WHERE id='$id'") or die (mysqli_error($con));
	echo '<script>alert("Nama universitas Berhasil di update") </script>';
		echo '<script>window.location="../admin_konfigurasi"</script>';
}
?>
</body>
</html>