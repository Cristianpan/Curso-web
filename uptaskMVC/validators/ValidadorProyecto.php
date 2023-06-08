<?php 
namespace Validator; 

class ValidadorProyecto {
    public static function validarProyecto($proyecto){
        $error = [];
        if (!$proyecto) {
            $error['proyecto'] = "El nombre del proyecto es obligatorio";
        }

        return $error; 
    }
}