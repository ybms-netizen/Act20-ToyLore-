/*declaramos el estado temporal de los usuarios*/
let usuarioLogueado = false;

/*ponemos el mensaje del cuando no hay publicaciones en el apartado del foro*/
const contenedorPublicaciones = document.getElementById("contenedor-publicaciones");

if (contenedorPublicaciones) {
    const publicaciones = [];

    if(publicaciones.length === 0) {
        contenedorPublicaciones.innerHTML = `<article> <h3>A la espera de nuevas conversaciones...</h3> <p>Inicia el cotorreo :D</p> </article>`;
    }
}

/*ahora el mensaje en las noticias*/
const contenedorNoticias = document.getElementById("contenedor-noticias");

if (contenedorNoticias) {
    const noticias = [];

    if (noticias.length === 0) {
        contenedorNoticias.innerHTML = `<article><h3>A la espera de nuevas noticias</h3> <p>El equipo de NovaLink aun no ha publicado noticias oficiales</p></article>`;
    }
}

/*validamos la informacion en el formulario de registro*/
const registroFormulario = document.querySelector(".registro-layout form");

if(registroFormulario) {
    registroFormulario.addEventListener("submit", function(event){
        const password = document.getElementById("password");

        const confirmar = document.getElementById("confirmar");

        if(password.value !== confirmar.value){
            event.preventDefault();
            alert("Las contraseñas no coinciden.");
            confirmar.focus();
        }
    });
}

/*configuramos el estado de usuario permanente (cuando este ya tiene cuenta)*/
const estadoUsuario = document.getElementById("estado-usuario");

if(estadoUsuario) {
    if(usuarioLogueado){
        estadoUsuario.textContent = "Usuario";
    }else{
        estadoUsuario.textContent = "Invitado";
    }
}