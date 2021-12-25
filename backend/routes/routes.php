<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

require_once __DIR__ . '/configRoutes.php';

$app->get('/', HomeController::class . ':index');

$app->get('/users', UserController::class . ':index');

$app->delete('/users/{id}', UserController::class . ':destroy');
$app->put('/users/{id}', UserController::class . ':update');

$app->post('/singup', UserController::class . ':store');
$app->post('/singin', UserController::class . ':login');