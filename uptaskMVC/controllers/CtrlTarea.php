<?php 
namespace Controllers;

use Model\Proyecto;
use Model\Tarea;

class CtrlTarea{
    public static function index(){
        $proyectoId = sanitizarHtml($_GET['id']); 
        $response = [
            'ok' => true,
            'body' => []
        ];

        if ($proyectoId){
            session_start();
            $proyecto = Proyecto::where($proyectoId, 'url'); 
            if ($proyecto && $proyecto->getUsuarioId() === $_SESSION['id']) {
                $response['body'] = Tarea::getByProyectId($proyecto->getId());
            }
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public static function crearTarea(){
        $response = [
            'ok' => true,
            'message' => "La tarea ha sido agregada exitosamente", 
            'body' => null,
        ];

       $dataTask = get_object_vars(json_decode(file_get_contents('php://input')));
        session_start();        
        $tarea = new Tarea($dataTask);
        $proyecto = Proyecto::where($tarea->getProyectoId(), 'url');

        if (!$proyecto || $proyecto->getUsuarioId() !== $_SESSION['id']){
            $response['ok'] = false;
            $response['message'] = "Ha ocurrido un error al agregar la tarea";
        } else {
            $tarea->setProyectoId($proyecto->getId());
            $tarea->save();
            $response['body'] = $tarea;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }

    public static function actualizarTarea(){
        $response = [
            'ok' => true,
            'message' => "La tarea ha sido actualizada correctamente", 
            'body' => null,
        ];

        $dataTask = get_object_vars(json_decode(file_get_contents('php://input')));
        session_start();        
        $tarea = new Tarea($dataTask);
        $proyecto = Proyecto::where($tarea->getProyectoId(), 'id');

        if (!$proyecto || $proyecto->getUsuarioId() !== $_SESSION['id']){
            $response['ok'] = false;
            $response['message'] = "Ha ocurrido un error al agregar la tarea";
        } else {
            $tarea->update();
            $response['body'] = $tarea;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);

    }

    public static function eliminarTarea(){
        $response = [
            'ok' => true,
            'message' => "La tarea ha sido eliminada correctamente", 
        ];

        $dataTask = get_object_vars(json_decode(file_get_contents('php://input')));
        session_start();        
        $tarea = new Tarea($dataTask);
        $proyecto = Proyecto::where($tarea->getProyectoId(), 'id');

        if (!$proyecto || $proyecto->getUsuarioId() !== $_SESSION['id']){
            $response['ok'] = false;
            $response['message'] = "Ha ocurrido un error al eliminar la tarea";
        } else {
            $tarea->delete();
            $response['body'] = $tarea;
        }

        header('Content-Type: application/json');
        echo json_encode($response, JSON_UNESCAPED_UNICODE);
    }
}