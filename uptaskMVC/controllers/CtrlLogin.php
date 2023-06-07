<?php 
namespace Controllers; 
use MVC\Router;
class CtrlLogin {
    public static function login(Router $router){   

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            
        }

        $router->render("auth/login", [
            'titulo' => 'Iniciar Sesión'
        ]);
    }

    public static function logout(){
        session_start(); 
        $_SESSION = []; 
        
        header("Location: /");
    }
}