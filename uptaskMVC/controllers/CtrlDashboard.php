<?php 
namespace Controllers; 
use MVC\Router;
use Model\Proyecto;
use Model\Usuario;
use Validator\ValidadorLogin;
use Validator\ValidadorProyecto;
use Validator\ValidadorUsuario;

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
        $usuario = Usuario::getById($_SESSION['id']);
        $errors = [];
        $message = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $errors = ValidadorUsuario::validarNombre($_POST['nombre']);
            $errors = array_merge($errors, ValidadorUsuario::validarNombre($_POST['email']));

            if (empty($errors)){
                $usuario->setEmail($_POST['email']);
                $usuario->setNombre($_POST['nombre']);
                $auxUsuario = Usuario::where($usuario->getEmail(), "email");

                if ($auxUsuario && $auxUsuario->getId() !== $_SESSION['id']){
                    $message['tipo'] = "error"; 
                    $message['info'] = "El correo ya ha sido registrado, por favor ingrese otro"; 
                } else if ($usuario->update()) {
                    $_SESSION['nombre'] = $usuario->getNombre();
                    $message['tipo'] = "exito"; 
                    $message['info'] = "Datos actualizados correctamente";
                }
            }
        }

        $router->render("dashboard/perfil", [
            'titulo' => 'Perfil',
            'usuario' => $usuario,
            'errors' => $errors, 
            'message' => $message
        ]);
    }

    public static function cambiarPassword(Router $router){
        session_start();
        ValidadorLogin::isAuth();
        $errors = [];
        $message = [];

        if ($_SERVER['REQUEST_METHOD'] === "POST"){
            $usuario = Usuario::getById($_SESSION['id']); 

            if (ValidadorUsuario::validarPasswordActual($usuario, $_POST['password_actual'])){
                $errors = ValidadorUsuario::validarPassword($_POST['password'], $_POST['password2']);

                if (empty($errors)){
                     $usuario->setPassword($_POST['password']);
                     $usuario->hashPassword();
                     $usuario->update();
                     $message['tipo'] = "exito";
                     $message['info'] = "La contraseña ha sido actualizada";
                }
            } else {
                $message['tipo'] = "error"; 
                $message['info'] = "La contraseña actual no coincide";
            }
        }

        $router->render("dashboard/cambiarPassword", [
            'titulo' => 'Cambiar Contraseña', 
            'errors' => $errors,
            'message' => $message 
        ]);
    }
}
