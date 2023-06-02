let paso = 1; 


const cita = {
    nombre: '', 
    fecha: '', 
    hora: '', 
    servicios: []
}

document.addEventListener('DOMContentLoaded', ()=> {
    iniciarApp();
});


function iniciarApp() {
    tabs(); //Cambio entre secciones
    paginaAnterior();
    paginaSiguiente();
    consultarApi();
    añadirNombreCliente();
    obtenerHoraCita();
    obtenerFechaCita();
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
        mostrarResumenCita();
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

async function consultarApi(){
    try {
        const servicios = await (await fetch("/api/servicios")).json();
        mostrarServicios(servicios);
    } catch (error) {
        console.log(error);
    }
}

function mostrarServicios(servicios){
    const fragment = document.createDocumentFragment();
    servicios.forEach(servicio => {
        const {id, nombre, precio} = servicio; 

        const nombreServicio = document.createElement("P");
        nombreServicio.classList.add("nombre-nombreServicio");
        nombreServicio.textContent = nombre; 

        const precioServicio = document.createElement("P");
        precioServicio.classList.add("precio-servicio");
        precioServicio.textContent = `$${precio}`; 

        const servicioDiv = document.createElement("DIV");
        servicioDiv.classList.add('servicio');
        servicioDiv.id = id; 

        servicioDiv.appendChild(nombreServicio);
        servicioDiv.appendChild(precioServicio);
        servicioDiv.onclick = () => {
            seleccionarServicio(servicio);
        }

        fragment.appendChild(servicioDiv);
    }); 
    
    document.querySelector("#servicios").appendChild(fragment);
}

function seleccionarServicio(servicio){
    const {servicios} = cita; 
    const divServicio = document.getElementById(servicio.id);
    divServicio.classList.toggle("seleccionado"); 

    if (servicios.includes(servicio)){
        cita.servicios = servicios.filter(citaServicio => citaServicio.id !== servicio.id);
    }else {
        cita.servicios = [...servicios, servicio];
    }

}

function añadirNombreCliente() {
    cita.nombre = document.querySelector("#nombre").value;
}

function obtenerHoraCita(){
    const inputHora = document.querySelector("#hora"); 

    inputHora.addEventListener('input', (e)=> {
        const horaCita = e.target.value.split(":");
        horaCita[0] = parseInt(horaCita[0]);
        horaCita[1] = parseInt(horaCita[1]);
        
        if (horaCita[0] < 10 || (horaCita[0] >= 18 && horaCita[1] > 0)){
            mostrarError("El horario es de 10:00 a.m. a 6:00 p.m. Por favor seleccione otro horario", 1);
            e.target.value = ''; 
        } else {
            cita.hora = e.target.value; 
            ocultarError(1);
        }
    }); 
}

function obtenerFechaCita(){
    const inputFecha = document.querySelector("#fecha"); 

    inputFecha.addEventListener('input', (e)=> {
        const dia = new Date(e.target.value).getUTCDay();


        if (dia === 0 || dia === 6){
            e.target.value = "";
            mostrarError('Fines de semana no permitidos', 0); 
        } else {
            cita.fecha = e.target.value; 
            ocultarError(0); 
        }
    })
}
//Notifica si algun campo no es valido del formulario
function mostrarError(mensaje, index){
    const alert = document.querySelectorAll(".field p");

    alert[index].textContent = mensaje; 
    alert[index].classList.add("error"); 
    
    alert[index].classList.remove("ocultar"); 
}

//Elimina el mensaje de error cuando el usuario ingresa un dato valido
function ocultarError(index){
    const alert = document.querySelectorAll(".field p");
    
    alert[index].textContent = ''; 
    alert[index].classList.remove("error"); 
    
    alert[index].classList.add("ocultar"); 
}

//Crea una alerta si hacen falta datos para enviar la cita
function mostrarAlerta(mensaje) {
    const alert = document.createElement("DIV"); 
    const alertMessage = document.createElement("P"); 

    const existAlert = document.querySelector(".contenido-resumen .modal"); 

    if (!existAlert) {
        alert.classList.add("modal"); 
        alert.classList.add("error");
        alertMessage.textContent = mensaje; 
        alert.appendChild(alertMessage); 
    
        document.querySelector('.contenido-resumen').appendChild(alert);
    }


}
//Elimina la alarte cuando todos los datos requeridos para la cita han sido llenados
function ocultarAlerta(){
    const alert = document.querySelector(".contenido-resumen .modal");
    if (alert) {
        alert.remove();
    }
}

function mostrarResumenCita(){
    const resumen = document.querySelector('.contenido-resumen'); 

    if (Object.values(cita).includes('') || !cita.servicios.length){
        
        mostrarAlerta("Por favor llene el formulario y seleccione al menos un servicio.");
    } else {
        ocultarAlerta(); 
        resumen.appendChild(generarResumenCita());
        resumen.appendChild(generarBotonEnviarCita());
    }
}

function generarResumenCita(){
    const {nombre, fecha, hora, servicios} = cita; 
    const fragment = document.createDocumentFragment();

    const nombreCliente = document.createElement('P'); 
    nombreCliente.innerHTML = `<span>Nombre:</span> ${nombre}`;
    const fechaCita = document.createElement('P'); 

    fechaCita.innerHTML = `<span>Fecha:</span> ${formatearFecha(fecha)}`;
    const horaCita = document.createElement('P'); 
    horaCita.innerHTML = `<span>Hora:</span> ${hora} horas`;

    //heading para servicios en resumen 
    
    
    //heading para servicios en resumen 
    const headingServicios = document.createElement("H3");
    headingServicios.textContent = "Resumen de servicios";
   
    fragment.appendChild(headingServicios);
    servicios.forEach(servicio => {
        const {id, precio, nombre} = servicio; 
        const contenedorServicio = document.createElement('DIV'); 
        contenedorServicio.classList.add('contenedor-servicio');

        const textoServicio = document.createElement('P');
        textoServicio.textContent = nombre;

        const precioServicio = document.createElement('P');
        precioServicio.innerHTML = `<span>Precio:</span> $${precio}`;
        
        contenedorServicio.appendChild(textoServicio);
        contenedorServicio.appendChild(precioServicio);

        fragment.appendChild(contenedorServicio);
    });
    //heading para citas
    const headingCita = document.createElement("H3");
    headingCita.textContent = "Resumen de Cita";
    fragment.appendChild(headingCita);
    fragment.appendChild(nombreCliente);
    fragment.appendChild(fechaCita);
    fragment.appendChild(horaCita);
    

    return fragment;
}


function formatearFecha(fecha){
    const date = new Date(fecha); 

    const mes = date.getMonth(); 
    const dia = date.getDate() + 2; 
    const anio = date.getFullYear(); 

    const fechaUTC = new Date(Date.UTC(anio, mes, dia));
    const opciones = {weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'};
    const fechaFormateada = fechaUTC.toLocaleDateString('es-MX', opciones);

    return fechaFormateada;
}

function generarBotonEnviarCita(){
    const contenedor = document.createElement("DIV");
    contenedor.classList.add("align-right");
    const botonReservar = document.createElement("BUTTON");
    botonReservar.classList.add('button');
    botonReservar.textContent = 'Reservar Cita'; 
    botonReservar.onclick = reservarCita; 

    contenedor.appendChild(botonReservar);

    return contenedor; 
}

function reservarCita(){
    console.log('Reservando cita...');
}
