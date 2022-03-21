<?php 
include_once "/xampp/htdocs/spectrum/Modelo/persona.php";
class usuarios extends persona{ 
    private $ciudad;          
    private $rol;  
    private $correo;  

    function __construct($ciudad=null, $rol=0,$correo="")
    {
        $this->ciudad =$ciudad;        
        $this->rol =$rol;     
        $this->correo =$correo;   
         parent::__construct();
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo =$correo;
    }

    public function getCiudad(){
        return $this->ciudad;
    }

    public function setCiudad($ciudad){
        $this->ciudad =$ciudad;
    }
    
    public function getRol(){
        return $this->rol;
    }

    public function setRol($rol){
        $this->rol=$rol;
    }

    
    


}
    ?>