<?php

use Slim\App;
use App\Controllers\UserRepository;

return function (App $app) {
    $app->get('/hello', HelloWorldController::class);
    $app->post('/registro', UserRepository::class);
};
