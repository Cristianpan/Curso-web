<?php 
namespace Controller;

use Model\Servicio;
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlServicio {
    public static function index (Router $router) {
        session_start();        
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin(); 
        $servicios = Servicio::getAll();

        $router->render('servicios/index', [
            "nombre" => $_SESSION['nombre'], 
            "servicios" => $servicios
        ]);
    }
    public static function crear (Router $router) {
        session_start();
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin(); 
        $servicio = new Servicio;
        $alerts = []; 

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $servicio->setNombre($_POST['nombre']);
            $servicio->setPrecio($_POST['precio']);
            if (empty($alerts)) {
                try {
                    if ($servicio->save()) {
                        header("Location: /servicios");
                    }

                } catch (\Throwable $th) {
                    $alerts['precio'] = "El precio no debe de ser mayor a $999";
                }
            }
        }


        $router->render('servicios/crear', [
            "nombre" => $_SESSION['nombre'],
            "servicio" => $servicio, 
            "alerts" => $alerts
        ]);
    }
    public static function actualizar (Router $router) {
        session_start();
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin(); 

        $id = validarORedireccionar("/servicios");

        $servicio = Servicio::getById($id);

        if (is_null($servicio)){ 
            header("Location: /servicios");
        }
        
        $alerts = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $servicio->setNombre($_POST['nombre']);
            $servicio->setPrecio($_POST['precio']);
            if (empty($alerts)) {
                try {
                    if ($servicio->update()) {
                        header("Location: /servicios");
                    }
                } catch (\Throwable $th) {
                    $alerts['precio'] = "El precio no debe de ser mayor a $999";
                }
            }
        }
        
        $router->render('servicios/actualizar', [
            "nombre" => $_SESSION['nombre'], 
            "servicio" => $servicio,
            "alerts" => $alerts
        ]);
    }
    
    public static function eliminar() {
        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            
            $servicio = Servicio::getById($_POST['id']); 
            
            if ($servicio->delete()) {
                header("Location: /servicios");
            }
        }
    }
}