<?php
session_start();

include("conexion.php");

if(!isset($_SESSION["rol"])||$_SESSION["rol"]!= "administrador"){
    header("Location: ../index.html");
    exit();
}

$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$imagen = "";

if(isset($_FILES["imagen"])){
    $imagen = $_FILES["imagen"]["name"];

    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../uploads/" . $imagen);
}

$id_autor = $_SESSION["id"];

$sql = "INSERT INTO noticias (titulo, contenido, imagen, id_autor) VALUES ('$titulo', '$contenido', '$imagen', '$id_autor')";

mysqli_query($conexion, $sql);

header("Location: ../noticias.php");
exit();
?>