<?Php 
require_once '../database/config.php';
require_once '../assets_adminLTE/dist/fpdf/fpdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
   $con = mysqli_connect('localhost','root','','monev_skripsi');
    $querycon = mysqli_query($con, "SELECT * FROM tbl_konfigurasi") or die (mysqli_error($con));
if(mysqli_num_rows($querycon)>0){
    while($dt_konfigurasi=mysqli_fetch_array($querycon)){
        if($dt_konfigurasi['id']==1){
            $logoapp = $dt_konfigurasi['lokasi_file'];
        }
        if($dt_konfigurasi['id']==5){
            $namauniv = $dt_konfigurasi['elemen'];
        }
    }
}
    // Logo
    $this->Image($logoapp,15,6,25);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,6,$namauniv,0,1,'C');
    $this->Cell(80);
    $this->Cell(30,6,'FAKULTAS TEKNIK',0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(80);
    $this->Cell(30,6,'Jalan Prof.H.Soedarto Semarang Kode Pos 1269 ',0,1,'C');
    $this->Cell(80);
    $this->Cell(30,6,'Telp:(0235)382992 web:www.undip.ac.id email:undip@ac.id',0,1,'C');
    // Line break
    $this->SetLineWidth(1);
    $this->Line(10,40,200,40);
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$idbimbingan = @$_GET['id_kelas'];
$pglkelas = mysqli_query($con,"SELECT nidn,nim FROM tbl_kelas_bimbingan WHERE id_kelas='$idbimbingan'") or die (mysqli_error($con));
$dt_kelasbimbingan = mysqli_fetch_assoc($pglkelas);
$nidn = $dt_kelasbimbingan['nidn'];
$nim = $dt_kelasbimbingan['nim'];


$sqlmhs = mysqli_query($con, "SELECT nama,prodi FROM tbl_mahasiswa WHERE nim='$nim'") or die (mysqli_error($con));
$dt_mhs = mysqli_fetch_assoc($sqlmhs);
$namamhs = $dt_mhs['nama'];
$kdprodi = $dt_mhs['prodi'];

$sqlprodi = mysqli_query($con,"SELECT nama_prodi FROM tbl_prodi WHERE kode_prodi='$kdprodi'") or die (mysqli_error($con));
$dt_prodi = mysqli_fetch_assoc($sqlprodi);
$namaprodi = $dt_prodi['nama_prodi'];

$sqldosen = mysqli_query($con, "SELECT nama FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));
$dt_dosen = mysqli_fetch_assoc($sqldosen);
$namadosen = $dt_dosen['nama'];

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
// $pdf->Cell(150);
// $pdf->Cell(30,6,'Tanjung, '.date("d F Y"),0,1,'C');

$pdf->Cell(25,6,'Nomor',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(50,6,'001/SP/UP/2024',0,1,'L');

$pdf->Cell(25,6,'Hal',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->SetFont('Times','B',12);
$pdf->Cell(50,6,'Permohonan Izin Penelitian',0,1,'L');
$pdf->Ln(10);
$pdf->Cell(25,6,'Kepada Yth',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Ln(20);
$pdf->SetFont('Times','i',12);
$pdf->Cell(25,6,"Assalamu'alaikum wr.wb",0,0,'L');
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
$pdf->Cell(25,6,"Diberitahukan dengan hormat, bahwa mahasiswa sebelum mengakhiri pendidikan di Fakultas Teknik Universitas",0,1,'L');
$pdf->Cell(25,6,"Peradaban diwajibkan untuk membuat karya ilmiah berupa penelitian. Sehubungan dengan hal itu Mahasiswa kami:",0,1,'L');

$pdf->Ln(5);
$pdf->Cell(30,6,'Nama',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(50,6,$namamhs,0,1,'L');
$pdf->Cell(30,6,'NIM',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(50,6,$nim,0,1,'L');
$pdf->Cell(30,6,'Program Studi',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(50,6,$namaprodi,0,1,'L');

$pdf->Ln(5);
$pdf->Cell(25,6,"Bermaksud mohon keterangan/data pada instansi yang Bapak/Ibu pimpin untuk keperluan menyusun skripsi",0,1,'L');
$pdf->Cell(25,6," dengan judul:",0,1,'L');
$pdf->Ln(5);
$pdf->SetFont('Times','B',14);
$pdf->Cell(70);
$pdf->Cell(50,5,'JUDUL PENELITIAN',0,1,'C');
$pdf->Ln(8);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Dosen Pembimbing',0,0,'L');
$pdf->Cell(3,6,':',0,0,'L');
$pdf->Cell(50,6,$namadosen,0,1,'L');
$pdf->Ln(3);
$pdf->Cell(25,6,"Hasil Karya ilmiah tersebut semata-mata bersifat dan bertujuan keilmuan dan tidak disajikan kepada pihak luar. ",0,1,'L');
$pdf->Cell(25,6,"Oleh karena itu, kami mohon perkenan Bapak/Ibu untuk dapat memberikan data/keterangan yang diperlukan",0,1,'L');
$pdf->Cell(25,6,"oleh mahasiswa tersebut.",0,1,'L');
$pdf->Ln(5);
$pdf->Cell(25,6,"Atas perhatian dan bantuan Bapak/Ibu, Kami ucapkan Terima Kasih.",0,1,'L');
$pdf->Ln(3);
$pdf->SetFont('Times','i',12);
$pdf->Cell(25,6,"Wassalamu'alaikum wr.wb",0,1,'L');
$pdf->SetFont('Times','',12);
$pdf->Ln(5);
$pdf->Cell(120);
$pdf->Cell(30,6,'Tanjung, '.date("d F Y"),0,1,'L');
$pdf->Cell(120);
$pdf->Cell(25,6,"Dekan,",0,1,'L');

$pdf->Ln(15);
$pdf->Cell(120);
$pdf->Cell(25,6,"Dr.apt.Pudjono.S.U.",0,1,'L');
$pdf->Cell(120);
$pdf->Cell(25,6,"NUPN.2290299",0,1,'L');





$pdf->Output();

?>

