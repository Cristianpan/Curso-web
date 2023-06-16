<?php 

namespace Controller;

use Model\Usuario;
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlLogin {
    
    public static function login(Router $router){
        $errors = [];

        session_start(); 
        //Redirige a una página si ya existe una sesion activa

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $errors = ValidadorLogin::validarDatos($email, $password);

            if (empty($errors)) {
                $usuario = Usuario::where($email, "email");
                $errors = ValidadorLogin::isLogin($usuario, $password);

                if (empty($errors)) {
                    $_SESSION['id'] = $usuario->getId(); 
                    $_SESSION['nombre'] = $usuario->getNombre() . " " .  $usuario->getApellido(); 
                    $_SESSION['email'] = $usuario->getEmail(); 
                    $_SESSION['auth'] = true; 

                    if ($usuario->getAdmin()) {
                        $_SESSION['admin'] = $usuario->getAdmin();
                        header("Location: /admin/dashboard");
                    } else {
                        header("Location: /finalizar-registro");
                    }
                }
            }
        }

        $router->render("auth/login", [
            'titulo' => 'Iniciar Sesión',
            "errors" => $errors
        ]);
    }

    public static function logout(){
        session_start(); 
        $_SESSION = []; 

        header("Location: /login");
    }
}