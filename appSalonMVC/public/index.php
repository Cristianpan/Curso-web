<?php 

require_once __DIR__ . '/../includes/app.php';

use Controller\CtrlApi;
use MVC\Router;
use Controller\CtrlLogin;
use Controller\CtrlRegistrar;
use Controller\CtrlAdmin;
use Controller\CtrlCita;
use Controller\CtrlServicio;

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
$router->get('/admin', [CtrlAdmin::class, 'index']);


//Api
$router->get('/api/servicios', [CtrlApi::class, 'index']);
$router->post('/api/citas', [CtrlApi::class, 'reservarCita']);
$router->post('/api/eliminar', [CtrlApi::class, 'eliminar']);

//Crud servicios
$router->get('/servicios', [CtrlServicio::class, 'index']);
$router->get('/servicios/crear', [CtrlServicio::class, 'crear']);
$router->post('/servicios/crear', [CtrlServicio::class, 'crear']);
$router->get('/servicios/actualizar', [CtrlServicio::class, 'actualizar']);
$router->post('/servicios/actualizar', [CtrlServicio::class, 'actualizar']);
$router->post('/servicios/eliminar', [CtrlServicio::class, 'eliminar']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();

