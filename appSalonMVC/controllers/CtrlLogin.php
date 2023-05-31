<?php 

namespace Controller;

use MVC\Router;

class CtrlLogin {
    
    public static function login(Router $router){
        $router->render("auth/login");
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