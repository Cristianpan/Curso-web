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
    public static function olvide() {
        echo "Desde Olvide";
    }
    public static function restablecer() {
        echo "Desde restablecer";
    }

    public static function mensaje(){
        echo "Desde mensaje";
    }
    public static function confirmar(){
        echo "Desde confirmar cuenta";
    }
}