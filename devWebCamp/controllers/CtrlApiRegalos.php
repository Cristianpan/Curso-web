<?php 

namespace Controller;
use Model\Regalo;
use Model\Registro;
use Validator\ValidadorLogin;

class CtrlApiRegalos {
    public static function index (){
        

        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        $response = [
            'ok' => true, 
            'body' => [], 
        ];

        $regalos = Regalo::getAll();

        foreach($regalos as $regalo){
            $total = Registro::countByRegaloId($regalo->getId());

            $response['body'][]= [
                'id' => $regalo->getId(), 
                'nombre' => $regalo->getNombre(), 
                'total' => $total
            ];
        }




        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }
}