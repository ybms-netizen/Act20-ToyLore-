<?php
include("conexion.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["usuario"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql ="INSERT INTO usuarios (usuario, correo, password) VALUES ('$usuario', '$correo', '$password')";

    if(mysqli_query($conexion, $sql)){
        echo "Usuario registrado correctamente";
    }else{
        echo "Error al registrar";
    }
}
?>