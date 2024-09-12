<html>
<head>

</head>
<body>

<?php
require_once '../database/config.php';
session_start();

//triger tambah data pada halaman sebelumnya
if(isset($con, $_POST['edit'])){

$nim = trim(mysqli_real_escape_string($con, $_POST['ed_nimterpilih']));
$nama = trim(mysqli_real_escape_string($con, $_POST['ed_namaterpilih']));
$prodi = trim(mysqli_real_escape_string($con, $_POST['ed_proditerpilih']));
$status = trim(mysqli_real_escape_string($con, $_POST['ed_statusterpilih']));
$angkatan = trim(mysqli_real_escape_string($con, $_POST['ed_angkatanterpilih']));
$kontak = trim(mysqli_real_escape_string($con, $_POST['ed_kontakterpilih']));
$kelamin = trim(mysqli_real_escape_string($con, $_POST['ed_kelaminterpilih']));

$queryupdate = mysqli_query($con, "UPDATE tbl_mahasiswa SET nama= '$nama' WHERE nim ='$nim' ") or die (mysqli_error($con));

?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"> 
</script>
<script>
swal("Berhasil", "Data Pengguna sudah Berhasil di Edit", "success");

setTimeout(function(){
window.location.href = "../admin_master_mahasiswa";

},2000);
</script>
<?php
}

?>


</body>
</html>