<?php

require_once '../conexion/Conexion.php';

$numReporte = (isset($_POST['numReporte']))? $_POST['numReporte'] : '';
$idEquipo = (isset($_POST['idEquipo']))? $_POST['idEquipo'] : '';
$numSerial = (isset($_POST['numSerial']))? $_POST['numSerial'] : '';
$edificio = (isset($_POST['edificio']))? $_POST['edificio'] : '';
$status = (isset($_POST['status']))? $_POST['status'] : '';
$descripcion = (isset($_POST['descripcion']))? $_POST['descripcion'] : '';
$nombre = (isset($_POST['nombre']))? $_POST['nombre'] : '';
$apellidoP  = (isset($_POST['apellidoP']))? $_POST['apellidoP'] : '';
$apellidoM = (isset($_POST['apellidoM']))? $_POST['apellidoM'] : '';


$objetoCon = new Conexion();

$respuesta = $objetoCon->agregarPersona($nombre , $apellidoP , $apellidoM);

if($respuesta){
   $ultimo = $objetoCon->obtenerUltimoRegistro();
   $respuesta = $objetoCon->agregarReporte($numReporte , $descripcion , $idEquipo, $numSerial , $edificio , $status, $ultimo);
}


if($respuesta){
   header("Location:../index.php");
}else{
   header("Location:../error.php");
}

?>
