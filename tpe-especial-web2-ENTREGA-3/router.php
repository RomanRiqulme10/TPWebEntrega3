<?php
    require_once './config.php';
    require_once './libs/router.php';
    require_once './app/Controllers/ClubController.php';
    require_once './app/Controllers/JugadorController.php';

    $router = new Router();

    //                 endpoint          verbo     controller           método
    $router->addRoute('jugadores',      'GET',    'JugadorController', 'getJugadores'); 
    $router->addRoute('jugadores',      'POST',   'JugadorController', 'addJugador'); 
    $router->addRoute('jugadores/:ID',  'GET',    'JugadorController', 'getJugadoresById'); 
    $router->addRoute('jugadores/:ID',  'PUT',    'JugadorController', 'updateJugador'); 
    $router->addRoute('jugadores/:ID',  'DELETE', 'JugadorController', 'deleteJugadorbyID'); 


    $router->addRoute('clubes',     'GET',    'ClubController', 'getClubes');
    $router->addRoute('clubes',     'POST',   'ClubController', 'addCLub');
    $router->addRoute('clubes/:ID', 'GET',    'ClubController', 'getclubesById');
    $router->addRoute('clubes/:ID', 'PUT',    'ClubController', 'updateClub');
    
    $router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

?>
