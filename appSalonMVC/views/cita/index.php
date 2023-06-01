<h1 class="nombre-pagina">Crear Nueva Cita</h1>
<p class="descripcion-pagina">Elige tus servicios y coloca tus datos</p>

<div id="app">
    <nav class="tabs">
        <button class="actual" type="button" data-paso="1">Servicios</button>
        <button type="button" data-paso="2">Información Cita</button>
        <button type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion mostrar">
        <h2>Sevicios</h2>
        <p class="text-center">Elige tus servicios a continuación</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion">
        <h2>Tus Datos y Cita</h2>
        <p class="text-center">Coloca tus Datos y fecha de tu cita</p>

        <form class="form">
            <div class="field">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Tu nombre" value="<?php echo $nombre?>" disabled>

            </div>
            <div class="field">
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date">
            </div>
            <div class="field">
                <label for="hora">Hora</label>
                <input id="hora" type="time">
            </div>
        </form>

    </div>
    <div id="paso-3" class="seccion">
        <h2>Resumen</h2>
        <p class="text-center">Verifica que la información sea correcta</p>
    </div>

    <div class="paginacion">
        <button id="anterior" class="button ocultar">
            &laquo; Anterior
        </button>
        <button id="siguiente" class="button">
            Siguiente &raquo;
        </button>
    </div>
</div>

<?php 
    $script = "<script src='build/js/app.js'></script>"
?>