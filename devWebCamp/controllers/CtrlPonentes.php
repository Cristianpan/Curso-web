<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlPonentes {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
        ]);
    }
    public static function crear(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
        ]);
    }

}