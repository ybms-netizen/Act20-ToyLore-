<?php

session_start();

include("conexion.php");
if(!isset($_SESSION["id"])){
    die("Debes iniciar sesión.");
}

$titulo = $_POST["titulo"];
$contenido = $_POST["contenido"];
$imagen = "";

if(
    isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0){
    $imagen = $_FILES["imagen"]["name"];
    move_uploaded_file($_FILES["imagen"]["tmp_name"], "../uploads/" . $imagen);
}

$id_usuario = $_SESSION["id"];
$sql = "INSERT INTO publicaciones (titulo,contenido,imagen,id_usuario) VALUES ('$titulo','$contenido','$imagen','$id_usuario')";

if(mysqli_query($conexion,$sql)){
    header("Location: ../foro.php");
    exit();
}

else{echo mysqli_error($conexion);}

?>