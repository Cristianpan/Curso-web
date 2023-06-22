<?php
namespace Controller;

use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;
use Validator\ValidadorEvento;
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


    public static function crear(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();
        $errors = []; 
        $evento = new Evento;

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $evento = new Evento($_POST);
            
            $errors = ValidadorEvento::validarDatos($evento);

            if (empty($errors)){
                if ($evento->save()){
                    header('Location: /admin/eventos');
                }
            }
        }

        $router->render("/admin/eventos/crear", [
            'titulo' => 'Registrar Evento', 
            'errors' => $errors, 
            'categorias' => Categoria::getAll(),
            'dias' => Dia::getAll(),
            'horas' => Hora::getAll(), 
            'evento' => $evento
        ]);
    }
}