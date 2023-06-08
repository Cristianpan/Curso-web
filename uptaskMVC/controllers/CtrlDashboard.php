<?php 
namespace Controllers; 
use MVC\Router;
use Model\Proyecto;
use Validator\ValidadorLogin;
use Validator\ValidadorProyecto;

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
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $errors = ValidadorProyecto::validarProyecto($_POST['proyecto']);

            if (empty($errors)) {
                $proyecto = new Proyecto($_POST);
                $proyecto->setUsuarioId($_SESSION['id']);
                $proyecto->setUrl(md5(uniqid()));

                if ($proyecto->save()) {
                    header("Location: /proyecto?url=" . $proyecto->getUrl());
                }
            }

        }

        $router->render("dashboard/crearProyecto", [
            'titulo' => 'Crear Proyecto',
            'errors' => $errors
            
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
