<?php
    error_reporting(0);
    include_once "/xampp/htdocs/spectrum/Conexion/Connection.php";      
    include_once "/xampp/htdocs/spectrum/Modelo/usuarios.php";
    
    class usuariosModel extends Connection{

    public $list=[];
    private $usuarios;  
    
    
    function __construct()
    {
      $this->usuarios =new usuarios;      
      parent::__construct();
    }
  
    ///Agregar
    public function agregar($usuario){                
        try {
            $this->usuarios=$usuario;
            $query="insert into usuario (`nombre_usuario`,`apellido_usuario`,`telefono_usuario`,`direccion_usuario`,`ciudad_usuario`,`usuario`,`passwordUsuario`,`id_rol`,`correo`)
            value(?,?,?,?,?,?,?,?,?)";        
            $resul=$this->openConnection()->prepare($query);                              
            $param=[
            $this->usuarios->getNombre(),$this->usuarios->getApellido(),$this->usuarios->getTelefono(),$this->usuarios->getDireccion(),$this->usuarios->getCiudad(),$this->usuarios->getUsuario(),
            $this->usuarios->getPass(),$this->usuarios->getRol(),
            $this->usuarios->getCorreo()];
            $resul->execute($param);            
            if($resul->rowCount()) return true;  
            else  return false;  
           
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }               
    }  

    //modifcar
    public function modificar($usuario){
        try {
        $this->usuarios=$usuario;
        $query="update usuario 
        set 
        `nombre_usuario`=?,
        `apellido_usuario`=?,
        `telefono_usuario`=?,
        `direccion_usuario`=?,
        `ciudad_usuario`=?,
        `usuario`=?,
        `passwordUsuario`=?,
        `id_rol`=?,
        `correo`=?
        WHERE
        `id_usuario`=?";        
        $resul=$this->openConnection()->prepare($query);
        $param=[
            $this->usuarios->getNombre(),$this->usuarios->getApellido(),$this->usuarios->getTelefono(),$this->usuarios->getDireccion(),$this->usuarios->getCiudad(),$this->usuarios->getUsuario(),$this->usuarios->getPass(),$this->usuarios->getRol(),
            $this->usuarios->getCorreo(), $this->usuarios->getId()

        ];
        $resul->execute($param);        
        if($resul->rowCount()) return true;  
        else  return false; 
    } catch (Exception $e) {
        return 'Excepción capturada: '.  $e->getMessage(). "\n";
    }     
    }   

    //Eliminar
    public function eliminar($usuario){
        $this->usuarios=$usuario;
        $query="delete from usuario where id_usuario = ?";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute([$this->usuarios->getId()]);
        if($resul->rowCount()) return true;  
        else  return false; 
           
    }

    //listar
    public function listar(){   
            $query="select
            u.`id_usuario` ,
            u.`nombre_usuario`,
            u.`apellido_usuario`,
            COALESCE(u.`telefono_usuario`,'Vacio')  telefono_usuario,
            COALESCE(u.`direccion_usuario`,'Vacio')direccion_usuario,
            COALESCE(u.`ciudad_usuario`,'Vacio') ciudad_usuario,
            u.`correo`,
            u.`usuario`,
            u.`id_rol`,
            r.nombre_rol from usuario u
            inner join rol r
            on u.id_rol = r.id_rol order by u.`id_usuario` desc "
            ;
            $resul=$this->openConnection()->prepare($query);                
            $resul->execute();
            $infor=[];            
            foreach($resul as $info){
                $infor=["id_usuario"=>$info["id_usuario"],
                        "nombre_usuario" =>$info["nombre_usuario"],
                        "apellido_usuario" =>$info["apellido_usuario"],
                        "telefono_usuario" =>$info["telefono_usuario"],
                        "direccion_usuario" =>$info["direccion_usuario"],
                        "ciudad_usuario" =>$info["ciudad_usuario"],
                        "usuario" =>$info["usuario"],
                        "id_rol" =>$info["id_rol"],
                        "nombre_rol" =>$info["nombre_rol"],
                        "correo" =>$info["correo"],

                        ];
                array_push( $this->list,$infor);
            }         
            return json_encode($this->list); 
    }    
    
    //traer roles
    public function infoRol(){          
        $query="SELECT id_rol, nombre_rol  FROM rol ";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        foreach($resul as $valor){            
            include ("/xampp/htdocs/spectrum/vista/complemento/rol.php");
        }              
    }
     
  }





  

 
 
 


   

  

  ?>