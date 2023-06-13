(() => {
  const btnAddTask = document.querySelector("#add-task");
  btnAddTask.addEventListener("click", ()=> {
    showForm();
  });
  let tasks = [];

  getTasks();

  /**
   * Genera un modal para poder agregar una nueva tarea a un proyecto
   */
  function showForm(edit = false, task = {nombre: "", descripcion: ""}) {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");
    modal.innerHTML = `
            <form class="form new-task">
                <legend>${edit ? 'Editar Tarea' : 'Agregar Tarea'}</legend>
                <div class="field">
                    <label for="task">Tarea</label>
                    <input type="text" name="task" placeholder="Nombre de la tarea" id="task" value="${task.nombre}"/>
                </div>
                <div class="field">
                    <label for="description">Descripcion</label>
                    <textarea id="description" name="description" placeholder="Descripción de la tarea">${task.descripcion}</textarea>
                </div>

                <div class="options aling-right">
                    <button type="button" class="close-modal">Cancelar</button>
                    <input type="submit" class="submit-new-task" value="Guardar Tarea"/>
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
        submitForm(edit, task);
      }
    });

    document.querySelector(".dashboard").appendChild(modal);
  }

  /**
   * Realiza el envio del formulario
   */
  function submitForm(edit, task) {
    const nombre = document.querySelector("#task").value.trim();
    const descripcion = document.querySelector("#description").value.trim();
    task = {...task, nombre, descripcion};

    if (!nombre) {
      createAlertMessage("El nombre de la tarea es obligatorio", "legend");
    } else {
      if (!edit){
        addTask(task);
      } else {
        updateTask(task);
      }
    }
  }

  /**
   * Crea un mensaje de alerta con el mensaje y tipo de error dado y lo inserta
   * posteriormente al nodo correspondiente al identificador dado
   *
   * @param {String} message - Mensaje del modal
   * @param {String} reference - Identificador de un elemento html (nodo)
   * @param {String} type  - Tipo de modal: error o exito
   */
  function createAlertMessage(message, reference, type = "error") {
    const referenceElement = document.querySelector(reference);
    const divAlert = document.createElement("DIV");
    divAlert.classList.add(type);
    divAlert.classList.add("alert");
    const messageText = document.createElement("P");
    messageText.textContent = message;
    divAlert.appendChild(messageText);
    referenceElement.after(divAlert);

    setTimeout(() => {
      divAlert.remove();
    }, 1200);
  }

  //Methods to add
  /**
   * Usado para agregar una nueva tarea al proyecto a través de la API
   *
   * @param {Object} task
   */
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
        tasks = [...tasks, result.body];
        createAlertMessage(result.message, "legend", "exito");
        setTimeout(() => {
          document.querySelector(".modal").remove();
          addTaskToHtmL(result.body);
        }, 1000);
      }
    } catch (error) {
      console.log(error);
    }
  }

  /**
   * Agrega un elemento LI a la lista de tareas correspondiente al proyecto.
   *
   * @param {Object} task Objecto de tarea a insertar en el html
   */
  function addTaskToHtmL(task) {
    const taskList = document.querySelector("#task-list");
    const taskElement = createTask(task);
    taskList.appendChild(taskElement);
  }

  /**
   *
   * Crea un contenedor de tarea, especificamente un LI con los detalles de la misma
   *
   * @param {Object} - The task parameter is an object that contains information about a task, such as its
   * id, name, description, and state.
   * @returns Retorna un elemento LI con los detalles de la tarea.
   */
  function createTask(task) {
    const states = {
      0: "Pendiente",
      1: "Completa",
    };
    const taskContainer = document.createElement("LI");
    taskContainer.id = task.id;
    taskContainer.classList.add("task");

    const taskName = document.createElement("P");
    taskName.innerHTML = `&#10148; ${task.nombre}`;

    const taskDescription = document.createElement("P");
    taskDescription.classList.add("description");
    taskDescription.textContent = task.descripcion;

    const optionsDiv = document.createElement("DIV");
    optionsDiv.classList.add("options");

    const btnStateTask = document.createElement("BUTTON");
    btnStateTask.classList.add("state-task");
    btnStateTask.classList.add(`${states[task.estado].toLowerCase()}`);
    btnStateTask.textContent = states[task.estado];
    btnStateTask.ondblclick = async () => {
      await changeStateTask(task);
    };

    const btnDeleteTask = document.createElement("BUTTON");
    btnDeleteTask.classList.add("delete-task");
    btnDeleteTask.textContent = "Eliminar";
    btnDeleteTask.ondblclick = () => {
      confirmDeleteTask(task);
    };
    
    const btnEditTask = document.createElement("BUTTON"); 
    btnEditTask.classList.add("edit-task"); 
    btnEditTask.ondblclick = () => {
      showForm(true, task);
    };

    btnEditTask.textContent = "Editar";

    optionsDiv.appendChild(btnStateTask);
    optionsDiv.appendChild(btnEditTask);
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

  //Methos to get

  /**
   *  Retorna el valor de la variable token existente en la url
   *
   * @returns valor de la varible token de la url
   */
  function getUrlProyecto() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get("token");
  }
  /**
   * Realiza la peticion al servidor para obtener todas las tareas correspondientes al
   * proyecto
   */
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
  /**
   * Agrega las tareas, correspondientes al proyecto, al DOM
   *
   * @param {Object} tasks Arreglo de objetos de tareas
   */
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

  // Functions to update

  /**
   * Cambia el valor del atributo "estado" de la tarea:
   * De 1 a 0 y de 0 a 1. Realiza el llamado a una funcion para actualizar los datos
   * de la tarea en el nodo correspondiente.
   *
   * @param {Object} task
   */
  async function changeStateTask(task) {
    const auxTask = { ...task };
    auxTask.estado = auxTask.estado === 1 ? 0 : 1;

    if (await updateTask(auxTask)) {
      task.estado = task.estado === 1 ? 0 : 1;
    }
  }

  /**
   * Envia la peticion al servidor para actualizar la tarea y notifica si fue exitoso o no.
   * En caso de exito. Llama a una funcion para actualizar los datos del nodo correspondiente a esa tarea.
   *
   * @param {Object} task - Tarea con los datos actualizados
   */

  async function updateTask(task) {
    const url = "/api/actualizarTarea";
    let flag = false;
    try {
      const response = await fetch(url, {
        method: "post",
        body: JSON.stringify(task),
        headers: {
          "Content-Type": "application/json",
        },
      });

      const result = await response.json();
      const typeAlert = result.ok ? "exito" : "error";
      
      if (result.ok) {
        tasks = tasks.map((element) => {
          if (element.id === task.id) {
            element = { ...task };
          }
          return element;
        });

        setTimeout(()=> {
          document.querySelector(".modal").remove();
        }, 500);
        
        setTimeout(()=> {
          createAlertMessage(result.message, ".nombre-pagina", typeAlert);
          updateNodeTask(task);
        },600); 
        
        flag = true;
      }
    } catch (error) {
      console.log(error);
    }

    return flag;
  }

  /**
   * Actualiza el la tarea correspondiente en el arreglo global con los nuevos datos,
   * asi como toma el nodo correspondiente a través de su id y actualiza los datos
   *
   * @param {Object} task - Tarea con los datos actualizados
   */
  function updateNodeTask(task) {
    const states = {
      0: "Pendiente",
      1: "Completa",
    };

    const nodeTask = document.getElementById(task.id);
    const taskName = nodeTask.querySelector("summary p");
    taskName.innerHTML = `&#10148; ${task.nombre}`;
    const btnStateTask = nodeTask.querySelector(".state-task");
    btnStateTask.textContent = states[task.estado];
    task.estado === 1
      ? btnStateTask.classList.remove("pendiente")
      : btnStateTask.classList.remove("completa");
    btnStateTask.classList.add(states[task.estado].toLowerCase());
    const taskDescription = nodeTask.querySelector(".description");
    taskDescription.textContent = task.descripcion;
  }

  //Functions to delete

  /**
   * Genera una ventana modal de confirmacion para eliminar una tarea
   *
   * @param {Object} task
   */
  async function confirmDeleteTask(task) {
    const result = await Swal.fire({
      title: "¿Eliminar Tarea?",
      showCancelButton: true,
      confirmButtonText: "Si",
      cancelButtonText: "No",
    });

    if (result.isConfirmed) {
      deleteTask(task);
    }
  }

  /**
   * Envia la petición al servidor para eliminar una tarea del proyecto.
   * En caso de exito elimina la tarea del arreglo global de tareas y llama a
   * una funcion para remover el nodo asignado a esa tarea.
   *
   * @param {Object} task
   */
  async function deleteTask(task) {
    const url = "/api/eliminarTarea";
    const response = await fetch(url, {
      method: "POST",
      body: JSON.stringify(task),
      headers: {
        "Content-Type": "application/json",
      },
    });

    const result = await response.json();
    const typeAlert = result.ok ? "exito" : "error";
    createAlertMessage(result.message, ".nombre-pagina", typeAlert);

    if (result.ok) {
      tasks = tasks.filter((element) => {
        element.id !== task.id;
      });
      removeNodeTaskToHtml(task.id);
    }
  }
  /**
   * Obtiene un elemento de la lista de tareas del proyecto a través del id de la tarea
   * y lo elimina
   *
   * @param {Number} taskId
   */
  function removeNodeTaskToHtml(taskId) {
    const taskNode = document.getElementById(taskId);
    taskNode.remove();
  }
})();
