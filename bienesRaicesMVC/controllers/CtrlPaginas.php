<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad;

class CtrlPaginas {
    public static function index (Router $router){
        $router->render("/paginas/index", [
        'propiedades' => Propiedad::getLimit(3), 
        'inicio' => true,
    ]);
    }
    public static function nosotros (Router $router){
        $router->render("/paginas/nosotros");        
    }
    public static function propiedades (Router $router){
        $router->render("/paginas/propiedades", [
            'propiedades' => Propiedad::getAll(),
        ]);
    }
    public static function propiedad (Router $router){
        $id = validarORedireccionar("/propiedades");
        $router->render("/paginas/propiedad", [
            'propiedad' => Propiedad::getById($id),
        ]);
        
    }
    public static function blog (Router $router){
        $router->render("/paginas/blog");
        
        
    }
    public static function entrada (Router $router){
        $router->render("/paginas/entrada");
    }
    public static function contacto (Router $router){
        $router->render("/paginas/contacto");
      
    }
}
