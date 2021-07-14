<?php
require('fpdf.php');

class PDF extends FPDF
{
    protected $col = 0; // Columna actual
    protected $y0;      // Ordenada de comienzo de la columna

    function Header()
    {
        // Cabacera
        global $title;

        $this->SetFont('Arial', 'B', 15);
        $w = $this->GetStringWidth($title) + 6;
        $this->SetX((210 - $w) / 2);
   
        // Guardar ordenada
        $this->y0 = $this->GetY();
    }

    function Footer()
    {
        // Pie de p�gina
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->SetTextColor(128);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    function SetCol($col)
    {
        // Establecer la posici�n de una columna dada
        $this->col = $col;
        $x = 10 + $col * 65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    function AcceptPageBreak()
    {
        // M�todo que acepta o no el salto autom�tico de p�gina
        if ($this->col < 2) {
            // Ir a la siguiente columna
            $this->SetCol($this->col + 1);
            // Establecer la ordenada al principio
            $this->SetY($this->y0);
            // Seguir en esta p�gina
            return false;
        } else {
            // Volver a la primera columna
            $this->SetCol(0);
            // Salto de p�gina
            return true;
        }
    }

    function ChapterTitle($num, $label)
    {
        // T�tulo
        $this->SetFont('Arial', '', 12);
    
        $this->Cell(0, 6, "Capatulo $num : $label", 0, 1, 'L', true);
        $this->Ln(4);
        // Guardar ordenada
        $this->y0 = $this->GetY();
    }

    function ChapterBody($file)
    {
        // Abrir fichero de texto
        $txt = file_get_contents($file);
        // Fuente
        $this->SetFont('Times', '', 12);
        // Imprimir texto en una columna de 6 cm de ancho
        $this->MultiCell(60, 5, $txt);
        $this->Ln();
        // Cita en it�lica
        $this->SetFont('', 'I');
        $this->Cell(0, 5, '(fin del extracto)');
        // Volver a la primera columna
        $this->SetCol(0);
    }

    function PrintChapter($num, $title, $file)
    {
        // A�adir cap�tulo
        $this->AddPage();
        $this->ChapterTitle($num, $title);
        $this->ChapterBody($file);
    }
}

$user = UserData::getById($_SESSION["user_id"]);


$cliente = PersonaData::getById($user->idpersona);
$api = ApiData::getInstance();



$pdf = new PDF();

$pdf->AddPage();

$pdf->SetFont('Arial', '', 15);
$pdf->Cell(40, 20);

$pdf->Image('assets/images/EB.jpeg', 10, 20, 20, 20, 'JPG', 'http://www.desarrolloweb.com');

$pdf->setY(20);$pdf->setX(75);

$pdf->SetFont('Arial','B',10);  

$pdf->Cell(5, 5, "REPORTE DE GASTOS Y GANANCIA ");


$pdf->Ln();


$header = array("Fecha de Inicio ", "Fecha Fin ");
//// Arrar de Productos

// Column widths
$w = array(50, 50);


// Header
$pdf->setY(30);$pdf->setX(75);

for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();

// Data

$pdf->setY(40);$pdf->setX(75);
$pdf->Cell($w[0], 6, $_POST["fechainicio"], 1);
$pdf->Cell($w[1], 6, $_POST["fechafinal"], 1);
$pdf->Ln();
$pdf->Ln();
$pdf->setX(75);

$pdf->Cell(5, 5, "Datos Del Mes");

$pdf->Ln();

$header = array("INGRESOS ", "GASTOS ");

//// Arrar de Productos

// Column widths
$w = array(95, 95);


// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data


$pdf->Cell($w[0], 6, $_POST["ingresos"], 1);
$pdf->Cell($w[1], 6,  $_POST["gastos"], 1);
$pdf->Ln();
$pdf->Ln();

$pdf->setX(75);

$pdf->SetFont('Arial','B',25);  

$pdf->Cell(15, 5, "Ganancias: ".$_POST["ganancias"]);


$pdf->Ln();



$pdf->Ln();

//$pdf->Output();

$pdf->Output('f');



$api->SendFilePdf("573015256417");

include("core/app/action/Administracion/S3_Pdf-action.php");

