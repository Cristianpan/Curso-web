<?php 

namespace Validator; 
use Model\Evento;

class ValidadorEvento {
    public static function validarDatos($evento){
        $errors = [];

        if(!$evento->getNombre()) {
            $errors['nombre'] = 'El Nombre es Obligatorio';
        }
        if(!$evento->getDescripcion()) {
            $errors['descripcion'] = 'La descripción es Obligatoria';
        }
        if(!$evento->getCategoriaId()  || !filter_var($evento->getCategoriaId(), FILTER_VALIDATE_INT)) {
            $errors['categoria'] = 'Elige una Categoría';
        }
        if(!$evento->getDiaId()  || !filter_var($evento->getDiaId(), FILTER_VALIDATE_INT)) {
            $errors['dia'] = 'Elige el Día del evento';
        }
        if(!$evento->getHoraId()  || !filter_var($evento->getHoraId(), FILTER_VALIDATE_INT)) {
            $errors['hora'] = 'Elige la hora del evento';
        }
        if(!$evento->getDisponibles()  || !filter_var($evento->getDisponibles(), FILTER_VALIDATE_INT)) {
            $errors['disponibles'] = 'Añade una cantidad de Lugares Disponibles';
        }
        if(!$evento->getPonenteId() || !filter_var($evento->getPonenteId(), FILTER_VALIDATE_INT) ) {
            $errors['ponentes'] = 'Selecciona la persona encargada del evento';
        }

        return $errors; 
    }
}