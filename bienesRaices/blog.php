<?php
  require 'includes/funciones.php'; 
  incluirTemplate('header');
?>
<main class="container section">
  <h1>Nuestro Blog</h1>
  <article class="entry-blog">
    <div>
      <picture>
        <source srcset="/build/img/blog1.webp" type="image/webp" />
        <source srcset="/build/img/blog1.jpg" type="image/jpeg" />
        <img loading="lazy" src="/build/img/blog1.jpg" alt="Entrada Blog" />
      </picture>
    </div>

    <div class="entry-text">
      <a href="entrada.html">
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
      <a href="entrada.html">
        <h4>Construye una alberca en tu hogar</h4>
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
        <source srcset="/build/img/blog3.webp" type="image/webp" />
        <source srcset="/build/img/blog3.jpg" type="image/jpeg" />
        <img loading="lazy" src="/build/img/blog3.jpg" alt="Entrada Blog" />
      </picture>
    </div>

    <div class="entry-text">
      <a href="entrada.html">
        <h4>Guía Para la decoración de tu hogar</h4>
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
        <source srcset="/build/img/blog4.webp" type="image/webp" />
        <source srcset="/build/img/blog4.jpg" type="image/jpeg" />
        <img loading="lazy" src="/build/img/blog4.jpg" alt="Entrada Blog" />
      </picture>
    </div>

    <div class="entry-text">
      <a href="entrada.html">
        <h4>Guía Para la decoración de tu habitación</h4>
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
</main>

<?php 
  incluirTemplate('footer'); 
?>