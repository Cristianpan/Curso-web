<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="nombre-pagina">Llene el siguiente formulario</p>

<form action="/crearCuenta" method="post" class="form">
    <div class="field">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre"/>
    </div>
    <div class="field">
        <label for="apellido">Apellido</label>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido"/>
    </div>
    <div class="field">
        <label for="telefono">Telefono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu telefono"/>
    </div>
    <div class="field">
        <label for="correo">Correo</label>
        <input type="tel" id="correo" name="correo" placeholder="Tu correo electrónico"/>
    </div>
    <div class="field">
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Tu contraseña"/>
    </div>

    <div class="align-right">
        <input type="submit" value="Crear Cuenta" class="button">
    </div>
</form>

<div class="actions">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>