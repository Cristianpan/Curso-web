<?php
  require 'includes/funciones.php'; 
  incluirTemplate('header');
?>

<main class="container section centered-content">
  <h1>Terraza en el techo de tu casa</h1>
  <picture>
    <source srcset="/build/img/blog1.webp" type="image/webp" />
    <source srcset="/build/img/blog1.jpg" type="image/jpeg" />
    <img loading="lazy" src="/build/img/blog1.jpg" alt="Imagen de casa en venta" />
  </picture>

  <p class="info-meta">
    Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
  </p>

  <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus sit
    amet consequat nulla. Mauris consequat nisi non leo egestas, quis
    tristique eros porttitor. Curabitur porta gravida varius. Aliquam
    iaculis mollis congue. Nulla nisi sapien, varius ac venenatis vitae,
    iaculis eu nulla. Aliquam consequat ultricies turpis, sed pretium leo
    eleifend a. Aliquam sodales nisl id interdum varius. Maecenas vitae erat
    leo. Sed dapibus tellus non purus laoreet condimentum. Nulla sagittis
    lorem in massa lobortis, ut accumsan odio fringilla. Duis efficitur
    malesuada finibus.
  </p>
  <p>
    Nam commodo euismod neque, in tristique velit vulputate bibendum.
    Aliquam ipsum orci, gravida sed auctor vitae, euismod ut urna.
    Vestibulum dictum mi vitae quam vestibulum hendrerit. Nam ut gravida
    nulla, at fermentum ligula. Interdum et malesuada fames ac ante ipsum
    primis in faucibus.
  </p>
</main>

<?php 
  incluirTemplate('footer'); 
?>