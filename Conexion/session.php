<?php
class sessiones{

private $session = null;

public function __construct($name)
{
    session_start();

    if(!isset($_SESSION[$name])){
        $_SESSION[$name]=null;
    }
    $this->session=$name;
}

public function setsession($value){    
    $_SESSION[$this->session]=$value;
}


public function cerrar(){
    session_unset();
    session_destroy();   
     
}








public function getsession(){
    
    return $_SESSION[$this->session];
}




}


?>