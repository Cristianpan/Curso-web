document.addEventListener("DOMContentLoaded", () => {
  eventListeners();
  darkMode();
  mostrarModalResultado(); 
});

window.addEventListener("resize", () => {
  const navegacion = document.querySelector(".nav");
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.toggle("mostrar");
  }
});

function eventListeners() {
  const mobilMenu = document.querySelector(".mobile-menu");
  mobilMenu.addEventListener("click", navegacionResponsive);
}

function navegacionResponsive() {
  const navegacion = document.querySelector(".nav");
  navegacion.classList.toggle("mostrar");
}

function darkMode() {
  const botonDarkMode = document.querySelector(".dark-mode-boton");
  addPreferensColor();

  botonDarkMode.addEventListener("click", () => {
    document.body.classList.toggle("dark-mode");
    if (document.body.classList.contains("dark-mode")) {
      localStorage.setItem("darkMode", "dark-mode");
    } else {
      localStorage.removeItem("darkMode");
    }
  });
}

function addPreferensColor() {
  const darkMode = localStorage.getItem("darkMode");
  const preferences = window.matchMedia("(prefers-color-scheme: dark)");

  if (darkMode != null) {
    if (darkMode === "dark-mode" || preferences.matches) {
      document.body.classList.add("dark-mode");
    }
  }
}

function mostrarModalResultado() { 
  const urlParams = new URLSearchParams(window.location.search);
  let result = urlParams.get('resultado');
  let mensaje;
  result = parseInt(result);
  
  

  if (result < 4 && result > 0) {
    if (result === 1) {
      mensaje = "Creado"; 
    } else if (result === 2) {
      mensaje = "Actualizado"; 
    } else if (result === 3) {
      mensaje = "Eliminado"; 
    }
    
    const modal = document.querySelector(".modal");
    modal.textContent = `${mensaje} correctamente`;
    setTimeout(() => {
      modal.textContent = ""; 
    }, 1500); 
  }

}
