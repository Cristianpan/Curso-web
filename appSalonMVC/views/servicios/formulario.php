<div class="field">
    <label for="nombre">Nombre</label>
    <?php echo isset($alerts['nombre']) ? "<p class='error'>" . $alerts['nombre'] . "</p>" : ''; ?>
    <input type="text" name="nombre" id="nombre" placeholder="Nombre Servicio" value="<?php echo $servicio->getNombre()?>">
</div>
<div class="field">
    <label for="precio">Precio</label>
    <?php echo isset($alerts['precio']) ? "<p class='error'>" . $alerts['precio'] . "</p>" : ''; ?>
    <input type="number" name="precio" id="precio" placeholder="Precio Servicio" value="<?php echo $servicio->getPrecio()?>">
</div>