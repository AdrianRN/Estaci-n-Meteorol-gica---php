<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST['sensor1']) && isset($_POST['sensor2']) && isset($_POST['sensor3'])){
    $sensor1 = $_POST['sensor1'];
    $sensor2 = $_POST['sensor2'];
    $sensor3 = $_POST['sensor3'];
    $query = 'INSERT INTO datos (sensor1, sensor2, sensor3) VALUES ('.$sensor1 .','.$sensor2.','.$sensor3.')';
    $exe = $conexion->exec($query);
    echo "guardado exitoso";
}else{
    echo "fallo al guardar";
} 
?>