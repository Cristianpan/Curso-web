<?php 
    namespace Validator; 
    class ValidadorUsuario {
        public static function validarDatosRegistro($datos){
            $alerts = [];

            foreach($datos as $key => $value) {
                if (!$value) {
                    $alerts[$key] = "El campo $key es obligatorio";
                }

                if ($key === 'telefono' && strlen($value) !== 0) {
                    if (!preg_match("/[0-9]{10}/", $value)) {
                        $alerts[$key] = "El número de telefono debe de tener 10 digitos enteros"; 
                    }
                } 

                if ($key === 'email' && strlen($value) !== 0){
                    if (!preg_match("/\w+@[a-z]+.com/", $value)){
                        $alerts[$key] = "Verifique que el correo sea valido";
                    }
                }

                if ($key === 'password' && strlen($value) < 6 && strlen($value) !== 0){
                    $alerts[$key] = "La contraseña debe de tener al menos 6 caracteres";
                }
            }

            return $alerts; 
        }
    }