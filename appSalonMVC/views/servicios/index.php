<h1 class="nombre-pagina">Servicios</h1>
<p class="descripcion-pagina">Administración de Servicios</p>

<?php include_once __DIR__ . "/../components/barra.php" ?>

<ul class="servicios">
    <?php foreach ($servicios as $servicio) {?> 
    <li>
        <p>Nombre: <span><?php echo $servicio->getNombre()?></span></p>
        <p>Precio: <span>$<?php echo $servicio->getPrecio()?></span></p>
        <div class="actions">
            <a href="/servicios/actualizar?id=<?php echo $servicio->getId()?>" class="button">Actualizar</a>

            <form action="/servicios/eliminar" method="post">
                <input type="hidden" value="<?php echo $servicio->getId()?>" name="id">
                <input type="submit" value="Eliminar" class="boton-eliminar">
            </form>
            
        </div>
    </li>  
        
    <?php }?> 
</ul>