<?php 

require_once __DIR__ . '/../includes/app.php';

use Controller\CtrlLogin;
use Controller\CtrlCuenta;
use MVC\Router;

$router = new Router();

// Login
$router->get('/login', [CtrlLogin::class, 'login']);
$router->post('/login', [CtrlLogin::class, 'login']);
$router->post('/logout', [CtrlLogin::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [CtrlCuenta::class, 'registrar']);
$router->post('/registro', [CtrlCuenta::class, 'registrar']);

// Formulario de olvide mi password
$router->get('/olvide', [CtrlCuenta::class, 'olvide']);
$router->post('/olvide', [CtrlCuenta::class, 'olvide']);

// Colocar el nuevo password
$router->get('/restablecer', [CtrlCuenta::class, 'restablecer']);
$router->post('/restablecer', [CtrlCuenta::class, 'restablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [CtrlCuenta::class, 'mensaje']);
$router->get('/confirmarCuenta', [CtrlCuenta::class, 'confirmarCuenta']);


$router->comprobarRutas();