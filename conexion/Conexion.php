<?php

class Conexion{
   private $conexion;

   public function __construct(){
      require_once 'configuracion.php';

      $this->conexion = new Mysqli($host,$user,$password,$dbName);
      $this->conexion->set_charset("utf8");
   }

   public function agregarReporte($numReporte,$descripcion,$idEquipo,$numSerial,$edificio){
      $consulta = 'INSERT INTO reportes VALUES(null,'$numRporte','$descripcion',$idEquipo,'$numSerial',null,'$edificio');';

      $respuesta = $this->conexion->query($consulta);

      if($respuesta){
         return true;
      }else{
         return false;
      }
   }
}


?>
