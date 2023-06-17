<?php

namespace Controller;

use Model\Ponente;
use MVC\Router;
use Util\UtilImage;
use Validator\ValidadorLogin;
use Validator\ValidadorUsuario;

class CtrlPonentes
{
    public static function index(Router $router)
    {
        session_start();
        ValidadorLogin::isAuth();
        ValidadorLogin::isAdmin();

        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes / Conferencistas',
        ]);
    }
    public static function crear(Router $router)
    {
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
                    UtilImage::crearCarpeta(CARPETA_IMAGENES);
                    UtilImage::guardarImagen($imagen, $ponente->getImagen());
                    header('Location: /admin/ponentes');
                }
            }
        }

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'ponente' => $ponente,
            'errors' => $errors,
        ]);
    }
}
