<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_datos = "toylore_db";

$conexion = mysqli_connect($host, $usuario, $password, $base_datos);

if(!$conexion){
    die("Error de conexion: ". mysqli_connect_error());
}
?>