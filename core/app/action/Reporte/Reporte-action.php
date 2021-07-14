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


$pdf = new PDF();

$pdf->AddPage();

$pdf->SetFont('Arial', '', 15);
$pdf->Cell(40, 20);

$pdf->Image('img/categoria/1.jpg', 10, 20, 20, 20, 'JPG', 'http://www.desarrolloweb.com');

$pdf->setY(20);$pdf->setX(75);

$pdf->SetFont('Arial','B',10);  

$pdf->Cell(5, 5, "ORDEN DE TRABAJO : ");


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
$pdf->Cell($w[0], 6, $fecha1, 1);
$pdf->Cell($w[1], 6, "dato", 1);
$pdf->Ln();
$pdf->Ln();
$pdf->setX(75);

$pdf->Cell(5, 5, "Datos Del Vehiculo");

$pdf->Ln();

$header = array("Placa ", "Kilometraje ");

//// Arrar de Productos

// Column widths
$w = array(95, 95);


// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data


$pdf->Cell($w[0], 6, "datos", 1);
$pdf->Cell($w[1], 6, "datos", 1);
$pdf->Ln();
$pdf->Ln();

$pdf->setX(75);

$pdf->Cell(5, 5, "Datos Del Cliente");


$pdf->Ln();

$header = array("Conductor ", "Cedula ","Contacto","Empresa");

//// Arrar de Productos

// Column widths
$w = array(50, 50, 50,40);


// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data


$pdf->SetFont('Arial','B',10);  

$pdf->Cell($w[0], 6, "datos", 1);
$pdf->Cell($w[1], 6, "datos", 1);
$pdf->Cell($w[2], 6,"datos", 1);

$pdf->SetFont('Arial','B',6); 
$pdf->Cell($w[3], 6, "datos", 1);
$pdf->Ln();
$pdf->Ln();



$pdf->setX(75);
$pdf->SetFont('Arial','B',12); 
$pdf->Cell(5, 5, "Trabajos A Realizar");

$pdf->SetFont('Arial','B',10);  

$pdf->Ln();

$header = array("DESCRIPCION");

//// Arrar de Productos

// Column widths
$w = array(170);


// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data


$pdf->Cell($w[0], 6, "datos", 1);
$pdf->Ln();






$pdf->setX(75);
$pdf->SetFont('Arial','B',12);
$pdf->Ln();

$pdf->setX(75);
$pdf->Cell(5, 5, "Requerimientos de Repuestos");

$pdf->SetFont('Arial','B',7);  

$pdf->Ln();

$header = array("DESCRIPCION", "REFERENCIA");

//// Arrar de Productos

// Column widths
$w = array(90,90);


// Header
for ($i = 0; $i < count($header); $i++)
    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C');
$pdf->Ln();
// Data

for ($i = 0; $i < 10; $i++) {
    # code...

    $pdf->Cell($w[0], 6,"", 1);
    $pdf->Cell($w[1], 6, "", 1);
   

$pdf->Ln();

}

$pdf->Ln();

$pdf->Ln();


$pdf->Cell(5, 5, "Firma Cliente: ________________________                                      Firma Recibido: ________________________          ");
$pdf->Ln(5);
$pdf->Cell(5, 5, "CC                                                                                                          CC");





$autorizacion1= utf8_decode("Autorizo de manera voluntaria, previa, explícita e informada, a MCI SERVICE SAS  para tratar mis datos personales de acuerdo con su Política");
$autorizacion2= utf8_decode("Interna de Tratamiento de Datos Personales y para los fines relacionados con su objeto social y, en especial para fines legales.");
$autorizacion3= utf8_decode("Segun Cumplimiento de las disposiciones de la Ley 1581 de 2012 y del Decreto reglamentario 1377 de 2013 que desarrollan el derecho de habeas data.");		
$pdf->SetFont('Arial','B',7);    


$pdf->setY(250  );$pdf->setX(10);
$pdf->Cell(3, 3, $autorizacion1);
$pdf->Ln();
$pdf->Cell(3, 3, $autorizacion2);
$pdf->Ln();
$pdf->Cell(3, 3, $autorizacion3);
$pdf->Ln();

$pdf->Output();

$pdf->Output('f');

include("core/app/action/Administracion/S3_Pdf-action.php");
