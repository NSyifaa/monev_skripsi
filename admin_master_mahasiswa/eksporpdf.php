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


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(150);
$pdf->Cell(30,6,'Tanjung, '.date("d F Y"),0,1,'C');
$pdf->Ln(5);

$pdf->Cell(80);
$pdf->Cell(30,6,'DATA MAHASISWA',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,$namauniv,0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,'TAHUN PERIODE 2020/2021',0,1,'C');
$pdf->Ln(5);
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(20,6,'NIM',1,0,'C');
$pdf->Cell(40,6,'Nama Mahasiswa',1,0,'C');
$pdf->Cell(40,6,'Prodi',1,0,'C');
$pdf->Cell(20,6,'Angkatan',1,0,'C');
$pdf->Cell(25,6,'Kontak',1,0,'C');
$pdf->Cell(15,6,'Kelamin',1,0,'C');
$pdf->Cell(20,6,'Status',1,1,'C');

$no=1;
$querymhs = mysqli_query($con,"SELECT * FROM tbl_mahasiswa") or die (mysqli_error($con));
if(mysqli_num_rows($querymhs)>1){
while($dt_mhs= mysqli_fetch_array($querymhs)){
    $stts = $dt_mhs['status'];
    $querystt= (mysqli_query($con, "SELECT * FROM tbl_status WHERE id='$stts'"))or die (mysqli_error($con));
    $dt_stts = mysqli_fetch_assoc($querystt);
    $ketstts = $dt_stts['status'];


    $kode_prodi = $dt_mhs['prodi'];
    $queryprodi = mysqli_query($con,"SELECT * FROM tbl_prodi WHERE kode_prodi='$kode_prodi'") or die (mysqli_error($con));
    if (mysqli_num_rows($queryprodi)>0) {
        $prodi = mysqli_fetch_assoc($queryprodi);
        $namaprodi = $prodi['nama_prodi'];
    }



    $pdf->SetFont('Times','','10');
    $pdf->Cell(10,6,$no++,1,0,'C');
    $pdf->Cell(20,6,$dt_mhs['nim'],1,0,'C');
    $pdf->Cell(40,6,$dt_mhs['nama'],1,0,'C');
    $pdf->Cell(40,6,$namaprodi,1,0,'C');
    $pdf->Cell(20,6,$dt_mhs['angkatan'],1,0,'C');
    $pdf->Cell(25,6,$dt_mhs['kontak'],1,0,'C');
    $pdf->Cell(15,6,$dt_mhs['kelamin'],1,0,'C');
    $pdf->Cell(20,6,$ketstts,1,1,'C');
    
}
}
$pdf->Output();

?>