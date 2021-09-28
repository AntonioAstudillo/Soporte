<?php

require_once '../conexion/Conexion.php';

$numReporte = (isset($_POST['numReporte']))? $_POST['numReporte'] : '';
$idEquipo = (isset($_POST['idEquipo']))? $_POST['idEquipo'] : '';
$numSerial = (isset($_POST['numSerial']))? $_POST['numSerial'] : '';
$edificio = (isset($_POST['edificio']))? $_POST['edificio'] : '';
$status = (isset($_POST['status']))? $_POST['status'] : '';
$descripcion = (isset($_POST['descripcion']))? $_POST['descripcion'] : '';


$objetoCon = new Conexion();

$respuesta = $objetoCon->agregarReporte($numReporte , $descripcion , $idEquipo, $numSerial , $edificio , $status);

if($respuesta){
   header("Location:../index.php");
}

?>
