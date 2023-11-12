<?php
    require_once './config.php';
    require_once './libs/router.php';
    require_once './app/Controllers/ClubController.php';
    require_once './app/Controllers/JugadorController.php';

    $router = new Router();

    //                 endpoint          verbo     controller           método
    $router->addRoute('jugadores',      'GET',    'JugadorController', 'getJugadores'); //hecho
    $router->addRoute('jugadores',      'POST',   'JugadorController', 'add'); //hecho
    $router->addRoute('jugadores/:ID',  'GET',    'JugadorController', 'getjugadoresById'); //hecho
    $router->addRoute('jugadores/:ID',  'PUT',    'JugadorController', 'updateJugador'); //hecho
    $router->addRoute('jugadores/:ID',  'DELETE', 'JugadorController', 'deleteJugadorbyID'); //hecho


    $router->addRoute('clubes',     'GET',    'ClubController', 'getClubes');//hecho
    $router->addRoute('clubes',     'POST',   'taskApiController', 'Crearclubes');
    $router->addRoute('clubes/:ID', 'GET',    'taskApiController', 'getclubesById');//hecho
    $router->addRoute('clubes/:ID', 'PUT',    'taskApiController', 'Updateclubes');
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

?>