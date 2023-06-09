(()=>{function e(e,t,n="error"){if(!document.querySelector(".error")){const a=document.querySelector(t),o=document.createElement("DIV");o.classList.add(n),o.classList.add("alert");const r=document.createElement("P");r.textContent=e,o.appendChild(r),a.after(o)}}document.querySelector("#add-task").addEventListener("click",(function(){const t=document.createElement("DIV");t.classList.add("modal"),t.innerHTML='\n            <form class="form new-task">\n                <legend>Añade una nueva tarea</legend>\n                <div class="field">\n                    <label for="task">Tarea</label>\n                    <input type="text" name="task" placeholder="Agrega una tarea al proyecto" id="task"/>\n                </div>\n                <div class="field">\n                    <label for="description">Descripcion</label>\n                    <textarea id="description" name="description" placeholder="Descripción de la tarea"></textarea>\n                </div>\n\n                <div class="options aling-right">\n                    <button type="button" class="close-modal">Cancelar</button>\n                    <input type="submit" class="submit-new-task" value="Agregar Tarea"/>\n                </div>\n            </form>\n        ',setTimeout(()=>{document.querySelector(".form").classList.add("animar")},0),t.addEventListener("click",n=>{n.preventDefault();const a=n.target.classList;if(a.contains("close-modal")){document.querySelector(".form").classList.add("close"),setTimeout(()=>{t.remove()},200)}else a.contains("submit-new-task")&&function(){const t=document.querySelector("#task").value.trim(),n=document.querySelector("#description").value.trim();t?(function(e=".error"){document.querySelector(e).remove()}(),async function(t){const{nombre:n,descripcion:a}=t,o={nombre:n,descripcion:a,proyectoId:document.querySelector("#proyectoId").value};try{const t=await fetch("/api/crearTarea",{method:"POST",body:JSON.stringify(o),headers:{"Content-Type":"application/json"}}),n=await t.json();n.ok?(e(n.message,"legend","exito"),setTimeout(()=>{document.querySelector(".modal").remove()},1500)):e(n.message,"legend")}catch(e){console.log(e)}}({nombre:t,descripcion:n})):e("El nombre de la tarea es obligatorio","legend")}()}),document.querySelector(".dashboard").appendChild(t)}))})();