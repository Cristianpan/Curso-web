<?php

use Model\Propiedad;

    function validarDatos(Propiedad $propiedad, array $imagen): array {
        $errores = []; 
        
        if (!$propiedad->getTitulo()) {
            $errores['titulo'] = "El titulo es obligatorio"; 
        }

        if (!$propiedad->getPrecio()) {
            $errores['precio'] = "El precio es obligatorio"; 
        }

        if (!$propiedad->getDescripcion() || strlen($propiedad->getDescripcion()) < 20) {
            $errores['descripcion'] = "La descripción es obligatoria y debe contener al menos 20 caracteres"; 
        }

        if (!$propiedad->getHabitaciones()) {
            $errores['habitaciones'] = "El número de habitaciones es obligatorio"; 
        }

        if (!$propiedad->getWc()) {
            $errores['wc'] = "El número de baños es obligatorio"; 
        }

        if (!$propiedad->getEstacionamiento()) {
            $errores['estacionamiento'] = "El número de estacionamientos es obligatorio"; 
        }

        if ($propiedad->getVendedorId() === " ") {
            $errores['vendedor'] = "Eliga un vendedor"; 
        }

        if ($imagen['size'] > 2000*1000) { //validar que sea menor a 2mb
            $errores['imagen'] = "El tamaño de la imagen debe de ser menor a 100kb"; 
        }

        
        return $errores; 
    }
    
    function validarImagen(array $datoImagen): array{
        $errores = []; 
        if (!$datoImagen['name'] || $datoImagen['error']){
            $errores['imagen'] = "La imagen es obligatoria"; 
        }

        return $errores; 
    }
