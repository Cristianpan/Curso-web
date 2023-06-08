<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Validator\ValidadorUsuario;
use Validator\ValidadorLogin;

class CtrlLogin {
    public static function login(Router $router){
        $errors = [];
        $usuario = new Usuario();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $errors = ValidadorUsuario::validarEmail($_POST['email']);
            $errors = array_merge($errors, ValidadorUsuario::validarPasswordLogin($_POST['password']));

            if (empty($errors)) {
                $usuario = Usuario::where($_POST['email'], "email");
                $errors = ValidadorLogin::validarCredenciales($usuario, $_POST['password']);

                if (empty($errors)) {
                    session_start(); 
                    $_SESSION['id'] = $usuario->getId();
                    $_SESSION['nombre'] = $usuario->getNombre();
                    $_SESSION['auth'] = true; 

                    header("Location: /dashboard");
                }
            }
        }

        $router->render("auth/login", [
            'titulo' => 'Iniciar Sesión',
            'errors' => $errors,
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];

        header("Location: /");
    }
}
