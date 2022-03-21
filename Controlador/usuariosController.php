<?php 
//error_reporting(0);
include_once "/xampp/htdocs/spectrum/Modelo/usuarios.php";  
include_once "/xampp/htdocs/spectrum/Modelo/usuariosModel.php";  
$usuarios = new usuarios;
$modelo = new usuariosModel;

 $accion=$_POST["accion"]??"sinAccion";    
 $Nombre=$_POST["Nombre"]??null;   
 $Apellido=$_POST["Apellido"]??null;   
 $Telefono=$_POST["Telefono"]??null;   
 $Direccion=$_POST["Direccion"]??null;   
 $Correo=$_POST["Correo"]??null;   
 $Ciudad=$_POST["Ciudad"]??null;   
 $password=md5($_POST["password"]??null);   
 $usuario=$_POST["usuario"]??null;   
 $Rol=$_POST["Rol"]??null;      
 $Id=$_POST["Id"]??null;      
 switch ($accion){        
     case "agregar":  
      $usuarios->setNombre($Nombre);    
      $usuarios->setApellido($Apellido);    
      $usuarios->setTelefono($Telefono);    
      $usuarios->setDireccion($Direccion);           
      $usuarios->setCiudad($Ciudad);    
      $usuarios->setPass($password);    
      $usuarios->setCorreo($Correo);    
      $usuarios->setRol($Rol);    
      $usuarios->setUsuario($usuario);    
      $resul= $modelo->agregar($usuarios);
      echo json_encode($resul);                                         
     break;  
     case "modificar":  
      $usuarios->setNombre($Nombre);    
      $usuarios->setApellido($Apellido);    
      $usuarios->setTelefono($Telefono);    
      $usuarios->setDireccion($Direccion);           
      $usuarios->setCiudad($Ciudad);    
      $usuarios->setPass($password);    
      $usuarios->setCorreo($Correo);    
      $usuarios->setRol($Rol);    
      $usuarios->setUsuario($usuario);    
      $usuarios->setId($Id);    
      $resul= $modelo->modificar($usuarios);
      echo json_encode($resul);                                         
     break;  
     case "listar": 
       $resul= $modelo->listar();
        echo $resul;            
      break;    
      case "eliminar": 
        $usuarios->setId($Id);  
        $resul= $modelo->eliminar($usuarios);
        echo $resul;            
       break;    
 } 
?>