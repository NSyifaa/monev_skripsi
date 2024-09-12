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
	require '../lib/phpexcel-xls-library/vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
	error_reporting(0);

	if(isset($con, $_POST['tambah']))
	{
		$nidn = trim(mysqli_real_escape_string($con, $_POST['nidn']));
		$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
		$email = trim(mysqli_real_escape_string($con, $_POST['email']));
		$kontak = trim(mysqli_real_escape_string($con, $_POST['kontak']));
		$status = trim(mysqli_real_escape_string($con, $_POST['status']));
		$password = sha1($nidn);
		$stt_dosen = "1";


		 $qd = mysqli_query($con, "SELECT * FROM tbl_dosen WHERE nidn= '$nidn' ") or die (mysqli_error($con));

		 $rv = mysqli_num_rows($qd);

		if ($rv>0){
			
		echo '<script>alert("Dosen dengan NIDN tersebut sudah ada")</script>';
		 echo '<script>window.location="../admin_master_dosen/tambahdosen.php"</script>';
		}
		else{
			$querytambah = mysqli_query($con, "INSERT INTO tbl_dosen VALUES (
				'$nidn', 
				'$nama',
				'$email',
				'$kontak',
				'$status')") or die (mysqli_error($con));

			$querytambahdosen = mysqli_query($con, "INSERT INTO tbl_pengguna VALUES (
				'$nidn',
				'$password', 
				'$nama',
				'$stt_dosen')") or die (mysqli_error($con));

			 echo '<script>alert("Dosen dengan NIDN ['.$nidn.'] atas nama ['.$nama.'] berhasil ditambahkan")</script>';
		     echo '<script>window.location="../admin_master_dosen"</script>';
			 	

		}
	}
	else
	{

	}


	$kd_dosen = @$_GET['kd_dosen'];
	$hapus = @$_GET['hapus'];
	$reset = @$_GET['reset'];

	if($reset=="reset"){

		//ambil nidn dosen dari tbl_dosen
		$qrnidndosen = mysqli_query($con, "SELECT * FROM tbl_dosen") or die (mysqli_error($con));

		$rvdosen = mysqli_num_rows($qrnidndosen);

		if($rvdosen>0){
			//proses perulangan sebanyak record yang ditambah pada database
			while($data=mysqli_fetch_assoc($qrnidndosen)){
				//menampung nidn pada setiap perulangan didlam variabel $nidn_dosen
				$nidn_dosen = $data['nidn'];

				//menghapus data berdasarkan nidn pada perulangan
				$qrdelpengguna = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$nidn_dosen'") or die 
				(mysqli_error($con));

			}
		}
		else{

		}

		$queryresetdosen = mysqli_query($con, "TRUNCATE TABLE tbl_dosen") or die (mysqli_error($con));
		echo '<script>alert("Semua data yang berhasil direset") </script>';
	    echo '<script>window.location="../admin_master_dosen"</script>';
	 }

	if ($hapus=='hapus'){

		echo '<script>alert("Data Dosen dengan kode dosen ['.$kd_dosen.'] berhasil dihapus")</script>';

		$qrdeldosen = mysqli_query($con, "DELETE FROM tbl_dosen WHERE nidn='$kd_dosen'") or die (mysqli_error($con));

		$qrdelpenggunadosen = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$kd_dosen'") or die (mysqli_error($con));
		
		echo '<script>window.location="../admin_master_dosen"</script>';
	}

	//resetpw
	$resetpw = @$_GET['resetpw'];
	if ($resetpw=='resetpw'){
		$passreset = sha1($kd_dosen);
		$qrresetpw = mysqli_query($con, "UPDATE tbl_pengguna SET password='$passreset' WHERE username='$kd_dosen'") or die (mysqli_error($con));

		echo '<script>alert("Pasword Dosen dengan NIDN ['.$kd_dosen.'] berhasil direset")</script>';
		
		echo '<script>window.location="../admin_master_dosen"</script>';
	}




	//trigger post dari button name=importdosen
    if (isset($_POST['importdosen']))
    {
    	//$file merupakan variabel untuk menampung nama file yang di uplod
        $file = $_FILES['file']['name'];

        //memisahkn ekstensi file yang diuplod
        $ekstensi = explode (".", $file);

        //$variabel file_name utk merename file yg d uplod dengan nama file roundmicrotime (tgl+jm+menit+detik+milidetik)+ekstensi
        $file_name = "file".round(microtime(true)).".".end($ekstensi);

        //sumber =mengmbil nama file yg sdh diubh dgn 
        $sumber = $_FILES['file']['tmp_name'];
        $target_dir ="template/";
        $target_file = $target_dir.$file_name;
        $upload = move_uploaded_file($sumber, $target_file);      

        $file_excel = PHPExcel_IOFactory::load($target_file);
        $data_excel = $file_excel->getActiveSheet()->toArray(null, true,true,true);

        for ($j=2; $j <= count($data_excel); $j++)
        {
       $nidn     = $data_excel[$j]['B'];
       $nama     = addslashes($data_excel[$j]['C']);
       $email    = $data_excel[$j]['D'];
       $kontak   = $data_excel[$j]['E'];
       $status   = $data_excel[$j]['F'];
       $pass     = sha1($nidn);
       $st_pengguna = "1";

       $cekdosen = mysqli_query($con, "SELECT nidn FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));

       $rv = mysqli_num_rows($cekdosen);
       if($rv>0){
       	

       }
    	else{
    		$kosong = "";
         $tambahdosen= mysqli_query($con, "INSERT INTO tbl_dosen VALUES (
         	'$nidn',
         	'$nama',
         	'$email',
         	'$kontak',
         	'$status')") or die (mysqli_error($con));  

         $hapusdosenkosong = mysqli_query($con, "DELETE FROM tbl_dosen WHERE nidn='$kosong'") or die (mysqli_error($con));

          $tambahpenggunadosen = mysqli_query($con, "INSERT INTO tbl_pengguna VALUES (
         	'$nidn',
         	'$pass',
         	'$nama')") or die (mysqli_error($con)); 
          $hapus_pg_dosenkosong = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$kosong'") or die (mysqli_error($con));
         	}    
        }
    unlink($target_file);
    ?>
    <script src="htpps://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    	swal("Berhasil","Semua Data Dosen berhasil diimport","success");
    	setTimeout(function(){
    		window.location.href = "../admin_master_dosen";
    	}, 1500);
    </script>
    <?php
}
?>
	

</body>
</html>