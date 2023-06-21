(()=> {
    let ponentes = [];
    let ponentesFiltrados = [];
    const ponentesInput = document.querySelector('#ponentes');

    if (ponentesInput){
        ponentesInput.addEventListener('input', buscarPonentes)
        obtenerPonentes();
    }


    async function obtenerPonentes(){
        const url = '/api/ponentes'; 
        const response = await fetch(url); 
        const result = await response.json();  
        formatearPonentes(result.body); 
    }


    function formatearPonentes(arrayPonentes){
        ponentes = arrayPonentes.map(ponente => {
            return {
                id: ponente.id,
                nombre: `${ponente.nombre} ${ponente.apellido}`.trim()
            }
        })
    }

    function buscarPonentes(e){
        const busqueda = e.target.value.trim(); 

        if (busqueda.length > 4){
            const expresion = new RegExp(busqueda, "i");
            ponentesFiltrados = ponentes.filter(ponente => !ponente.nombre.toLowerCase().search(expresion));
        } else {
            ponentesFiltrados = []; 
        }

        mostrarPonentes(); 
    }

    function mostrarPonentes(){
        const listadoPonentes = document.querySelector("#listado-ponentes");
        
        removePonentes();
        
        
        if (ponentesFiltrados.length > 0) {
            const fragmen = document.createDocumentFragment();
            ponentesFiltrados.forEach(ponente => {
                const ponenteHtml = document.createElement('LI'); 
                ponenteHtml.classList.add('listado-ponentes__ponente');
                ponenteHtml.textContent = ponente.nombre; 
                ponenteHtml.dataset.ponenteId = ponente.id;
                fragmen.appendChild(ponenteHtml);
            })
            listadoPonentes.appendChild(fragmen);
        } else {
            const noResultados = document.createElement('LI'); 
            noResultados.classList.add('listado-ponentes__no-resultado');
            noResultados.textContent.textContent = 'No hay resultados para tu busqueda'
            listadoPonentes.appendChild(noResultados);
        }
    }

    function removePonentes(){
        const listadoPonentes = document.querySelector("#listado-ponentes");

        while(listadoPonentes.firstChild){
            listadoPonentes.removeChild(listadoPonentes.firstChild);
        }

    }
    

})();