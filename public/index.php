<?php
    require_once(__DIR__ . '/../core/Router.php');
    require_once(__DIR__ . '/../app/controllers/UserController.php');

    $router = new Router();

    $router->get('/users', [UserController::class, 'index']);
    $router->get('/users/{id}', [UserController::class, 'show']);
    $router->get('/users/create', [UserController::class, 'create']);
    $router->post('/users', [UserController::class, 'store']);
    $router->get('/users/{id}/edit', [UserController::class, 'edit']);
    $router->patch('/users/{id}', [UserController::class, 'update']);
    $router->get('/users/{id}', [UserController::class, 'delete']);
    $router->delete('/users/{id}/delete', [UserController::class, 'destroy']);

    $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>