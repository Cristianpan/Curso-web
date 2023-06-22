<?php

namespace Controller;

use Model\Ponente;

class CtrlApiPonente {
    public static function index(){
        $response = [
            'ok' => true,
            'body' => []
        ];


        $response['body'] = Ponente::getAll();

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}