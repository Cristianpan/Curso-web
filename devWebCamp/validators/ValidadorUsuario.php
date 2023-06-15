<?php 
    namespace Validator; 
    class ValidadorUsuario {
        public static function validarDatos ($datos) {
            $errors = [];
            $errors = array_merge($errors, static::validarNombreYApellido($datos['nombre'], $datos['apellido'])); 
            $errors = array_merge($errors, static::validarEmail($datos['email'])); 
            $errors = array_merge($errors, static::validarPassword($datos['password'], $datos['password2'])); 
    
            return $errors; 
        }
    
        public static function validarNombreYApellido($nombre, $apellido){
            $error = [];
    
            if (!$nombre) {
                $error['nombre'] = "El nombre de usuario es obligatorio";
            } else if (!$apellido){
                $error['apellido'] = "El apellido del usuario es obligatorio";
            }
    
            return $error; 
        }
    
        public static function validarEmail($email){
            $error = [];
    
            if (!$email){
                $error['email'] = "El email es obligatorio";
            } else  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Verifique que el email tenga un formato valido";
            }
    
            return $error;
        }
    
        public static function validarPassword($password, $password2){
            $error = [];
    
            if (!$password) {
                $error['password'] = "La contraseña es obligatoria";
            } else if (strlen($password) < 6) {
                $error['password'] = "La contraseña debe contener al menos 6 caracteres";
            } else if ($password !== $password2) {
                $error['password'] = "Verifique que las contraseñas coincidan";
            }
    
            return $error;
        }
    }