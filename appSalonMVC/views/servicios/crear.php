<h1 class="nombre-pagina">Agregar Servicio</h1>
<p class="descripcion-pagina">Llena todos los campos para añadir un nuevo servicio</p>

<?php include_once __DIR__ . "/../components/barra.php" ?>

<form action="/servicios/crear" method="post" class="form">

    <?php include __DIR__ . "/formulario.php" ?>

    <div class="align-right">
        <input type="submit" class="button" value="Guardar Servicio">
    </div>
</form>

