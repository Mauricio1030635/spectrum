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
    $this->Cell(50);
    // Título
    $this->Setx(150);
    $this->Cell(10,10,'Reporte Agenda Completo',0,0,'C');
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
$pdf = new PDF('L','mm','A4');
$pdf->SetMargins(10,10,0);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',15);
$pdf->Cell(250,20, utf8_decode("Acontinuacion se muestra un pequeño resumen del agendamiento y del procesos de calidad del servicio") ,0,1,'C',0);
$id=$_REQUEST['iden'];
$nada = new agendaModel;
$json = $nada->listarUno($id);
$principal=json_decode($json, true);
$pdf->SetFont('Times','',12);   
$array = array(
'FASE',
'TAREA',
'DESCRIPCION TAREA',
'FECHA AGENDA',
'HORA AGENDA',
'NOMBRE USUARIO',
'APELLIDO USUARIO',
'NOMBRE TECNICO',
'APELLIDO TECNICO',
'NOMBRE INGENIERO',
'APELLIDO INGENIERO',
'NOMBRE CLIENTE',
'APELLIDO CLIENTE',
'NOMBRE REGIONAL',
'NOMBRE SUBREGIONAL',
'ESTADO FINAL ACTIVIDAD',
'OBSERVACIONES',
'CAUSAL PUNTUALIDAD',
'ESTADO',
'NOVEDAD',
'OBSERVACION CALIDAD',
'NOVEDAD PUNTUALIDAD TERRENO',
'OBSERVACION PUNTUALIDAD TERRENO',
'FALTA',
'TIPO FALTA',
'OBSERVACIONES FALTAS');

for ($i = 0; $i <26 ; $i++) { 
    $pdf->SetFont('Times','B',12);
    $pdf->Cell(250,10, $array[$i]. ":" ,0,1,'',0);        
    $pdf->SetFont('Times','',12);
    $pdf->Cell(250,10, utf8_decode($principal[$i]) ,0,1,'',0);        
    
}
// for ($i = 0; $i < count($array) ; $i++) { 
        
//     $pdf->Cell(utf8_decode($principal[$i]) ,0,1,'',0);        
// }

$pdf->Output();
?>



