const btnMobileMenu = document.querySelector('#mobile-menu');
const btnCerrarMenu = document.querySelector('#cerrar-menu');
const sidebar = document.querySelector('.sidebar');

if (btnMobileMenu){
    btnMobileMenu.addEventListener('click', () => {
        sidebar.classList.add('mostrar');
    });
}

if (btnCerrarMenu) {
    btnCerrarMenu.addEventListener('click', ()=> {
        sidebar.classList.add('ocultar');
        setTimeout(()=>{
            sidebar.classList.remove('mostrar');
        }, 1000);
    })
}

window.addEventListener("resize", () => {
    if (window.innerWidth > 768){
        sidebar.classList.remove('ocultar');
        sidebar.classList.remove("mostrar");
    }
})


