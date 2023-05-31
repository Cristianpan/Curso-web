<?php 
namespace Controller;

use MVC\Router;

class CtrlRegistrar {
    public static function registrar(Router $router) {
        $router->render("auth/crearCuenta");
    }
}