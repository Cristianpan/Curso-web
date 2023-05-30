<?php

namespace Controller;
use MVC\Router;
use Model\Propiedad; 
use PHPMailer\PHPMailer\PHPMailer; 

class CtrlPaginas {
    public static function index (Router $router){
        $router->render("paginas/index", [
        'propiedades' => Propiedad::getLimit(3), 
        'inicio' => true,
    ]);
    }
    public static function nosotros (Router $router){
        $router->render("paginas/nosotros");        
    }
    public static function propiedades (Router $router){
        $router->render("paginas/propiedades", [
            'propiedades' => Propiedad::getAll(),
        ]);
    }
    public static function propiedad (Router $router){
        $id = validarORedireccionar("/propiedades");
        $router->render("paginas/propiedad", [
            'propiedad' => Propiedad::getById($id),
        ]);
        
    }
    public static function blog (Router $router){
        $router->render("paginas/blog");
        
        
    }
    public static function entrada (Router $router){
        $router->render("paginas/entrada");
    }
    public static function contacto (Router $router){
        $mensaje = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $respuestas = $_POST['contacto']; 
            $phpmailer = new PHPMailer();

            //configurar SMTP
            $phpmailer->isSMTP();
            $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
            $phpmailer->SMTPAuth = true;
            $phpmailer->Port = 2525;
            $phpmailer->Username = '330c7a81e18132';
            $phpmailer->Password = '2a31e509b969a7';
            $phpmailer->SMTPSecure = 'tls';

            //configurar contenido de mail 
            $phpmailer->setFrom('admin@bienesraices.com');
            $phpmailer->addAddress('admin@bienesraices.com', 'Bienesraices.com');
            $phpmailer->Subject = "Tienes un nuevo mensaje"; 

            //habilitar html 
            $phpmailer->isHTML(true); 
            $phpmailer->CharSet = 'UTF-8';

            //definir el contenido
            $contenido = '<html>'; 
            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= "<p>Nombre:".  $respuestas['nombre'] . "</p>";
            $contenido .= "<p>Mensaje:".  $respuestas['mensaje'] . "</p>";
            $contenido .= "<p>Vende o compra".  $respuestas['tipo'] . "</p>";
            $contenido .= "<p>Precio o presupuesto $".  $respuestas['precio'] . "</p>";
            $contenido .= "<p>Prefiere ser contactado por:".  $respuestas['contacto'] . "</p>";
            if ($respuestas['contacto'] === 'telefono') {
                $contenido .= "<p>Teléfono:".  $respuestas['telefono'] . "</p>";
                $contenido .= "<p>Fecha de contacto:".  $respuestas['fecha'] . "</p>";
                $contenido .= "<p>Hora de contacto:".  $respuestas['hora'] . "</p>";
            } else {
                $contenido .= "<p>Email:".  $respuestas['email'] . "</p>";
            }
            $contenido .= '</html>'; 

            $phpmailer->Body = $contenido; 
            if ($phpmailer->send()){  
                $mensaje[] = true;  
                $mensaje[] = "Mensaje enviado Correctamente";
            } else {
                $mensaje[] = false; 
                $mensaje[] = "El mensaje no se pudo enviar"; 
            }

        }
        $router->render("paginas/contacto", [
            'mensaje' => $mensaje
        ]);
      
    }
}
