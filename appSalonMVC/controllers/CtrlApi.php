<?php 
    namespace Controller;
    use Model\Servicio;


    class CtrlApi {
        public static function index () {
            $servicios = Servicio::getAll(); 
            header('Content-Type: application/json');
            echo json_encode($servicios, JSON_UNESCAPED_UNICODE);

        }
    }