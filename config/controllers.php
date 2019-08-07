<?php

use App\Controllers\HelloWorldController;
use App\Controllers\SignUpController;

$container = $app->getContainer();

$container[HelloWorldController::class] = function ($c) {
    return new HelloWorldController($c->get("view"));
};
$container[SignUpController::class] = function ($c) {
    return new SignUpController($container[EntityManager::class]);
};