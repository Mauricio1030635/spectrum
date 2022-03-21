<?php
class persona{

    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $direccion;        
    private $pass;        
    private $usuario;        
    
    public function __construct($id=0,$nombre="N/A",$apellido="N/A",$telefono=null,$direccion=null,$pass="N/A", $usuario="N/A")
    {        
        $this->id =$id;
        $this->nombre =$nombre;
        $this->apellido =$apellido;
        $this->telefono =$telefono;
        $this->direccion =$direccion;
        $this->pass =$pass;
        $this->usuario =$usuario;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id=$id;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre =$nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setApellido($apellido){
        $this->apellido =$apellido;
    }

    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono =$telefono;
    }
   
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion =$direccion;
    }

    public function getPass(){
        return $this->pass;
    }
    public function setPass($pass){
        $this->pass =$pass;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }
    public function setUsuario($usuario){
        $this->usuario =$usuario;
    }

}


?>