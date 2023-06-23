<div class="evento swiper-slide">
    <p class="evento__hora"><?= $evento->getHoraId() ?></p>

    <div class="evento__informacion">
        <h4 class="evento__nombre"><?= $evento->getNombre() ?></h4>
        <p class="evento__introduccion"><?= $evento->getDescripcion() ?></p>

        <div class="evento__autor-info">
            <picture>
                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen() ?>.webp" type="image/webp">
                <source srcset="img/speakers/<?= $evento->getPonenteId()->getImagen() ?>.png" type="image/png">
                <img class="evento__imagen-autor" loading="lazy" src="img/speakers/<?= $evento->getPonenteId()->getImagen() ?>.png" alt="Imagen Ponente">
            </picture>
            <p class="evento__autor-nombre"><?= $evento->getPonenteId()->getNombre() . " " . $evento->getPonenteId()->getApellido() ?></p>
        </div>
    </div>
</div>