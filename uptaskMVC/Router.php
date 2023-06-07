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
        $urlActual = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
        $metodo = $_SERVER['REQUEST_METHOD'];

        if ($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else if ($metodo === 'POST') {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }


        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }
    //Muestra una vista
    public function render($view, $datos = []){
        foreach($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/$view.php";
        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}