<?php 
namespace Controllers;

use Model\Email;
use Model\Usuario;
use MVC\Router;
use Validator\ValidadorUsuario;

class CtrlCuenta {
    public static function crear(Router $router) {

        $usuario = new Usuario(); 
        $errors = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $errors = ValidadorUsuario::validarDatos($_POST);
            $usuario->setNombre($_POST['nombre']);
            $usuario->setEmail($_POST['email']);



            if (empty($errors)) {
                $usuario->setPassword($_POST['password']);
                if ($usuario->existeCorreoRegistrado()) {
                    $errors['email'] ="El correo ya ha sido registrado, por favor ingrese otro";
                } else {
                    $usuario->hashPassword();
                    $usuario->crearToken();

                    $email = new Email($usuario->getEmail(), $usuario->getNombre(), $usuario->getToken());
                    $email->enviarConfirmacion();
                    
                    if ($usuario->save()) {
                        header("Location: /mensaje");
                    }
                }

            }
        }

        $router->render("auth/crear", [
            'titulo' => 'Crea tu cuenta',
            'usuario' => $usuario, 
            'errors' => $errors,
        ]);
    }
    public static function olvide(Router $router) {
        $error = [];
        $message = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $error = ValidadorUsuario::validarEmail($_POST['email']);

            if (empty($error)) {
                $usuario = Usuario::where($_POST['email'], "email");

                if ($usuario && $usuario->getConfirmado()){
                    $usuario->crearToken();
                    $usuario->update();

                    $email = new Email($usuario->getEmail(), $usuario->getNombre(), $usuario->getToken());
                    $email->enviarInstrucciones(); 

                    $message['tipo'] = "exito"; 
                    $message['info'] = "Revisa tu Email";
                } else {
                    $message['tipo'] = "error"; 
                    $message['info'] = "El usuario no existe o no ha confirmado su cuenta";
                }
            }
        }

        $router->render("auth/olvide", [
            'titulo' => 'Olvide mi contraseña', 
            'error' => $error, 
            'message' => $message
        ]);
    }

    public static function restablecer(Router $router) {
        $token = validarTokenORedireccionar();
        $usuario = Usuario::where($token, 'token');
        $errors = [];
        $message = [];

        if (!$usuario) {
            $message['tipo'] = "error";
            $message['info'] = "El token no es valido";
        }

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $password = $_POST['password'];
            $errors = ValidadorUsuario::validarPassword($password, $_POST['password2']);

            if (empty($errors)) {
                $usuario->setPassword($password); 
                $usuario->setToken(null);
                $usuario->hashPassword();
                if ($usuario->update()) {
                    $message['tipo'] = "exito";
                    $message['info'] = "La contraseña ha sido restablecida correctamente";
                }
            }
        }




        $router->render("auth/restablecer", [
            'titulo' => 'Restablecer contraseña', 
            'message' => $message, 
            'errors' => $errors
        ]);
    }
    
    public static function mensaje(Router $router){
        $router->render("auth/mensaje", [
            'titulo' => 'Cuenta creada'
        ]);
        
    }

    public static function confirmar(Router $router){

        $token = validarTokenORedireccionar();
        $message = [];
        $usuario = Usuario::where($token, 'token');

        if (is_null($usuario)){
            $message['tipo'] = "error";
            $message['info'] = "El token no es valido";
        } else {
            $usuario->setToken(null);
            $usuario->setConfirmado(1);
            if ($usuario->update()){
                $message['tipo'] = "exito";
                $message['info'] = "La cuenta ha sido comprobada correctamente";
            }
        }
        
        $router->render("auth/confirmar", [
            'titulo' => 'Confirma tu cuenta', 
            'message' => $message
        ]);
    }
}