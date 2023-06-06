<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\CtrlCuenta;
use Controllers\CtrlLogin;
use MVC\Router;
$router = new Router();

//login
$router->get('/', [CtrlLogin::class, 'login']);
$router->post('/', [CtrlLogin::class, 'login']);
$router->get('/logout', [CtrlLogin::class, 'logout']);

//Crear cuenta 
$router->get('/crear', [CtrlCuenta::class, 'crear']); 
$router->post('/crear', [CtrlCuenta::class, 'crear']); 

//Password olvidado
$router->get('/olvide', [CtrlCuenta::class, 'olvide']); 
$router->post('/olvide', [CtrlCuenta::class, 'olvide']); 

//Colocar el nuevo password
$router->get('/restablecer', [CtrlCuenta::class, 'restablecer']);
$router->post('/restablecer', [CtrlCuenta::class, 'restablecer']);

//Confirmacion de Cuenta 
$router->get('/mensaje', [CtrlCuenta::class, 'mensaje']);
$router->get('/confirmar', [CtrlCuenta::class, 'confirmar']);






// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();