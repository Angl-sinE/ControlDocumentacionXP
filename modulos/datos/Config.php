<?php

class Configuracion {
     public $servidor ="localhost";
     public $db_name = "sistemagestionproyectosav"; 
     public $serverUsername = "adminsistema";  
     public $serverPassword = "adminpass";
     public $conx;


   public function conectaBD(){
 
        $this->conexion = null;
 
        try{
            $this->conx = new PDO("mysql:host=" . $this->servidor . ";dbname=" . $this->db_name, $this->serverUsername, $this->serverPassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        }catch(PDOException $exception){
            echo "Error de Conexion: " . $exception->getMessage();
        }
 
        return $this->conx;
    }
     
}

?>