<?php

class Controlador {
    
public function verPagina($ruta){    
    $rut="";
    switch ($ruta){        
        case 'agenda': $rut = '../vista/agenda.php';
        break;
        case 'indicador': $rut= "/xampp/htdocs/spectrum/vista/indicador.php";
        break;
        case 'perfil': $rut = '../vista/perfil.php';
        break;
        case 'ingeniero': $rut = '../vista/ingeniero.php';
        break;
        case 'tecnico': $rut = '../vista/tecnico.php';
        break;
        case 'usuarios': $rut = '../vista/usuarios.php';
        break;        
        case 'salir': 
            include_once "/xampp/htdocs/spectrum/Controlador/menuController.php";
            $session =new sessiones("login");
            $session->cerrar();
            header("location:../");            

            
            
        break;
    } 
    return $rut; 
}


public function verPaginajavaScript($ruta){
    $rut="";
    switch ($ruta){
        case 'agenda': $rut = '../JavaScript/agenda.js';
        break;
        case '':
        case 'indicador': $rut = '../JavaScript/indicador.js';
        break;
        case 'perfil': $rut = '../JavaScript/perfil.js';
        break;
        case 'ingeniero': $rut = '../JavaScript/ingeniero.js';
        break;
        case 'tecnico': $rut = '../JavaScript/tecnico.js';
        break;
        case 'usuarios': $rut = '../JavaScript/usuarios.js';
        break;                
    } 
    return $rut; 
}


}
?>