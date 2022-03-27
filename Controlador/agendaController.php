<?php  
include_once "/xampp/htdocs/spectrum/Modelo/agendaModel.php";  
$modelo = new agendaModel;

 $accion=$_POST["accion"]??"sinAccion";     
 $idRe=$_POST["Id"]??null;   
// ------------------uno----------
 $Fase=$_POST["Fase"]??null;   
 $Tarea=$_POST["Tarea"]??null;   
 $Descripcion=$_POST["Descripcion"]??null;   
 $Fecha=$_POST["Fecha"]??null;   
 $Hora=$_POST["Hora"]??null;   
 $Tecnico=$_POST["Tecnico"]??null;   
 $Ingeniero=$_POST["Ingeniero"]??null;   
 $Cliente=$_POST["Cliente"]??null;   
 $Regional=$_POST["Regional"]??null;      
 $Subregional=$_POST["Subregional"]??null;      
 $Digitador=$_POST["Digitador"]??null;      
// -----------------dos----------------

 $EstadoFinal=$_POST["EstadoFinal"]??null;   
 $Observaciones=$_POST["Observaciones"]??null;   
 $causalPuntualidad=$_POST["causalPuntualidad"]??null;   
 $Estado=$_POST["Estado"]??null;   
 $Novedad=$_POST["Novedad"]??null;   
 $ObservacionCalidad=$_POST["ObservacionCalidad"]??null;   
 $NovedadPuntualidad=$_POST["NovedadPuntualidad"]??null;   
 $ObservacionTerreno=$_POST["ObservacionTerreno"]??null;   
 $falta=$_POST["falta"]??null;      
 $tipofalta=$_POST["tipofalta"]??null;      
 $Obsrvacionfalta=$_POST["Obsrvacionfalta"]??null;        

 switch ($accion){        
     case "agregar":        
      $resul= $modelo->agregar(   
      $Digitador,   
      $Fase,
      $Tarea,
      $Descripcion,
      $Fecha,
      $Hora,
      $Tecnico,
      $Ingeniero,
      $Cliente,
      $Regional,
      $Subregional
      );
     echo json_encode(['resultado'=>$resul]);                                      
     break;  

     case "modificar":                   
        $resul= $modelo->modificar(   
        $Digitador,   
        $Fase,
        $Tarea,
        $Descripcion,
        $Fecha,
        $Hora,
        $Tecnico,
        $Ingeniero,
        $Cliente,
        $Regional,
        $Subregional,
        $idRe
        );
       echo json_encode(['resultado'=>$resul]);                                          
     break;  

     case "listarSubregional":       
      $resul= $modelo->listarSubregional($idRe);
      echo $resul;            
     break;  

     case "listar":       
       $resul= $modelo->listarLista();
       echo $resul;            
      break;    
      case "eliminar":         
        $resul= $modelo->eliminar($idRe);
        echo $resul;            
       break;    
      case "agregarcalidad":         
        $resul= $modelo->modificarCalidad(
          $EstadoFinal,
          $Observaciones,
          $causalPuntualidad,
          $Estado,
          $Novedad,
          $ObservacionCalidad,
          $NovedadPuntualidad,
          $ObservacionTerreno,
          $falta,
          $tipofalta,
          $Obsrvacionfalta,
          $idRe
        );
        echo $resul;      
      
       break;    

 } 
?>