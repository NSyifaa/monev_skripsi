<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Foto Dosen </title>
</head>
<body>
<?php
require_once '../database/config.php';
session_start();

if(isset($con, $_POST['editfoto'])){
	$file = $_FILES['fotodosen']['name'];
	$ekstensi = explode(".", $file);
	$file_name = "fotodosen".round(microtime(true)).".".end($ekstensi);
	$temp_file = $_FILES['fotodosen']['tmp_name'];
	$target_dir = "../img/dosen/";
	$file_upload = $target_dir.$file_name;
	$aksi_upload = move_uploaded_file($temp_file, $file_upload);

	$nidn = trim(mysqli_real_escape_string($con, $_POST['nidn']));
	$update_fotodosen = mysqli_query($con, "UPDATE tbl_dosen SET foto='$file_upload' WHERE nidn='$nidn'") or die (mysqli_error($con));
	echo '<script>alert("Foto Dosen Berhasil di update") </script>';
	echo '<script>window.location="../admin_master_dosen"</script>';
}
?>
</body>
</html>