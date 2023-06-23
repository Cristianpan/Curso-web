<h2 class="dashboard__heading "><?= $titulo ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-rotate-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">

    <form class="form" method="post"">
        <?php include_once __DIR__ . "/formulario.php" ?>

        <input class="form__submit form__submit--register" type="submit" value="Actualizar Evento">
    </form>

</div>