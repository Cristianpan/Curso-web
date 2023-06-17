<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlDashboard {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración',
        ]);
    }

}