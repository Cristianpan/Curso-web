<?php 

namespace Controller;

use Model\Usuario;
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlLogin {
    
    public static function login(Router $router){
        $alerts = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $alerts = ValidadorLogin::validarDatos($email, $password);

            if (empty($alerts)) {
                $usuario = Usuario::where($email, "email");
                $alerts = ValidadorLogin::isLogin($usuario, $password);

                if (empty($alerts)) {
                    session_start();
                    $_SESSION['id'] = $usuario->getId(); 
                    $_SESSION['nombre'] = $usuario->getNombre() . " " .  $usuario->getApellido(); 
                    $_SESSION['email'] = $usuario->getEmail(); 
                    $_SESSION['auth'] = true; 

                    if ($usuario->getAdmin()) {
                        $_SESSION['admin'] = $usuario->getAdmin();
                        header("Location: /admin");
                    } else {
                        header("Location: /citas");
                    }
                }
            }

        }

        $router->render("auth/login", [
            "alerts" => $alerts
        ]);
    }
    public static function logout(){
        echo "cerrando sesion..."; 
    }

    public static function olvide(Router $router) {
        $router->render("auth/olvidePassword"); 
    }

    public static function recuperar(){
        echo "cerrando sesion..."; 
    }
}