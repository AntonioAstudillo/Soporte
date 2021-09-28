<?php

class Conexion{
   private $conexion;

   public function __construct(){
      require_once 'configuracion.php';

      $this->conexion = new Mysqli($host,$user,$password,$dbName);
      $this->conexion->set_charset("utf8");
   }

   public function agregarReporte($numReporte,$descripcion,$idEquipo,$numSerial,$edificio,$status){
      $consulta = "INSERT INTO reportes (id,numReporte,descripcion,idEquipo,numSerial,estado,edificio) VALUES(null,'$numReporte','$descripcion',$idEquipo,'$numSerial','$status','$edificio');";

      $respuesta = $this->conexion->query($consulta);

      if($this->conexion->affected_rows > 0){
         return true;
      }else{
         return false;
      }
   }

   public function mostrarReportes(){
      $consulta = 'SELECT * FROM reportes';

      $respuesta = $this->conexion->query($consulta);

      if($respuesta->num_rows > 0){
         return $respuesta;
      }else{
         return false;
      }
   }
}


?>
