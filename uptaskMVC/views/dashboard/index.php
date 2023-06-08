<?php include_once __DIR__ . "/header-dashboard.php" ?>

<?php if (empty($proyectos)) {  ?>
    <p class="no-proyectos">No Hay Proyectos Aún. <a href="/crearProyecto">Comienza Creando Uno</a></p>
<?php return;
} ?>

<ul class="listado-proyectos">
    <?php foreach ($proyectos as $proyecto) : ?>
        <li class="proyecto">
            <a href="/proyecto?token=<?=$proyecto->getUrl()?>">
                <?= $proyecto->getProyecto() ?>
            </a>
        </li>

    <?php endforeach ?>
</ul>




<?php include_once __DIR__ . "/footer-dashboard.php" ?>