<?php 
namespace Controllers; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlDashboard {
    public static function index(Router $router) {
        session_start(); 
        ValidadorLogin::isAuth();
        $router->render("dashboard/index", [
            'titulo' => 'Proyectos',
            
        ]);
    }

    public static function crearProyecto(Router $router){
        session_start(); 
        ValidadorLogin::isAuth();
        $router->render("dashboard/crearProyecto", [
            'titulo' => 'Crear Proyecto',
            
        ]);
    }
    public static function perfil(Router $router){
        session_start(); 
        ValidadorLogin::isAuth();
        $router->render("dashboard/perfil", [
            'titulo' => 'Perfil',
            
        ]);
    }
}
