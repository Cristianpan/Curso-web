<main class="agenda">
    <h2 class="agenda__heading"><?= $titulo ?></h2>
    <p class="agenda__description">Talleres y conferencias ditactados por expertos en desarrollo web</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias/></h3>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado">
            <?php foreach ($conferenciasViernes as $evento) : ?>
                <div class="evento">
                    <p class="evento__hora"><?= $evento->getHoraId()?></p>

                    <div class="evento__informacion">
                        <h4 class="evento__nombre"><?= $evento->getNombre()?></h4>
                        <p class="evento__introduccion"><?= $evento->getDescripcion()?></p>

                        <div class="evento__autor-info">
                            <picture>
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.webp" type="image/webp">
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" type="image/png">
                                <img class="evento__imagen-autor" loading="lazy" src="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" alt="Imagen Ponente">
                            </picture>

                            <p class="evento__autor-nombre"><?= $evento->getPonenteId()->getNombre() . " " . $evento->getPonenteId()->getApellido()?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

        <p class="eventos__fecha">Sábado 6 de octubre</p>

        <div class="eventos__listado">
        <?php foreach ($conferenciasSabado as $evento) : ?>
                <div class="evento">
                    <p class="evento__hora"><?= $evento->getHoraId()?></p>

                    <div class="evento__informacion">
                        <h4 class="evento__nombre"><?= $evento->getNombre()?></h4>
                        <p class="evento__introduccion"><?= $evento->getDescripcion()?></p>

                        <div class="evento__autor-info">
                            <picture>
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.webp" type="image/webp">
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" type="image/png">
                                <img class="evento__imagen-autor" loading="lazy" src="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" alt="Imagen Ponente">
                            </picture>

                            <p class="evento__autor-nombre"><?= $evento->getPonenteId()->getNombre() . " " . $evento->getPonenteId()->getApellido()?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops/></h3>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado">
        <?php foreach ($workshopsViernes as $evento) : ?>
                <div class="evento">
                    <p class="evento__hora"><?= $evento->getHoraId()?></p>

                    <div class="evento__informacion">
                        <h4 class="evento__nombre"><?= $evento->getNombre()?></h4>
                        <p class="evento__introduccion"><?= $evento->getDescripcion()?></p>

                        <div class="evento__autor-info">
                            <picture>
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.webp" type="image/webp">
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" type="image/png">
                                <img class="evento__imagen-autor" loading="lazy" src="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" alt="Imagen Ponente">
                            </picture>

                            <p class="evento__autor-nombre"><?= $evento->getPonenteId()->getNombre() . " " . $evento->getPonenteId()->getApellido()?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
        <p class="eventos__fecha">Sábado 6 de octubre</p>

        <div class="eventos__listado">
        <?php foreach ($workshopsSabado as $evento) : ?>
                <div class="evento">
                    <p class="evento__hora"><?= $evento->getHoraId()?></p>

                    <div class="evento__informacion">
                        <h4 class="evento__nombre"><?= $evento->getNombre()?></h4>
                        <p class="evento__introduccion"><?= $evento->getDescripcion()?></p>

                        <div class="evento__autor-info">
                            <picture>
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.webp" type="image/webp">
                                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" type="image/png">
                                <img class="evento__imagen-autor" loading="lazy" src="img/speakers/<?= $evento->getPonenteId()->getImagen()?>.png" alt="Imagen Ponente">
                            </picture>

                            <p class="evento__autor-nombre"><?= $evento->getPonenteId()->getNombre() . " " . $evento->getPonenteId()->getApellido()?></p>

                        </div>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>
</main>