<?php 
namespace Controllers;

use MVC\Router;

class CtrlCuenta {
    public static function crear(Router $router) {
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            
        }

        $router->render("auth/crear", [
            'titulo' => 'Crea tu cuenta'
        ]);
    }
    public static function olvide(Router $router) {
        $router->render("auth/olvide", [
            'titulo' => 'Olvide mi contraseña'
        ]);
    }
    public static function restablecer(Router $router) {
        $router->render("auth/restablecer", [
            'titulo' => 'Restablecer contraseña'
        ]);
    }
    
    public static function mensaje(Router $router){
        $router->render("auth/mensaje", [
            'titulo' => 'Cuenta creada'
        ]);
        
    }
    public static function confirmar(Router $router){
        $router->render("auth/confirmar", [
            'titulo' => 'Confirma tu cuenta'
        ]);
    }
}