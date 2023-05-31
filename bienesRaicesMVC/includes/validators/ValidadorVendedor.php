<?php 
    use Model\Vendedor;
    function validarDatos(Vendedor $vendedor): Array{
        $errores = [];

        if (!$vendedor->getNombre()) {
            $errores['nombre'] = "El nombre del vendedor es obligatorio";
        }
        if (!$vendedor->getApellido()) {
            $errores['apellido'] = "El apellido del vendedor es obligatorio";
        }
        if (!$vendedor->getTelefono()) {
            $errores['telefono'] = "El telefono del vendedor es obligatorio";
        }
        if (!preg_match('/[0-9]{10}/', $vendedor->getTelefono())){
            $errores['telefono'] = "El telefono debe de tener un formato de 10 números enteros";
        }
    
        return $errores;
    }