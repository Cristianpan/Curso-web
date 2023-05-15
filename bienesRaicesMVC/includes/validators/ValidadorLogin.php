<?php 
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

function isLogin(array $usuario, $password): array {
    $errores = []; 
    if (empty($usuario)){
        $errores['usuario'] = "No existe un usuario con el email ingresado"; 
        
    } else {
        if (!password_verify($password, $usuario['password'])) {
            $errores['usuario'] = "La contraseña es incorrecta"; 
        } 
    }

    return $errores; 
}