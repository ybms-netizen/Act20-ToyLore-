<?php
session_start();
include("php/conexion.php");

if(!isset($_SESSION["rol"]) || $_SESSION["rol"] != "administrador"){
    header("Location:index.html");
    exit();
}
?>

<?php
$slqUsuarios = "SELECT COUNT(*) AS total FROM usuarios";
$resultadoUsuarios = mysqli_query($conexion, $slqUsuarios);
$usuarios = mysqli_fetch_assoc($resultadoUsuarios);

/*aqui se ven las publicaciones*/
$sqlPublicaciones = "SELECT COUNT(*) AS total FROM publicaciones";
$resultadoPublicaciones = mysqli_query($conexion, $sqlPublicaciones);
$publicaciones = mysqli_fetch_assoc($resultadoPublicaciones);

/*las noticias*/
$sqlNoticias = "SELECT COUNT(*) AS total FROM noticias";
$resultadoNoticias = mysqli_query($conexion, $sqlNoticias);

$noticias = mysqli_fetch_assoc($resultadoNoticias);

/*insertar los comentarios*/
$sqlComentarios = "SELECT COUNT(*) AS total FROM comentarios";

$resultadoComentarios = mysqli_query($conexion, $sqlComentarios);

$comentarios = mysqli_fetch_assoc($resultadoComentarios);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de administrador</title>
    <link rel="stylesheet" href="estilos.css">
</head>

<body>
    <!--encabezado de la pagina-->
    <header>
        <img src="toylore_logo.png" alt="Logo de ToyLore">

        <section>
            <h1>Panel de administracion</h1>
            <p>Area exclusiva para administradores.</p>
        </section>
    </header>

    <!--panel de navegacion-->

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="foro.php">Foro</a></li>
        </ul>
    </nav>

    <!--parte principal-->
    <main>
        <section>
            <h2>Panel de administracion</h2>
                <p>Usuarios registrados: <strong><?php echo $usuarios["total"]; ?></strong></p>
                <p>Publicaciones: <strong><?php echo $publicaciones["total"]; ?></strong></p>
                <p>Noticias: <strong><?php echo $noticias["total"]; ?></strong></p>
                <p>Comentarios: <strong><?php echo $comentarios["total"]; ?></strong></p>
        </section>


        <section>
            <h2>Herramientas administrativas</h2>

            <ul>
                <li>
                    <a href="crear-noticia.html">Crear noticia</a>
                </li>

                <li>
                    <a href="foro.php">Ver publicaciones</a>
                </li>

                <li>
                    <a href="noticias.php">Ver noticias</a>
                </li>

                <li>
                    <a href="php/cerrar-sesion.php">Cerrar sesion</a>
                </li>
            </ul>
        </section>
    </main>
<!--pie de pagina-->
    <footer>
        <p>© 2026 Toylore</p>
        <p>Novalink</p>
    </footer>
</body>

</html>
