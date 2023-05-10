<?php
require 'includes/funciones.php';
require 'includes/config/database.php'; 
require 'includes/validators/validadorLogin.php'; 
require 'includes/backend/usuarios.php'; 
incluirTemplate('header');

/**
 * Credenciales de acceso
 * email: panza@gmail.com
 * contraseña: 12345
 */

if ($_SERVER['REQUEST_METHOD'] === "POST"){
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); 
    $password = $_POST['password']; 
    
    $errores = validarCredenciales($email, $password); 
    if (empty($errors)) {
        
        $errores = isLogin(obtenerUsuarioPorEmail($email), $password); 
        
        if (empty($errores)) {
            session_start(); 
            $_SESSION['usuario'] = $email; 
            $_SESSION['auth'] = true; 
            header("Location: ./admin/index.php"); 
        }
    }
}
?>

<main class="container secction centered-content">
    <h1>Inciar Sesión</h1>
    <form class="form" method="post">
        <fieldset>
            <legend>Ingrese sus credenciales de acceso</legend>

            <label for="email">E-mail</label>
            <?php echo isset($errores['email']) ? "<p class='error'>" . $errores['email'] . "</p>" : ''; ?>
            <input type="email" id="email" placeholder="Tu email" name="email" required/>

            <label for="password">Password</label>
            <?php echo isset($errores['password']) ? "<p class='error'>" . $errores['password'] . "</p>" : ''; ?>
            <input type="password" id="password" placeholder="Tu contraseña" name="password" required/>
            <?php echo isset($errores['usuario']) ? "<p class='error'>" . $errores['usuario'] . "</p>" : ''; ?>
        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Iniciar Sesión"/>
        </div>
    </form>
</main>



<?php
incluirTemplate('footer');
?>