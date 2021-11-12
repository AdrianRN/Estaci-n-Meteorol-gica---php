<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT * FROM datos";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$datos=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($datos, JSON_UNESCAPED_UNICODE);//envio el array final en formato json a AJAX
$conexion = null;
?>