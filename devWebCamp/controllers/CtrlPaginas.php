<?php
namespace Controller;

use Model\Evento;
use Model\Ponente;
use Model\Usuario;
use MVC\Router;

class CtrlPaginas {
    public static function index(Router $router){
        $conferenciasViernes = Evento::getEventoByCategoriaYDia(1, 1);
        $conferenciasSabado = Evento::getEventoByCategoriaYDia(1, 2);
        $workshopsSabado = Evento::getEventoByCategoriaYDia(2, 2);
        $workshopsViernes = Evento::getEventoByCategoriaYDia(1, 2);

        $totalBloque['ponentes'] = Ponente::getNumRegisters();
        $totalBloque['conferencias'] = Evento::getNumRegisters("categoriaId", 1);
        $totalBloque['workshops'] = Evento::getNumRegisters("categoriaId", 2);

        $ponentes = Ponente::getAll();

        $router->render("paginas/index", [
            'titulo' => 'Inicio', 
            'conferenciasViernes' => $conferenciasViernes, 
            'conferenciasSabado' => $conferenciasSabado, 
            'workshopsViernes' => $workshopsViernes, 
            'workshopsSabado' => $workshopsSabado, 
            'totalBloque' => $totalBloque, 
            'ponentes' =>$ponentes,
        ]); 
    }

    public static function evento(Router $router){
        $router->render("paginas/devwebcamp", [
            'titulo' => 'Sobre DevWebCamp', 
        ]); 
    }

    public static function paquetes(Router $router){
        $router->render("paginas/paquetes", [
            'titulo' => 'Paquetes WebDevCamp', 
        ]); 
    }

    public static function conferencias(Router $router){
        $conferenciasViernes = Evento::getEventoByCategoriaYDia(1, 1);
        $conferenciasSabado = Evento::getEventoByCategoriaYDia(1, 2);
        $workshopsSabado = Evento::getEventoByCategoriaYDia(2, 2);
        $workshopsViernes = Evento::getEventoByCategoriaYDia(1, 2);
        $router->render("paginas/conferencias", [
            'titulo' => 'Conferencias & Workshops', 
            'conferenciasViernes' => $conferenciasViernes, 
            'conferenciasSabado' => $conferenciasSabado, 
            'workshopsViernes' => $workshopsViernes, 
            'workshopsSabado' => $workshopsSabado, 
        ]); 
    }

    public static function error(Router $router) {
        $router->render("paginas/404");
    }

}