<?php

require_once '../conexion/Conexion.php';

$id = (isset($_GET['id']))? $_GET['id']: '0';

$numReporte = (isset($_POST['numReporte']))? $_POST['numReporte'] : '';
$idEquipo = (isset($_POST['idEquipo']))? $_POST['idEquipo'] : '';
$numSerial = (isset($_POST['numSerial']))? $_POST['numSerial'] : '';
$edificio = (isset($_POST['edificio']))? $_POST['edificio'] : '';
$estado = (isset($_POST['estado']))? $_POST['estado'] : '';
$descripcion = (isset($_POST['descripcion']))? $_POST['descripcion'] : '';
$nombreCompleto = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$idPersona = (isset($_POST['idPersona']))? $_POST['idPersona'] : '';


//rompemos el nombre
$nombreCompleto = explode(" " , $nombreCompleto);

if(count($nombreCompleto) <=3){
   $nombre = $nombreCompleto[0];
   $apellidoPaterno = $nombreCompleto[1];
   $apellidoMaterno = $nombreCompleto[2];
}else{
   $nombre = $nombreCompleto[0];
   $nombre .= " " . $nombreCompleto[1];
   $apellidoPaterno = $nombreCompleto[2];
   $apellidoMaterno = $nombreCompleto[3];
}

$objetoConexion = new Conexion();


$respuesta = $objetoConexion->editarReporte($id , $idPersona , $numReporte , $idEquipo , $numSerial , $estado , $nombre , $apellidoPaterno , $apellidoMaterno , $edificio , $descripcion);

echo $respuesta;

?>
