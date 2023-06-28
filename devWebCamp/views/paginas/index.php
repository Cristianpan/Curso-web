<?php include_once __DIR__ . "/conferencias.php" ?>


<section class="resumen">
    <div class="resumen__grid">
        <div <?= aos_animacion()?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $totalBloque['ponentes'] ?></p>
            <p class="resumen__texto">Speakers</p>
        </div>

        <div <?= aos_animacion()?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $totalBloque['conferencias'] ?></p>
            <p class="resumen__texto">Workshops</p>
        </div>


        <div <?= aos_animacion()?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero"><?= $totalBloque['workshops'] ?></p>
            <p class="resumen__texto">Conferencias</p>
        </div>


        <div <?= aos_animacion()?> class="resumen__bloque">
            <p class="resumen__texto resumen__texto--numero">500</p>
            <p class="resumen__texto">Asistentes</p>
        </div>
    </div>
</section>


<section class="speakers">
    <h2 class="speakers__heading">Speakers</h2>
    <p class="speakers__description">Conoce a nuestros expertos de DevWebCamp</p>
    <div class="speakers__grid">
        <?php foreach ($ponentes as $ponente) : ?>
            <div <?= aos_animacion()?> class="speaker">
                <picture>
                    <source srcset="img/speakers/<?= $ponente->getImagen() ?>.webp" type="image/webp">
                    <source srcset="img/speakers/<?= $ponente->getImagen() ?>.png" type="image/png">
                    <img class="speaker__imagen" loading="lazy" src="img/speakers/<?= $ponente->getImagen() ?>.png" alt="Imagen Ponente">
                </picture>
                <div class="speaker__informacion">
                    <h4 class="speaker__nombre"><?= $ponente->getNombre() . " " . $ponente->getApellido() ?></h4>
                    <p class="speaker__ubicacion"><?= $ponente->getCiudad() . ", " . $ponente->getPais() ?></p>

                    <nav class="speaker-sociales">
                        <?php
                        $redes = json_decode($ponente->getRedes());
                        ?>

                        <?php if (!empty($redes->facebook)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--facebook" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->facebook; ?>">
                                <span class="speaker-sociales__ocultar">Facebook</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->twitter)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--twitter" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->twitter; ?>">
                                <span class="speaker-sociales__ocultar">Twitter</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->youtube)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--youtube" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->youtube; ?>">
                                <span class="speaker-sociales__ocultar">YouTube</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->instagram)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--instagram" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->instagram; ?>">
                                <span class="speaker-sociales__ocultar">Instagram</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->tiktok)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--tiktok" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->tiktok; ?>">
                                <span class="speaker-sociales__ocultar">Tiktok</span>
                            </a>
                        <?php } ?>

                        <?php if (!empty($redes->github)) { ?>
                            <a class="speaker-sociales__link speaker-sociales__link--github" rel="noopener noreferrer" target="_blank" href="<?php echo $redes->github; ?>">
                                <span class="speaker-sociales__ocultar">Github</span>
                            </a>
                        <?php } ?>
                    </nav>

                    <ul class="speaker__listado-skills">
                        <?php
                        $tags = explode(",", $ponente->getTags());
                        foreach ($tags as $tag) :
                        ?>

                            <li class="speaker__skill"><?= $tag ?></li>

                        <?php endforeach ?>
                    </ul>
                </div>
            </div>

        <?php endforeach ?>
    </div>
</section>

<div <?= aos_animacion()?> id="mapa" class="mapa"></div>

<section class="boletos" <?= aos_animacion()?>>
    <h2 class="boletos__heading">Boletos y Precios</h2>
    <p class="boletos__description">Precio para DevWebCamp</p>

    <div class="boletos__grid">
        <div class="boleto">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Gratis</p>
            <p class="boleto__precio">$0</p>
        </div>
        <div class="boleto">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Presencial</p>
            <p class="boleto__precio">$199</p>
        </div>
        <div class="boleto">
            <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
            <p class="boleto__plan">Virtual</p>
            <p class="boleto__precio">$99</p>
        </div>

    </div>
    <div class="boletos__enlace-contenedor">
        <a href="/paquetes" class="boletos__enlace">Ver Paquetes</a>
    </div>
</section>