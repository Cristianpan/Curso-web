<?php 
    require_once __DIR__ . '/../includes/app.php';
    
    use MVC\Router;
    use Controller\CtrlPropiedad;

    $router = new Router;

    $router->get('/admin', [CtrlPropiedad::class, 'index'] );
    $router->get('/propiedades/crear', [CtrlPropiedad::class, 'crear']);
    $router->post('/propiedades/crear', [CtrlPropiedad::class, 'crear']);
    $router->get('/propiedades/actualizar', [CtrlPropiedad::class, 'actualizar']);
    $router->post('/propiedades/actualizar', [CtrlPropiedad::class, 'actualizar']);
    $router->post('/propiedades/eliminar', [CtrlPropiedad::class, 'eliminar']);

    $router->comprobarRutas();