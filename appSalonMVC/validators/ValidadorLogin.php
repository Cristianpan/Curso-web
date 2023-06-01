<?php 
    namespace Validator;

    class ValidadorLogin {
        public static function validarDatos($email, $password) {
            $alerts = [];
            if (!$email) {
                $alerts['email'] = "El email es obligatorio";
            } 

            if (!$password) {
                $alerts['password'] = "La contraseña es obligatoria";
            }

            return $alerts;
        }

        public static function isLogin($usuario, $password){
            $alerts = [];
            if (is_null($usuario)) {
                $alerts["usuario"] = "No existe algún usuario con el correo ingresado";
            } else if (!$usuario->getConfirmado()) {
                $alerts["usuario"] = "Por favor verifique compruebe su cuenta e intente nuevamente";
            } else if (!password_verify($password, $usuario->getPassword())){
                $alerts['usuario'] = "La contraseña es incorrecta"; 
            }

            return $alerts; 
        }
    }