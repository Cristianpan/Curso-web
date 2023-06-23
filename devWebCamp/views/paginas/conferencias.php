<main class="agenda">
    <h2 class="agenda__heading"><?= $titulo ?></h2>
    <p class="agenda__description">Talleres y conferencias ditactados por expertos en desarrollo web</p>

    <div class="eventos">
        <h3 class="eventos__heading">&lt;Conferencias/></h3>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($conferenciasViernes as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <p class="eventos__fecha">Sábado 6 de octubre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($conferenciasSabado as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <div class="eventos eventos--workshops">
        <h3 class="eventos__heading">&lt;Workshops/></h3>
        <p class="eventos__fecha">Viernes 5 de octubre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($workshopsViernes as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <p class="eventos__fecha">Sábado 6 de octubre</p>

        <div class="eventos__listado slider swiper">
            <div class="swiper-wrapper">
                <?php foreach ($workshopsSabado as $evento) : ?>
                    <?php include __DIR__ . '../../templates/evento.php' ?>
                <?php endforeach ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</main>