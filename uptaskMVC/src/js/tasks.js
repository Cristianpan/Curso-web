(()=> {
    const btnAddTask = document.querySelector("#add-task");
    btnAddTask.addEventListener("click", showForm);

    function showForm(){
        const modal = document.createElement("DIV"); 
        modal.classList.add("modal");
        modal.innerHTML = `
            <form class="form new-task">
                <legend>Añade una nueva tarea</legend>
                <div class="field">
                    <label>Tarea</label>
                    <input type="text" name="tarea" placeholder="Agrega una tarea al proyecto" id="task"/>
                </div>
                <div class="field">
                    <label>Descripcion</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la tarea"></textarea>
                </div>

                <div class="options aling-right">
                    <button type="button" class="close-modal">Cancelar</button>
                    <input type="submit" class="submit-new-task" value="Agregar Tarea"/>
                </div>
            </form>
        `;

        setTimeout(()=> {
            const formulario = document.querySelector(".form");
            formulario.classList.add("animar");
        }, 0)

        modal.addEventListener('click', (e)=> {
            e.preventDefault();
            const value = e.target.classList; 
            if (value.contains("close-modal")){
                const form = document.querySelector('.form')
                form.classList.add('close');
                setTimeout(()=> {
                    modal.remove();
                }, 200);
            }            
        });

        document.querySelector("body").appendChild(modal);
    }



})();