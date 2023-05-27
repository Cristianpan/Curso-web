<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre</label>
    <?php echo isset($errores['nombre']) ? "<p class='error'>" . $errores['nombre'] . "</p>" : ''; ?>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre del vendedor" value="<?php echo sanitizarHtml($vendedor->getNombre()); ?>">

    <label for="apellido">Apellido</label>
    <?php echo isset($errores['apellido']) ? "<p class='error'>" . $errores['apellido'] . "</p>" : ''; ?>
    <input type=text" id="apellido" name="apellido" placeholder="Apellido del vendedor" value="<?php echo sanitizarHtml($vendedor->getApellido()); ?>">
    
    <label for="telefono">Teléfono</label>
    <?php echo isset($errores['telefono']) ? "<p class='error'>" . $errores['telefono'] . "</p>" : ''; ?>
    <input type="text" id="telefono" name="telefono" placeholder="Teléfono del vendedor" value="<?php echo sanitizarHtml($vendedor->getTelefono()); ?>">
</fieldset>
