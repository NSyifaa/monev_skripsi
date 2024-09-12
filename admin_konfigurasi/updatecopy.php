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

if(isset($con, $_POST['updatecopy'])){
	$namacopy = trim(mysqli_real_escape_string($con, $_POST['copyright']));

	 $id = "4";
	 $update_copy = mysqli_query($con, "UPDATE tbl_konfigurasi SET elemen='$namacopy' WHERE id='$id'") or die (mysqli_error($con));
	echo '<script>alert("Nama copyright Berhasil di update") </script>';
		echo '<script>window.location="../admin_konfigurasi"</script>';
}
?>
</body>
</html>