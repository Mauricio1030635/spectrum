<?php
require('../Librerias/fpdf/fpdf.php');
include ("../Modelo/agendaModel.php");
class PDF extends FPDF
{
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(70);
    // Título
    $this->Setx(200);
    $this->Cell(25,10,'Reporte Agenda',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

function Footer()
{    
    $this->SetY(-15); 
    $this->SetFont('Arial','I',8);    
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
// Creación del objeto de la clase heredada
$pdf = new PDF('L','mm','A3');
$pdf->SetMargins(20,20,0);
$nada = new agendaModel;
$json = $nada->listar();
$principal=json_decode($json, true);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',12);
$pdf->Cell(10,10, "Fase" ,1,0,'C',0);
$pdf->Cell(50,10, "Tarea" ,1,0,'C',0);
$pdf->Cell(40,10, "Fecha" ,1,0,'C',0);
$pdf->Cell(40,10,"Hora" ,1,0,'C',0);
$pdf->Cell(40,10,"Tecnico" ,1,0,'C',0);
$pdf->Cell(40,10, "Ingeniero" ,1,0,'C',0);
$pdf->Cell(50,10, "Cliente" ,1,0,'C',0);
$pdf->Cell(30,10, "Regional" ,1,0,'C',0);
$pdf->Cell(50,10, "Subregional" ,1,0,'C',0);
$pdf->Cell(40,10, "Digitador" ,1,1,'C',0);
$pdf->SetFont('Times','',12);      


for ($i = 0; $i < count($principal) ; $i++) {        
    $pdf->Cell(10,10, $principal[$i]['fase'],1,0,'C',0);
    $pdf->Cell(50,10, $principal[$i]['tarea'],1,0,'C',0);    
    $pdf->Cell(40,10, $principal[$i]['fecha_agenda'],1,0,'C',0);
    $pdf->Cell(40,10,  $principal[$i]['hora_agenda'],1,0,'C',0);        
    $pdf->Cell(40,10,  $principal[$i]['nombre_tecnico'] ." " .$principal[$i]['apellido_tecnico'],1,0,'C',0);        
    $pdf->Cell(40,10, $principal[$i]['nombre_ingeniero']." " .$principal[$i]['apellido_ingeniero'],1,0,'C',0);
    $pdf->Cell(50,10, $principal[$i]['nombre_cliente']." " .$principal[$i]['apellido_cliente'],1,0,'C',0);
    $pdf->Cell(30,10, $principal[$i]['nombre_regional']." " .$principal[$i]['apellido_regional'],1,0,'C',0);
    $pdf->Cell(50,10, $principal[$i]['nombre_subregional'],1,0,'C',0);
    $pdf->Cell(40,10, $principal[$i]['nombre_usuario'],1,1,'C',0);   
    
}
$pdf->Output();
?>


