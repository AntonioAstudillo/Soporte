<?php

require_once '../conexion/Conexion.php';

$id = (isset($_GET['id'])) ? $_GET['id'] : '0';

$objeto = new Conexion();


$respuesta = $objeto->eliminarReporte($id);


echo $respuesta;


 ?>
