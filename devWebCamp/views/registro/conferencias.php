<h2 class="pagina__heading"><?= $titulo ?></h2>
<p class="pagina__description">Elige Hasta 5 eventos para ver de forma presencial</p>


<div class="eventos-registro">
    <main class="eventos-registro__listado">
        <h3 class="eventos-registro__heading--conferencias">&lt;Conferencias/></h3>
        <p class="eventos-registro__fecha">Viernes 5 de octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($conferenciasViernes as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach ?>
        </div>

        <p class="eventos-registro__fecha">Sabado 6 de octubre</p>

        <div class="eventos-registro__grid">
            <?php foreach ($conferenciasSabado as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach ?>
        </div>

        <h3 class="eventos-registro__heading--workshop">&lt;Workshops/></h3>
        <p class="eventos-registro__fecha">Viernes 5 de octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($workshopsViernes as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach ?>
        </div>

        <p class="eventos-registro__fecha">Sabado 6 de octubre</p>

        <div class="eventos-registro__grid eventos--workshops">
            <?php foreach ($workshopsSabado as $evento) : ?>
                <?php include __DIR__ . '/evento.php' ?>
            <?php endforeach ?>
        </div>

    </main>

    <aside class="registro">
        <h2 class="registro__heading">Tu registro</h2>
        <div id="registro-resumen" class="registro__resumen"></div>
        <div id="registro-regalo" class="registro__regalo">
            <label for="regalo" class="registro__label">Selecciona un regalo</label>
            <select id="regalo" class="registro__selected">
                <option value="">-- Selecciona tu regalo --</option>
                <?php foreach($regalos as $regalo): ?>
                <option value="<?=$regalo->getId()?>"><?= $regalo->getNombre()?></option>
                <?php endforeach ?> 
            </select>
        </div>
        
        <form id="registro" class="form">
            <div class="form__field">
                <input type="submit" value="Registrarme" class="form__submit form__submit--full">
            </div>
        </form>
    </aside>

</div>