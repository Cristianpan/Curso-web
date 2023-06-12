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

        $proyectos = Proyecto::getByUsuarioId($_SESSION['id']);

        $router->render("dashboard/index", [
            'titulo' => 'Proyectos',
            'proyectos' => $proyectos
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
                    header("Location: /proyecto?token=" . $proyecto->getUrl());
                }
            }

        }

        $router->render("dashboard/crearProyecto", [
            'titulo' => 'Crear Proyecto',
            'errors' => $errors
        ]);
    }

    public static function proyecto(Router $router){
        session_start();
        ValidadorLogin::isAuth();


        $token = validarTokenORedireccionar('token', "/dashboard");

        $proyecto = Proyecto::where($token, "url");
        
        if (!$proyecto || $proyecto->getUsuarioId() !== $_SESSION['id']){
            header("Location: /dashboard");
        }

        $router->render("dashboard/proyecto", [
            'titulo' => $proyecto->getProyecto(), 
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
