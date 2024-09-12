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

//triger ganti pw
if(isset($con, $_POST['gantipw'])){

	//variabel untuk menampung yang di post sesuai dengan atribut "name" nya
	$user = trim(mysqli_real_escape_string($con,$_POST['user']));
	$pwlama = sha1(trim(mysqli_real_escape_string($con,$_POST['pwlama'])));
	$pwbaru = sha1(trim(mysqli_real_escape_string($con, $_POST['pwbaru'])));

//cek value elemen $user
	$querycekpw =mysqli_query($con,"SELECT * FROM tbl_pengguna WHERE username='$user'") or die (mysqli_error($con));

	//simpan array hasil query
	$arr = mysqli_fetch_assoc($querycekpw);

	if($arr['password']!=$pwlama){
		echo '<script>alert("password lama tidak sesuai")</script>';
		echo'<script>window.location="../mhs_gantipw"</script>';
	}
	else{
		
		$queryupdatepw = mysqli_query($con, "UPDATE tbl_pengguna SET password='$pwbaru' WHERE username='$user'") or die (mysqli_error($con));

		echo '<script>alert("password telah diubah silahkan login kembali menggunakan password baru anda")</script>';
		echo'<script>window.location="../login/logout.php"</script>';
	}

}
?>
</body>
</html>