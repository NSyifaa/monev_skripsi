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
function Judul_lampiran(){
    $this->SetFont('Times','',14);
$this->Cell(80);
$this->Cell(30,6,'Daftar Nama Mahasiswa Bimbingan Tugas Akhir',0,1,'C');
$this->Cell(80);
$this->Cell(30,6,'Semester Ganjil Tahun Periode 2024/2025',0,1,'C');
$this->Cell(80);
$this->Cell(30,6,'Periode 20 September 2024 s/d 20 Oktober 2024',0,1,'C');
$this->Ln(10);
}
}


// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',14);
$pdf->Cell(80);
$pdf->Cell(30,6,'SURAT KEPUTUSAN DEKAN FAKULTAS',0,1,'C');
$pdf->Cell(80);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,'Nomor : 2236772',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,'Tentang : ',0,1,'C');
$pdf->SetFont('Times','B',12);
$pdf->Cell(80);
$pdf->Cell(30,6,'Pengangkatan Dosen Pembimbing Tugas Akhir (DPTA)',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,'Mahasiswa Universitas Peradaban',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,6,'Semester Ganjil Tahun Periode 2024/2025',0,1,'C');
$pdf->Cell(80);
$pdf->Cell(30,10,'Dekan Fakultas Sains dan Teknologi Universitas Peradaban',0,1,'C');
$pdf->Ln(3);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Menimbang',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(5,6,'1.',0,0,'L');
$pdf->Cell(5,6,'Bahwa dalam rangka penyelesaian tugas akhir mahasiswa untuk menempuh',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'mata kuliah tugas akhir perlu adanya Pembimbing tugas akhir Universitas Peradaban.',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'Semester Ganjil Tahun Periode 2024/2025.',0,1,'L');
$pdf->Cell(45);
$pdf->Cell(5,6,'2.',0,0,'L');
$pdf->Cell(5,6,'Bahwa untuk itu perlu diangkat dosen pembimbing tugas akhir.',0,1,'L');
$pdf->Cell(40,6,'Mengingat',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(5,6,'1.',0,0,'L');
$pdf->Cell(5,6,'Peraturan Dasar (Status) Universitas Peradaban.',0,1,'L');
$pdf->Cell(45);
$pdf->Cell(5,6,'2.',0,0,'L');
$pdf->Cell(5,6,'Keputusan Rapat Pimpinan Rektor tanggal : 11 September 2024.',0,1,'L');

$pdf->SetFont('Times','B',14);
$pdf->Cell(80);
$pdf->Cell(30,20,'MEMUTUSKAN',0,1,'C');
$pdf->Ln(3);
$pdf->SetFont('Times','',12);
$pdf->Cell(40,6,'Menetapkan',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(5,6,'1.',0,0,'L');
$pdf->Cell(5,6,'Dosen yang namanya tercantum pada lampiran keputusan ini, diangkat sebagai',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'Dosen Pembimbing Tugas Akhir Mahasiswa Semester Ganjil Periode 2024/2025,',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'dengan masa bimbingan tanggal 20 September 2024 s/d 20 Oktober 2024.',0,1,'L');
$pdf->Cell(45);
$pdf->Cell(5,6,'2.',0,0,'L');
$pdf->Cell(5,6,'Sebagaimana mestinya dengan masa bimbingan yang bersangkutan dapat menjalankan',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'tugas dengan sebaik-baiknya dan berhak menerima honorium sesuai dengan ',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'peraturan yang berlaku.',0,1,'L');
$pdf->Cell(45);
$pdf->Cell(5,6,'3.',0,0,'L');
$pdf->Cell(5,6,'Surat keputusan ini berlaku sejak ditetapkan dan akan ditinjau kembali serta',0,1,'L');
$pdf->Cell(50);
$pdf->Cell(5,6,'dibenarkan apabila terdapat kesalahan.',0,1,'L');
$pdf->Cell(120);
$pdf->Cell(30,6,'Ditetapkan',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(5,6,'Paguyangan',0,1,'L');
$pdf->Cell(120);
$pdf->Cell(30,6,'Tanggal',0,0,'L');
$pdf->Cell(5,6,':',0,0,'L');
$pdf->Cell(5,6,date("d F Y"),0,1,'L');
$pdf->Cell(120);
$pdf->Cell(30,6,'Dekan Fakultas Sains dan Teknologi UPB ',0,0,'L');
$pdf->Ln(30);
$pdf->Cell(120);
$pdf->Cell(30,6,'Dr.apt.Pudjono.S.U',0,1,'L');
$pdf->Ln(5);
$pdf->Cell(30,6,'Surat keputusan ini disampaikan kepada:',0,1,'L');
$pdf->Cell(30,6,'1. Dosen yang bersangkutan.',0,1,'L');
$pdf->Cell(30,6,'2. Bagian Keuangan Universitas Peradaban.',0,1,'L');

$periodeterpilih = @$_GET['periode'];
$sqlkelas = mysqli_query($con, "SELECT nidn FROM tbl_kelas_bimbingan WHERE kode_periode='$periodeterpilih' GROUP BY nidn") or die (mysqli_error($con));
if(mysqli_num_rows($sqlkelas)>0){
    while($dt_kelasbimbingan=mysqli_fetch_array($sqlkelas))
    {
        $nidn = $dt_kelasbimbingan['nidn'];
        $sqldosen = mysqli_query($con, "SELECT nama FROM tbl_dosen WHERE nidn='$nidn'") or die (mysqli_error($con));
        $dt_dosen = mysqli_fetch_assoc($sqldosen);
        $namadosen = $dt_dosen['nama'];




        $pdf->AddPage();
        $pdf->Judul_lampiran();

        $pdf->SetFont('Times','B',12);
        $pdf->Cell(30,6,'Nama Dosen : '.$namadosen,0,1,'L');
        $pdf->Cell(10,6,'NO',1,0,'C');
        $pdf->Cell(50,6,'Nama Mahasiswa',1,0,'C');
        $pdf->Cell(40,6,'NIM',1,0,'C');
        $pdf->Cell(50,6,'No WA',1,0,'C');
        $pdf->Cell(40,6,'Jenis Tugas Akhir',1,1,'C');

         $pdf->SetFont('Times','',12);
         $no = 1;
        $sqlkelasdosen = mysqli_query($con, "SELECT nim FROM tbl_kelas_bimbingan WHERE nidn='$nidn'") or die (mysqli_error($con));
        while($dt_kelasdosen=mysqli_fetch_array($sqlkelasdosen)){
            
            $nim = $dt_kelasdosen['nim'];
            $sqlmhs = mysqli_query($con, "SELECT nama,kontak FROM tbl_mahasiswa WHERE nim='$nim'") or die (mysqli_error($con));
            $dt_mhs = mysqli_fetch_assoc($sqlmhs);
            $nama = $dt_mhs['nama'];
            $kontak = $dt_mhs['kontak'];
            $pdf->Cell(10,6,$no++,1,0,'C');
            $pdf->Cell(50,6,$nama,1,0,'C');
            $pdf->Cell(40,6,$nim,1,0,'C');
            $pdf->Cell(50,6,$kontak,1,0,'C');
            $pdf->Cell(40,6,'Skripsi',1,1,'C');
         }
    }
}






$pdf->Output();

?>

