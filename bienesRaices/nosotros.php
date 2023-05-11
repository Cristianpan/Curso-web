<?php
  require 'includes/funciones.php'; 
  incluirTemplate('header');
?>

<main class="container section">
  <h1>Conoce Sobre Nosotros</h1>
  <div class="aboutUs">
    <div class="image">
      <picture>
        <source srcset="/build/img/nosotros.webp" type="image/webp" />
        <source srcset="/build/img/nosotros.jpg" type="image/jpeg" />
        <img loading="lazy" src="/build/img/nosotros.jpg" alt="Nostros imagen" />
      </picture>
    </div>

    <div class="text">
      <h4>25 años de experiencia</h4>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
        culpa tempora quibusdam ipsam accusamus numquam perferendis
        voluptatibus saepe maxime consequuntur dolore nihil, sequi, amet
        aperiam possimus quam dolores consectetur pariatur! Lorem ipsum
        dolor, sit amet consectetur adipisicing elit. Quia voluptatibus
        provident, ab repellat numquam
      </p>
      <p>
        libero quisquam quasi perferendis
        culpa nesciunt eius aliquid veritatis dolores consectetur maiores?
        Ea qui alias laboriosam? Lorem ipsum dolor sit amet consectetur
        adipisicing elit. Ut laboriosam quisquam nam ullam asperiores eos
        magni ab cum culpa unde, obcaecati quis sunt voluptates id dolor
        maxime animi repellendus ipsum?
      </p>
    </div>
  </div>

</main>

<section>
  <h2>Más Sobre Nosotros</h2>
  <div class="icons-aboutUs">
    <div class="icon">
      <img src="/build/img/icono1.svg" alt="Icono seguridad" loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur
        facilis, pariatur consequuntur maxime aliquid ipsa maiores corrupti,
        eaque quisquam earum consectetur cupiditate asperiores omnis tempora
        nam dolor veritatis nobis ipsum.
      </p>
    </div>
    <div class="icon">
      <img src="/build/img/icono2.svg" alt="Icono Precio" loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur
        facilis, pariatur consequuntur maxime aliquid ipsa maiores corrupti,
        eaque quisquam earum consectetur cupiditate asperiores omnis tempora
        nam dolor veritatis nobis ipsum.
      </p>
    </div>
    <div class="icon">
      <img src="/build/img/icono3.svg" alt="Icono tiempo" loading="lazy" />
      <h3>A tiempo</h3>
      <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur
        facilis, pariatur consequuntur maxime aliquid ipsa maiores corrupti,
        eaque quisquam earum consectetur cupiditate asperiores omnis tempora
        nam dolor veritatis nobis ipsum.
      </p>
    </div>
  </div>
</section>

<?php 
  incluirTemplate('footer'); 
?>