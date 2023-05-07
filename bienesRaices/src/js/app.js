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
  const result = urlParams.get('resultado');
  let mensaje; 

  if (result) {
    if (parseInt(result) === 1) {
      mensaje = "creado"; 
    } else if (parseInt(result) === 2) {
      mensaje = "actualizado"; 
    } else if (parseInt(result) === 3) {
      mensaje = "eliminado"; 
    }
    
    const modal = document.querySelector(".modal");
    modal.textContent = `Anuncio ${mensaje} correctamente`;
    setTimeout(() => {
      modal.textContent = ""; 
    }, 1500); 
  }

}
