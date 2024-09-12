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

	if(isset($con, $_POST['tambah']))
	{
		$nim = trim(mysqli_real_escape_string($con, $_POST['nim']));
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
		$prodi = trim(mysqli_real_escape_string($con, $_POST['prodi']));
		$status= trim(mysqli_real_escape_string($con, $_POST['status']));
		$angkatan = trim(mysqli_real_escape_string($con, $_POST['angkatan']));
		$kontak = trim(mysqli_real_escape_string($con, $_POST['kontak']));
		$kelamin = trim(mysqli_real_escape_string($con, $_POST['kelamin']));
		$password = sha1($nim);
		$stt_mhs= "1";


		 $qm = mysqli_query($con, "SELECT * FROM tbl_mahasiswa WHERE nim= '$nim' ") or die (mysqli_error($con));

		 $rv = mysqli_num_rows($qm);

		if ($rv>0){
			
		echo '<script>alert("Mahasiswa dengan NIM tersebut sudah ada")</script>';
		 echo '<script>window.location="../admin_master_mahasiswa/tambahmhs.php"</script>';
		}
		else{
			$querytambah = mysqli_query($con, "INSERT INTO tbl_mahasiswa VALUES (
				'$nim', 
				'$nama',
				'$prodi',
				'$status',
				'$angkatan',
				'$kontak',
				'$kelamin')") or die (mysqli_error($con));

			$querytambahmhs = mysqli_query($con, "INSERT INTO tbl_pengguna VALUES (
				'$nim',
				'$password', 
				'$nama',
				'$stt_mhs')") or die (mysqli_error($con));

			 echo '<script>alert("Mahasiswa dengan NIM ['.$nim.'] atas nama ['.$nama.'] berhasil ditambahkan")</script>';
		     echo '<script>window.location="../admin_master_mahasiswa"</script>';
			 	

		}
	}
	else
	{

	}


	$kd_mhs = @$_GET['kd_mhs'];
	$hapus = @$_GET['hapus'];
	$reset = @$_GET['reset'];

	if($reset=="reset"){

		//ambil nim dari tbl_mhs
		$qrnimmhs = mysqli_query($con, "SELECT * FROM tbl_mahasiswa") or die (mysqli_error($con));

		$rvmhs = mysqli_num_rows($qrnimmhs);

		if($rvmhs>0){
			//proses perulangan sebanyak record yang ditambah pada database
			while($data=mysqli_fetch_assoc($qrnimmhs)){
				//menampung nidn pada setiap perulangan didlam variabel $nidn_dosen
				$nim_mhs = $data['nim'];

				//menghapus data berdasarkan nim pada perulangan
				$qrdelpengguna = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$nim_mhs'") or die 
				(mysqli_error($con));

			}
		}
		else{

		}

		$queryresetmhs = mysqli_query($con, "TRUNCATE TABLE tbl_mahasiswa") or die (mysqli_error($con));
		echo '<script>alert("Semua data yang berhasil direset") </script>';
	    echo '<script>window.location="../admin_master_mahasiswa"</script>';
	 }

	if ($hapus=='hapus'){

		echo '<script>alert("Data Mahasiswa dengan kode Mahasiswa['.$kd_mhs.'] berhasil dihapus")</script>';

		$qrdelmhs = mysqli_query($con, "DELETE FROM tbl_mahasiswa WHERE nim='$kd_mhs'") or die (mysqli_error($con));

		$qrdelpenggunamhs = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$kd_mhs'") or die (mysqli_error($con));
		
		echo '<script>window.location="../admin_master_mahasiswa"</script>';
	}

	//resetpw
	$resetpw = @$_GET['resetpw'];
	if ($resetpw=='resetpw'){
		$passreset = sha1($kd_mhs);
		$qrresetpw = mysqli_query($con, "UPDATE tbl_pengguna SET password='$passreset' WHERE username='$kd_mhs'") or die (mysqli_error($con));

		echo '<script>alert("Pasword Mahasiswa dengan NIM ['.$kd_mhs.'] berhasil direset")</script>';
		
		echo '<script>window.location="../admin_master_mahasiswa"</script>';
	}



	
	
	
	?>

</body>
</html>