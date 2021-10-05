<?php
header('Content-type: application/json; charset=utf-8');
require_once '../conexion/Conexion.php';

$id = (isset($_GET['id']))? $_GET['id']: '0';

$objetoConexion = new Conexion();

$respuesta = $objetoConexion->mostrarReporte($id);

$respuesta = $respuesta->fetch_assoc();

echo json_encode($respuesta);




?>
