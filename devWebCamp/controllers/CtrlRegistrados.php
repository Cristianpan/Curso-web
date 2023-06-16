<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlRegistrados {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
        ]);
    }

}