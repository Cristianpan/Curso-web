<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controller\CtrlLogin;
use Controller\CtrlRegistrar;
use Controller\CtrlCita;

$router = new Router();
// Iniciar Sesion
$router->get('/', [CtrlLogin::class, 'login']); 
$router->post('/', [CtrlLogin::class, 'login']); 
$router->get('/cerrarSesion', [CtrlLogin::class, 'logout']); 

//Recuperar password
$router->get('/olvide', [CtrlLogin::class, 'olvide']); 
$router->post('/olvide', [CtrlLogin::class, 'olvide']); 
$router->get('/restablecer', [CtrlLogin::class, 'restablecer']); 
$router->post('/restablecer', [CtrlLogin::class, 'restablecer']);

//Registrar usuario
$router->get('/crearCuenta', [CtrlRegistrar::class, 'registrar']);
$router->get('/mensaje', [CtrlRegistrar::class, 'mensaje']);
$router->post('/crearCuenta', [CtrlRegistrar::class, 'registrar']);
$router->get('/confirmarCuenta', [CtrlRegistrar::class, 'confirmarCuenta']);

// Area privada

$router->get('/citas', [CtrlCita::class, 'index']);



// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

