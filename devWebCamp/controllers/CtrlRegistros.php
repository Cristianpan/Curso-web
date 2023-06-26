<?php

namespace Controller;

use Model\Registro;
use MVC\Router;
use Model\Evento;
use Model\EventoRegistro;
use Model\Regalo;
use Validator\ValidadorLogin;

class CtrlRegistros
{
    public static function crear(Router $router)
    {
        session_start();
        ValidadorLogin::isAuth();

        $registro = Registro::where($_SESSION['id'], 'usuarioId');

        if ($registro) {
            header('Location: /boleto?id=' . urlencode($registro->getToken()));
        }

        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro',
        ]);
    }

    public static function gratis()
    {
        session_start();
        ValidadorLogin::isAuth();

        $datos = [
            'paqueteId' => 3,
            'pagoId' => '',
            'token' => substr(md5(uniqid(rand(), true)), 0, 8),
            'usuarioId' => $_SESSION['id']
        ];

        $registro = new Registro($datos);

        if ($registro->save()) {
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
            header('Location: /finalizarRegistro');
        }

        if (is_null($registro->getRegaloId()) && $registro->getPaqueteId()->getId() === 1){
            header('Location: /finalizarRegistro/conferencias');
        }

        $router->render('registro/boleto', [
            'titulo' => 'Asistencia a DevWebCamp',
            'registro' => $registro
        ]);
    }

    public static function pagar()
    {
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
            if (!$registro->save()) {
                $response['ok'] = false;
            }
        } catch (\Throwable $th) {
            $response['ok'] = false;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public static function conferencias(Router $router)
    {
        session_start();
        ValidadorLogin::isAuth();

        //Validar que el usuario tenga el plan presencial 

        $registro = Registro::where($_SESSION['id'], 'usuarioId');

        if (!$registro->getPaqueteId()->getId() !== 1) {
            header('Location: /finalizarRegistro');
        }
        
        if (!is_null($registro->getRegaloId())){
            header('Location: /boleto?id='.$registro->getToken());

        }

        $conferenciasViernes = Evento::getEventoByCategoriaYDia(1, 1);
        $conferenciasSabado = Evento::getEventoByCategoriaYDia(1, 2);
        $workshopsSabado = Evento::getEventoByCategoriaYDia(2, 2);
        $workshopsViernes = Evento::getEventoByCategoriaYDia(1, 2);
        $regalos = Regalo::getAll();

        $router->render('registro/conferencias', [
            'titulo' => 'Elige Workshops y Conferencias',
            'conferenciasViernes' => $conferenciasViernes,
            'conferenciasSabado' => $conferenciasSabado,
            'workshopsViernes' => $workshopsViernes,
            'workshopsSabado' => $workshopsSabado,
            'regalos' => $regalos,

        ]);
    }

    public static function guardarConferencias()
    {
        session_start();
        ValidadorLogin::isAuth();
        $response = [
            'ok' => true,
            'message' => 'Tu elección ha sido registrada exitosamente. Te esperamos en DevWebCamp', 
            'token' => '',
        ];
        $datos = json_decode(file_get_contents('php://input'), true);
        $registro = Registro::where($_SESSION['id'], 'usuarioId');

        if (empty($datos['eventosId']) || !$datos['regaloId']) {
            $response['ok'] = false;
            $response['message'] = 'Selecciona al menos un evento y un regalo e intente de nuevo';
        } else if (!isset($registro) || $registro->getPaqueteId()->getId() !== 1) {
            $response['ok'] = false;
            $response['message'] = 'Realice la compra del paquete presencial para completar el registro.';
        }

        $eventos = [];
        foreach ($datos['eventosId'] as $eventoId) {
            $evento = Evento::getById($eventoId);

            if (!isset($evento) || $evento->getDisponibles() === 0) {
                $response['ok'] = false;
                $response['message'] = "El evento " . $evento->getNombre() . " ya no cuenta con lugares disponibles. Por favor seleccione otro e intente de nuevo";
            } else {
                $eventos[] = $evento;
            }
        }
        if ($response['ok']) {
            foreach ($eventos as $evento) {
                $evento->setDisponibles($evento->getDisponibles() - 1);
                $evento->update();

                //almacenar el registro
                $datosRegistro = [
                    'eventoId' => (int) $evento->getId(),
                    'registroId' => (int) $registro->getId(),
                ];

                $registroUsuario = new EventoRegistro($datosRegistro);
                $registroUsuario->save();
            }
            $registro->setRegaloId($datos['regaloId']);
            $registro->setPaqueteId($registro->getPaqueteId()->getId());
            $registro->setUsuarioId($registro->getUsuarioId()->getId());

            try {
                //code...
                if ($registro->update()){
                    $response['token'] = $registro->getToken();
                } else {
                    $response['ok'] = false; 
                    $response['message'] = 'Al ha salido mal. Por favor intente nuevamente.'; 
                }
            } catch (\Throwable $th) {
                //throw $th;

                var_dump($th);
            }

        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}
