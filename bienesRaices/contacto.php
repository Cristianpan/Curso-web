<?php
  require 'includes/funciones.php'; 
  incluirTemplate('header');
?>

<main class="container section centered-content">
  <h1>Contacto</h1>
  <picture>
    <source srcset="/build/img/destacada3.webp" type="image/webp" />
    <source srcset="/build/img/destacada3.jpg" type="image/jpeg" />
    <img loading="lazy" src="/build/img/destacada3.jpg" alt="imagen contacto" />
  </picture>

  <h2>Llene el formulario de contacto</h2>
  <form class="form">
    <fieldset>
      <legend>Información Personal</legend>

      <label for="nombre">Nombre</label>
      <input type="text" id="nombre" placeholder="Tu nombre" />

      <label for="telefono">Telefono</label>
      <input type="tel" id="telefono" placeholder="Tu telefono" />

      <label for="email">E-mail</label>
      <input type="email" id="email" placeholder="Tu email" />

      <label for="mensaje">Mensaje</label>
      <textarea name="mensaje" id="mensaje"></textarea>
    </fieldset>

    <fieldset>
      <legend>Información sobre Propiedad</legend>

      <label for="venta">Vende o Compra</label>
      <select name="venta" id="venta">
        <option value="" selected disabled>Seleccione</option>
        <option value="compra">Compra</option>
        <option value="compra">Vende</option>
      </select>

      <label for="presupuesto">Precio o Presupuesto</label>
      <input type="number" placeholder="Tu presupuesto" />
    </fieldset>

    <fieldset>
      <legend>Contacto</legend>

      <p class="info">Como desea ser Contactado</p>
      <div class="forma-contacto">
        <label for="contact-telefono">Teléfono</label>
        <input type="radio" value="telefono" id="contact-telefono" name="contacto" />
        <label for="contact-email">E-mail</label>
        <input type="radio" value="emai" id="email" name="contacto" />
      </div>
      <p class="info">Si eligió teléfono, eliga la fecha y la hora</p>

      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" />
      <label for="hora">Hora</label>
      <input type="time" id="hora" />
    </fieldset>

    <div class="submit">
      <input type="submit" class="button-green" value="Enviar" />
    </div>
  </form>
</main>

<?php 
  incluirTemplate('footer'); 
?>