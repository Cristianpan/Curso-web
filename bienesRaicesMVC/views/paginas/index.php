<main class="container section">
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
</main>

<section class="section container">
  <h2>Casas y Depas en Venta</h2>

  <?php
    require "listado.php";  
  ?>
  

  <div class="align-right">
    <a href="/propiedades" class="button-green">Ver Todas</a>
  </div>
</section>

<section class="contact-image">
  <h2>Encuentra la casa de tus sueños</h2>
  <p>
    Llena el formulario de contacto y un asesor se pondrá en contacto
    contigo a la brevedad
  </p>
  <a href="/contacto" class="button-yellow">Contactános</a>
</section>

<div class="container section section-bottom">
  <section class="blog">
    <h3>Nuestro Blog</h3>
    <article class="entry-blog">
      <div>
        <picture>
          <source srcset="/build/img/blog1.webp" type="image/webp" />
          <source srcset="/build/img/blog1.jpg" type="image/jpeg" />
          <img loading="lazy" src="/build/img/blog1.jpg" alt="Entrada Blog" />
        </picture>
      </div>

      <div class="entry-text">
        <a href="/entrada">
          <h4>Terraza en el techo de tu casa</h4>
          <p class="info-meta">
            Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
          </p>

          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Quibusdam, maiores unde? Suscipit, temporibus ratione quisquam
            saepe eum et sunt
          </p>
        </a>
      </div>
    </article>
    <article class="entry-blog">
      <div class="image">
        <picture>
          <source srcset="/build/img/blog2.webp" type="image/webp" />
          <source srcset="/build/img/blog2.jpg" type="image/jpeg" />
          <img loading="lazy" src="/build/img/blog2.jpg" alt="Entrada Blog" />
        </picture>
      </div>

      <div class="entry-text">
        <a href="/entrada">
          <h4>Construye una alberca en tu casa</h4>
          <p class="info-meta">
            Escrito el: <span>20/10/2021</span> por: <span>Admin</span>
          </p>

          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit.
            Quibusdam, maiores unde? Suscipit, temporibus ratione quisquam
            saepe eum et sunt
          </p>
        </a>
      </div>
    </article>
  </section>

  <section class="testimonials">
    <h3>Testimoniales</h3>

    <div class="testimonial">
      <blockquote>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam
        corrupti tempore explicabo dolor numquam error architecto repellat
        aspernatur molestias! Dolorem obcaecati repudiandae
      </blockquote>
      <p>- Cristian Pan</p>
    </div>
  </section>
</div>