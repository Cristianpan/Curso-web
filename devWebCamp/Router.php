<?php 
namespace MVC;
class Router {

    private $rutasGET = [];
    private $rutasPOST = [];

    public function get($url, $fn) {
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->rutasPOST[$url] = $fn; 
    }

    public function comprobarRutas(){
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else if ($metodo === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }


        if ($fn) {
            call_user_func($fn, $this);
        } else {
            header("Location: /404");
        }
    }
    //Muestra una vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $contenido = ob_get_clean();

        if (str_contains($urlActual, '/admin')){
            include __DIR__ . '/views/adminLayout.php';
        } else {
            include __DIR__ . "/views/layout.php";
        }


    }
}