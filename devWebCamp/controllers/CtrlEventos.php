<?php
namespace Controller;

use Model\Categoria;
use Model\Ponente;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use MVC\Router;
use Validator\ValidadorEvento;
use Validator\ValidadorLogin;
use Classes\Paginador;


class CtrlEventos {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();
        $paginaActual = filter_var($_GET['page'] ?? '', FILTER_VALIDATE_INT);
        $registroPorPagina = 5;

        if (!$paginaActual || $paginaActual < 1){
            header("Location: /admin/eventos?page=1");
        }

        $paginador = new Paginador($paginaActual, $registroPorPagina, Evento::getNumRegisters());


        $eventos = Evento::paginar($registroPorPagina, $paginador->offset()); 

        foreach($eventos as $evento){
            $categoria = Categoria::getById($evento->getCategoriaId());
            $hora = Hora::getById($evento->getHoraId());
            $ponente = Ponente::getById($evento->getPonenteId());
            $dia = Dia::getById($evento->getDiaId());
            $evento->setCategoriaId($categoria->getNombre());
            $evento->setPonenteId($ponente->getNombre() . " " . $ponente->getApellido());
            $evento->setHoraId($hora->getHora());
            $evento->setDiaId($dia->getNombre());
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Conferencias y Workshops', 
            'eventos' => $eventos, 
            'paginador' => $paginador
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

    public static function editar(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();

        $id = validarTokenORedireccionar('id', "/admin/eventos");

        $evento = Evento::getById($id); 
        $errors = [];

        if (!$evento){
            header("Location: /admin/eventos");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $evento = new Evento($_POST);

            $errors = ValidadorEvento::validarDatos($evento);

            if (empty($errors)){
                $evento->setId($id);

                if ($evento->update() ){ 
                    header("Location: /admin/eventos");
                }

            }
        }

        $router->render("admin/eventos/editar", [
            'titulo' => 'Editar Evento',
            'evento' => $evento,
            'errors' => $errors,
            'categorias' => Categoria::getAll(),
            'dias' => Dia::getAll(),
            'horas' => Hora::getAll(),
        ]);
    }

    public static function eliminar(){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT); 
            
            if (!$id){
                header("Location: /admin/eventos"); 
            } 

            $evento = Evento::getById($id); 
            if ($evento->delete()) {
                header("Location: /admin/eventos");
            }
        }
    }
}