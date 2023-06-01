<?php 
namespace Controller;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
use Validator\ValidadorUsuario;

class CtrlRegistrar {
    public static function registrar(Router $router) {
        $usuario = new Usuario;
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $errors = ValidadorUsuario::validarDatosRegistro($_POST);
            $usuario = new Usuario($_POST);
            
            if (empty($errors)) {
                if ($usuario->existeCorreoRegistrado()){
                    $errors["email"] = "El correo ya ha sido registrado. Por favor ingrese otro.";
                } else {
                    $usuario->hashPassword();
                    $usuario->crearToken();
                    $email = new Email($usuario->getNombre(), $usuario->getEmail(), $usuario->getToken());
                    $email->enviarConfirmacion();
                    
                    if ($usuario->save()) {
                        header("Location: /mensaje");
                    }
                }
            }
        }

        $router->render("auth/crearCuenta", [
            "usuario" => $usuario, 
            "alerts" => $errors,
        ]);
    }

    public static function confirmarCuenta (Router $router){

        $message = [];

        $token = sanitizarHtml($_GET['token']);

        $usuario = Usuario::where($token, "token");

        if (is_null($usuario)){
            $message["informacion"] = "El token es invalido.<br>Por favor verifique su email e intente nuevamente";
            $message["tipo"] = "error";
        } else {
            $usuario->setConfirmado(1);
            $usuario->setToken(null);
            $usuario->update();
            $message["tipo"] = "exito";
            $message["informacion"] = "La cuenta ha sido confirmada correctamente. Inicie Sesión";
        }

        $router->render("auth/confirmarCuenta", [
            'message' => $message,
        ]); 
    } 

    public static function mensaje(Router $router) {
        $router->render("auth/mensaje");
    }
}