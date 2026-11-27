<?php
include("php/conexion.php");

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Noticias</title>
        <link rel="stylesheet" href="estilos.css">
    </head>

    <body>
    <!--encabezado de la pagina-->
    <header>
        <img src="toylore_logo.png" alt="Logo de ToyLore">

        <section>
            <h1>Toylore</h1>
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
                    <h2>Noticias oficiales</h2>
                </header>

                <?php
                $sql = "SELECT * FROM noticias ORDER BY fecha_publicacion DESC";

                $resultado = mysqli_query($conexion, $sql);

                if(mysqli_num_rows($resultado)==0){
                    ?>

                    <article>
                        <h3>A la espera de nuevas noticias</h3>
                        <p>El equipo de NovaLink aun no ha publicado nuevas noticias.</p>
                    </article>

                    <?php
                }

                while($fila = mysqli_fetch_assoc($resultado)){
                    ?>
                    <article>
                        <h3><?php echo $fila["titulo"]; ?></h3>
                        <p><?php echo $fila ["contenido"]; ?> </p>

                        <?php
                        if(!empty($fila["imagen"])){
                            ?>

                            <img src="uploads/<?php echo $fila["imagen"]; ?>" alt="Imagen de noticia" style="max-width:100%;">
                            <?php
                        }
                        ?>
                    </article>
                    <?php
                }
                ?>
            </section>
        </main>
    </body>
</html>