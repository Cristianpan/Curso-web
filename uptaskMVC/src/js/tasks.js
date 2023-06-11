(() => {
  const btnAddTask = document.querySelector("#add-task");
  btnAddTask.addEventListener("click", showForm);
  let tasks = [];
  
  getTasks();

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
    if (!alert) {
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

  function removeAlertMessage(type = ".error") {
    const alert = document.querySelector(type);
    if (alert) {
      alert.remove();
    }
  }

  async function addTask(task) {
    const url = "/api/crearTarea";
    const { nombre, descripcion } = task;
    const valuesTask = { nombre, descripcion, proyectoId: getUrlProyecto() };

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
        tasks = [...tasks, result.body];
        setTimeout(() => {
          document.querySelector(".modal").remove();
          addTaskToHtmL(result.body);
        }, 1000);
      }
    } catch (error) {
      console.log(error);
    }
  }

  function getUrlProyecto() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("token");
  }

  async function getTasks() {
    const url = `/api/tareas?id=${getUrlProyecto()}`;
    try {
      const response = await fetch(url);
      const result = await response.json();
      tasks = result.body;

      showTasks(tasks);
    } catch (error) {
      console.log(error);
    }
  }

  function showTasks(tasks) {
    const taskList = document.querySelector("#task-list");

    if (tasks.length === 0) {
      const noTaskText = document.createElement("LI");
      noTaskText.innerHTML = "<p>No Hay Tareas</p>";

      noTaskText.classList.add("no-tasks");
      taskList.appendChild(noTaskText);
    } else {
      const fragment = document.createDocumentFragment();

      tasks.forEach((task) => {
        const taskContainer = createTask(task);
        fragment.appendChild(taskContainer);
      });

      taskList.appendChild(fragment);
    }
  }

  //crea un elemento LI para una tarea especifica
  function createTask(task) {
    const states = {
      0: "Pendiente",
      1: "Completa",
    };
    const taskContainer = document.createElement("LI");
    taskContainer.classList.add("task");
    taskContainer.classList.add(`taskId-${task.id}`);

    const taskName = document.createElement("P");
    taskName.innerHTML = `&#10148; ${task.nombre}`;

    const taskDescription = document.createElement("P");
    taskDescription.textContent = task.descripcion;

    const optionsDiv = document.createElement("DIV");
    optionsDiv.classList.add("options");

    const btnStateTask = document.createElement("BUTTON");
    btnStateTask.classList.add("state-task");
    btnStateTask.classList.add(`${states[task.estado].toLowerCase()}`);
    btnStateTask.textContent = states[task.estado];
    btnStateTask.dataset.stateTask = task.estado;

    const btnDeleteTask = document.createElement("BUTTON");
    btnDeleteTask.classList.add("delete-task");
    btnDeleteTask.textContent = "Eliminar";

    optionsDiv.appendChild(btnStateTask);
    optionsDiv.appendChild(btnDeleteTask);
    const summaryTask = document.createElement("SUMMARY");
    summaryTask.appendChild(taskName);
    summaryTask.appendChild(optionsDiv);

    const detailsTask = document.createElement("DETAILS");
    detailsTask.classList.add("details-task");
    detailsTask.appendChild(summaryTask);
    detailsTask.appendChild(taskDescription);

    taskContainer.appendChild(detailsTask);

    return taskContainer;
  }


  function addTaskToHtmL(task) {
    const taskList = document.querySelector("#task-list");
    const taskElement = createTask(task);
    taskList.appendChild(taskElement);
  }

})();
