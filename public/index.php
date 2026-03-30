<?php
    require_once(__DIR__ . '/../core/Router.php');
    require_once(__DIR__ . '/../app/controllers/UserController.php');

    $router = new Router();

    $router->get('/users', [UserController::class, 'index']);
    $router->get('/users/show/:id', [UserController::class, 'show']);
    $router->get('/users/create', [UserController::class, 'create']);
    $router->post('/users/store', [UserController::class, 'store']);
    $router->get('/users/edit/:id', [UserController::class, 'edit']);
    $router->patch('/users/update/:id', [UserController::class, 'update']);
    $router->get('/users/delete/:id', [UserController::class, 'delete']);
    $router->delete('/users/destroy/:id', [UserController::class, 'destroy']);

    $router->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
?>