<div class="contenedor login">
    <?php include_once __DIR__ . "/../templates/nombreSitio.php" ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Iniciar Sesión</p>

        <form action="/" class="form" method="post">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email">
            </div>
            <div class="field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Tu Contraseña" name="password">
            </div>
            <div class="aling-right">
                <input type="submit" class="button" value="Iniciar Sesión">
            </div>
        </form>
        <div class="actions">
            <a href="/crear">¿Aún no tienes una cuenta? Obtenener una</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>

    </div> <!--.contenedor-sm-->
</div>