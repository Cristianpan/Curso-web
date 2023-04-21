//Eventos
/**
 * load espera a que el js y todos los archivos que dependen del hmtl estén listos
 */
window.addEventListener("load", () => {
  console.log("Se ha cargado la ventana");
});

console.log("Esperando que cargue la ventana...");

/**
 * Solo espera a que se descargue el html
 * no espera CSS, ni imagenes
 */
document.addEventListener("DOMContentLoaded", () => {
  console.log("Html cargado");
});

//Otra forma de agregar eventos
window.onscroll = () => {
  console.log("Scrolling...");
};

//Eventos al form
const inputName = document.querySelector("#nombre");
const inputEmail = document.querySelector("#email");
const inputMessage = document.querySelector("#mensaje");
const form = document.querySelector(".form");

const contact = {
  nombre: "",
  email: "",
  mensaje: "",
};

inputName.addEventListener("change", getTexInput);
inputEmail.addEventListener("change", getTexInput);
inputMessage.addEventListener("change", getTexInput);

form.addEventListener("submit", (e) => {
  e.preventDefault();
  try {
    validarCampos(contact);
    validarEmail(contact.email);
    mostrarMensaje("Datos enviados correctamente");
  } catch (error) {
    mostrarMensaje(error.message, false);
  }
});

function getTexInput(e) {
  contact[e.target.name] = e.target.value;
  console.log(contact);
}

function validarCampos(contact) {
  if (contact.nombre === "" || contact.email === "" || contact.mensaje === "") {
    throw new Error("Todos los campos son obligatorios");
  }
}

function validarEmail(email) {
  const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (!regex.test(email)) {
    throw new Error("Ingrese un email valido e intente nuevamente");
  }
}

function mostrarMensaje(mensaje, ok = true) {
  const message = document.querySelector(".message");
  message.textContent = mensaje;

  if (!ok) {
    message.classList.add("error");
  }

  setTimeout(() => {
    message.classList.remove("error"); 
    message.textContent = "";
  }, 5000);
}
