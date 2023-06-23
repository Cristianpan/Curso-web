(() => {
  const busqueda = {
    categoria: "",
    dia: "",
  };

  const horas = document.querySelector("#horas");

  if (horas) {
    const dias = document.querySelectorAll('[name="diaId"]');
    const categoria = document.querySelector("#categoria");
    
    categoria.addEventListener("change", terminoBusqueda);
    
    busqueda.categoria = categoria.value;
    dias.forEach((dia) => {
      dia.addEventListener("change", terminoBusqueda);
      dia.checked ? busqueda.dia = dia.value: ''; 
    });

    if (busqueda.dia && busqueda.categoria){
      buscarEventos();
    }
  }

  function terminoBusqueda(e) {
    if (e.target.name === 'diaId'){
      busqueda.dia = e.target.value; 
    } else {
      busqueda.categoria = e.target.value;
    }

    if (busqueda.categoria && busqueda.dia) {
      buscarEventos();
    }
  }

  async function buscarEventos() {
    const { categoria, dia } = busqueda;
    console.log(busqueda);
    const url = `/api/eventosHorario?categoria=${categoria}&dia=${dia}`;
    const response = await fetch(url);

    const result = await response.json();

    obtenerHorasDisponibles(result.body);
  }

  function obtenerHorasDisponibles(eventos) {
    const horasTomadas = eventos.map((evento) => evento.horaId);
    
    const horasDisponibles = document.querySelectorAll("#horas li");

    horasDisponibles.forEach((hora) => {
      if (!horasTomadas.includes(parseInt(hora.dataset.horaId)) || hora.classList.contains("horas__hora--selected")) {
        hora.classList.remove("horas__hora--disabled");
        hora.addEventListener("click", seleccionarHora);
      } else {
        hora.classList.contains("horas__hora--disabled")
          ? ''
          : hora.classList.add("horas__hora--disabled");
      }
    });
  }

  function seleccionarHora(e) {
    const inputHiddenHora = document.querySelector("[name='horaId']");
    removerSelected();
    inputHiddenHora.value = e.target.dataset.horaId;
    e.target.classList.add("horas__hora--selected");
  }

  function removerSelected() {
    const horaSeleccionada = document.querySelector(".horas__hora--selected");
    if (horaSeleccionada) {
      horaSeleccionada.classList.remove("horas__hora--selected");
    }
  }
})();
