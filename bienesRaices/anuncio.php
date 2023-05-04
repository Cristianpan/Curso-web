<?php
  require 'includes/funciones.php'; 
  incluirTemplate('header');
?>

<main class="container section centered-content">
  <h1>Casa en venta frente al bosque</h1>
  <picture>
    <source srcset="./build/img/destacada.webp" type="image/webp" />
    <source srcset="./build/img/destacada.jpg" type="image/jpeg" />
    <img loading="lazy" src="./build/img/destacada.jpg" alt="Imagen de casa en venta" />
  </picture>

  <div class="summary-property">
    <p class="price">$30000</p>
    <ul class="characteristics-icon">
      <li>
        <img src="./build/img/icono_wc.svg" alt="icono wc" />
        <p>3</p>
      </li>
      <li>
        <img src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p>3</p>
      </li>
      <li>
        <img src="./build/img/icono_dormitorio.svg" alt="icono dormitorio" />
        <p>4</p>
      </li>
    </ul>

    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit
      amet consequat nulla. Mauris consequat nisi non leo egestas, quis
      tristique eros porttitor. Curabitur porta gravida varius. Aliquam
      iaculis mollis congue. Nulla nisi sapien, varius ac venenatis vitae,
      iaculis eu nulla. Aliquam consequat ultricies turpis, sed pretium leo
      eleifend a. Aliquam sodales nisl id interdum varius. Maecenas vitae
      erat leo. Sed dapibus tellus non purus laoreet condimentum. Nulla
      sagittis lorem in massa lobortis, ut accumsan odio fringilla. Duis
      efficitur malesuada finibus.
    </p>
    <p>
      Nam commodo euismod neque, in tristique velit vulputate bibendum.
      Aliquam ipsum orci, gravida sed auctor vitae, euismod ut urna.
      Vestibulum dictum mi vitae quam vestibulum hendrerit. Nam ut gravida
      nulla, at fermentum ligula. Interdum et malesuada fames ac ante ipsum
      primis in faucibus.
    </p>
  </div>
</main>

<?php 
  incluirTemplate('footer'); 
?>