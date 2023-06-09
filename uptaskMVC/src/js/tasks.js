(() => {
  const btnAddTask = document.querySelector("#add-task");
  btnAddTask.addEventListener("click", showForm);

  function showForm() {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");
    modal.innerHTML = `
            <form class="form new-task">
                <legend>Añade una nueva tarea</legend>
                <div class="field">
                    <label for="task">Tarea</label>
                    <input type="text" name="task" placeholder="Agrega una tarea al proyecto" id="task"/>
                </div>
                <div class="field">
                    <label for="description">Descripcion</label>
                    <textarea id="description" name="description" placeholder="Descripción de la tarea"></textarea>
                </div>

                <div class="options aling-right">
                    <button type="button" class="close-modal">Cancelar</button>
                    <input type="submit" class="submit-new-task" value="Agregar Tarea"/>
                </div>
            </form>
        `;

    setTimeout(() => {
      const form = document.querySelector(".form");
      form.classList.add("animar");
    }, 0);

    modal.addEventListener("click", (e) => {
      e.preventDefault();
      const value = e.target.classList;
      if (value.contains("close-modal")) {
        const form = document.querySelector(".form");
        form.classList.add("close");
        setTimeout(() => {
          modal.remove();
        }, 200);
      } else if (value.contains("submit-new-task")) {
        submitForm();
      }
    });

    document.querySelector(".dashboard").appendChild(modal);
  }

  function submitForm() {
    const nombre = document.querySelector("#task").value.trim();
    const descripcion = document.querySelector("#description").value.trim();

    if (!nombre) {
      createAlertMessage("El nombre de la tarea es obligatorio", "legend");
    } else {
      removeAlertMessage();
      addTask({ nombre, descripcion });
    }
  }

  function createAlertMessage(message, reference, type = "error") {
    const alert = document.querySelector(".error");
    if (!alert){
        const referenceElement = document.querySelector(reference);
        const divAlert = document.createElement("DIV");
        divAlert.classList.add(type);
        divAlert.classList.add("alert");
        const messageText = document.createElement("P");
        messageText.textContent = message;
        divAlert.appendChild(messageText);
        referenceElement.after(divAlert);
    }

  }

  function removeAlertMessage(type = ".error"){
    const alert = document.querySelector(type);
    if (alert){
      alert.remove();
    }
  }

  async function addTask(task) {
    const url = "/api/crearTarea";
    const { nombre, descripcion } = task;

    const valuesTask = { nombre, descripcion, proyectoId: getProyectoId() };

    try {
      const response = await fetch(url, {
        method: "POST",
        body: JSON.stringify(valuesTask),
        headers: {
          "Content-Type": "application/json",
        },
      });

      const result = await response.json();

      if (!result.ok) {
        createAlertMessage(result.message, "legend");
      } else {
        createAlertMessage(result.message, "legend", "exito");
        setTimeout(() => {
          document.querySelector(".modal").remove();
        }, 1500);
      }
    } catch (error) {
      console.log(error);
    }
  }

  function getProyectoId() {
    return document.querySelector("#proyectoId").value;
  }
})();
