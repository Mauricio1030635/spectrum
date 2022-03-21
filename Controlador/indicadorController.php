<?php 
include_once "/xampp/htdocs/spectrum/Modelo/indicadorModel.php";  

$modelo = new indicadorModel;

 $accion=$_POST["accion"]??"sinAccion";        
 switch ($accion){        
     case "agenda":  
        $resul= $modelo->agenda();
        echo $resul;                            
        break;
     case "usuario":  
        $resul= $modelo->usuario();
        echo $resul;            
        break;
     case "tecnico":  
        $resul= $modelo->tecnico();
        echo $resul;   
        break;
     case "ingeniero":  
        $resul= $modelo->ingeniero();
        echo $resul;   
        break;
     case "cliente":  
        $resul= $modelo->cliente();
        echo $resul;             
        break;

     
 } 
?>