<h1 class="nombre-pagina">Olvide Contraseña</h1>
<p class="descripcion-pagina">Escribe tu email para poder restablecer tu contraseña</p>

<form class="form" action="/olvide" method="post">
    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Tu email">
    </div>

    <div class="align-right">
        <input type="submit" class="button" value="Enviar">
    </div>
</form>

<div class="actions">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Regístrate</a>
</div>