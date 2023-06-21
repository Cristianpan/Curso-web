<?php 

namespace Controller;

use Model\Evento;

class CtrlApiEvento {
    public static function index(){
        $response = [
            'ok' => true,
            'body' => []
        ];

        $diaId = filter_var($_GET['dia'] ?? '', FILTER_VALIDATE_INT);
        $categoriaId = filter_var($_GET['categoria'] ?? '', FILTER_VALIDATE_INT);

        if ($diaId && $categoriaId){
            $response['body'] = Evento::getByCategoriaYDia($categoriaId, $diaId);
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}