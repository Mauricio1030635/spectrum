<?php
    error_reporting(0);
    include_once "/xampp/htdocs/spectrum/Conexion/Connection.php";              
    class indicadorModel extends Connection{

    public $list=[];        
    
    function __construct()
    {    
        parent::__construct();
    }  
         
    
    public function cliente(){        
        $query="select  count(*) as cantidad from cliente";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        return $resul->fetch()['cantidad'];            
    }
    
    public function ingeniero(){        
        $query="select  count(*) as cantidad from ingeniero";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        return $resul->fetch()['cantidad'];          
    }
    
    public function tecnico(){        
        $query="select  count(*) as cantidad from tecnico";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();
        return $resul->fetch()['cantidad'];        
    }
    
    public function usuario(){        
        $query="select  count(*) as cantidad from usuario";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();                
        return $resul->fetch()['cantidad'];             
    }
    
    public function agenda(){   
        try {
        $query="select  count(*) as cantidad from agenda";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute();        
        return $resul->fetch()['cantidad'];                    
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }          
        }


  
    
     
  }
  ?>