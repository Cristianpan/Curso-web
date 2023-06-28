<?php
namespace Controller;

use Model\Evento;
use Model\Registro;
use MVC\Router;
use Validator\ValidadorLogin;

class CtrlDashboard {
    public static function index(Router $router){
        session_start(); 
        ValidadorLogin::isAuth(); 
        ValidadorLogin::isAdmin();

        //obtener ultimos registros
        $registros = Registro::getLimit(5);
        
        //obtener ingresos
        $virtuales = Registro::getNumRegisters("paqueteId", 2);
        $presenciales = Registro::getNumRegisters("paqueteId", 1);
        $ingresos =  $virtuales * 96.41 + $presenciales * 189.54;
        
        //obtener eventos con mas y menos lugares disponibles

        $menosDisponibles = Evento::orderByLimit("disponibles", "ASC", 3);
        $masDisponibles = Evento::orderByLimit("disponibles", "DESC", 3);
        
        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de administración',
            'registros' => $registros, 
            'ingresos' => $ingresos, 
            'menosDisponibles' => $menosDisponibles, 
            'masDisponibles' => $masDisponibles
        ]);
    }

}