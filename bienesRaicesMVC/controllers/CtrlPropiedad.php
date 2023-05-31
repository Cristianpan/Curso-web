<?php
namespace Controller;
require '../includes/validators/ValidadorPropiedad.php';
require '../includes/validators/ValidadorLogin.php';
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class CtrlPropiedad {

    public static function index (Router $router) {
        isAuth();
        
        $propiedades = Propiedad::getAll();
        $vendedores = Vendedor::getAll();
        $router->render("propiedades/admin", [
            'propiedades' => $propiedades, 
            'vendedores' => $vendedores
        ]);        
    }
    
    public static function crear(Router $router){
        isAuth();
        
        $propiedad = new Propiedad;
        $vendedores = Vendedor::getAll();
        $errores = [];
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST);
            $imagenPropiedad = $_FILES['imagen'];
        
            $errores = validarDatos($propiedad, $imagenPropiedad);
            $errores = array_merge($errores, validarImagen($imagenPropiedad));
            
        
            if (empty($errores)) {
                $propiedad->setImagen(generarIdentificadorArchivo(".jpg"));
                
                if ($propiedad->save()) {
                    crearCarpeta(CARPETA_IMAGENES);
                    $imagen = Image::make($imagenPropiedad['tmp_name'])->fit(800,600);
                    $imagen->save(CARPETA_IMAGENES . $propiedad->getImagen());
                    header('Location: /admin?resultado=1');
                }
            }
        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad, 
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }
    
    public static function actualizar(Router $router){
        isAuth();
        $id = validarORedireccionar("/admin"); 
        $propiedad = Propiedad::getById($id);
        $errores = [];
        $vendedores = Vendedor::getAll();
        $nombreImagen = $propiedad->getImagen();

        if (is_null($propiedad)) {
            header('Location: /admin');
        }
        $errores = []; 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $propiedad = new Propiedad($_POST);
            $propiedad->setId($id);
            $imagenPropiedad = $_FILES['imagen'];
            
            $errores = validarDatos($propiedad, $imagenPropiedad);    
            if ($imagenPropiedad['name']) {
                $propiedad->setImagen(generarIdentificadorArchivo(".jpg"));
            } else {
                $propiedad->setImagen($nombreImagen);
            }
            
            if (empty($errores)) {
                //insertar en la base de datos  
                if ($propiedad->update() && $imagenPropiedad['name']) {
                    eliminarArchivo(CARPETA_IMAGENES . $nombreImagen);
                    $imagen = Image::make($imagenPropiedad['tmp_name'])->fit(800,600);
                    $imagen->save(CARPETA_IMAGENES .$propiedad->getImagen());
                }
                //redireccionar al usuario
                header('Location: /admin?resultado=2'); 
            }
        }
        
        $router->render('propiedades/actualizar', [
            'propiedad' => $propiedad, 
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar() {
        isAuth();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo'];
          
            if (validarTipoContenido($tipo)) {
                $propiedad = Propiedad::getById($id);
              if ($propiedad->delete()) {
                  eliminarArchivo(CARPETA_IMAGENES . $propiedad->getImagen());
                header('Location: /admin?resultado=3');
              }
            }
          }
    }
}