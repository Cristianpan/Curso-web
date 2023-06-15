<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\CtrlCuenta;
use Controllers\CtrlLogin;
use Controllers\CtrlApp;
use Controllers\CtrlDashboard;
use Controllers\CtrlTarea;
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

//Paginas privadas 
$router->get('/dashboard', [CtrlDashboard::class, 'index']); 
$router->get('/crearProyecto', [CtrlDashboard::class, 'crearProyecto']); 
$router->post('/crearProyecto', [CtrlDashboard::class, 'crearProyecto']); 
$router->get('/proyecto', [CtrlDashboard::class, 'proyecto']); 
$router->get('/perfil', [CtrlDashboard::class, 'perfil']); 
$router->post('/perfil', [CtrlDashboard::class, 'perfil']); 
$router->get('/cambiarPassword', [CtrlDashboard::class, 'cambiarPassword']); 
$router->post('/cambiarPassword', [CtrlDashboard::class, 'cambiarPassword']); 


//Api para las tareas
$router->get('/api/tareas', [CtrlTarea::class, 'index']);
$router->post('/api/crearTarea', [CtrlTarea::class,'crearTarea']);
$router->post('/api/actualizarTarea', [CtrlTarea::class,'actualizarTarea']);
$router->post('/api/eliminarTarea', [CtrlTarea::class,'eliminarTarea']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();