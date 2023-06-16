<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlEventos {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops'
        ]);
    }

}