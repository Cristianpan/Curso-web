<main class="container section centered-content">
    <h1>Contacto</h1>
    <picture>
        <source srcset="/build/img/destacada3.webp" type="image/webp" />
        <source srcset="/build/img/destacada3.jpg" type="image/jpeg" />
        <img loading="lazy" src="/build/img/destacada3.jpg" alt="imagen contacto" />
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <?php 
        if (!empty($mensaje)) {
            if ($mensaje[0]) {
                echo "<p class='modal exito'> $mensaje[1] </p>";
            } else {
                echo "<p class='modal error'> $mensaje[1] </p>";
            }
        }
    ?>


    <form class="form" action="/contacto" method="post">
        <fieldset>
            <legend>Información de Contacto</legend>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" placeholder="Tu nombre" name="contacto[nombre]" required />
            
            <label for="mensaje">Mensaje</label>
            <textarea id="mensaje" required name="contacto[mensaje]"></textarea>
            
            <p class="info">Como desea ser Contactado</p>
            <div class="forma-contacto">
                <label for="contact-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contact-telefono" name="contacto[contacto]" />
                <label for="contact-email">E-mail</label>
                <input type="radio" value="email" id="email" name="contacto[contacto]" />
            </div>

            <div id="contacto"></div>

        </fieldset>

        <fieldset>
            <legend>Información sobre Propiedad</legend>

            <label for="venta">Vende o Compra</label>
            <select id="venta" required name="contacto[tipo]">
                <option value="" selected disabled>Seleccione</option>
                <option value="compra">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu presupuesto" name="contacto[precio]" required />
        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>
</main>