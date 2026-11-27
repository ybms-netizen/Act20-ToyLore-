<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toylore | inicio</title>
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
            <li><a href="index.html">Inicio</a></li>
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

                <p><?php if(isset($_SESSION["usuario"])){
                    echo $_SESSION["usuario"];}else{echo "Invitado";} ?></p>
                <?php if(isset($_SESSION["usuario"])){
                    ?>
                    <a href="perfil.php?id=<?php echo $_SESSION["id"]; ?>">Mi perfil</a>
                    <?php
                }else{
                    ?>
                    <a href="login.html">Iniciar sesion</a>
                    <?php
                }
                ?>
            </section>
            
            <section>
                <?php
                if(isset($_SESSION["usuario"])){
                    ?>
                <a href="crear-publicacion.html">+ Crear publicacion</a>
                <?php
            }else{
                ?>
                <a href="login.html">+ Crear publicacion</a>
                <?php
            }
            ?>
            </section>

                <?php
                if(isset($_SESSION["rol"])&& $_SESSION["rol"] == "administrador"){
                    ?>
                    <section>
                        <a href="panel-admin.php">Panel de administrador</a>
                    </section>
                    <?php
                }
                ?>

                <?php
                if(isset($_SESSION["usuario"])){
                    ?>
                    <a href="php/cerrar-sesion.php">Cerrar sesion</a>
                    <?php
                }
                ?>
        </aside>

        <!--presentacion de la  pagina-->

        <section class="contenido-principal">
            <header>
                <h2>Bienvenido a Toylore</h2>
            </header>

            <p>Toylore es una plataforma creada por Novalink para reunir a los aficionados y coleccionistas de figuras
                de Transformers en un solo lugar donde convivir y ver noticias para la comunidad.</p>
        </section>

        <!--contenedor del foro-->

        <section>
            <header>
                <h2>Foro comunitario</h2>
            </header>
            <!--mas adelante js mostrara las publicaciones o un mensaje de espera si no hay ninguna-->
            <section id="contenedor-publicaciones"></section>

        </section>


        <!--inicio de sesion/ invitacion-->
        <section>
            <h2>¿Quieres convivir con la comunidad?</h2>
            <p>Crea una cuenta para publicar, comentar y guardar contenido.</p>
            <a href="registro.html">Registrarme</a>
        </section>
        </section>
    </main>

    <!--pie de pagina-->
    <footer>
        <p>© 2026 Toylore</p>
        <p>Novalink</p>
    </footer>
    <script src="main.js"></script>
</body>

</html>