<?php 
namespace Validator; 

class ValidadorLogin {
    public static function isAuth() : bool {
        if (!isset($_SESSION['auth']) || $_SESSION['auth'] === false) {
            header("Location: /");
            exit();
        }
        
        return true; 
    }

    public static function validarCredenciales($usuario, $password){
        $errors = [];
        if (is_null($usuario)) {
            $errors["usuario"] = "No existe algún usuario con el correo ingresado";
        } else if (!$usuario->getConfirmado()) {
            $errors["usuario"] = "Por favor verifique su correo e intente nuevamente";
        } else if (!password_verify($password, $usuario->getPassword())){
            $errors['usuario'] = "La contraseña es incorrecta"; 
        }

        return $errors; 
    }
}