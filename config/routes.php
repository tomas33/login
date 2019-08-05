<?php

use Slim\App;
use App\Controllers\SignUpController;
use App\Controllers\HelloWorldController;
return function (App $app) {
    $app->get('/hello', HelloWorldController::class);
    $app->post('/registro', SignUpCntroller::class);
};
