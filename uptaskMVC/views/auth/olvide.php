<div class="contenedor olvide">
    <?php include_once __DIR__ . "/../templates/nombreSitio.php" ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Recupera tu Acceso a Uptask</p>

        <form action="/crear" class="form" method="post">
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email">
            </div>
            <div class="aling-right">
                <input type="submit" class="button" value="Enviar Instrucciones">
            </div>
        </form>

        <div class="actions">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/crear">¿Aún no tienes una cuenta? Obtener una</a>
        </div>

    </div> <!--.contenedor-sm-->
</div>