<?php
include("php/conexion.php");

$id_usuario = $_GET["id"];

$sql = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario";

$resultado = mysqli_query($conexion,$sql);
$usuario = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Perfil de usuario</title>
        <link rel="stylesheet" href="estilos.css">
    </head>

    <body>
        <header>
            <img src="toylore_logo.png" alt="Logo ToyLore">
            <section>
                <h1>ToyLore</h1>
                <p>Perfil del usuario</p>
            </section>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="foro.php">Foro</a></li>
                <li><a href="noticias.php">Noticias</a></li>
            </ul>
        </nav>

        <main>
            <section>
                <h2>Perfil de usuario</h2>
                <img src="avatar-default.png" alt="Avatar">
                <p>Usuario: <strong><?php echo $usuario["usuario"]; ?></strong></p>
                <p>Correo: <?php echo $usuario["correo"]; ?></p>
                <p>Rol: <?php echo $usuario["rol"]; ?> </p>
                <p>Fecha de registro: <?php echo $usuario["fecha_registro"]; ?></p>
                <hr>
                <a href="foro.php">Volver al foro</a>
            </section>
        </main>
        <footer>
            <p>© 2026 ToyLore</p>
        </footer>
    </body>
</html>