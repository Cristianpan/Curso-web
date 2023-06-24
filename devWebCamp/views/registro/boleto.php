<main class="pagina">
    <h2 class="pagina__heading"><?= $titulo ?></h2>
    <p class="pagina__description">Tu Boleto - Te recomendamos almacenarlo. Puedes compartirlo en redes sociales</p>

    <div class="boleto-virtual">
        <div class="boleto boleto--acceso">
            <div class="boleto__contenido">
                <h4 class="boleto__logo">&#60;DevWebCamp /></h4>
                <p class="boleto__plan"><?= $registro->getPaqueteId()->getNombre() ?></p>
                <p class="boleto__nombre"><?= $registro->getUsuarioId()->getNombre() . " " . $registro->getUsuarioId()->getApellido()?></p>
            </div>

            <p class="boleto__codigo">#<?= $registro->getToken()?></p>
        </div>
    </div>
</main>