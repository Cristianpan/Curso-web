<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión con tus Datos</p>

<form class="form" method="post" action="/">
    <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="Tu email" name="email" />
    </div>

    <div class="field">
        <label for="password">Contraseña</label>
        <input type="password" id="password" placeholder="Tu contraseña" name="password" />
    </div>
    
    
    <div class="align-right">
        <input type="submit" value="Iniciar Sesión" class="button" />
    </div>
</form>
<div class="actions">
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Registrate</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>