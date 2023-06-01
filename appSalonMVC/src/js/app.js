let paso = 1; 

document.addEventListener('DOMContentLoaded', ()=> {
    iniciarApp();
});


function iniciarApp() {
    tabs(); //Cambio entre secciones
    paginaAnterior();
    paginaSiguiente();
}

function mostrarSeccion(){
    const seccion = document.querySelector(`#paso-${paso}`); 
    seccion.classList.add("mostrar");
}

function ocultarSeccion(){
    const seccion = document.querySelector(".mostrar");
    seccion.classList.remove("mostrar");
}

function actualizarTab(){
    //boton activo anterior
    const botonActual = document.querySelector(".actual");
    botonActual.classList.remove("actual");
    
    //actualiza el boton que debe de estar activo
    const boton = document.querySelector(`[data-paso = '${paso}']`);
    boton.classList.add("actual");
}

function tabs() {
    const botones = document.querySelectorAll('.tabs button'); 

    botones.forEach(boton => {
        boton.addEventListener('click', (e)=> {
            const pasoNuevo = parseInt(e.target.dataset.paso);
            if (paso !== pasoNuevo) {
                paso = pasoNuevo;
                ocultarSeccion();
                mostrarSeccion();
                actualizarTab();
                botonesPaginador();
            }
        });
    });
}

//Agrega los botones con base en la seccion
function botonesPaginador() {
    const paginaAnterior = document.querySelector("#anterior");
    const paginaSiguiente = document.querySelector("#siguiente");

    if (paso === 1) {
        paginaSiguiente.classList.remove("ocultar");
        paginaAnterior.classList.add("ocultar");
    } else if (paso === 3) {
        paginaAnterior.classList.remove("ocultar");
        paginaSiguiente.classList.add("ocultar");
    } else {
        paginaAnterior.classList.remove("ocultar")
        paginaSiguiente.classList.remove("ocultar")
    }
}

function paginaAnterior(){
    const paginaAnterior = document.querySelector('#anterior');
    paginaAnterior.addEventListener('click', ()=> {
        paso--;
        ocultarSeccion();
        mostrarSeccion();
        actualizarTab();
        botonesPaginador();
    });
}

function paginaSiguiente(){
    const paginaSiguiente = document.querySelector('#siguiente');
    paginaSiguiente.addEventListener('click', ()=> {
        paso++;
        ocultarSeccion();
        mostrarSeccion();
        actualizarTab();
        botonesPaginador();
    });
}