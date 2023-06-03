<?php 
    namespace Controller;

use Model\Cita;
use Model\CitaServicio;
use Model\Servicio;


    class CtrlApi {
        public static function index () {
            $servicios = Servicio::getAll(); 
            header('Content-Type: application/json');
            echo json_encode($servicios, JSON_UNESCAPED_UNICODE);
        }

        public static function reservarCita(){
            $respuesta = [
                'ok' => true
            ];
            //obtiene el json enviado a traves del POST y lo convierte a un arreglo asociativo
            $datos = get_object_vars(json_decode(file_get_contents('php://input'))); 
            $cita = new Cita($datos);
            if ($cita->save()){
                foreach($datos['servicios'] as $servicioId) {
                    $args = [
                        'citaId' => $cita->getId(),
                        'servicioId' => $servicioId
                    ];
    
                    $citaServicio = new CitaServicio ($args);
                    $citaServicio->save();
                }
            } else {
                $respuesta['ok'] = false; 
            }

            header('Content-Type: application/json');
            echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
        }
    }