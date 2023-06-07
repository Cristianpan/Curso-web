document.addEventListener('DOMContentLoaded', ()=> {
    iniciarApp();
}); 


function iniciarApp(){
    buscarPorFecha(); 
}


function buscarPorFecha(){
    const inputFecha = document.querySelector("#fecha"); 

    inputFecha.addEventListener('input', (e)=>{
        const fechaSeleccionada = e.target.value; 

        window.location = `?fecha=${fechaSeleccionada}`
    }); 
}