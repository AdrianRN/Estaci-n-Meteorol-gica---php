<?php
include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

if(isset($_POST['sensor1']) && isset($_POST['sensor2']) && isset($_POST['sensor3']) && isset($_POST['sensor4']) && isset($_POST['sensor5']) && isset($_POST['sensor6']) && isset($_POST['sensor7']) && isset($_POST['sensor8']) && isset($_POST['sensor9']) && isset($_POST['sensor10'])){
    $sensor1 = $_POST['sensor1'];
    $sensor2 = $_POST['sensor2'];
    $sensor3 = $_POST['sensor3'];
    $sensor4 = $_POST['sensor4'];
    $sensor5 = $_POST['sensor5'];
    $sensor6 = $_POST['sensor6'];
    $sensor7 = $_POST['sensor7'];
    $sensor8 = $_POST['sensor8'];
    $sensor9 = $_POST['sensor9'];
    $sensor10 = $_POST['sensor10'];

    $query = 'INSERT INTO datos (sensor1, sensor2, sensor3, sensor4, sensor5, sensor6, sensor7, sensor8, sensor9, sensor10) VALUES ('.$sensor1 .','.$sensor2.','.$sensor3.','.$sensor4.','.$sensor5.','.$sensor6.','.$sensor7.','.$sensor8.','.$sensor9.','.$sensor10.')';
    $exe = $conexion->exec($query);
    echo "guardado exitoso";
}else{
    echo "fallo al guardar";
} 
?>