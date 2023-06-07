<?php 

namespace Controller;

use Model\Usuario;
use Classes\Email;
use MVC\Router;
use Validator\ValidadorLogin;
use Validator\ValidadorUsuario;

class CtrlLogin {
    
    public static function login(Router $router){
        $alerts = [];

        session_start(); 
        //Redirige a una página si ya existe una sesion activa
        if (!empty($_SESSION)) {
            header("Location: /citas");
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $alerts = ValidadorLogin::validarDatos($email, $password);

            if (empty($alerts)) {
                $usuario = Usuario::where($email, "email");
                $alerts = ValidadorLogin::isLogin($usuario, $password);

                if (empty($alerts)) {
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
        session_start(); 
        $_SESSION = []; 

        header("Location: /");
    }

    public static function olvide(Router $router) {
        $alerts = [];
        $message = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];

            $alerts = ValidadorUsuario::validarEmail($email);

            if (empty($alerts)){
                $usuario = Usuario::where($email, 'email');

                if ($usuario && $usuario->getConfirmado()){
                    $usuario->crearToken();
                    $usuario->update();

                    $email = new Email($usuario->getEmail(), $usuario->getNombre(), $usuario->getToken());
                    $email->enviarInstrucciones();


                    $message['tipo'] = "exito"; 
                    $message['informacion'] = "Revisa tu Email";
                } else {
                    $message['tipo'] = "error"; 
                    $message['informacion'] = "El usuario no existe o no ha confirmado su cuenta";
                }
            }
        }

        $router->render("auth/olvidePassword", [
            "alerts" => $alerts, 
            "message" => $message,
        ]); 
    }

    public static function restablecer(Router $router){
        $message = [];
        $alerts = [];
        $token = sanitizarHtml($_GET['token']);

        $usuario = Usuario::where($token, "token");

        if (is_null($usuario)) {
            $message['tipo'] = "error";
            $message['informacion'] = "El token es invalido";
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $password = $_POST['password'];
            $alerts = ValidadorUsuario::validarPassword($password);

            if (empty($alerts)) {
                $usuario->setPassword($password); 
                $usuario->setToken(null);
                $usuario->hashPassword();
                if ($usuario->update()) {
                    header("Location: /");
                }
            }
        }


        $router->render("auth/restablecerPassword", [
            "message" => $message,
            "alerts" => $alerts,
        ]);
        
    }
}