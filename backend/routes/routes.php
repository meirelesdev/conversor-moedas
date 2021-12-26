<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;

require_once __DIR__ . '/configRoutes.php';

$app->get('/moedas', HomeController::class . ':index');
$app->get('/moeda/{code}', HomeController::class . ':getCurrency');

$app->get('/payments', PaymentController::class . ':index');

$app->post('/exchange/{userid}', HomeController::class . ':exchenge');

$app->get('/users', UserController::class . ':index');
$app->post('/users/delete/{id}', UserController::class . ':destroy');
$app->post('/users/update/{id}', UserController::class . ':update');
$app->post('/singup', UserController::class . ':store');
$app->post('/singin', UserController::class . ':login');