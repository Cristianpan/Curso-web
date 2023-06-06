<div class="barra">
    <p>Hola <?php echo $nombre ?? ''?></p>  
    <a class="button" href="/cerrarSesion">Cerrar Sesion</a>  
</div>

<?php if (isset($_SESSION['admin'])) {?>
    <div class="tabs">
        <a href="/admin" id="/admin">Ver Citas</a>
        <a href="/servicios" id="/servicios">Ver Servicios</a>
        <a href="/servicios/crear" id="/servicios/crear">Agregar Servicios</a>
    </div>
<?php }?>
