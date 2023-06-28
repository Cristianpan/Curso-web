<?php
namespace Controller; 
use MVC\Router;
use Validator\ValidadorLogin;
use Classes\Paginador;
use Model\Registro;

class CtrlRegistrados {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $paginaActual = filter_var($_GET['page'] ?? '', FILTER_VALIDATE_INT);
        $registroPorPagina = 5;

        if (!$paginaActual || $paginaActual < 1){
            header("Location: /admin/registrados?page=1");
        }

        $paginador = new Paginador($paginaActual, $registroPorPagina, Registro::getNumRegisters());

        $registrados = Registro::paginar($registroPorPagina, $paginador->offset());

        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
            'registrados' => $registrados,
            'paginador' => $paginador, 
        ]);
    }

}