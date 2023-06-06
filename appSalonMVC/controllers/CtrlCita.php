<?php

    namespace Controller;

use MVC\Router;
use Validator\ValidadorLogin;

    class CtrlCita {
        public static function index(Router $router){
            session_start();
            ValidadorLogin::isAuth();

            if (isset($_SESSION['admin'])) {
                header("Location: /admin");
            }
            
            $router->render('cita/index', [
                'nombre' => $_SESSION['nombre'],
                'usuarioId' => $_SESSION['id'],
            ]);
        }
    }