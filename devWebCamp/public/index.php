<?php 

require_once __DIR__ . '/../includes/app.php';

use Controller\CtrlDashboard;
use Controller\CtrlLogin;
use Controller\CtrlCuenta;
use Controller\CtrlEventos;
use Controller\CtrlPonentes;
use Controller\CtrlRegistrados;
use Controller\CtrlRegalos;
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
$router->get('/confirmar', [CtrlCuenta::class, 'confirmarCuenta']);

//Area del administrador
$router->get('/admin/dashboard', [CtrlDashboard::class, 'index']);
$router->get('/admin/ponentes', [CtrlPonentes::class, 'index']);
$router->get('/admin/ponentes/crear', [CtrlPonentes::class, 'crear']);
$router->post('/admin/ponentes/crear', [CtrlPonentes::class, 'crear']);
$router->get('/admin/eventos', [CtrlEventos::class, 'index']);
$router->get('/admin/registrados', [CtrlRegistrados::class, 'index']);
$router->get('/admin/regalos', [CtrlRegalos::class, 'index']);


$router->comprobarRutas();