<?php 
    namespace Validator; 
    class ValidadorUsuario {
        public static function validarDatosRegistro(array $datos): array{
            $errors = [];

            foreach($datos as $key => $value) {
                if (!$value) {
                    $errors[$key] = "El campo $key es obligatorio";
                }

                if ($key === 'telefono') {
                    $errors[$key] = static::validarTelefono($value)[$key] ; 
                    
                } 

                if ($key === 'email'){
                    $errors[$key] = static::validarEmail($value)[$key] ; 
                }

                if ($key === 'password'){
                    $errors[$key] = static::validarPassword($value)[$key] ; 
                } 
            }

            return $errors; 
        }

        public static function validarEmail(string $email): array{
            $error = [];
    
            if (!$email){
                $error['email'] = "El email es obligatorio";
            } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Verifique que el email tenga un formato valido";
            }
    
            return $error;
        }

        public static function validarTelefono (string $telefono): array{
            $error = []; 

            if (!$telefono){
                $error['telefono'] = "El campo telefono es obligatorio";
            } else if (!preg_match("/[0-9]{10}/", $telefono)) {
                $errors[$telefono] = "El número de telefono debe de tener 10 digitos enteros"; 
            }

            return $error; 
        }

        public static function validarPassword(string $password): array{
            $error = [];

            if (!$password) {
                $error['password'] = "La contraseña es obligatoria";
            } else if (strlen($password) < 6) {
                $error['password'] = "La contraseña debe de tener al menos 6 caracteres";
            }

            return $error; 
        }
    }