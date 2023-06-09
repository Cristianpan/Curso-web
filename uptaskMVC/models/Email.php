<?php 
namespace Model;
use PHPMailer\PHPMailer\PHPMailer; 

class Email {
    private $email;
    private $nombre;
    private $token;
    
    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }


    public function enviarConfirmacion(){
        //Crear objeto email
        $mailer = $this->crearPhpMailer();
        $mailer->Subject = 'Confirma tu cuenta';

        $mailer->isHtml(true);
        $mailer->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre . "</strong> Has creado tu cuenta en UpTask.
        Solo debes de confirmarla haciendo click en el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar?token=" . $this->token . "'>Confirmar cuenta</a></p>"; 
        $contenido .= "<p>Si no solicitaste esta cuenta, puedes ignorar este mensaje</p>"; 
        $contenido .= "</html>";

        $mailer->Body = $contenido; 

        $mailer->send();
    }

    public function enviarInstrucciones(){
        $mailer = $this->crearPhpMailer(); 
        $mailer->Subject = 'Restablece tu contraseña'; 
        
        $mailer->isHtml(true);
        $mailer->CharSet = 'UTF-8';
        
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre . "</strong> Has solicitado restablecer tu contraseña.
        Haz click en el siguiente enlace para poder hacerlo</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/restablecer?token=" . $this->token . "'>Restablecer Contraseña</a></p>"; 
        $contenido .= "<p>Si no solicitaste restablecer tu contraseña, puedes ignorar este mensaje</p>"; 
        $contenido .= "</html>";
        
        $mailer->Body = $contenido; 
    
        $mailer->send();

    }

    private function crearPhpMailer(){
         //Crear objeto email
         $mailer = new PHPMailer();
         $mailer->isSMTP();
         $mailer->Host = 'sandbox.smtp.mailtrap.io';
         $mailer->SMTPAuth = true;
         $mailer->Port = 2525;
         $mailer->Username = $_ENV['MAILER_USERNAME'];
         $mailer->Password = $_ENV['MAILER_PASSWORD'];
         $mailer->SMTPSecure = 'tls';
 
         $mailer->setFrom('cuentas@uptask.com');
         $mailer->addAddress('cuentas@uptask.com', 'Uptask.com');

         return $mailer; 
    }

    public function setId($email){
        $this->email = $email;
    }

    public function getId(){
        return $this->email;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setToken($token){
        $this->token = $token;
    }

    public function getToken(){
        return $this->token;
    }
}