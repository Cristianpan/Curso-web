<?php 
use Model\Admin;
function validarCredenciales(string $email, string $password): array {
    $errores = []; 
    if (!$email) {
        $errores['email'] = "El email es obligatorio"; 
    } 

    if (!$password) {
        $errores['password'] = "La contraseña es obligatoria"; 
    }

    return $errores; 
}

function isLogin(Admin $usuario, $password): array {
    $errores = []; 
    if (is_null($usuario)){
        $errores['usuario'] = "No existe un usuario con el email ingresado"; 
        
    } else {
        if (!password_verify($password, $usuario->getPassword())) {
            $errores['usuario'] = "La contraseña es incorrecta"; 
        } 
    }

    return $errores; 
}

function isAuth(): bool {
    session_start();
    $auth = $_SESSION['auth'];

    if ($auth === null || $auth === false) {
        header("Location: /login");
    }

    return true;
}