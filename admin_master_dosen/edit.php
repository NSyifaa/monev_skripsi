<html>
<head>

</head>
<body>

<?php
require_once '../database/config.php';
session_start();

//triger tambah data pada halaman sebelumnya
if(isset($_POST['edit'])){

$nidn = trim(mysqli_real_escape_string($con, $_POST['ed_nidnuserterpilih']));
$nama = trim(mysqli_real_escape_string($con, $_POST['ed_namaterpilih']));
$email = trim(mysqli_real_escape_string($con, $_POST['ed_emailterpilih']));
$kontak = trim(mysqli_real_escape_string($con, $_POST['ed_kontakterpilih']));
$status = trim(mysqli_real_escape_string($con, $_POST['ed_statusterpilih']));

$queryupdate = mysqli_query($con, "UPDATE tbl_dosen SET nama= '$nama' WHERE nidn ='$nidn' ") or die (mysqli_error($con));
$queryupdatepengguna = mysqli_query($con, "UPDATE tbl_pengguna SET nama_user= '$nama' WHERE username ='$nidn' ") or die (mysqli_error($con));

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> 
</script>
<script>
swal("Berhasil", "Data Pengguna sudah Berhasil di Edit", "success");

setTimeout(function(){
window.location.href = "../admin_master_dosen";

},2000);
</script>
<?php
} else {
	echo 'ppp';
}

?>


</body>
</html>