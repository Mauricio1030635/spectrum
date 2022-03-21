<?php
    error_reporting(0);
    include_once "/xampp/htdocs/spectrum/Conexion/Connection.php";    
    include_once "/xampp/htdocs/spectrum/Conexion/session.php";
    class personaModel extends Connection{
    
    private $persona;
    private $session;


    function __construct()
    {
      $this->persona =new persona;
      $this->session =new sessiones("login");
      parent::__construct();
    }         

    public function validarLogin($usuario){
      $this->persona=$usuario;      
      $pass =md5($this->persona->getPass());            
      $query="select * from usuario u 
      inner join rol r  on r.id_rol= u.id_rol 
      where u.usuario = ? and u.passwordUsuario =?";        
      $resul=$this->openConnection()->prepare($query);      
      $param=[$this->persona->getUsuario(),$pass];
      $resul->execute($param);
      if($resul->rowCount()) {
        $valor= $resul->fetch();
        $this->session->setsession($valor);
        return $valor;
      }
      else
          return false;       
           
    }  
  }

 
 
 


   

  

  ?>