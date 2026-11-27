<?php
include("php/conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ToyLore | Foro</title>
        <link rel="stylesheet" href="estilos.css">
    </head>

    <body>
    <!--encabezado de la pagina-->
    <header>
        <img src="toylore_logo.png" alt="Logo de ToyLore">

        <section>
            <h1>Toylore</h1>
            <p>Comunidad oficial de coleccionistas de figuras de Transformers.</p>
        </section>
    </header>

    <!--panel de navegacion-->

    <nav>
        <form>
            <input type="search" placeholder="Buscar...">
        </form>

        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="noticias.php">Noticias</a></li>
            <li><a href="foro.php">Foro</a></li>
            <li><a href="reglas.html">Reglas</a></li>
            <li><a href="contacto.html">Contacto</a></li>
        </ul>
    </nav>

    <!--parte principal-->
    <main>
<!--barra lateral-->
        <aside>
            <section>
                <h2>Perfil</h2>
                <img src="avatar-default.png" alt="Avatar predeterminado">

                <p id="estado-usuario">Invitado</p>

                <a href="login.html">Iniciar sesion</a>
            </section>

            <section>
                <a href="login.html">
                    + Crear publicacion
                </a>
            </section>

            <section>
                <button>Actividad reciente</button>
                <p>(disponible para usuarios registrados)</p>
            </section>

            <section>
                <button>Guardados</button>
                <p>(disponible para usuarios registrados)</p>
            </section>
        </aside>

            <section>
                <header>
                <h2>Foro Comunitario</h2>
                </header>

                <?php
                $sql = "SELECT publicaciones.*, usuarios.usuario FROM publicaciones INNER JOIN usuarios ON publicaciones.id_usuario = usuarios.id_usuario ORDER BY fecha_publicacion DESC";
                $resultado = mysqli_query($conexion, $sql);

                if(mysqli_num_rows($resultado) == 0){
                    echo "<article><h3>A la espera de nuevas conversaciones...</h3>
                    <p>Inicia el cotorreo :D</p></article>";
                }
                while($fila = mysqli_fetch_assoc($resultado))
                {
                    ?>
                    <article>
                        <p>Publicado por: <a href="perfil.php?id=<?php echo $fila["id_usuario"]; ?>"> <?php echo $fila["usuario"]; ?></a></p>
                <!--datos de la publicacion-->
                        <h3><?php echo $fila["titulo"]; ?></h3>
                        <p><?php echo $fila["contenido"]; ?></p>

                        <?php
                        if(!empty($fila["imagen"])){
                            ?>
                            <img src="uploads/<?php echo $fila["imagen"]; ?>" alt="Imagen publicacion">
                            <?php
                        }
                        ?>
                        <hr>
                        <h4>Comentarios</h4>
                        <?php
                        $sqlComentarios = "SELECT comentarios.*,usuarios.usuario FROM comentarios INNER JOIN usuarios ON comentarios.id_usuario = usuarios.id_usuario WHERE comentarios.id_publicacion = ".$fila["id_publicacion"]."  ORDER BY fecha_comentario ASC";
                        $resultadoComentarios = mysqli_query($conexion,$sqlComentarios);
                        if(mysqli_num_rows($resultadoComentarios) == 0){
                            echo "<p>Aun sin comentarios...</p>";
                        } while($comentario = mysqli_fetch_assoc($resultadoComentarios)){
                            ?>
                            <section>
                                <p><strong><a href="perfil.php?id=<?php echo $comentario["id_usuario"]; ?>"><?php echo $comentario["usuario"]; ?></a></strong></p>
                                <p>><?php echo $comentario["contenido"]; ?> </p>
                            </section>
                            <?php
                        }
                        ?>
                        <form action="php/crear-comentario.php" method="POST">
                        <input type="hidden" name="id_publicacion" value="<?php echo $fila["id_publicacion"]; ?>">
                        <textarea name="contenido" placeholder="Escribe un comentario..." required></textarea>

                        <button type="submit">Comentar</button>
                        </form>
                    </article>

                <!--carga de imagen-->
                        <?php
                    }
                    ?>
                    </section>
        </main>
    </body>
</html>