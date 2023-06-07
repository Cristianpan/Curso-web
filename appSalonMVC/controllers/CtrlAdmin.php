<?php 
    namespace Controller;

use Model\AdminCitas;
use MVC\Router;
use Validator\ValidadorLogin;

    class CtrlAdmin {
        public static function index(Router $router){
            session_start();
            ValidadorLogin::isAuth(); 
            ValidadorLogin::isAdmin(); 

            $fecha = $_GET['fecha'] ?? date("Y-m-d");
            $auxFecha = explode("-", $fecha);

            if (!checkdate($auxFecha[1], $auxFecha[2], $auxFecha[0])){
                header("Location: /404"); 
            }

            $citas = AdminCitas::getByFecha($fecha);
            $router->render("admin/index", [
                'nombre' => $_SESSION['nombre'],
                'citas' => $citas,
                'fecha' => $fecha
            ]);
        }
    }