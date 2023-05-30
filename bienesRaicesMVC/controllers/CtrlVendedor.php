<?php 
namespace Controller;
require '../includes/validators/ValidadorVendedor.php';
require '../includes/validators/ValidadorLogin.php';
use MVC\Router;
use Model\Vendedor;


class CtrlVendedor {
    public static function crear(Router $router) {
        isAuth();
        $vendedor = new Vendedor;  
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor = new Vendedor($_POST);
            $errores = validarDatos($vendedor);    

            if (empty($errores)) {
                
                if ($vendedor->save()) {
                    header('Location: /admin?resultado=1');
                }
            } 
        }

        $router->render("vendedores/crear", [
            'vendedor' => $vendedor, 
            'errores' => $errores,
        ]);  
    }
    
    public static function actualizar(Router $router) {
        isAuth();
        $id = validarORedireccionar("/admin");
        
        $vendedor = Vendedor::getById($id);
        $errores = [];
        if (is_null($vendedor)) {
            header('Location: /admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $vendedor = new Vendedor($_POST);
            $vendedor->setId($id);
            $errores = validarDatos($vendedor);    

            printObjetc($vendedor);

            if (empty($errores)) {
                $vendedor->update();
                header('Location: /admin?resultado=2');
            } 
        }
        
        $router->render("vendedores/actualizar", [
            'vendedor' => $vendedor, 
            'errores' => $errores
        ]);
    }
    
    public static function eliminar() {
        isAuth();
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo'];
            
            if (validarTipoContenido($tipo)) {
                $vendedor = Vendedor::getById($id);
              if ($vendedor->delete()) {
                header('Location: /admin?resultado=3');
              }
            }
        }
        
    }
}