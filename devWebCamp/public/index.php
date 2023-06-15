<?php 

require_once __DIR__ . '/../includes/app.php';

use Controller\CtrlLogin;
use Controller\CtrlRegistrar;
use MVC\Router;

$router = new Router();

// Login
$router->get('/login', [CtrlLogin::class, 'login']);
$router->post('/login', [CtrlLogin::class, 'login']);
$router->post('/logout', [CtrlLogin::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [CtrlRegistrar::class, 'registrar']);
$router->post('/registro', [CtrlRegistrar::class, 'registrar']);

// Formulario de olvide mi password
$router->get('/olvide', [CtrlRegistrar::class, 'olvide']);
$router->post('/olvide', [CtrlRegistrar::class, 'olvide']);

// Colocar el nuevo password
$router->get('/restablecer', [CtrlRegistrar::class, 'restablecer']);
$router->post('/restablecer', [CtrlRegistrar::class, 'restablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [CtrlRegistrar::class, 'mensaje']);
$router->get('/confirmarCuenta', [CtrlRegistrar::class, 'confirmarCuenta']);


$router->comprobarRutas();