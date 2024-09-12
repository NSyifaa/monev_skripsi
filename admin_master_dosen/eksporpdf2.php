<?Php 
require_once '../database/config.php';
require_once '../assets_adminLTE/dist/fpdf/fpdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../img/logo.png',15,6,25);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,6,'UNIVERSITAS DIPONEGORO',0,1,'C');
    $this->Cell(80);
    $this->Cell(30,6,'FAKULTAS TEKNIK',0,1,'C');
    $this->SetFont('Arial','',10);
    $this->Cell(80);
    $this->Cell(30,6,'Jalan Prof.H.Soedarto Semarang Kode Pos 1269 ',0,1,'C');
    $this->Cell(80);
    $this->Cell(30,6,'Telp:(0235)382992 web:www.undip.ac.id email:undip@ac.id',0,1,'C');
    // Line break
    $this->SetLineWidth(1);
    $this->Line(10,40,200,10);
    $this->Ln(20);
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

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Output();

?>