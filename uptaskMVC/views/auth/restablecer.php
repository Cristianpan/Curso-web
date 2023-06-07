<div class="contenedor restablecer">
    <?php include_once __DIR__ . "/../templates/nombreCitio.php" ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu nuevo password</p>

        <form action="/restablecer" class="form" method="post">
            <div class="field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Tu contraseña" name="password">
            </div>
            <div class="field">
                <label for="password2">Repetir Contraseña</label>
                <input type="password" id="password2" placeholder="Confirma tu contraseña" name="password2">
            </div>
            <div class="aling-right">
                <input type="submit" class="button" value="Guardar contraseña">
            </div>
        </form>
        <div class="actions">
            <a href="/crear">¿Aún no tienes una cuenta? Obtenener una</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>

    </div> <!--.contenedor-sm-->
</div>