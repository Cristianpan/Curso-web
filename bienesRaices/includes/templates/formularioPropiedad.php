<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Titulo</label>
    <?php echo isset($errores['titulo']) ? "<p class='error'>" . $errores['titulo'] . "</p>" : ''; ?>
    <input type="text" id="titulo" name="titulo" placeholder="Propiedad" value="<?php echo sanitizarHtml($propiedad->getTitulo()); ?>">

    <label for="precio">Precio</label>
    <?php echo isset($errores['precio']) ? "<p class='error'>" . $errores['precio'] . "</p>" : ''; ?>
    <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo sanitizarHtml($propiedad->getPrecio()); ?>">

    <label for="imagen">Imagen</label>
    <?php echo isset($errores['imagen']) ? "<p class='error'>" . $errores['imagen'] . "</p>" : ''; ?>
    <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">
    <?php if ($propiedad->getImagen()) : ?>
        <img src="<?php echo "../" . $propiedad->getImagen() ?>" alt="imagen propiedad" class="imagen-propiedad">
    <?php endif; ?>

    <label for="descripcion">Descripción</label>
    <?php echo isset($errores['descripcion']) ? "<p class='error'>" . $errores['descripcion'] . "</p>" : ''; ?>
    <textarea id="descripcion" name="descripcion"><?php echo sanitizarHtml($propiedad->getDescripcion()); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información Propiedad</legend>

    <label for="habitaciones">Habitaciones:</label>
    <?php echo isset($errores['habitaciones']) ? "<p class='error'>" . $errores['habitaciones'] . "</p>" : ''; ?>
    <input type="number" id="habitaciones" name="habitaciones" min="1" max="9" placeholder="3" value="<?php echo sanitizarHtml($propiedad->getHabitaciones()); ?>">

    <label for="wc">Baños:</label>
    <?php echo isset($errores['wc']) ? "<p class='error'>" . $errores['wc'] . "</p>" : ''; ?>
    <input type="number" id="wc" min="1" max="9" name="wc" placeholder="3" value="<?php echo sanitizarHtml($propiedad->getWc()); ?>">

    <label for="estacionamiento">Estacionamiento:</label>
    <?php echo isset($errores['estacionamiento']) ? "<p class='error'>" . $errores['estacionamiento'] . "</p>" : ''; ?>
    <input type="number" id="estacionamiento" name="estacionamiento" min="1" max="9" placeholder="3" value="<?php echo sanitizarHtml($propiedad->getEstacionamiento()); ?>">
</fieldset>

<fieldset>
    <legend for="vendedor">Vendedor</legend>
    <?php echo isset($errores['vendedor']) ? "<p class='error'>" . $errores['vendedor'] . "</p>" : ''; ?>
    <select id="vendedor" name="vendedorId">
        <option value=" " selected>Seleccionar</option>
        <?php
        foreach ($vendedores as $vendedor) {
            echo "<option value ='" . $vendedor->getId() . "'" . ($propiedad->getVendedorId() == $vendedor->getId() ? 'selected' : '') . ">" . $vendedor->getNombre() . " " . $vendedor->getApellido();
        }
        ?>
    </select>
</fieldset>