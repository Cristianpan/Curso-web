<?php

namespace Controller;
require '../includes/validators/ValidadorLogin.php';

use MVC\Router;
use Model\Admin;

class CtrlLogin{

    public static function login(Router $router){
        $errores = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL); 
            $password = $_POST['password']; 

            $errores = validarCredenciales($email, $password);
            
            if (empty($errores)) {
                $errores = isLogin(Admin::getByEmail($email), $password); 
                if (empty($errores)) {
                    session_start(); 
                    $_SESSION['usuario'] = $email; 
                    $_SESSION['auth'] = true; 
                    header("Location: /admin");                     
                }
            }

        }
        $router->render("auth/login", [
            "errores" => $errores,
        ]);
    }

    public static function logout(){
        session_start(); 
        $_SESSION = []; 

        header("Location: /");
    }
}
