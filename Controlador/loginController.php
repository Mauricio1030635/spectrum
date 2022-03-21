<?php 
error_reporting(0);
include_once "../Modelo/persona.php";    
include_once "/xampp/htdocs/spectrum/Modelo/personaModel.php";    
$persona = new persona;
$modelo = new personaModel;


if (isset($_POST)){
    $accion=$_POST["accion"]??"sinAccion";    
    $usuario=$_POST["usuario"]??"";
    $password=$_POST["password"]??"";    
    switch ($accion){        
        case "login":                        
            $persona->setUsuario($usuario);
            $persona->setPass($password);
            $resul= $modelo->validarLogin($persona);
            $respuesta = array('mensaje' => $resul );
            echo json_encode($respuesta);
            
        break;    
    }     

}


?>