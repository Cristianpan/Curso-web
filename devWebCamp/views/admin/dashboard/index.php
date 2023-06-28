<h2 class="dashboard__heading "><?= $titulo ?></h2>

<main class="bloques">
    <div class="bloques__grid">
        <div class="bloque">
            <h3 class="bloque__heading">Últimos Registros</h3>

            <?php foreach ($registros as $registro) : ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?= $registro->getUsuarioId()->getNombre() . " " . $registro->getUsuarioId()->getApellido() ?>
                    </p>
                </div>

            <?php endforeach ?>

        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Ingresos</h3>

            <p class="bloque__texto--cantidad"> $<?= $ingresos?></p>
        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos menos vendidos</h3>

            <?php foreach ($menosDisponibles as $evento) : ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?= $evento->getNombre() . " - " . $evento->getDisponibles()?>
                    </p>
                </div>

            <?php endforeach ?>

        </div>

        <div class="bloque">
            <h3 class="bloque__heading">Eventos más vendidos</h3>

            <?php foreach ($masDisponibles as $evento) : ?>
                <div class="bloque__contenido">
                    <p class="bloque__texto">
                        <?= $evento->getNombre() . " - " . $evento->getDisponibles()?>
                    </p>
                </div>

            <?php endforeach ?>

        </div>
    </div>

</main>