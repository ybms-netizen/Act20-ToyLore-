<?php
session_start();

include("conexion.php");

$contenido = $_POST["contenido"];
$id_publicacion = $_POST["id_publicacion"];
$id_usuario = $_SESSION["id"];
$sql = "INSERT INTO comentarios(contenido,id_usuario,id_publicacion) VALUES ('$contenido','$id_usuario','$id_publicacion')";

mysqli_query($conexion, $sql);

header("Location: ../foro.php");
exit();
?>