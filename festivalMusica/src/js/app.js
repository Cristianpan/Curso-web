document.addEventListener("DOMContentLoaded", () => {
  iniciarApp();
});

function iniciarApp() {
  crearGaleria(); 
}

function crearGaleria() {
  const galeria = document.querySelector(".galery-images");
  const fragment = document.createDocumentFragment();

  for (let i = 1; i <= 12; i++) {
    const image = createImage(i, "thumb");

    image.onclick = function () {
      showOverlayImage(i);
    };
    fragment.appendChild(image);
  }

  galeria.appendChild(fragment);
}

function showOverlayImage(id){
  //declaración de variables
  const imagen = createImage(id);
  const body = document.querySelector("body");
  const overlay = document.createElement("div");
  const buttonClose = document.createElement("button");

  //add new class
  overlay.classList.add("overlay");
  body.classList.add("body-fixed");

  //creacion de boton
  buttonClose.textContent = "X";
  buttonClose.classList.add("btn-close");

  buttonClose.onclick = () => {
    removeOverlay(body, overlay)
  };

  overlay.onclick = () => {
    removeOverlay(body, overlay); 
  }

  //apends
  overlay.appendChild(imagen);
  overlay.appendChild(buttonClose);
  body.appendChild(overlay);
};

function removeOverlay(body, overlay){
  body.classList.remove("body-fixed");
  overlay.remove();
};

function createImage(id, folder = "grande"){
  const image = document.createElement("picture");
  image.innerHTML = image.innerHTML = `
  <source srcset="./img/${folder}/${id}.avif" type="image/avif"/>
  <source srcset="./img/${folder}/${id}.webp" type="image/webp"/>
  <img loading="lazy" width="200" height="300" src="./img/${folder}/${id}.jpg" alt="imagen galeria"/>`;

  return image;
};
