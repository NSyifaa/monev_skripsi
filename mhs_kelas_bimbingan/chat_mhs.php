<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> input chat mhs</title>
</head>
<body>
	<?php
	require_once '../database/config.php';
	session_start(); 
	$nim = @$_GET['nim'];
	$idbimbingan = @$_GET['id'];
	$prg = @$_GET['keterangan'];

	
	$chat_mhs = trim(mysqli_real_escape_string($con, $_POST['pesan']));
	$tgl = date('Y-m-d H:i:s');

	$tambahchat = mysqli_query($con, "INSERT INTO tb_detail_bimbingan (id,nim,tgl,percakapan,id_kelas,keterangan) VALUES(
		'',
		'$nim',
		'$tgl',
		'$chat_mhs',
		'$idbimbingan',
		'$prg')") or die (mysqli_error($con));

	echo '<script>alert("Percakapan disimpan")</script>';
	echo '<script>window.location="detail_bimbingan.php?id_kelas='.$idbimbingan.'&keterangan='.$prg.'"</script>';




	?>

</body>
</html>