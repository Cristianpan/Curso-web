<?php 

namespace Controller;

use Model\Registro;
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlRegistros {
    public static function crear(Router $router){
        session_start();
        ValidadorLogin::isAuth();

        $registro = Registro::where($_SESSION['id'], 'usuarioId');

       if ($registro){
            header('Location: /boleto?id=' . urlencode($registro->getToken()));
        } 

        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro',
        ]);
    }

    public static function gratis(){
        session_start();
        ValidadorLogin::isAuth();

        $datos = [
            'paqueteId' => 3, 
            'pagoId' => '', 
            'token' => substr(md5(uniqid(rand(), true)), 0, 8), 
            'usuarioId' => $_SESSION['id']
        ];

        $registro = new Registro($datos);

        if ($registro->save()){
            header('Location: /boleto?id=' . urlencode($registro->getToken()));
        }
    }

    public static function boleto(Router $router){
        session_start(); 
        ValidadorLogin::isAuth();

        $id = $_GET['id']; 

        if (!$id || strlen($id) !== 8) {
            header('Location: /finalizarRegistro');
        }

        $registro = Registro::where($id, 'token');

        if (!$registro) {
            header('Location: /');
        }

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp', 
            'registro' => $registro
        ]);
    }

    public static function pagar(){
        session_start();
        $response = [
            'ok' => true,
        ];
        $datos = json_decode(file_get_contents('php://input'), true);

        $datos = [
            'paqueteId' => $datos['paqueteId'], 
            'pagoId' => $datos['pagoId'], 
            'token' => substr(md5(uniqid(rand(), true)), 0, 8), 
            'usuarioId' => $_SESSION['id']
        ];

        $registro = new Registro($datos);

        try {
            if (!$registro->save()){
                $response['ok'] = false; 
            }
        } catch (\Throwable $th) {
            $response['ok'] = false; 
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}