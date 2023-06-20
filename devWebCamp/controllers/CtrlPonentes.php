<?php

namespace Controller;

use Model\Ponente;
use Model\Usuario;
use MVC\Router;
use Util\UtilImage;
use Validator\ValidadorLogin;
use Validator\ValidadorUsuario;

class CtrlPonentes{
    public static function index(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();

        $ponentes = Ponente::getAll();

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
            'ponentes' => $ponentes,
        ]);
    }

    public static function crear(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();
        $errors = [];

        $ponente = new Ponente();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $imagen = $_FILES['imagen']['tmp_name'];

            if ($imagen) {
                $_POST['imagen'] = md5(uniqid(rand(), true));
            } else {
                $_POST['imagen'] = '';
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente = new Ponente($_POST);
            
            $errors = ValidadorUsuario::validarDatosPonente($_POST);
            
            if (empty($errors)) {
                if ($ponente->save()) {
                    UtilImage::crearCarpeta(CARPETA_IMAGENES . "speakers/");
                    UtilImage::guardarImagen($imagen, $ponente->getImagen(), CARPETA_IMAGENES . "speakers/");
                    header('Location: /admin/ponentes');
                }
            } else {
                $ponente->setImagen('');
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'ponente' => $ponente,
            'errors' => $errors,
            'redes' => json_decode($ponente->getRedes())
        ]);
    }


    public static function editar(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();

        $id = validarTokenORedireccionar('id', "/admin/ponentes");

        $ponente = Ponente::getById($id); 
        $errors = [];

        if (!$ponente){
            header("Location: /admin/ponentes");
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $imagenActual = $ponente->getImagen();
            $imagen = $_FILES['imagen']['tmp_name'];

            if ($imagen){
                $_POST['imagen'] = md5(uniqid(rand(), true)); 
            } else {
                $_POST['imagen'] = $imagenActual;
            }

            $_POST['redes'] = json_encode($_POST['redes'], JSON_UNESCAPED_SLASHES);
            $ponente = new Ponente($_POST);

            $errors = ValidadorUsuario::validarDatosPonente($_POST);

            if (empty($errors)){
                $ponente->setId($id);

                if ($ponente->update() && $imagen){
                    UtilImage::eliminarImagen(CARPETA_IMAGENES . "speakers/" . $imagenActual);
                    UtilImage::guardarImagen($imagen, $ponente->getImagen(), CARPETA_IMAGENES . "speakers/"); 
                }

                header("Location: /admin/ponentes");
            }
        }

        $router->render("admin/ponentes/editar", [
            'titulo' => 'Editar Ponente',
            'ponente' => $ponente,
            'errors' => $errors,
            'redes' => json_decode($ponente->getRedes()),
        ]);
    }

    public static function eliminar(){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = filter_var($_POST['id'], FILTER_VALIDATE_INT); 
            if (!$id){
                header("Location: /admin/ponentes"); 
            } 

            $ponente = Ponente::getById($id); 
            if ($ponente->delete()) {
                UtilImage::eliminarImagen(CARPETA_IMAGENES . "speakers/" . $ponente->getImagen());
                header("Location: /admin/ponentes");
            }
        }
    }
}
