import Swal from "sweetalert2";

(() => {
  const resumen = document.querySelector("#registro-resumen");
  if (resumen) {
    let eventos = [];

    const eventosBoton = document.querySelectorAll(".evento__agregar");

    const formularioRegistro = document.querySelector("#registro");
    formularioRegistro.addEventListener('submit', submitFormulario);
    mostrarEventos();

    eventosBoton.forEach((boton) =>
      boton.addEventListener("click", seleccionarEvento)
    );

    function seleccionarEvento(e) {
      const id = e.target.dataset.id;
      const titulo = e.target.parentElement
        .querySelector(".evento__nombre")
        .textContent.trim();
      if (eventos.length < 5) {
        eventos = [...eventos, { id, titulo }];

        e.target.disabled = true;

        mostrarEventos();
      } else {
        Swal.fire({
          title: "Error",
          text: "Máximo 5 eventos por registro",
          icon: "error",
          confirmButtonText: "Ok",
        });
      }
    }

    function mostrarEventos() {
      const resumen = document.querySelector("#registro-resumen");
      limpiarEventos();
      eventos.forEach((evento) => {
        const eventoDom = document.createElement("DIV");
        eventoDom.classList.add("registro__evento");

        const titulo = document.createElement("H3");
        titulo.classList.add("registro__nombre");
        titulo.textContent = evento.titulo;

        const btnEliminar = document.createElement("BUTTON");
        btnEliminar.classList.add("registro__eliminar");
        btnEliminar.innerHTML = `<i class='fa-solid fa-trash'></i>`;
        btnEliminar.onclick = function () {
          removerEvento(evento.id);
        };

        eventoDom.appendChild(titulo);
        eventoDom.appendChild(btnEliminar);
        resumen.appendChild(eventoDom);
      });

      if (eventos.length === 0){
        const noRegistro = document.createElement('P'); 
        noRegistro.textContent = 'Aún no hay eventos seleccionados';
        noRegistro.classList.add('registro__texto');
        resumen.appendChild(noRegistro);
      }
    }

    function limpiarEventos() {
      const resumen = document.querySelector("#registro-resumen");
      while (resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
      }
    }

    function removerEvento(eventoId) {
      eventos = eventos.filter((evento) => evento.id !== eventoId);
      const botonAgregar = document.querySelector(`[data-id="${eventoId}"]`);
      botonAgregar.disabled = false;

      mostrarEventos();
    }

    function submitFormulario(e){
        e.preventDefault();

        //obtener el regalo; 

        const regaloId = document.querySelector("#regalo").value;
        const eventosId = eventos.map(evento => evento.id);

        if (eventosId.length === 0 || !regaloId){
            Swal.fire({
                title: "Error",
                text: "Elige al menos un evento y un regalo",
                icon: "error",
                confirmButtonText: "Ok",
              });
        }else {
            enviarDatos({regaloId, eventosId});
        }
    }

    async function enviarDatos(data){
        const url = "/finalizarRegistro/guardarConferencias"; 

         const response = await fetch(url, {
            method: 'POST', 
            body: JSON.stringify(data), 
            headers: {
                'Content-Type' : 'application/json'
            }
        })
        const result = response.json(); 

        if (result.ok){

        } else {
            Swal.fire({
                title: "Error",
                text: result.message,
                icon: "error",
                confirmButtonText: "Ok",
              });
        }
    } 
  }
})();
