<?php

class Conexion{
   private $conexion;

   public function __construct(){
      require_once 'configuracion.php';

      $this->conexion = new Mysqli($host,$user,$password,$dbName);
      $this->conexion->set_charset("utf8");
   }

   public function agregarReporte($numReporte,$descripcion,$idEquipo,$numSerial,$edificio,$status,$idPersona){
      $consulta = "INSERT INTO reportes (id,numReporte,descripcion,idEquipo,numSerial,estado,hora,fecha,edificio,idPersona) VALUES(null,'$numReporte','$descripcion',$idEquipo,'$numSerial','$status',CURTIME(), DATE_FORMAT(curdate(),\"%d-%m-%Y\"),'$edificio',$idPersona);";

      $respuesta = $this->conexion->query($consulta);

      if($this->conexion->affected_rows > 0){
         return true;
      }else{
         return false;
      }
   }

   public function mostrarReporte($id){
      $consulta = "SELECT  reportes.* , persona.* FROM reportes INNER  JOIN persona ON reportes.idPersona = persona.id
                   WHERE reportes.id = '$id';";

      $respuesta = $this->conexion->query($consulta);

      if($respuesta->num_rows > 0){
         return $respuesta;
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

   public function agregarPersona($nombre , $apellidoP , $apellidoM){
      $consulta = "INSERT INTO persona values(null , '$nombre' , '$apellidoP' , '$apellidoM');";

      $respuesta = $this->conexion->query($consulta);

      if($this->conexion->affected_rows > 0) {
         return true;
      }else{
         return false;
      }
   }

   public function obtenerUltimoRegistro(){
      $consulta = "SELECT  id FROM persona ORDER BY  id DESC LIMIT 1;";

      $respuesta = $this->conexion->query($consulta);

      if($respuesta->num_rows > 0) {
         $id = $respuesta->fetch_assoc();

         return $id['id'];
      }else{
         return false;
      }
   }

   public function editarReporte($id , $idPersona , $numReporte , $idEquipo , $numSerial , $estado , $nombre , $apellidoP , $apellidoM , $edificio , $descripcion ){
      $bandera = false;

      $consulta = "UPDATE reportes SET numReporte = '$numReporte', idEquipo = '$idEquipo' , numSerial = '$numSerial' , estado = '$estado' , edificio = '$edificio' , descripcion = '$descripcion' WHERE id = '$id';";


      $respuesta = $this->conexion->query($consulta);

      if($respuesta){
         $consulta = "UPDATE persona SET nombre = '$nombre', apellidoPaterno = '$apellidoP' , apellidoMaterno = '$apellidoM' WHERE id = '$idPersona';  ";

         $respuesta = $this->conexion->query($consulta);

         if($respuesta){
            $bandera = true;
         }
      }

      return $bandera;

   }

}


?>
