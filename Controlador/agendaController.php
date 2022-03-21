<?php  
include_once "/xampp/htdocs/spectrum/Modelo/agendaModel.php";  
$modelo = new agendaModel;

 $accion=$_POST["accion"]??"sinAccion";     
  $idRe=$_POST["Id"]??null;   
//  $Nombre=$_POST["Nombre"]??null;   
//  $Apellido=$_POST["Apellido"]??null;   
//  $Telefono=$_POST["Telefono"]??null;   
//  $Direccion=$_POST["Direccion"]??null;   
//  $Correo=$_POST["Correo"]??null;   
//  $Ciudad=$_POST["Ciudad"]??null;   
//  $password=md5($_POST["password"]??null);   
//  $usuario=$_POST["usuario"]??null;   
//  $Rol=$_POST["Rol"]??null;      
//  $Id=$_POST["Id"]??null;      
 switch ($accion){        
     case "agregar":  
      
      echo json_encode($resul);                                         
     break;  
     case "modificar":  
     
      echo json_encode($resul);                                         
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
        
        //$resul= $modelo->eliminar($usuarios);
        echo $resul;            
       break;    
 } 
?>