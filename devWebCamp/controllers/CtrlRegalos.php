<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlRegalos {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/regalos/index', [
            'titulo' => 'Regalos',
        ]);
    }

}