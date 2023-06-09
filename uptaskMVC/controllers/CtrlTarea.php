<?php 
namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class CtrlTarea{
    public static function index(){

    }
    public static function crearTarea(){
        $response = [
            'ok' => true,
            'message' => "La tarea ha sido agregada exitosamente"
        ];

       $dataTask = get_object_vars(json_decode(file_get_contents('php://input')));
        session_start();        
        $tarea = new Tarea($dataTask);

        $proyecto = Proyecto::where($tarea->getProyectoId(), 'id');

        if (!$proyecto || $proyecto->getUsuarioId() !== $_SESSION['id']){
            $response['ok'] = false;
            $response['message'] = "Ha ocurrido un error al agregar la tarea";
        } else {
            $tarea->save();
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public static function actualizarTarea(){

    }

    public static function eliminarTarea(){

    }
}