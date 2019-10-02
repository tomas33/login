<?php

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\SignUpController;
use Slim\App;
return function (App $app) {
    $app->get('/',HomeController::class);
    $app->post('/login', LoginController::class);
    $app->get('/logout', LogoutController::class);
    $app->post('/registro', SignUpController::class);
};
