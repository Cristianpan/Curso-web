<?php 
namespace Controller;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
use Validator\ValidadorUsuario;

class CtrlCuenta {
    public static function registrar(Router $router) {
        $usuario = new Usuario;
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $errors = ValidadorUsuario::validarDatos($_POST);
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

        $router->render("cuenta/crear", [
            "titulo" => 'Crea tu cuenta en DevWebCamp',
            "usuario" => $usuario, 
            "errors" => $errors,
        ]);
    }

    public static function confirmarCuenta (Router $router){
        $message = [];
        $token = validarTokenORedireccionar('token', '/login');

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

        $router->render("cuenta/confirmar", [
            'titulo' => 'Confirmar tu Cuenta DevWebCamp',
            'message' => $message,
        ]); 
    }
    
    public static function olvide(Router $router) {
        $alerts = [];
        $message = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];

            $alerts = ValidadorUsuario::validarEmail($email);

            if (empty($alerts)){
                $usuario = Usuario::where($email, 'email');

                if ($usuario && $usuario->getConfirmado()){
                    $usuario->crearToken();
                    $usuario->update();

                    $email = new Email($usuario->getEmail(), $usuario->getNombre(), $usuario->getToken());
                    $email->enviarInstrucciones();


                    $message['tipo'] = "exito"; 
                    $message['informacion'] = "Revisa tu Email";
                } else {
                    $message['tipo'] = "error"; 
                    $message['informacion'] = "El usuario no existe o no ha confirmado su cuenta";
                }
            }
        }

        $router->render("cuenta/olvidePassword", [
            "titulo" => 'Olvide mi Contraseña',
            "alerts" => $alerts, 
            "message" => $message,
        ]); 
    }

    public static function restablecer(Router $router){
        $message = [];
        $errors = [];
        $token = sanitizarHtml($_GET['token'] ?? '');

        $usuario = Usuario::where($token, "token");

        if (is_null($usuario)) {
            $message['tipo'] = "error";
            $message['informacion'] = "El token es invalido";
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $errors = ValidadorUsuario::validarPassword($_POST['password'], $_POST['password2']);

            if (empty($errors)) {
                $usuario->setPassword($_POST['password']); 
                $usuario->setToken(null);
                $usuario->hashPassword();
                if ($usuario->update()) {
                    header("Location: /login");
                }
            }
        }

        $router->render("cuenta/restablecer", [
            'titulo' => 'Restablecer contraseña',
            'message' => $message,
            'errors' => $errors,
        ]);
        
    }

    public static function mensaje(Router $router) {
        $router->render("cuenta/mensaje", [
            'titulo' => 'Cuenta Creada Exitosamente'
        ]);
    }
}