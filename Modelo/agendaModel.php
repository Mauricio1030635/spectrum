<?php
    error_reporting(0);
    include_once "/xampp/htdocs/spectrum/Conexion/Connection.php";          
    
    class agendaModel extends Connection{

    public $list=[];    
    
    
    function __construct()
    {      
      parent::__construct();
    }  
  

    //listar
    public function listar(){   
            $query=
            "SELECT * FROM `agenda` a
            LEFT  OUTER JOIN cliente c on  c.id_cliente = a.id_cliente
            LEFT  OUTER JOIN usuario u on  u.id_usuario= a.id_usuario
            LEFT  OUTER JOIN tecnico t on  t.id_tecnico = a.id_tecnico
            LEFT  OUTER JOIN ingeniero i on  i.id_ingeniero = a.id_ingeniero
            LEFT  OUTER JOIN regional r on  r.id_regional = a.id_regional
            LEFT  OUTER JOIN subregional s  on  s.id_subregional = a.id_subregional and s.id_regional = a.id_regional "  ;
            $resul=$this->openConnection()->prepare($query);                
            $resul->execute();                       
            $resultado = $resul->fetchAll();            
            return json_encode($resultado); 
    }   
    
    
    public function listarSubregional($id){ 
        $query="SELECT id_regional as id, nombre_subregional as nombre FROM `subregional` WHERE id_regional =? ";        
        $resul=$this->openConnection()->prepare($query);                
        $resul->execute([$id]);              
        $infor=[];            
        foreach($resul as $info){
            $infor=["id"=>$info["id"],
                    "nombre" =>$info["nombre"],                    
                    ];
            array_push( $this->list,$infor);
        }         
        return json_encode($this->list); 

    }
    
    public function listarLista(){   
        $query="SELECT * FROM `agenda` a
        LEFT  OUTER JOIN cliente c on  c.id_cliente = a.id_cliente
        LEFT  OUTER JOIN usuario u on  u.id_usuario= a.id_usuario
        LEFT  OUTER JOIN tecnico t on  t.id_tecnico = a.id_tecnico
        LEFT  OUTER JOIN ingeniero i on  i.id_ingeniero = a.id_ingeniero
        LEFT  OUTER JOIN regional r on  r.id_regional = a.id_regional
        LEFT  OUTER JOIN subregional s  on  s.id_subregional = a.id_subregional and s.id_regional = a.id_regional" ;        
        $resul=$this->openConnection()->prepare($query);                
        $resul->execute();
        $infor=[];            
        foreach($resul as $info){
            $infor=["fase"=>$info["fase"],
                    "tarea" =>$info["tarea"],
                    "fecha_agenda" =>$info["fecha_agenda"],
                    "hora_agenda" =>$info["hora_agenda"],
                    "nombre_tecnico" =>$info["nombre_tecnico"],
                    "nombre_ingeniero" =>$info["nombre_ingeniero"],
                    "nombre_cliente" =>$info["nombre_cliente"],
                    "nombre_regional" =>$info["nombre_regional"],
                    "nombre_subregional" =>$info["nombre_subregional"],
                    "nombre_usuario" =>$info["nombre_usuario"]
                    ];
            array_push( $this->list,$infor);
        }         
        return json_encode($this->list); 
}  




    
    //traer cliente
    public function infoCliente(){          
        $query="SELECT id_cliente as id, nombre_cliente as nombre, apellido_cliente FROM cliente ";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        foreach($resul as $valor){            
            include ("/xampp/htdocs/spectrum/vista/complemento/general.php");
        }              
    }  
    
    public function infoRegional(){          
        $query="SELECT id_regional as id , nombre_regional as nombre FROM regional ";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        foreach($resul as $valor){            
            include ("/xampp/htdocs/spectrum/vista/complemento/general.php");
        }              
    } 

    //traer cliente
    public function infoIngeniero(){          
    $query="SELECT id_ingeniero as id, nombre_ingeniero as nombre, apellido_ingeniero FROM ingeniero ";  
     $resul=$this->openConnection()->prepare($query);
     $resul->execute();
        foreach($resul as $valor){            
            include ("/xampp/htdocs/spectrum/vista/complemento/general.php");
        }              
    }     
    //traer cliente
    public function infoTecnico(){          
    $query="SELECT id_tecnico as id, nombre_tecnico as nombre, apellido_tecnico FROM tecnico ";  
     $resul=$this->openConnection()->prepare($query);
     $resul->execute();
        foreach($resul as $valor){            
            include ("/xampp/htdocs/spectrum/vista/complemento/general.php");
        }              
    }     
  }
  ?>