<?php
    error_reporting(0);
    include_once "/xampp/htdocs/spectrum/Conexion/Connection.php";          
    
    class agendaModel extends Connection{

    public $list=[];    
    
    
    function __construct()
    {      
      parent::__construct();
    }  
    
    //Agregar
    public function agregar(
         $Fase,$Tarea,$Descripcion,$Fecha,$Hora,$Tecnico, $Ingeniero,
    $Cliente,$Regional, $Subregional,$Digitador){                
        try {            
            $query="INSERT INTO `agenda` (`id_usuario`, `fase`, `tarea`, `descripcion_tarea`, `fecha_agenda`, `hora_agenda`, `id_tecnico`, `id_ingeniero`, `id_cliente`, `id_regional`, `id_subregional`) VALUES
            (?,?,?,?,?,?,?,?,?,?,?)";        
            $resul=$this->openConnection()->prepare($query);                              
            $param=[ $Fase,$Tarea,$Descripcion,$Fecha,$Hora,$Tecnico, $Ingeniero,
            $Cliente,$Regional, $Subregional,$Digitador
            ];
            $resul->execute($param);     

            $query2="select `id_agenda` from agenda ORDER by `id_agenda` desc limit 1";        
            $resul2=$this->openConnection()->prepare($query2);                              
            $resul2->execute();
            $id=$resul2->fetch()['id_agenda'];

            $query3="INSERT INTO `calidad`( `id_agenda`, `estado_final_actividad`, `observaciones`, `causal_puntualidad`, `estado`, `novedad`, `observacion_calidad`, `novedad_puntualidad_terreno`, `observacion_puntualidad_terreno`, `falta`, `tipo_falta`, `observaciones_faltas`) 
            VALUES 
            (?,null,null,null,null,null,null,null,null,null,null,null)";        
            $resul3=$this->openConnection()->prepare($query3);                              
            $resul3->execute([$id]);                                    
            
            if($resul->rowCount()) return true;  
            else  return false;  
           
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }               
    }


    public function modificar(
        $Digitador,$Fase,$Tarea,$Descripcion,$Fecha,$Hora,$Tecnico, $Ingeniero,
    $Cliente,$Regional, $Subregional,$idRe){                
        try {            
            $query="UPDATE `agenda`
            SET `id_usuario`=?,`fase`=?,`tarea`=?,`descripcion_tarea`=?,`fecha_agenda`=?,`hora_agenda`=?,`id_tecnico`=?,`id_ingeniero`=?,`id_cliente`=?,`id_regional`=?,`id_subregional`=? WHERE `id_agenda`=?";
            $resul=$this->openConnection()->prepare($query);                              
            $param=[ $Digitador, $Fase,$Tarea,$Descripcion,$Fecha,$Hora,$Tecnico, $Ingeniero,$Cliente,$Regional, $Subregional,$idRe
            ];
            $resul->execute($param);            
            if($resul->rowCount()) return true;  
            else  return false;  
           
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }               
    }    
    public function modificarCalidad(     
        $EstadoFinal,
        $Observaciones,
        $causalPuntualidad,
        $Estado,
        $Novedad,
        $ObservacionCalidad,
        $NovedadPuntualidad,
        $ObservacionTerreno,
        $falta,
        $tipofalta,
        $Obsrvacionfalta,
        $idRe
    ){                
        try {            
            $query="UPDATE `calidad` SET `estado_final_actividad`=? ,`observaciones`=?,`causal_puntualidad`=?,`estado`=?,`novedad`=?,`observacion_calidad`=?,`novedad_puntualidad_terreno`=?,`observacion_puntualidad_terreno`=?,`falta`=?,`tipo_falta`=?,`observaciones_faltas`=? WHERE `id_agenda`=?";
            $resul=$this->openConnection()->prepare($query);                              
            $param=[ 
                $EstadoFinal,
                $Observaciones,
                $causalPuntualidad,
                $Estado,
                $Novedad,
                $ObservacionCalidad,
                $NovedadPuntualidad,
                $ObservacionTerreno,
                $falta,
                $tipofalta,
                $Obsrvacionfalta,
                $idRe
            ];
            $resul->execute($param);            
            if($resul->rowCount()) return true;  
            else  return false;  
           
        } catch (Exception $e) {
            return 'Excepción capturada: '.  $e->getMessage(). "\n";
        }               
    }    
    
    
    public function listarSubregional($id){ 
        $query="SELECT id_subregional as id, nombre_subregional as nombre FROM `subregional` WHERE id_regional =? ";        
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

    public function eliminar($id){           
        $query="delete from calidad where id_agenda = ?";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute([$id]);

        $query="delete from agenda where id_agenda = ?";  
        $resul=$this->openConnection()->prepare($query);
        $resul->execute([$id]);
        if($resul->rowCount()) return true;  
        else  return false; 
}  

    public function listar(){   
        $query=
        "SELECT * FROM `agenda` a
        LEFT  OUTER JOIN cliente c on  c.id_cliente = a.id_cliente
        LEFT  OUTER JOIN usuario u on  u.id_usuario= a.id_usuario
        LEFT  OUTER JOIN tecnico t on  t.id_tecnico = a.id_tecnico
        LEFT  OUTER JOIN ingeniero i on  i.id_ingeniero = a.id_ingeniero
        LEFT  OUTER JOIN regional r on  r.id_regional = a.id_regional
        LEFT  OUTER JOIN subregional s  on  s.id_subregional = a.id_subregional and s.id_regional = a.id_regional        
        order by a.id_agenda desc ";                
        
        $resul=$this->openConnection()->prepare($query);                
        $resul->execute();                       
        $resultado = $resul->fetchAll();            
        return json_encode($resultado); 
}  


public function listarUno($id){   
    $query=
    "     
    SELECT  
`fase`,
`tarea`,
`descripcion_tarea`,
`fecha_agenda`,
`hora_agenda`,
`nombre_usuario`,
`apellido_usuario`,
nombre_tecnico,
apellido_tecnico,
nombre_ingeniero,
apellido_ingeniero,
nombre_cliente,
apellido_cliente,
nombre_regional,
nombre_subregional,
estado_final_actividad,
observaciones,
causal_puntualidad,
ca.estado,
ca.novedad,
ca.observacion_calidad,
ca.novedad_puntualidad_terreno,
ca.observacion_puntualidad_terreno,
ca.falta,
ca.tipo_falta,
ca.observaciones_faltas
FROM `agenda` a
    LEFT  OUTER JOIN cliente c on  c.id_cliente = a.id_cliente
    LEFT  OUTER JOIN usuario u on  u.id_usuario= a.id_usuario
    LEFT  OUTER JOIN tecnico t on  t.id_tecnico = a.id_tecnico
    LEFT  OUTER JOIN ingeniero i on  i.id_ingeniero = a.id_ingeniero
    LEFT  OUTER JOIN regional r on  r.id_regional = a.id_regional
    LEFT  OUTER JOIN subregional s  on  s.id_subregional = a.id_subregional and s.id_regional = a.id_regional
    LEFT  OUTER JOIN calidad ca  on  ca.id_agenda = a.id_agenda
    WHERE a.id_agenda = ?      
    ";                    
    $resul=$this->openConnection()->prepare($query);                
    $resul->execute([$id]);                       
    $resultado = $resul->fetch();            
    return json_encode($resultado); 
}
    
    public function listarLista(){   
        $query="SELECT *,a.id_agenda as principal FROM `agenda` a
        LEFT  OUTER JOIN cliente c on  c.id_cliente = a.id_cliente
        LEFT  OUTER JOIN usuario u on  u.id_usuario= a.id_usuario
        LEFT  OUTER JOIN tecnico t on  t.id_tecnico = a.id_tecnico
        LEFT  OUTER JOIN ingeniero i on  i.id_ingeniero = a.id_ingeniero
        LEFT  OUTER JOIN regional r on  r.id_regional = a.id_regional
        LEFT  OUTER JOIN subregional s  on  s.id_subregional = a.id_subregional and s.id_regional = a.id_regional
        LEFT  OUTER JOIN calidad ca  on  ca.id_agenda = a.id_agenda 
        order by a.id_agenda desc 
        " ;        
        $resul=$this->openConnection()->prepare($query);                
        $resul->execute();
        $infor=[];            
        foreach($resul as $info){
            $infor=["fase"=>$info["fase"],
                    "tarea" =>$info["tarea"],
                    "descripcion_tarea" =>$info["descripcion_tarea"],
                    "fecha_agenda" =>$info["fecha_agenda"],
                    "hora_agenda" =>$info["hora_agenda"],
                    "nombre_tecnico" =>$info["nombre_tecnico"],
                    "nombre_ingeniero" =>$info["nombre_ingeniero"],
                    "nombre_cliente" =>$info["nombre_cliente"],
                    "nombre_regional" =>$info["nombre_regional"],
                    "nombre_subregional" =>$info["nombre_subregional"],
                    "nombre_usuario" =>$info["nombre_usuario"],
                    "id_tecnico" =>$info["id_tecnico"],
                    "id_ingeniero" =>$info["id_ingeniero"],
                    "id_cliente" =>$info["id_cliente"],
                    "id_usuario" =>$info["id_usuario"],
                    "id_regional" =>$info["id_regional"],
                    "id_subregional" =>$info["id_subregional"],
                    "principal" =>$info["principal"],
                    "estado_final_actividad" =>$info["estado_final_actividad"],
                    "observaciones" =>$info["observaciones"],
                    "causal_puntualidad" =>$info["causal_puntualidad"],
                    "estado" =>$info["estado"],
                    "novedad" =>$info["novedad"],
                    "observacion_calidad" =>$info["observacion_calidad"],
                    "novedad_puntualidad_terreno" =>$info["novedad_puntualidad_terreno"],
                    "observacion_puntualidad_terreno" =>$info["observacion_puntualidad_terreno"],
                    "falta" =>$info["falta"],
                    "tipo_falta" =>$info["tipo_falta"],
                    "observaciones_faltas" =>$info["observaciones_faltas"]



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