document.addEventListener("DOMContentLoaded", () => {
  initApp();
  eventListeners();
  darkMode();
});

window.addEventListener("resize", () => {
  const navegacion = document.querySelector(".nav");
  if (navegacion.classList.contains("mostrar")) {
    navegacion.classList.toggle("mostrar");
  }
});

function initApp() {
  const darkMode = localStorage.getItem("darkMode");
  if (darkMode !== null && darkMode === "dark-mode") {
    document.body.classList.add("dark-mode");
  }
}

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
