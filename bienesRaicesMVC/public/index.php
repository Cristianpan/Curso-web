<?php 
    require_once __DIR__ . '/../includes/app.php';
    
    use MVC\Router;
    use Controller\CtrlPropiedad;
    use Controller\CtrlVendedor;
    use Controller\CtrlPaginas;
    use Controller\CtrlLogin;

    $router = new Router;
    //index admin
    $router->get('/admin', [CtrlPropiedad::class, 'index'] );
    
    //CRUD propiedades
    $router->get('/propiedades/crear', [CtrlPropiedad::class, 'crear']);
    $router->get('/propiedades/actualizar', [CtrlPropiedad::class, 'actualizar']);
    $router->post('/propiedades/crear', [CtrlPropiedad::class, 'crear']);
    $router->post('/propiedades/actualizar', [CtrlPropiedad::class, 'actualizar']);
    $router->post('/propiedades/eliminar', [CtrlPropiedad::class, 'eliminar']);
    
    //CRUD vendedores
    $router->get('/vendedores/actualizar', [CtrlVendedor::class, 'actualizar']);
    $router->get('/vendedores/crear', [CtrlVendedor::class, 'crear']);
    $router->post('/vendedores/eliminar', [CtrlVendedor::class, 'eliminar']);
    $router->post('/vendedores/crear', [CtrlVendedor::class, 'crear']);
    $router->post('/vendedores/actualizar', [CtrlVendedor::class, 'actualizar']);
    
    //Paginas publicas
    $router->get('/', [CtrlPaginas::class, 'index']);
    $router->get('/nosotros', [CtrlPaginas::class, 'nosotros']);
    $router->get('/propiedades', [CtrlPaginas::class, 'propiedades']);
    $router->get('/propiedad', [CtrlPaginas::class, 'propiedad']);
    $router->get('/blog', [CtrlPaginas::class, 'blog']);
    $router->get('/entrada', [CtrlPaginas::class, 'entrada']);
    $router->get('/contacto', [CtrlPaginas::class, 'contacto']);
    $router->post('/contacto', [CtrlPaginas::class, 'contacto']);
    
    // Login y autenticacion 
    $router->get('/login', [CtrlLogin::class, 'login']);
    $router->post('/login', [CtrlLogin::class, 'login']);
    $router->get('/logout', [CtrlLogin::class, 'logout']);


    

    $router->comprobarRutas();