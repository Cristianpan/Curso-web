<?php 
    function validarDatos(array $datos): array {
        $errores = []; 
        
        if (!$datos['titulo']) {
            $errores['titulo'] = "El titulo es obligatorio"; 
        }

        if (!$datos['precio']) {
            $errores['precio'] = "El precio es obligatorio"; 
        }

        if (!$datos['descripcion'] || strlen($datos['descripcion']) < 20) {
            $errores['descripcion'] = "La descripción es obligatoria y debe contener al menos 20 caracteres"; 
        }

        if (!$datos['habitaciones']) {
            $errores['habitaciones'] = "El número de habitaciones es obligatorio"; 
        }

        if (!$datos['wc']) {
            $errores['wc'] = "El número de baños es obligatorio"; 
        }

        if (!$datos['estacionamiento']) {
            $errores['estacionamiento'] = "El número de estacionamientos es obligatorio"; 
        }

        if ($datos['vendedor'] === " ") {
            $errores['vendedor'] = "Eliga un vendedor"; 
        }

        if (!$datos['imagen']['name'] || $datos['imagen']['error']){
            $errores['imagen'] = "La imagen es obligatoria"; 
        } else if ($datos['imagen']['size'] > 2000*1000) { //validar que sea menor a 2mb
            $errores['imagen'] = "El tamaño de la imagen debe de ser menor a 100kb"; 
        }

        return $errores; 
    }
