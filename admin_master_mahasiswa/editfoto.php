<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Update Foto Mahasiswa </title>
</head>
<body>
<?php
require_once '../database/config.php';
session_start();

if(isset($con, $_POST['editfoto'])){
	$file = $_FILES['fotomhs']['name'];
	$ekstensi = explode(".", $file);
	$file_name = "fotomhs".$file;
	$temp_file = $_FILES['fotomhs']['tmp_name'];
	$target_dir = "../img/mhs/";
	$file_upload = $target_dir.$file_name;
	$aksi_upload = move_uploaded_file($temp_file, $file_upload);

	$nim = trim(mysqli_real_escape_string($con, $_POST['nim']));
	$update_fotomhs = mysqli_query($con, "UPDATE tbl_mahasiswa SET foto='$file_upload' WHERE nim='$nim'") or die (mysqli_error($con));
	echo '<script>alert("Foto Mahasiswa Berhasil di update") </script>';
	echo '<script>window.location="../admin_master_mahasiswa"</script>';
}
?>
</body>
</html>