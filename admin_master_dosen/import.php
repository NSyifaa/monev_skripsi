<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Import Dosen</title>
</head>
<body>
	<?php
	require_once '../database/config.php';
	require '../lib/phpexcel-xls-library/vendor/phpoffice/phpexcel/Classes/PHPExcel.php';
	session_start();

	error_reporting(0);

	//ambil triger tombol importdosen
	if(isset($con, $_POST['importdosen'])){

		//buat varial untuk menampung value nma file dari elemen file pada index
		$file = $_FILES['file']['name'];

		//memisahkan ekstensi file dengan nama file nya
		$ekstensi = explode(".", $file);

		//buat variabel untuk merename file dengan nama bru
		$file_name = "file".round(microtime(true)).".".end($ekstensi);

		// buat variabel untuk menampung file temporary dari file yang diuplod
		$sumber =$_FILES['file']['tmp_name'];

		//deklarasikan variabel direktori untuk mengupload file
		$target_dir = "file-import/";

		//buat variabel untuk mearahkan file ke target direktori
		$target_file = $target_dir.$file_name;

		//buat variabel yang berisikan perintah utk mengupload file ke target direktori
		$upload = move_uploaded_file($sumber,$target_file);

		//identifikasi file excel yang akan digunakan sebagai referenasi import
		$file_excel = PHPExcel_IOFactory::load($target_file);

		//Buat variabel utk mengidentifikasi sheet pada excel yang sedang aktif
		$data_excel = $file_excel->getActiveSheet()->toArray(null,true,true,true);

		for ($i=2; $i<= count($data_excel); $i++){
			//deklarasi perulangan

			$nidn = $data_excel[$i]['B'];
			$nama = addslashes($data_excel[$i]['C']);
			$email = $data_excel[$i]['D'];
			$kontak = $data_excel[$i]['E'];
			$status = $data_excel[$i]['F'];
			$pass = sha1($nidn);
			$st_dosen = "1";

			$cekdosen = mysqli_query($con, "SELECT nidn FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));

			$rvd = mysqli_num_rows($cekdosen);

			if($rvd>0){

			}
			else{

				$kosong ="";
				$tambahdosen = mysqli_query($con, "INSERT INTO tbl_dosen VALUES (
					'$nidn',
					'$nama',
					'$email',
					'$kontak',
					'$status')") or die (mysqli_error($con));

				$delkosong = mysqli_query($con, "DELETE FROM tbl_dosen WHERE nidn='$kosong'") or die (mysqli_error($con));

				$tambahpenggunadosen = mysqli_query($con, "INSERT INTO tbl_pengguna VALUES (
					'$nidn',
					'$pass',
					'$nama',
					'$st_dosen')") or die (mysqli_error($con));

				$delpenggunakosong = mysqli_query($con, "DELETE FROM tbl_pengguna WHERE username='$kosong'") or die (mysqli_error($con));

			}
		}
		unlink($target_file);
		
		?>
    <script src="../assets_adminLTE/dist/js/sweetalert.js"> 
    </script>
	<script>
	swal("Berhasil", "Data Pengguna sudah Berhasil di import", "success");

	setTimeout(function(){
	window.location.href = "../admin_master_dosen";

	},2000);
	</script>
    <?php



	}




	?>

</body>
</html>