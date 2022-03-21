<?php
require('../Librerias/fpdf/fpdf.php');
include ("../Modelo/usuariosModel.php");

class PDF extends FPDF
{
// Cabecera de página


function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Setx(130);
    $this->Cell(25,10,'Reporte Usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A4');
$pdf->SetMargins(12,30,0);
$nada = new usuariosModel;
$json = $nada->listar();
$principal=json_decode($json, true);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(10,10, "Id" ,1,0,'C',0);
$pdf->Cell(40,10, "Nombre" ,1,0,'C',0);
$pdf->Cell(40,10, "Apellido" ,1,0,'C',0);
$pdf->Cell(40,10,"Usuario" ,1,0,'C',0);
$pdf->Cell(40,10,"Rol" ,1,0,'C',0);
$pdf->Cell(40,10, "Telefono" ,1,0,'C',0);
$pdf->Cell(30,10, "Direccion" ,1,0,'C',0);
$pdf->Cell(30,10, "Ciudad" ,1,1,'C',0);
$pdf->SetFont('Times','',12);      
$pdf->SetMargins(12,30,0); 
for ($i = 0; $i < count($principal) ; $i++) {    
    $pdf->Cell(10,10, $principal[$i]['id_usuario'],1,0,'C',0);
    $pdf->Cell(40,10, $principal[$i]['nombre_usuario'],1,0,'C',0);
    $pdf->Cell(40,10, $principal[$i]['apellido_usuario'],1,0,'C',0);
    $pdf->Cell(40,10,  $principal[$i]['usuario'],1,0,'C',0);        
    $pdf->Cell(40,10,  $principal[$i]['nombre_rol'],1,0,'C',0);        
    $pdf->Cell(40,10, $principal[$i]['telefono_usuario'],1,0,'C',0);
    $pdf->Cell(30,10, $principal[$i]['direccion_usuario'],1,0,'C',0);
    $pdf->Cell(30,10, $principal[$i]['ciudad_usuario'],1,1,'C',0);    
}
$pdf->Output();
?>


