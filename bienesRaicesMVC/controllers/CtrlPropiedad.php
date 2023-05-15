<?php
namespace Controller;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class CtrlPropiedad {
    private $carpetaImagen = "../imagenes";

    public static function index (Router $router) {
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        $router->render("propiedades/admin", [
            'propiedades' => $propiedades, 
            'vendedores' => $vendedores
        ]);        
    }

    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedores = Vendedor::getAll();
        $errores = [];
        
        $router->render('propiedades/crear', [
            'propiedad' => $propiedad, 
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    
    public static function actualizar(){
        echo "actualizar";     
    }
}