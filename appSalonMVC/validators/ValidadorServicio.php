<?php 
namespace Validator; 

class ValidatorServicio {
    public static function validarDatosServicio($datos){
        $alerts = [];
        foreach($datos as $key => $value) {
            if (!$value) {
                $alerts[$key] = "El campo $key es obligatorio";
            } else if ($key === "precio" && !is_numeric($value)) {
                $alerts[$key] = "El precio no es valido. Por favor ingrese un valor númerico"; 
            }
        }

        return $alerts; 
    }
}