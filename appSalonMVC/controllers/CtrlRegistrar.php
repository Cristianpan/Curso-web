<?php 
namespace Controller;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
use Validator\ValidadorUsuario;

class CtrlRegistrar {
    public static function registrar(Router $router) {
        $usuario = new Usuario;
        $alerts = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $alerts = ValidadorUsuario::validarDatosRegistro($_POST);
            $usuario = new Usuario($_POST);

            if (empty($alerts)) {
                if ($usuario->existeCorreoRegistrado()){
                    $alerts["email"] = "El correo ya ha sido registrado. Por favor ingrese otro.";
                } else {
                    $usuario->hashPassword();
                    $usuario->crearToken();
                    $email = new Email($usuario->getNombre(), $usuario->getEmail(), $usuario->getToken());
                    $email->enviarConfirmacion();
                    
                    if ($usuario->save()) {
                        header("Location: /");
                    }
                }
            }
        }

        $router->render("auth/crearCuenta", [
            "usuario" => $usuario, 
            "alerts" => $alerts,
        ]);
    }

    public static function confirmarCuenta (){
        echo "Confirmando cuenta...";
    } 
}