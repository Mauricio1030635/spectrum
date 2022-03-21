<?php
include_once "/xampp/htdocs/spectrum/Conexion/global.php";
class Connection{
    //VARIABLES
    private $SERVER;
    private $USER;
    private $PASSWORD;
    private $BBDD;
    private $CONECT;
    ///CONSTRUCTOR
    public function __construct()
    {    
        $this->SERVER=SERVER;
        $this->USER=USER;
        $this->PASSWORD=PASSWORD;
        $this->BBDD=BBDD;
    }
    ///CONECTAR
    public function openConnection()
    {
        try {        
            $this->CONECT = new PDO('mysql:='.$this->SERVER.';dbname='.$this->BBDD, $this->USER, $this->PASSWORD);            
            return $this->CONECT;

        } catch (PDOException $e) {
            echo "Error en la conexion:". $e->getMessage() ;
            die();
        }
    }
    //CERRAR CONEXION
    public function closeConnection()
    {
        $this->CONECTconn=null;
    }

}

?>