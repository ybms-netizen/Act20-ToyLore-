<?php
session_start();
include ("conexion.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $sql = "SELECT *  FROM usuarios WHERE correo='$correo'";

    $resultado = mysqli_query($conexion, $sql);

    if(mysqli_num_rows($resultado) == 1){
        $usuario = mysqli_fetch_assoc($resultado);

        if(password_verify($password, $usuario["password"])){
            $_SESSION["id"] = $usuario["id_usuario"];
            $_SESSION["usuario"] = $usuario["usuario"];
            $_SESSION["rol"] = $usuario["rol"];

            header("Location: ../index.html");
            exit();
        }
    }echo "Correo o contraseña incorrectos";
}
?>